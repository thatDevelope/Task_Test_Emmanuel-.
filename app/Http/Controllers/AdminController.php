<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade
use Carbon\Carbon;

class AdminController extends Controller
{
    public function register1(Request $request)
{
    try {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Insert data directly into the "admins" table
        DB::table('admins')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password
            'created_at' => now(), // Add timestamps manually
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Admin registered successfully'], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return validation errors
        return response()->json(['errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        // Catch unexpected errors
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


     // Admin login
     public function login(Request $request)
     {
         // Validate the incoming request
         $validated = $request->validate([
             'email' => 'required|string|email|max:255',
             'password' => 'required|string|min:8',
         ]);
     
         // Find admin by email
         $admin = Admin::where('email', $validated['email'])->first();

         $totalReservedAmount = DB::table('brts')->sum('reserved_amount');
         $totalBRTs = DB::table('brts')->count();

    // Number of active BRTs (expiry_date is either null or in the future)
    $activeBRTs = DB::table('brts')
        ->where(function ($query) {
            $query->whereNull('expiry_date')
                  ->orWhere('expiry_date', '>', Carbon::now());
        })
        ->count();

    // Number of expired BRTs (expiry_date is in the past)
    $expiredBRTs = DB::table('brts')
        ->where('expiry_date', '<', Carbon::now())
        ->count();

         // Get the number of BRTs created this week
    $thisWeekBRTs = DB::table('brts')
    ->whereBetween('created_at', [
        Carbon::now()->startOfWeek(),
        Carbon::now()->endOfWeek()
    ])
    ->count();
     
         // Check if the admin exists and the password is correct
         if ($admin && Hash::check($validated['password'], $admin->password)) {
             // Password is correct, return the dashboard view with admin data
             return view('admin_d', compact('admin','totalReservedAmount','thisWeekBRTs','totalBRTs','activeBRTs', 'expiredBRTs'));
         }
     
         // If authentication fails
         return redirect()->route('admin.login')->withErrors(['error' => 'Invalid credentials']);
     }

     public function admin(){
        return view('admin');
     }

     public function logout(Request $request)
{
    // Manually logout by clearing the session
    $request->session()->invalidate(); // Invalidates the session
    $request->session()->regenerateToken(); // Regenerates the CSRF token to prevent CSRF attacks

    // Redirect the user to the login page after logout
    return redirect('/admins'); 
}
}
