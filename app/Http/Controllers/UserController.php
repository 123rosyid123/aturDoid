<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
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

        return response()->json([
            'success' => true,
            'message' => 'Upline code saved successfully!',
            'data' => [
                'upline_code' => $uplineCode,
                'upline_name' => $uplineUser->first_name . ' ' . $uplineUser->last_name
            ]
        ]);
    }
}
