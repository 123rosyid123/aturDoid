<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter
     */
    public function subscribe(Request $request)
    {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email terlalu panjang',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Check if email already subscribed
            $existingSubscription = NewsletterSubscription::where('email', $request->email)->first();

            if ($existingSubscription) {
                if ($existingSubscription->is_active) {
                    return redirect()->back()->with('info', 'Email ini sudah terdaftar di newsletter kami!');
                } else {
                    // Reactivate subscription
                    $existingSubscription->is_active = true;

                    // Update user_id if email matches logged in user's email
                    if (auth()->check() && auth()->user()->email === $request->email) {
                        $existingSubscription->user_id = auth()->id();
                    }

                    $existingSubscription->save();
                    return redirect()->back()->with('success', 'Terima kasih! Langganan newsletter Anda telah diaktifkan kembali.');
                }
            }

            // Determine user_id: only set if logged in AND email matches user's email
            $userId = null;
            if (auth()->check() && auth()->user()->email === $request->email) {
                $userId = auth()->id();
            }

            // Create new subscription
            NewsletterSubscription::create([
                'user_id' => $userId,
                'email' => $request->email,
                'is_active' => true,
            ]);

            return redirect()->back()->with('success', 'Terima kasih! Anda telah berlangganan newsletter kami.');

        } catch (\Exception $e) {
            return redirect()->back()
                // ->with('error', 'Terjadi kesalahan. Silakan coba lagi.')
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Unsubscribe from newsletter
     */
    public function unsubscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Email tidak valid');
        }

        $subscription = NewsletterSubscription::where('email', $request->email)->first();

        if (!$subscription) {
            return redirect()->back()->with('error', 'Email tidak ditemukan di daftar newsletter');
        }

        $subscription->is_active = false;
        $subscription->save();

        return redirect()->back()->with('success', 'Anda telah berhenti berlangganan newsletter');
    }
}
