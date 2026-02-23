<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $terms = false;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        session()->regenerate();

        return redirect()->intended(route('dashboard-home'));
    }

    public function render()
    {
        return view('livewire.page.register')->layout('layouts.home')->layoutData(
            [
                'title' => 'Lovilink - Register',
                'seoDescription' => 'Create your free account to get started with Lovilink. It\'s easy and takes just a few seconds.',
                'keywords' => 'lovilink, register, account, free, easy, few seconds',
            ]
        );
    }
}
