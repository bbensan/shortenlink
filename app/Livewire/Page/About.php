<?php

namespace App\Livewire\Page;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.page.about')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - About',
                'seoDescription' => 'Lovilink is a free URL shortener that allows you to shorten your long URLs and track your clicks with detailed analytics.',
                'keywords' => 'lovilink, about, url shortener, url analytics, url tracking',
            ]
        );
    }
}
