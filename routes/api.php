<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrtController;
use Illuminate\Support\Facades\Auth;

// Route::post('/api/brts', [BrtController::class, 'store']);
Route::get('/example', function () {
    return response()->json(['message' => 'Hello, world!']);
});
Route::get('/api/brts1/', [BrtController::class, 'index']);

Route::get('/api/brts2/{brt}', [BrtController::class, 'show']);
Route::put('/brtsu/{id}', [BrtController::class, 'update']);
