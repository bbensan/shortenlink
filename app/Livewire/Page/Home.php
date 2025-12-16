<?php

namespace App\Livewire\Page;

use DB;
use Livewire\Component;

class Home extends Component
{
    public $url;
    public function __construct()
    {
        $this->url = DB::table('url_storages')->first();
    }

    public function render()
    {
        return view('livewire.page.home', [
            'url' => $this->url,
        ])->layout('layouts.home');
    }
}
