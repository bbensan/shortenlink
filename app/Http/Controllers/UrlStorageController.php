<?php

namespace App\Http\Controllers;

use App\Models\UrlStorage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlStorageController extends Controller
{
    public function redirectToOriginalUrl($shortenedUrl)
    {
        $url = UrlStorage::where('shortened_url', $shortenedUrl)->first();
        
        if ($url) {
            $url->click_count++;
            $url->save();
            return redirect($url->original_url);
        }

        abort(404);
    }
}
