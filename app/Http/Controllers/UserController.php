<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the user's profile page
     */
    public function showProfile()
    {
        return view('profile');
    }

    /**
     * Update the user's profile information
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validation rules
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'country' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists and is a local file (not a URL from Google)
            if ($user->avatar && !filter_var($user->avatar, FILTER_VALIDATE_URL)) {
                // Only delete if it's a local file path, not a Google avatar URL
                if (Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }

            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Update user profile
        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);
        $user->phone = $request->input('phone', $user->phone);
        $user->date_of_birth = $request->input('date_of_birth', $user->date_of_birth);
        $user->gender = $request->input('gender', $user->gender);
        $user->country = $request->input('country', $user->country);
        $user->occupation = $request->input('occupation', $user->occupation);

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Update user's upline code
     */
    public function updateUplineCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upline_code' => 'required|string|exists:users,referral_code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid upline code',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();
        $uplineCode = $request->input('upline_code');

        // Check if user already has an upline
        if ($user->upline_code) {
            return response()->json([
                'success' => false,
                'message' => 'You already have an upline. Cannot change upline code.'
            ], 400);
        }

        // Check if user is trying to set themselves as upline
        if ($user->referral_code === $uplineCode) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot use your own referral code as upline.'
            ], 400);
        }

        // Check if upline exists and is active
        $uplineUser = User::where('referral_code', $uplineCode)->first();
        if (!$uplineUser) {
            return response()->json([
                'success' => false,
                'message' => 'Upline user not found.'
            ], 404);
        }

        if (!$uplineUser->isActive()) {
            return response()->json([
                'success' => false,
                'message' => 'This upline is not active.'
            ], 400);
        }

        // Update user's upline code
        $user->upline_code = $uplineCode;
        $user->save();

        // Log upline code update
        \App\Models\UserUplineLog::create([
            'user_id' => $user->id,
            'upline_user_id' => $uplineUser->id,
            'referral_code' => $uplineCode,
            'action' => 'update',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'notes' => 'User manually updated upline code from referral page'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Upline code saved successfully!',
            'data' => [
                'upline_code' => $uplineCode,
                'upline_name' => $uplineUser->first_name . ' ' . $uplineUser->last_name
            ]
        ]);
    }

    /**
     * Display the change password page
     */
    public function showChangePassword()
    {
        return view('change_password');
    }

    /**
     * Update the user's password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validation rules
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Kata sandi lama wajib diisi.',
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.min' => 'Kata sandi baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verify current password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Kata sandi lama tidak benar.'])
                ->withInput();
        }

        // Update password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('password.change')->with('success', 'Kata sandi berhasil diubah!');
    }
}
