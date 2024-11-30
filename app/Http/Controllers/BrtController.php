<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\BRTNotification;
use App\Notifications\NewBrtNotification;

class BrtController extends Controller
{
    public function store(Request $request)
    {

       
        // Validate incoming data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // ID of the user
            'reserved_amount' => 'required|numeric|min:0',
            'expiry_date' => 'required|date',
        ]);
    
        // Check if the user exists and fetch the user record
        $user = User::find($validated['user_id']);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }
    
        $brt_code = $user->brt_code;

    if (!$brt_code) {
        // Generate a new BRT code if the user doesn't have one
        $brt_code = 'BRT-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    }
        // Ensure the generated BRT code is unique
        while (Brt::where('brt_code', $brt_code)->exists()) {
            $brt_code = 'BRT-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        }
    
        // Create the BRT record
        $brt = Brt::create([
            'brt_code' => $brt_code,
            'reserved_amount' => $validated['reserved_amount'],
            'expiry_date' => $validated['expiry_date'],
        ]);
    
        // Update the user record with the generated brt_code
        $user->update(['brt_code' => $brt_code]);
        $user->notify(new NewBrtNotification($brt->reserved_amount));

        broadcast(new BRTNotification("BRT {$brt->name} {$brt->reserved_amount} BLUME COIN [\$BLU] {$brt->reserved_amount}\$BLU created."));

    
        // Return a JSON response
        return response()->json([
            'success' => true,
            'data' => $brt,
            'message' => 'BRT created successfully and user updated',
        ], 201);
    }

    public function index()
    {
        // Retrieve all BRT records for the authenticated user
        $brts = Brt::all();

    if ($brts->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No BRT records available.',
        ], 404);
    }
        return response()->json([
            'success' => true,
            'data' => $brts
        ]);
    }

    public function show($id)
    {
        // Try to find the BRT by ID
        $brt = Brt::find($id);

        // If not found, return an error response
        if (!$brt) {
            return response()->json([
                'success' => false,
                'message' => 'BRT not found.',
            ], 404);
        }

        // Return the BRT data as a JSON response
        return response()->json([
            'success' => true,
            'data' => $brt,
        ]);
    }


    public function update(Request $request, $id)
    {
        // Find the BRT by ID
        $brt = Brt::find($id);

        // If not found, return an error response
        if (!$brt) {
            return response()->json([
                'success' => false,
                'message' => 'BRT not found.',
            ], 404);
        }

        // Validate the incoming request data (make reserved_amount and expiry_date nullable)
        $validated = $request->validate([
            'reserved_amount' => 'nullable|numeric|min:0', // Nullable field
            'expiry_date' => 'nullable|date',  // Nullable field
        ]);

        // Update the BRT record with the validated data, allowing for nullable fields
        $brt->update([
            'reserved_amount' => $validated['reserved_amount'] ?? $brt->reserved_amount, // Keep existing value if not provided
            'expiry_date' => $validated['expiry_date'] ?? $brt->expiry_date, // Keep existing value if not provided
        ]);

        // Return the updated BRT record as a JSON response
        return response()->json([
            'success' => true,
            'data' => $brt,
            'message' => 'BRT updated successfully.',
        ]);
    }
    

    public function destroy($id)
    {
        $brt = Brt::find($id);
        if (!$brt) {
            return response()->json([
                'message' => 'BRT not found',
            ], 404);
        }

        // Delete the BRT
        $brt->delete();

        return response()->json([
            'message' => 'BRT deleted successfully',
        ], 200);
    }

    public function brt(){
        return view('brt');
    }


    public function getNotifications(Request $request)
{
    // Check if user is authenticated
    $user = Auth::user(); // Get the authenticated user

    // If no user is authenticated, return an error response
    if (!$user) {
        return response()->json(['error' => 'User not found or not authenticated'], 401);
    }

    // Retrieve the user's notifications
    $notifications = $user->notifications;

    // Return the notifications as a JSON response
    return response()->json([
        'success' => true,
        'notifications' => $notifications
    ]);
}
}
