<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Pages extends Component
{
    public function render()
    {
        return view('livewire.page.pages')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Personalized Bio Pages Templates',
                'seoDescription' => 'Choose from our beautiful, interactive templates to create your perfect bio page.',
                'keywords' => 'lovilink, personal bio page templates, interactive templates, personal bio page',
            ]
        );
    }
}
