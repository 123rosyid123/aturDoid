<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailVerification;
use App\Mail\EmailVerificationMail;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Str;

class RegistrationValidatorController extends Controller
{
    /**
     * Validate Step 1: Email Only and Send Verification Email
     */
    public function validateStep1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
                'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/'
            ]
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already registered',
            'email.regex' => 'Please enter a valid email address'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed for step 1'
            ], 422);
        }

        // Get referral code from request (can be from query string or request body)
        $referralCode = $request->input('ref') ?? $request->query('ref');

        // Generate verification token
        $token = EmailVerification::createToken($request->email);

        // Send verification email with referral code if present
        try {
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $token, $referralCode));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification email. Please try again.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Verification email sent! Please check your email to continue.',
            'data' => [
                'email' => $request->email
            ]
        ]);
    }

    /**
     * Validate Step 2: Password Only
     */
    public function validateStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ]
        ], [
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Password confirmation does not match',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed for step 2'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Step 2 validation passed',
            'data' => [
                'password_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 3: Personal Information (Profile)
     */
    public function validateStep3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50|regex:/^[a-zA-Z\s\-]+$/',
            'last_name' => 'required|string|max:50|regex:/^[a-zA-Z\s\-]+$/',
            'phone' => 'required|string|max:20|regex:/^[+]?[0-9\s\-\(\)]+$/',
            'country_code' => 'required|string|max:10',
            'title' => 'required|string|in:mr,mrs,ms,dr',
            'date_of_birth' => [
                'required',
                'date',
                'before:today',
                'after:-120 years'
            ],
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100|regex:/^[a-zA-Z\s\-]+$/',
            'zip' => 'required|string|max:20|regex:/^[a-zA-Z0-9\s\-]+$/'
        ], [
            'first_name.required' => 'First name is required',
            'first_name.regex' => 'First name can only contain letters, spaces, and hyphens',
            'first_name.max' => 'First name cannot exceed 50 characters',
            'last_name.required' => 'Last name is required',
            'last_name.regex' => 'Last name can only contain letters, spaces, and hyphens',
            'last_name.max' => 'Last name cannot exceed 50 characters',
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Please enter a valid phone number',
            'country_code.required' => 'Country code is required',
            'title.required' => 'Please select a title',
            'title.in' => 'Invalid title selected',
            'date_of_birth.required' => 'Date of birth is required',
            'date_of_birth.before' => 'Date of birth must be in the past',
            'date_of_birth.after' => 'Please enter a valid date of birth',
            'address.required' => 'Address is required',
            'address.max' => 'Address cannot exceed 255 characters',
            'city.required' => 'City is required',
            'city.regex' => 'City can only contain letters, spaces, and hyphens',
            'city.max' => 'City cannot exceed 100 characters',
            'zip.required' => 'Zip code is required',
            'zip.regex' => 'Please enter a valid zip code',
            'zip.max' => 'Zip code cannot exceed 20 characters'
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors(),
        //         'message' => 'Validation failed for step 3'
        //     ], 422);
        // }

        return response()->json([
            'success' => true,
            'message' => 'Step 3 validation passed',
            'data' => [
                'personal_info_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 4: Additional Information
     */
    public function validateStep4(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'occupation' => 'required|string|in:student,employee,business_owner,freelancer,professional,unemployed,retired,other',
            'marital_status' => 'required|string|in:single,married,divorced,widowed',
            'religion' => 'required|string|in:islam,christianity,catholicism,hinduism,buddhism,confucianism,other,none'
        ], [
            'occupation.required' => 'Please select your occupation',
            'occupation.in' => 'Invalid occupation selected',
            'marital_status.required' => 'Please select your marital status',
            'marital_status.in' => 'Invalid marital status selected',
            'religion.required' => 'Please select your religion',
            'religion.in' => 'Invalid religion selected'
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors(),
        //         'message' => 'Validation failed for step 4'
        //     ], 422);
        // }

        return response()->json([
            'success' => true,
            'message' => 'Step 4 validation passed',
            'data' => [
                'additional_info_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 5: Referral Code & Terms Agreement
     */
    public function validateStep5(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terms_agreed' => 'required|accepted',
            'referral_code' => 'nullable|string|max:50|regex:/^[A-Z0-9\-]+$/i',
            'referral_validated' => 'required|boolean',
            'referral_skipped' => 'required|boolean'
        ], [
            'terms_agreed.required' => 'You must agree to the terms and conditions',
            'terms_agreed.accepted' => 'You must agree to the terms and conditions',
            'referral_code.regex' => 'Referral code can only contain letters, numbers, and hyphens',
            'referral_code.max' => 'Referral code cannot exceed 50 characters',
            'referral_validated.required' => 'Referral validation status is required',
            'referral_skipped.required' => 'Referral skip status is required'
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors(),
        //         'message' => 'Validation failed for step 5'
        //     ], 422);
        // }

        return response()->json([
            'success' => true,
            'message' => 'Step 5 validation passed',
            'data' => [
                'referral_terms_validated' => true
            ]
        ]);
    }

    /**
     * Validate Referral Code
     */
    public function validateReferralCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'referral_code' => 'required|string|max:50|regex:/^[A-Z0-9\-]+$/i'
        ], [
            'referral_code.required' => 'Referral code is required',
            'referral_code.regex' => 'Invalid referral code format',
            'referral_code.max' => 'Referral code cannot exceed 50 characters'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Invalid referral code format'
            ], 422);
        }

        $referralCode = strtoupper($request->referral_code);

        //check valid code in database
        $validCode = User::where('referral_code', $referralCode)->first();
        if (!$validCode) {
            return response()->json([
                'success' => false,
                'valid' => false,
                'message' => 'Referral code is invalid. Please check and try again.',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'valid' => true,
            'message' => 'Referral code dari ' . $validCode->first_name . ' ' . $validCode->last_name . ' berhasil divalidasi!',
        ]);
    }

    /**
     * Complete Registration (Final Step)
     */
    public function completeRegistration(Request $request)
    {
        // Validate all steps data
        $allData = $request->all();

        // Step 1 validation (Email)
        $step1Validator = Validator::make($allData, [
            'email' => 'required|email|unique:users,email|max:255'
        ]);

        if ($step1Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 1 data is invalid (Email)',
                'errors' => $step1Validator->errors()
            ], 422);
        }

        // Step 2 validation (Password)
        $step2Validator = Validator::make($allData, [
            'password' => 'required|string|min:8'
        ]);

        if ($step2Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 2 data is invalid (Password)',
                'errors' => $step2Validator->errors()
            ], 422);
        }

        // Step 3 validation (Personal Information)
        $step3Validator = Validator::make($allData, [
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'title' => 'nullable|string',
            'date_of_birth' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20'
        ]);

        if ($step3Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 3 data is invalid (Personal Information)',
                'errors' => $step3Validator->errors()
            ], 422);
        }

        // Step 4 validation (Additional Information)
        $step4Validator = Validator::make($allData, [
            'occupation' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'religion' => 'nullable|string'
        ]);

        if ($step4Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 4 data is invalid (Additional Information)',
                'errors' => $step4Validator->errors()
            ], 422);
        }

        // Step 5 validation (Terms Agreement)
        $step5Validator = Validator::make($allData, [
            'terms_agreed' => 'required|accepted'
        ]);

        if ($step5Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 5 data is invalid (Terms & Referral)',
                'errors' => $step5Validator->errors()
            ], 422);
        }

        //create user
        $user = User::create([
            'email' => $step1Validator->validated()['email'],
            'password' => Hash::make($step2Validator->validated()['password']),
            'first_name' => $step3Validator->validated()['first_name'],
            'last_name' => $step3Validator->validated()['last_name'],
            'phone' => $step3Validator->validated()['phone'],
            'title' => $step3Validator->validated()['title'],
            'date_of_birth' => $step3Validator->validated()['date_of_birth'],
            'address' => $step3Validator->validated()['address'],
            'city' => $step3Validator->validated()['city'],
            'zip' => $step3Validator->validated()['zip'],
            'occupation' => $step4Validator->validated()['occupation'],
            'marital_status' => $step4Validator->validated()['marital_status'],
            'religion' => $step4Validator->validated()['religion'],
            'upline_code' => $allData['referral_code'] ?? null,
        ]);

        //create referral code
        $referralCode = Str::random(10);
        $user->referral_code = $referralCode;
        $user->save();

        Auth::login($user);

        // If all validations pass, return success
        return response()->json([
            'success' => true,
            'message' => 'Registration completed successfully!',
            'redirect' => route('landing'),
        ]);
    }

    /**
     * Verify Email Token
     */
    public function verifyEmail($token, Request $request)
    {
        $email = EmailVerification::verifyToken($token);

        if (!$email) {
            return view('auth.verification-failed', [
                'message' => 'Link verifikasi tidak valid atau sudah kadaluarsa. Silakan daftar ulang.'
            ]);
        }

        // Store verified email in session
        session(['verified_email' => $email]);

        // Get referral code from query parameter if present
        $referralCode = $request->query('ref');

        // Redirect to register page with token to continue to step 2
        // Preserve referral code if present
        $redirectUrl = route('register');
        if ($referralCode) {
            $redirectUrl .= '?ref=' . urlencode($referralCode);
        }

        return redirect($redirectUrl)->with([
            'verified' => true,
            'email' => $email,
            'message' => 'Email berhasil diverifikasi! Silakan lanjutkan pengisian data.'
        ]);
    }
}
