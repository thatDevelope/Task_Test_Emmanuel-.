<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrtController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/example', function () {
//     return response()->json(['message' => 'Hello, world!']);
// });

Route::post('/brts', [BrtController::class, 'store'])->name('brt.store');
Route::get('/brt', [BrtController::class, 'brt'])->name('brts.store');

require __DIR__.'/auth.php';

Route::post('/api/login', [AuthController::class, 'apiLogin']); // API login
Route::post('/brts', [BrtController::class, 'store']);
Route::get('/example', function () {
    return response()->json(['message' => 'Hello, world!']);
});
Route::put('/brtsu/{id}', [BrtController::class, 'update']);
Route::delete('api/brtsd/{id}', [BrtController::class, 'destroy']);
Route::put('api/brtsu/{id}', [BrtController::class, 'update']);
require __DIR__.'/api.php';