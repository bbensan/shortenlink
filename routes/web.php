<?php

use App\Livewire\Page\Blog;
use App\Livewire\Page\Home;
use App\Livewire\Page\About;
use App\Livewire\Page\Login;
use App\Livewire\Page\Pages;
use App\Livewire\Page\Terms;
use App\Livewire\Page\Contact;
use App\Livewire\Page\Privacy;
use App\Livewire\Page\Features;
use App\Livewire\Page\Feedback;
use App\Livewire\Page\Register;
use App\Livewire\Page\Templates;
use App\Livewire\Page\CookiePolicy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlStorageController;

Route::get('/', Home::class)->name('home');
Route::prefix('info')->group( function() {
  Route::get('/features', Features::class)->name('info-features');
  Route::get('/pages', Pages::class)->name('info-pages');
  Route::get('/blog', Blog::class)->name('info-blog');
  Route::get('/about', About::class)->name('info-about');
  Route::get('/contact', Contact::class)->name('info-contact');
  Route::get('/template', Templates::class)->name('info-template');
  Route::get('/feedback', Feedback::class)->name('info-feedback');
  Route::get('/privacy', Privacy::class)->name('info-privacy');
  Route::get('/terms', Terms::class)->name('info-terms');
  Route::get('/cookie', CookiePolicy::class)->name('info-cookie');
});

Route::post('/url-shorten-func', [UrlStorageController::class, 'shortenUrl'])->name('shorten-url');

Route::prefix('auth')->group( function() {
  Route::get('/login', Login::class)->name('info-login');
  Route::get('/register', Register::class)->name('info-register');
});