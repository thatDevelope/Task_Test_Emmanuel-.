<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $user = $request->user();

        // Check if the request is for API
        if ($request->expectsJson()) {
            $token = JWTAuth::fromUser($user);
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' =>JWTAuth::factory()->getTTL() * 60,
                'user' => $user,
            ]);
        }
    

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function apiLogin(LoginRequest $request): JsonResponse
{
    $request->authenticate();

    $user = $request->user();
    $token = JWTAuth::fromUser($user);

    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' =>JWTAuth::factory()->getTTL() * 60,

        'user' => $user,
    ]);
}
}
