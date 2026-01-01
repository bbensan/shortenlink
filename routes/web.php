<?php

use App\Livewire\Page\Blog;
use App\Livewire\Page\Home;
use App\Livewire\Page\About;
use App\Livewire\Page\Login;
use App\Livewire\Page\Pages;
use App\Livewire\Page\Terms;
use App\Livewire\Page\Tools;
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
  Route::get('/tools', Tools::class)->name('info-tools');
  Route::get('/feedback', Feedback::class)->name('info-feedback');
  Route::get('/privacy', Privacy::class)->name('info-privacy');
  Route::get('/terms', Terms::class)->name('info-terms');
  Route::get('/cookie', CookiePolicy::class)->name('info-cookie');
});

Route::post('/url-shorten-func', [UrlStorageController::class, 'shortenUrl'])->name('shorten-url');
Route::get('/{shortenedUrl}', [UrlStorageController::class, 'redirectToOriginalUrl'])->name('redirect-to-original-url');

Route::prefix('auth')->group( function() {
  Route::get('/login', Login::class)->name('info-login');
  Route::get('/register', Register::class)->name('info-register');
});

Route::get('/sitemap.xml', function() {
  $sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
      <loc>' . url('/') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>daily</changefreq>
      <priority>1.0</priority>
  </url>
  <url>
      <loc>' . route('info-features') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
  </url>
  <url>
      <loc>' . route('info-pages') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
  </url>
  <url>
      <loc>' . route('info-blog') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
  </url>
  <url>
      <loc>' . route('info-about') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.7</priority>
  </url>
  <url>
      <loc>' . route('info-contact') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.7</priority>
  </url>
  <url>
      <loc>' . route('info-tools') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
  </url>
  <url>
      <loc>' . route('info-privacy') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>yearly</changefreq>
      <priority>0.5</priority>
  </url>
  <url>
      <loc>' . route('info-terms') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>yearly</changefreq>
      <priority>0.5</priority>
  </url>
  <url>
      <loc>' . route('info-cookie') . '</loc>
      <lastmod>' . date('Y-m-d') . '</lastmod>
      <changefreq>yearly</changefreq>
      <priority>0.5</priority>
  </url>
</urlset>';
  
  return response($sitemap, 200)
      ->header('Content-Type', 'application/xml');
});