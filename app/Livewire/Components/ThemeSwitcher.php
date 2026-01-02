<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public function setTheme($theme)
    {
        // Theme is handled by Alpine.js and localStorage
        // This method is called but the actual theme switching is done client-side
        // to ensure immediate response without page reload
    }

    public function render()
    {
        return view('livewire.components.theme-switcher');
    }
}

