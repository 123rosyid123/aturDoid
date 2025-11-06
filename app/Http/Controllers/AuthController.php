<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

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
                'redirect' => route('landing')
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
            'redirect' => route('landing')
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
                return redirect()->route('landing')->with('success', 'Successfully logged in with Google!');
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
                return redirect()->route('landing')->with('success', 'Google account linked successfully!');
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

            $referralCode = Str::random(10);
            $newUser->referral_code = $referralCode;
            $newUser->save();

            Auth::login($newUser);

            return redirect()->route('landing')->with('success', 'Account created successfully with Google!');
        } catch (\Exception $e) {
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Failed to login with Google. Please try again.');
        }
    }

    /**
     * Show forgot password form
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send password reset link email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'We could not find an account with this email address',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Get user information
        $user = User::where('email', $request->email)->first();

        // Generate token
        $token = Str::random(64);

        // Delete old tokens for this email
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        // Create new token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        try {
            // Send email with reset link
            $userName = $user->first_name ?? ($user->name ?? explode('@', $request->email)[0]);
            Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email, $userName));

            $response = [
                'success' => true,
                'message' => 'We have emailed your password reset link! Please check your inbox.',
                'email' => $request->email,
            ];

            // Only include reset URL in non-production environments for testing
            if (config('app.env') !== 'production') {
                $response['reset_url'] = route('password.reset', ['token' => $token]);
            }

            return response()->json($response);
        } catch (\Exception $e) {
            // Log error but don't expose details to user
            \Log::error('Failed to send password reset email: ' . $e->getMessage());

            $response = [
                'success' => false,
                'message' => 'Failed to send email. Please try again later or contact support.',
            ];

            // Only include reset URL in non-production environments for testing/fallback
            if (config('app.env') !== 'production') {
                $response['reset_url'] = route('password.reset', ['token' => $token]);
            }

            return response()->json($response, 500);
        }
    }

    /**
     * Show reset password form
     */
    public function showResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Reset password
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'We could not find an account with this email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify token
        $tokenData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$tokenData) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired reset token'
            ], 400);
        }

        // Check if token is expired (24 hours)
        if (Carbon::parse($tokenData->created_at)->addHours(24)->isPast()) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();

            return response()->json([
                'success' => false,
                'message' => 'Reset token has expired. Please request a new one.'
            ], 400);
        }

        // Update password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete token
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Your password has been reset successfully!',
            'redirect' => route('login')
        ]);
    }
}
