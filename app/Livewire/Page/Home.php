<?php

namespace App\Livewire\Page;

use App\Models\UrlStorage;
use Livewire\Component;
use Illuminate\Support\Str;

class Home extends Component
{
    public $url = '';
    public $shortenedUrl = '';
    public $error = '';
    public $isLoading = false;

    public function shortenUrl()
    {
        $this->reset(['shortenedUrl', 'error']);
        $this->isLoading = true;

        try {
            $this->validate([
                'url' => 'required|url',
            ]);

            $urlStorage = UrlStorage::create([
                'original_url' => $this->url,
                'shortened_url' => Str::random(6),
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
        return view('livewire.page.home')->layout('layouts.home');
    }
}