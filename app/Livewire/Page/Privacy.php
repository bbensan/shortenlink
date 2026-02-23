<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.page.privacy')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Privacy Policy',
                'seoDescription' => 'Lovilink privacy policy explains how we collect, use, and protect your information when you use our URL shortening service.',
                'keywords' => 'lovilink, privacy policy, privacy, information, collection, use, protection, url shortening service',
            ]
        );
    }
}
