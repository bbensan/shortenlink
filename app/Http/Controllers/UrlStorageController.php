<?php

namespace App\Http\Controllers;

use App\Models\UrlStorage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlStorageController extends Controller
{
    public function shortenUrl(Request $request)
    {
        try {
        $request->validate([
            'url' => 'required|url',
        ]);

            $url = UrlStorage::create([
                'original_url' => $request->url,
                'shortened_url' => Str::random(6),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'URL shortened successfully',
                'shortened_url' => $url->shortened_url,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
