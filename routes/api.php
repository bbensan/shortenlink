<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DashboardController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/userdata', [UserDataController::class, 'getUserData']);
Route::post('/send-location', [UserDataController::class, 'saveLocation']);
Route::get('/test-v1', function () {
    return response()->json([
        'message' => 'API is working fine!',
        'status' => 'success'
    ]);
});


Route::get('/log-app', [DashboardController::class, 'getLogApp']);
Route::delete('/log-app', [DashboardController::class, 'eraseLogApp']);