<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Terms extends Component
{
    public function render()
    {
        return view('livewire.page.terms')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Terms of Service',
                'seoDescription' => 'Lovilink terms of service explains the rules and regulations for using our URL shortening service.',
                'keywords' => 'lovilink, terms of service, rules, regulations, url shortening service',
            ]
        );
    }
}
