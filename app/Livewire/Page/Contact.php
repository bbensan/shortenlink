<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.page.contact')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Contact',
                'seoDescription' => 'Have a question, suggestion, or need support? We\'d love to hear from you. Reach out to us through any of the channels below.',
                'keywords' => 'lovilink, contact, support, questions, suggestions',
            ]
        );
    }
}
