<?php

namespace App\Livewire\Page;

use Livewire\Component;

class CookiePolicy extends Component
{
    public function render()
    {
        return view('livewire.page.cookie-policy')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Cookie Policy',
                'seoDescription' => 'Lovilink cookie policy explains how we use cookies and similar tracking technologies when you visit our website.',
                'keywords' => 'lovilink, cookie policy, cookies, tracking technologies',
            ]
        );
    }
}
