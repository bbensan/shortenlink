<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function getLogApp() 
    {
        // Mengambil isi file log storage/logs/laravel.log
        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)) {
            $logContent = file_get_contents($logPath);
        } else {
            $logContent = "Log file not found.";
        }
        return response()->json([
            'status' => 'success',
            'data' => $logContent
        ]);
    }

    public function eraseLogApp()
    {
        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)) {
            unlink($logPath);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Log file erased successfully'
        ]);
    }
}