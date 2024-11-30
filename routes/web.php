<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrtController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Manually fetching the authenticated user
    $user = Auth::user(); // Same as auth()->user() but more explicit

    if (!$user) {
        return redirect()->route('login'); // Redirect to login if the user is not authenticated
    }

    // Fetch unread notifications manually
    $notifications = $user->unreadNotifications; // Or use $user->notifications for all notifications

    // Optionally mark notifications as read when displayed
    // $user->unreadNotifications->markAsRead();

    return view('dashboard', compact('notifications')); // Pass the notifications to the view
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

require __DIR__.'/api.php';

use App\Http\Controllers\AdminController;

// Route::prefix('admin')->group(function () {
//     Route::post('admin/register', [AdminController::class, 'register']); // Admin registration
//     Route::post('admin/login', [AdminController::class, 'login']); // Admin login
    
// });

// Route::get('admin', function () {
    // return view('admin')->name('admin.login'); // This will render the Blade file
// });

Route::get('admins' , [AdminController::class,'admin']);

Route::post('/admin2/register', [AdminController::class, 'register1']);

Route::post('admin2/login', [AdminController::class, 'login']); // Admin login
Route::post('/admin2/logout', [AdminController::class, 'logout'])->name('admin.logout');
    

