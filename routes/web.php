<?php

use App\Livewire\Dashboard;
use App\Livewire\Page;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UrlStorageController;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Middleware\CustomGuestMiddleware;

Route::get('/', Page\Home::class)->name('home');
Route::prefix('info')->group( function() {
  Route::get('/features', Page\Features::class)->name('info-features');
  Route::get('/pages', Page\Pages::class)->name('info-pages');
  Route::get('/blog', Page\Blog::class)->name('info-blog');
  Route::get('/about', Page\About::class)->name('info-about');
  Route::get('/contact', Page\Contact::class)->name('info-contact');
  Route::get('/template', Page\Templates::class)->name('info-template');
  Route::get('/tools', Page\Tools::class)->name('info-tools');
  Route::get('/feedback', Page\Feedback::class)->name('info-feedback');
  Route::get('/privacy', Page\Privacy::class)->name('info-privacy');
  Route::get('/terms', Page\Terms::class)->name('info-terms');
  Route::get('/cookie', Page\CookiePolicy::class)->name('info-cookie');
});

Route::middleware(CustomAuthMiddleware::class)->group(function () {
    Route::prefix('v1_dashboard')->group( function () {
        Route::get('/', Dashboard\Home::class)->name('dashboard-home');
        Route::get('/qr-generator', Dashboard\QrCodeGenerator::class)->name('dashboard-qr-generator');
        Route::get('/coming-soon', Dashboard\ComingSoon::class)->name('dashboard-coming-soon');
        Route::get('/profile', Dashboard\Profile::class)->name('dashboard-profile');
    });
    Route::post('/logout', function() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap.xml');

Route::post('/url-shorten-func', [UrlStorageController::class, 'shortenUrl'])->name('shorten-url');
Route::get('/{shortenedUrl}', [UrlStorageController::class, 'redirectToOriginalUrl'])->name('redirect-to-original-url');

Route::middleware(CustomGuestMiddleware::class)->group(function () {
    Route::prefix('auth')->group( function() {
        Route::get('/login', Page\Login::class)->name('info-login');
        Route::get('/register', Page\Register::class)->name('info-register');
        
    });
});

Route::fallback(function() {
    return response()->view('errors.404', [], 204);
});
