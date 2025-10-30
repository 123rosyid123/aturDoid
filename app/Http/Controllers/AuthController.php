<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Show registration form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => route('dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password. Please try again.'
        ], 401);
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => route('dashboard')
        ]);
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }

    /**
     * Handle email verification
     */
    public function verifyEmail(Request $request)
    {
        $code = $request->input('code');

        // Simulate email verification
        if ($code === '123456') {
            return response()->json([
                'success' => true,
                'message' => 'Email verified successfully!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid verification code.'
        ], 400);
    }

    /**
     * Resend verification code
     */
    public function resendVerification(Request $request)
    {
        // Simulate sending verification code
        return response()->json([
            'success' => true,
            'message' => 'Verification code has been sent to your email.'
        ]);
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find existing user by Google ID first
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                // User already connected with Google
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'Successfully logged in with Google!');
            }

            // Check if user exists with same email
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                // Link Google account to existing user
                $existingUser->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'email_verified_at' => $existingUser->email_verified_at ?? now(),
                    'is_verified' => $existingUser->is_verified ?? true,
                ]);

                Auth::login($existingUser);
                return redirect()->route('dashboard')->with('success', 'Google account linked successfully!');
            }

            // Create new user from Google data
            $newUser = User::create([
                'email' => $googleUser->getEmail(),
                'first_name' => $googleUser->user['given_name'] ?? '',
                'last_name' => $googleUser->user['family_name'] ?? '',
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => Hash::make(uniqid()), // Random password
                'email_verified_at' => now(),
                'is_verified' => true,
                'phone' => null,
                'referral_code' => null,
                'account_type' => 'personal',
            ]);

            Auth::login($newUser);

            return redirect()->route('dashboard')->with('success', 'Account created successfully with Google!');
        } catch (\Exception $e) {
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Failed to login with Google. Please try again.');
        }
    }
}
