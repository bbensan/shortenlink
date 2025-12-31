<?php

namespace App\Livewire\Page;

use App\Models\UrlStorage;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class Home extends Component
{
    public $url = '';
    public $shortenedUrl = '';
    public $error = '';
    public $isLoading = false;

    /**
     * Get or create temporary user ID from cookie
     * Format: temp_user_<uuid>
     */
    private function getOrCreateTemporaryUserId()
    {
        $cookieName = 'temp_user_id';
        $tempUserId = request()->cookie($cookieName);

        // If cookie doesn't exist, create new temporary user ID
        if (!$tempUserId) {
            $tempUserId = 'temp_user_' . Str::uuid()->toString();
            
            // Set cookie for 1 year (365 days)
            Cookie::queue($cookieName, $tempUserId, 60 * 24 * 365);
        }

        return $tempUserId;
    }

    /**
     * Get temporary user ID from cookie (without creating new one)
     */
    private function getTemporaryUserId()
    {
        return request()->cookie('temp_user_id');
    }

    /**
     * Get recent URLs for temporary user
     */
    private function getRecentUrls()
    {
        $tempUserId = $this->getTemporaryUserId();
        
        if (!$tempUserId) {
            return collect([]);
        }

        return UrlStorage::where('user_id', $tempUserId)
            ->where('is_temporary', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function shortenUrl()
    {
        $this->reset(['shortenedUrl', 'error']);
        $this->isLoading = true;

        try {
            $this->validate([
                'url' => 'required|url',
            ]);

            // Determine user_id and is_temporary based on authentication
            if (auth()->check()) {
                $userId = auth()->user()->id;
                $isTemporary = false;
            } else {
                $userId = $this->getOrCreateTemporaryUserId();
                $isTemporary = true;
            }

            $urlStorage = UrlStorage::create([
                'original_url' => $this->url,
                'shortened_url' => Str::random(6),
                'user_id' => $userId,
                'is_temporary' => $isTemporary,
            ]);

            $this->shortenedUrl = $urlStorage->shortened_url;
            $this->url = ''; // Clear input after success
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->error = $e->getMessage();
        } catch (\Exception $e) {
            $this->error = 'An error occurred: ' . $e->getMessage();
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        $recentUrls = $this->getRecentUrls();
        $hasMoreUrls = false;
        
        // Check if there are more than 5 URLs
        if ($recentUrls->count() > 0) {
            $tempUserId = $this->getTemporaryUserId();
            $totalUrls = UrlStorage::where('user_id', $tempUserId)
                ->where('is_temporary', true)
                ->count();
            $hasMoreUrls = $totalUrls > 5;
        }

        return view('livewire.page.home', [
            'recentUrls' => $recentUrls,
            'hasMoreUrls' => $hasMoreUrls,
        ])->layout('layouts.home');
    }
}