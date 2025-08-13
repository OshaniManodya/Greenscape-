<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $executed = RateLimiter::attempt(
            'login-attempt:'.$request->ip(),
            $perMinute = 5,
            function () {}
        );

        if (!$executed) {
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again later.',
            ]);
        }

        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            Log::channel('auth')->info('User logged in', [
                'user_id' => Auth::id(),
                'ip' => $request->ip()
            ]);

            return redirect()->intended(route('home'));
        }

        RateLimiter::hit('login-attempt:'.$request->ip());

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ])->redirectTo(route('login'));
    }

    /**
     * Show the register form.
     */
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        Log::channel('auth')->info('User registered', [
            'user_id' => $user->id,
            'ip' => $request->ip()
        ]);

        return redirect()->route('home');
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Log::channel('auth')->info('User logged out', [
                'user_id' => Auth::id(),
                'ip' => $request->ip()
            ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'You have been logged out.');
    }
}
