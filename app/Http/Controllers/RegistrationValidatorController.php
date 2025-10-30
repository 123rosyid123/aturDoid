<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Str;

class RegistrationValidatorController extends Controller
{
    /**
     * Validate Step 1: Account Creation (Email & Password)
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
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ]
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already registered',
            'email.regex' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Password confirmation does not match',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed for step 1'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Step 1 validation passed',
            'data' => [
                'email' => $request->email,
                'password_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 2: Personal Information
     */
    public function validateStep2(Request $request)
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
                'personal_info_validated' => true
            ]
        ]);
    }

    /**
     * Validate Step 3: Profile Additional Information
     */
    public function validateStep3(Request $request)
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
                'profile_info_validated' => true
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
                'terms_validated' => true
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

        // Simulate referral code validation
        // In a real application, you would check against a database
        $validCodes = [
            'WELCOME2024',
            'FRIEND2024',
            'PARTNER2024',
            'BONUS2024',
            'START2024'
        ];

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
            'message' => 'Referral code validated successfully!',
        ]);
    }

    /**
     * Complete Registration (Final Step)
     */
    public function completeRegistration(Request $request)
    {
        // Validate all steps data
        $allData = $request->all();

        // Step 1 validation
        $step1Validator = Validator::make($allData, [
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8'
        ]);

        if ($step1Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 1 data is invalid',
                'errors' => $step1Validator->errors()
            ], 422);
        }

        // Step 2 validation
        $step2Validator = Validator::make($allData, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'title' => 'required|string',
            'date_of_birth' => 'required|date|before:today',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:20'
        ]);

        if ($step2Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 2 data is invalid',
                'errors' => $step2Validator->errors()
            ], 422);
        }

        // Step 3 validation
        $step3Validator = Validator::make($allData, [
            'occupation' => 'required|string',
            'marital_status' => 'required|string',
            'religion' => 'required|string'
        ]);

        if ($step3Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 3 data is invalid',
                'errors' => $step3Validator->errors()
            ], 422);
        }

        // Step 4 validation
        $step4Validator = Validator::make($allData, [
            'terms_agreed' => 'required|accepted'
        ]);

        if ($step4Validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Step 4 data is invalid',
                'errors' => $step4Validator->errors()
            ], 422);
        }
        

        //create user
        $user = User::create([
            'email' => $step1Validator->validated()['email'],
            'password' => Hash::make($step1Validator->validated()['password']),
            'first_name' => $step2Validator->validated()['first_name'],
            'last_name' => $step2Validator->validated()['last_name'],
            'phone' => $step2Validator->validated()['phone'],
            'title' => $step2Validator->validated()['title'],
            'date_of_birth' => $step2Validator->validated()['date_of_birth'],
            'address' => $step2Validator->validated()['address'],
            'city' => $step2Validator->validated()['city'],
            'zip' => $step2Validator->validated()['zip'],
            'occupation' => $step3Validator->validated()['occupation'],
            'marital_status' => $step3Validator->validated()['marital_status'],
            'religion' => $step3Validator->validated()['religion'],
            'upline_code' => $allData['referral_code'],
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
            'redirect' => '/dashboard', // or wherever you want to redirect
        ]);
    }
}