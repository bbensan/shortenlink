<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.page.blog', )->layout('layouts.home')->layoutData([
            'title' => 'Lovilink - Blog',
            'seoDescription' => 'Read our blog for the latest news and updates about Lovilink.',
            'keywords' => 'lovilink, blog, news, updates',
        ]);
    }
}
