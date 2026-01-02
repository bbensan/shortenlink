<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function sitemap()
    {
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
    }
}
