<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Features extends Component
{
    public function render()
    {
        return view('livewire.page.features')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Professional Tools and Advanced Features',
                'seoDescription' => 'Professional tools and advanced features for professional bio, powerful anayltics, and effortless link management in a simple way.',
                'keywords' => 'lovilink, lovilink feature, bio pages, url analytics',
            ]
        );
    }
}
