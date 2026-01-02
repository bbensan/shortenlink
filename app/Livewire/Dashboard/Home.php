<?php

namespace App\Livewire\Dashboard;

use App\Models\UrlStorage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Home extends Component
{
    use WithPagination;

    public $breadcrumbs = [];
    
    // Modal states
    public $showEditModal = false;
    public $showDeleteModal = false;
    
    // Edit form fields
    public $editingUrlId = null;
    public $editOriginalUrl = '';
    public $editShortenedUrl = '';
    
    // Delete confirmation
    public $deletingUrlId = null;
    public $deletingUrlOriginal = '';
    
    // Shorten URL form
    public $originalUrl = '';
    public $shortenedUrl = '';
    public $isLoading = false;

    public function mount()
    {
        // Set breadcrumbs
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Dashboard', 'url' => route('dashboard-home')],
        ];

        // Migrate temp_user URLs to authenticated user
        $this->migrateTempUserUrls();
    }

    /**
     * Migrate last 5 temp_user URLs to authenticated user
     */
    private function migrateTempUserUrls()
    {
        $tempUserId = request()->cookie('temp_user_id');
        
        if (!$tempUserId) {
            return;
        }

        $userId = auth()->id();
        
        if (!$userId) {
            return;
        }

        // Get last 5 temp URLs
        $tempUrls = UrlStorage::where('user_id', $tempUserId)
            ->where('is_temporary', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Update them to authenticated user
        foreach ($tempUrls as $url) {
            $url->update([
                'user_id' => $userId,
                'is_temporary' => false,
            ]);
        }
    }

    /**
     * Open edit modal
     */
    public function openEditModal($urlId)
    {
        $url = UrlStorage::where('id', $urlId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$url) {
            session()->flash('error', 'URL not found.');
            return;
        }

        $this->editingUrlId = $urlId;
        $this->editOriginalUrl = $url->original_url;
        $this->editShortenedUrl = $url->shortened_url;
        // Modal akan dibuka via Alpine.js event, tidak perlu set showEditModal
    }

    /**
     * Close edit modal
     */
    public function closeEditModal()
    {
        $this->editingUrlId = null;
        $this->editOriginalUrl = '';
        $this->editShortenedUrl = '';
    }

    /**
     * Update URL
     */
    public function updateUrl()
    {
        $this->validate([
            'editOriginalUrl' => 'required|url',
            'editShortenedUrl' => 'required|string|min:3|max:20|regex:/^[a-zA-Z0-9_-]+$/',
        ]);

        $url = UrlStorage::where('id', $this->editingUrlId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$url) {
            session()->flash('error', 'URL not found.');
            return;
        }

        // Check if shortened_url already exists (except current)
        $existingUrl = UrlStorage::where('shortened_url', $this->editShortenedUrl)
            ->where('id', '!=', $this->editingUrlId)
            ->first();

        if ($existingUrl) {
            $this->addError('editShortenedUrl', 'This short URL is already taken.');
            return;
        }

        $url->update([
            'original_url' => $this->editOriginalUrl,
            'shortened_url' => $this->editShortenedUrl,
        ]);

        session()->flash('success', 'URL updated successfully.');
        $this->closeEditModal();
        $this->dispatch('close-edit-modal');
    }

    /**
     * Open delete modal
     */
    public function openDeleteModal($urlId)
    {
        $url = UrlStorage::where('id', $urlId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$url) {
            session()->flash('error', 'URL not found.');
            return;
        }

        $this->deletingUrlId = $urlId;
        $this->deletingUrlOriginal = $url->original_url;
        // Modal akan dibuka via Alpine.js event, tidak perlu set showDeleteModal
    }

    /**
     * Close delete modal
     */
    public function closeDeleteModal()
    {
        $this->deletingUrlId = null;
        $this->deletingUrlOriginal = '';
    }

    /**
     * Delete URL
     */
    public function deleteUrl()
    {
        $url = UrlStorage::where('id', $this->deletingUrlId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$url) {
            session()->flash('error', 'URL not found.');
            return;
        }

        $url->delete();

        session()->flash('success', 'URL deleted successfully.');
        $this->closeDeleteModal();
        $this->dispatch('close-delete-modal');
    }

    /**
     * Shorten URL
     */
    public function shortenUrl()
    {
        $this->reset(['shortenedUrl']);
        $this->isLoading = true;

        try {
            $this->validate([
                'originalUrl' => 'required|url',
            ]);

            // Generate unique shortened URL
            do {
                $shortened = Str::random(6);
                $exists = UrlStorage::where('shortened_url', $shortened)->exists();
            } while ($exists);

            $urlStorage = UrlStorage::create([
                'original_url' => $this->originalUrl,
                'shortened_url' => $shortened,
                'user_id' => auth()->id(),
                'is_temporary' => false,
            ]);

            $this->shortenedUrl = $shortened;
            $this->originalUrl = '';
            
            session()->flash('success', 'URL shortened successfully!');
            
            // Reset pagination to show new URL
            $this->resetPage();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors will be shown automatically
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        $userId = auth()->id();
        
        $urls = UrlStorage::where('user_id', $userId)
            ->where('is_temporary', false)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.dashboard.home', [
            'urls' => $urls,
        ])->layout('layouts.dashboard', [
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
