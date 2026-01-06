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
use Illuminate\Support\Facades\DB;
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
            // 'phone' => 'required|string|max:30|regex:/^\+[0-9]{1,4}[0-9\s\-\(\)]+$/',
            'gender' => 'required|string|in:laki-laki,perempuan',
            'occupation' => 'required|string|max:100',
            'country' => 'required|string|max:100'
        ], [
            'first_name.required' => 'Nama depan wajib diisi.',
            'first_name.regex' => 'Nama depan hanya boleh berisi huruf, spasi, dan tanda hubung',
            'first_name.max' => 'Nama depan tidak boleh lebih dari 50 karakter',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'last_name.regex' => 'Nama belakang hanya boleh berisi huruf, spasi, dan tanda hubung',
            'last_name.max' => 'Nama belakang tidak boleh lebih dari 50 karakter',
            // 'phone.required' => 'Nomor telepon wajib diisi.',
            // 'phone.regex' => 'Nomor telepon harus menyertakan kode negara (misalnya, +62123456789)',
            // 'phone.max' => 'Nomor telepon tidak boleh lebih dari 30 karakter',
            'gender.required' => 'Silakan pilih jenis kelamin',
            'gender.in' => 'Jenis kelamin yang dipilih tidak valid',
            'occupation.required' => 'Silakan pilih pekerjaan Anda',
            'occupation.max' => 'Pekerjaan tidak boleh lebih dari 100 karakter',
            'country.required' => 'Silakan pilih negara Anda',
            'country.max' => 'Nama negara tidak boleh lebih dari 100 karakter'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed for step 3'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Step 3 validation passed',
            'data' => [
                'personal_info_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 4: Referral Code & Terms Agreement
     */
    public function validateStep4(Request $request)
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

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed for step 4'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Step 4 validation passed',
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

        // check refferal code bukan berasal dari downline recursive user
        if (Auth::check()) {
            $currentUser = Auth::user();

            // Check if the referral code owner is a downline (recursive) of current user
            if ($this->isDownlineRecursive($currentUser, $validCode)) {
                return response()->json([
                    'success' => false,
                    'valid' => false,
                    'message' => 'You cannot use referral code from your downline. Please use a referral code from someone who is not in your network.',
                ], 422);
            }

            // Check if user is trying to use their own referral code
            if ($currentUser->id === $validCode->id) {
                return response()->json([
                    'success' => false,
                    'valid' => false,
                    'message' => 'You cannot use your own referral code.',
                ], 422);
            }
        }

        return response()->json([
            'success' => true,
            'valid' => true,
            'message' => 'Referral code berhasil divalidasi!',
            'data' => [
                'affiliator_name' => $validCode->first_name . ' ' . $validCode->last_name,
            ]
        ]);
    }

    /**
     * Check if a user is a downline (recursive) of another user
     *
     * @param User $uplineUser The potential upline user
     * @param User $downlineUser The potential downline user
     * @return bool True if downlineUser is a downline (any level) of uplineUser
     */
    private function isDownlineRecursive($uplineUser, $downlineUser)
    {
        // If same user, return false (not a downline)
        if ($uplineUser->id === $downlineUser->id) {
            return false;
        }

        // Get all direct downlines of uplineUser
        $directDownlines = $uplineUser->downlines()->get();

        foreach ($directDownlines as $directDownline) {
            // Check if this direct downline is the target user
            if ($directDownline->id === $downlineUser->id) {
                return true;
            }

            // Recursively check if target user is a downline of this direct downline
            if ($this->isDownlineRecursive($directDownline, $downlineUser)) {
                return true;
            }
        }

        return false;
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
            'phone' => 'nullable|string|max:30',
            'gender' => 'nullable|string',
            'occupation' => 'nullable|string',
            'country' => 'nullable|string|max:100'
        ]);

        if ($step3Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 3 data is invalid (Personal Information)',
                'errors' => $step3Validator->errors()
            ], 422);
        }

        // Step 4 validation (Terms Agreement)
        $step4Validator = Validator::make($allData, [
            'terms_agreed' => 'required|accepted'
        ]);

        if ($step4Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 4 data is invalid (Terms & Referral)',
                'errors' => $step4Validator->errors()
            ], 422);
        }

        //create user
        $user = User::create([
            'email' => $step1Validator->validated()['email'],
            'password' => Hash::make($step2Validator->validated()['password']),
            'first_name' => $step3Validator->validated()['first_name'] ?? null,
            'last_name' => $step3Validator->validated()['last_name'] ?? null,
            'phone' => $step3Validator->validated()['phone'] ?? null,
            'gender' => $step3Validator->validated()['gender'] ?? null,
            'occupation' => $step3Validator->validated()['occupation'] ?? null,
            'country' => $step3Validator->validated()['country'] ?? null,
            'upline_code' => $allData['referral_code'] ?? null,
        ]);

        //create referral code
        $user->referral_code = RegistrationValidatorController::generateReferralCode();
        $user->save();

        // Log upline code usage if user registered with referral code
        if (!empty($allData['referral_code'])) {
            $uplineUser = User::where('referral_code', $allData['referral_code'])->first();

            \App\Models\UserUplineLog::create([
                'user_id' => $user->id,
                'upline_user_id' => $uplineUser ? $uplineUser->id : null,
                'referral_code' => $allData['referral_code'],
                'action' => 'register',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'notes' => 'User registered with referral code'
            ]);
        }

        Auth::login($user);

        // If all validations pass, return success
        return response()->json([
            'success' => true,
            'message' => 'Registration completed successfully!',
            'redirect' => route('landing'),
        ]);
    }

    /**
     * Generate Referral Code with format AD + minimum 5 digit number
     * Format: AD00001, AD00002, ... AD99999, AD100000, etc.
     * Sequential based on registration order, minimum 5 digits but can be more
     */
    public static function generateReferralCode(): string
    {
        DB::beginTransaction();
        try {
            // Get maximum number from referral codes with AD prefix using database query
            // This is much faster than fetching all records and looping in PHP
            $maxNumber = DB::table('users')
                ->where('referral_code', 'like', 'AD%')
                ->whereNotNull('referral_code')
                ->lockForUpdate()
                ->selectRaw('MAX(CAST(SUBSTRING(referral_code, 3) AS UNSIGNED)) as max_number')
                ->value('max_number');

            // Next number is max + 1, or 1 if no existing codes
            $nextNumber = ($maxNumber ?? 0) + 1;

            // Format with minimum 5 digits, but use actual digit count if more than 5
            $digitCount = max(5, strlen((string) $nextNumber));
            $referralCode = 'AD' . str_pad($nextNumber, $digitCount, '0', STR_PAD_LEFT);

            // Verify uniqueness (edge case protection)
            while (User::where('referral_code', $referralCode)->exists()) {
                $nextNumber++;
                $digitCount = max(5, strlen((string) $nextNumber));
                $referralCode = 'AD' . str_pad($nextNumber, $digitCount, '0', STR_PAD_LEFT);
            }

            DB::commit();
            return $referralCode;
        } catch (\Exception $e) {
            DB::rollBack();
            // Fallback: use current timestamp + random to ensure uniqueness
            $fallbackNumber = time() % 100000 + rand(1, 99999);
            $digitCount = max(5, strlen((string) $fallbackNumber));
            return 'AD' . str_pad($fallbackNumber, $digitCount, '0', STR_PAD_LEFT);
        }
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
