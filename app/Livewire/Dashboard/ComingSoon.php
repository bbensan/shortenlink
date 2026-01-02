<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class ComingSoon extends Component
{
    public $breadcrumbs = [];
    
    public $comingSoonItems = [
        [
            'title' => 'Bio Page',
            'description' => 'Create a beautiful bio page with multiple links, social media profiles, and custom branding. Perfect for influencers, creators, and businesses.',
            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            'status' => 'coming-soon',
        ],
        [
            'title' => 'Custom QR Code',
            'description' => 'Design custom QR codes with your brand colors, logos, and styling. Make your QR codes stand out with professional customization options.',
            'icon' => 'M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z',
            'status' => 'coming-soon',
        ],
    ];

    public function mount()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Dashboard', 'url' => route('dashboard-home')],
            ['label' => 'Coming Soon', 'url' => route('dashboard-coming-soon')],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.coming-soon')
            ->layout('layouts.dashboard', [
                'breadcrumbs' => $this->breadcrumbs,
            ]);
    }
}

