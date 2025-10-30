@extends('layouts.app')

@section('title', 'Register - AturDOit')

@section('styles')
<style>
.form-input {
    transition: all 0.3s ease;
}

.form-input:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

select.form-input {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

select.form-input:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%233b82f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
}

.error-shake {
    animation: shake 0.5s;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}
</style>
@endsection

@section('content')
<div class="flex min-h-screen">
        <!-- Left Section - Chart Background -->
        <div class="hidden md:flex md:w-2/5 bg-black flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Candlestick Chart -->
                <div class="flex items-end justify-between h-64 space-x-2 px-8">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-32 bg-red-500 rounded-t"></div>
                        <div class="w-0.5 h-8 bg-red-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-24 bg-green-500 rounded-t"></div>
                        <div class="w-0.5 h-12 bg-green-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-40 bg-red-500 rounded-t"></div>
                        <div class="w-0.5 h-8 bg-red-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-36 bg-green-500 rounded-t"></div>
                        <div class="w-0.5 h-16 bg-green-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-28 bg-red-500 rounded-t"></div>
                        <div class="w-0.5 h-10 bg-red-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-44 bg-green-500 rounded-t"></div>
                        <div class="w-0.5 h-12 bg-green-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-32 bg-green-500 rounded-t"></div>
                        <div class="w-0.5 h-8 bg-green-500"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-20 bg-red-500 rounded-t"></div>
                        <div class="w-0.5 h-14 bg-red-500"></div>
                    </div>
                </div>
            </div>

            <!-- Progress Dots -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
            </div>
        </div>

        <!-- Right Section - Multi-Step Wizard -->
        <div class="w-full md:w-3/5 flex items-center justify-center p-8 bg-gray-50">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <span class="text-3xl font-bold text-orange-500">Atur<span class="text-gray-800">DOit</span></span>
                </div>

                <!-- Progress Steps -->
                <div class="flex justify-center mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div id="step1Circle" class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">1</div>
                            <span class="ml-2 text-sm text-gray-700">Account</span>
                        </div>
                        <div id="line1" class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div id="step2Circle" class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                            <span class="ml-2 text-sm text-gray-500">Verify</span>
                        </div>
                        <div id="line2" class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div id="step3Circle" class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                            <span class="ml-2 text-sm text-gray-500">Profile</span>
                        </div>
                        <div id="line3" class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div id="step4Circle" class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">4</div>
                            <span class="ml-2 text-sm text-gray-500">Referral</span>
                        </div>
                        <div id="line4" class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div id="step5Circle" class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">5</div>
                            <span class="ml-2 text-sm text-gray-500">Complete</span>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Account Creation -->
                <div id="step1" class="wizard-step">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Let's create an account</h2>
                        <p class="text-gray-600">Let's set up your account! It only takes a moment—enter your details below!</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            @foreach ($errors->all() as $error)
                                <div class="flex items-center text-red-700">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    <span>{{ $error }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Error Message (Dynamic) -->
                    <div id="step1Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-red-700 text-sm" id="step1ErrorText"></span>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter your Email here">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   required
                                   class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter your Password">
                            <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <button type="button" onclick="goToStep2()" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Next Step
                        </button>
                    </div>

                    <div class="text-center mb-6">
                        <span class="text-gray-500">Already have an account?
                            <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-medium">Log in</a>
                        </span>
                    </div>

                    <div class="relative mb-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">OR</span>
                        </div>
                    </div>

                    <button type="button" onclick="handleGoogleSignUp()" class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Sign up with Google
                    </button>
                </div>

                <!-- Step 2: Profile Information -->
                <div id="step2" class="wizard-step hidden">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Complete your information</h2>
                        <p class="text-gray-600">Almost there! Fill out your profile to continue.</p>
                    </div>

                    <!-- Error Message (Dynamic) -->
                    <div id="step2Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-red-700 text-sm" id="step2ErrorText"></span>
                    </div>

                    <!-- Name Fields -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">First Name</label>
                            <input type="text"
                                   id="first_name"
                                   name="first_name"
                                   value="{{ old('first_name') }}"
                                   required
                                   class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="First Name">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Last Name</label>
                            <input type="text"
                                   id="last_name"
                                   name="last_name"
                                   value="{{ old('last_name') }}"
                                   required
                                   class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Last Name">
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                        <div class="flex">
                            <select id="country_code" name="country_code" class="px-3 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="+370">🇱🇹 +370</option>
                                <option value="+62">🇮🇩 +62</option>
                                <option value="+1">🇺🇸 +1</option>
                            </select>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   required
                                   class="form-input flex-1 px-3 py-3 border-t border-r border-b border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Phone Number">
                        </div>
                    </div>

                    <!-- Title and Date of Birth -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Title</label>
                            <select id="title"
                                    name="title"
                                    required
                                    class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Select Title</option>
                                <option value="mr">Mr</option>
                                <option value="mrs">Mrs</option>
                                <option value="ms">Ms</option>
                                <option value="dr">Dr</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Date of Birth</label>
                            <input type="date"
                                   id="date_of_birth"
                                   name="date_of_birth"
                                   value="{{ old('date_of_birth') }}"
                                   required
                                   class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                        <input type="text"
                               id="address"
                               name="address"
                               value="{{ old('address') }}"
                               required
                               class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Address Line 1">
                    </div>

                    <!-- City and Zip -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">City</label>
                            <input type="text"
                                   id="city"
                                   name="city"
                                   value="{{ old('city') }}"
                                   required
                                   class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="City">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Zip</label>
                            <input type="text"
                                   id="zip"
                                   name="zip"
                                   value="{{ old('zip') }}"
                                   required
                                   class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Zip">
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center">
                        <button type="button" onclick="goToStep1()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </button>
                        <button type="button" onclick="goToStep3()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Next
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Profile Additional Information -->
                <div id="step3" class="wizard-step hidden">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Complete your information</h2>
                        <p class="text-gray-600">Just one more step! Set up your profile to proceed.</p>
                    </div>

                    <!-- Error Message (Dynamic) -->
                    <div id="step3Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-red-700 text-sm" id="step3ErrorText"></span>
                    </div>

                    <!-- Occupation -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Occupation</label>
                        <select id="occupation"
                                name="occupation"
                                required
                                class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                            <option value="">Select Occupation</option>
                            <option value="student">Student</option>
                            <option value="employee">Employee</option>
                            <option value="business_owner">Business Owner</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="professional">Professional</option>
                            <option value="unemployed">Unemployed</option>
                            <option value="retired">Retired</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Marital Status and Religion -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Marital Status</label>
                            <select id="marital_status"
                                    name="marital_status"
                                    required
                                    class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Select Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Religion</label>
                            <select id="religion"
                                    name="religion"
                                    required
                                    class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Select Religion</option>
                                <option value="islam">Islam</option>
                                <option value="christianity">Christianity</option>
                                <option value="catholicism">Catholicism</option>
                                <option value="hinduism">Hinduism</option>
                                <option value="buddhism">Buddhism</option>
                                <option value="confucianism">Confucianism</option>
                                <option value="other">Other</option>
                                <option value="none">None</option>
                            </select>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center">
                        <button type="button" onclick="goToStep2()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </button>
                        <button type="button" onclick="goToStep4()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Next
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 4: Referral Code -->
                <div id="step4" class="wizard-step hidden">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Got a referral code? Enter it here!</h2>
                        <p class="text-gray-600">Don't miss out—add your referral code now!</p>
                    </div>

                    <!-- Error Message (Dynamic) -->
                    <div id="step4Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-red-700 text-sm" id="step4ErrorText"></span>
                    </div>

                    <!-- Success Message (Dynamic) -->
                    <div id="step4Success" class="hidden mb-4 p-3 bg-green-50 border border-green-200 rounded-lg flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span class="text-green-700 text-sm" id="step4SuccessText"></span>
                    </div>

                    <!-- Referral Code Input -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Referral Code</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-gift text-gray-400"></i>
                            </div>
                            <input type="text"
                                   id="referral_code"
                                   name="referral_code"
                                   value="{{ old('referral_code') }}"
                                   class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter Referral Code">
                            <button type="button" id="validateReferralBtn" onclick="validateReferralCode()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-check-circle text-gray-400 hover:text-green-500"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Helper Text -->
                    <div class="mb-6 text-center">
                        <p class="text-gray-600 text-sm">
                            No code?
                            <button type="button" onclick="skipReferralCode()" class="text-red-500 hover:text-red-600 font-medium">
                                No worries!
                            </button>
                            Skipping means you'll be part of the owner's team.
                        </p>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="mb-6">
                        <label class="flex items-start">
                            <input type="checkbox"
                                   id="terms_agreed"
                                   name="terms_agreed"
                                   class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">
                                By using this app, you agree to our
                                <a href="#" onclick="showTerms()" class="text-blue-600 hover:text-blue-800 underline">rules</a>.
                                We keep your personal data safe and only use it to run the app.
                            </span>
                        </label>
                    </div>

                    <!-- Loading State -->
                    <div id="referralLoading" class="hidden mb-6 text-center">
                        <div class="inline-flex items-center">
                            <i class="fas fa-spinner fa-spin mr-2 text-blue-600"></i>
                            <span class="text-gray-600">Validating referral code...</span>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center">
                        <button type="button" onclick="goToStep3()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </button>
                        <button type="button" onclick="completeRegistration()" class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Done
                            <i class="fas fa-check ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Back to Landing -->
                <div class="text-center mt-6">
                    <a href="{{ route('landing') }}" class="text-gray-600 hover:text-orange-500 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    let currentStep = 1;
    let formData = {};

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = event.currentTarget.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    function handleGoogleSignUp() {
        // Show loading state on the Google button
        const googleBtn = event.currentTarget;
        const originalContent = googleBtn.innerHTML;
        googleBtn.disabled = true;
        googleBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Connecting to Google...';

        // Redirect to Google OAuth
        window.location.href = '/auth/google';
    }

    function goToStep1() {
        currentStep = 1;
        showStep(1);
        updateProgressDots(1);
    }

    function goToStep2() {
        // Get form data
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        // Clear previous errors
        document.getElementById('step1Error').classList.add('hidden');

        // Show loading state
        const nextBtn = document.querySelector('button[onclick="goToStep2()"]');
        const originalText = nextBtn.innerHTML;
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Validating...';

        // Call validator endpoint
        fetch('/api/register/validate-step-1', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                email: email,
                password: password,
                password_confirmation: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 1 data
                formData.email = email;
                formData.password = password;

                // Proceed to step 2
                currentStep = 2;
                showStep(2);
                updateProgressDots(2);
                updateProgressDotsLeft(2);
            } else {
                // Show errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step1Error', 'step1ErrorText', errorMessages[0]);
                } else {
                    showError('step1Error', 'step1ErrorText', data.message || 'Validation failed');
                }
            }
        })
        .catch(error => {
            showError('step1Error', 'step1ErrorText', 'An error occurred. Please try again.');
        })
        .finally(() => {
            nextBtn.disabled = false;
            nextBtn.innerHTML = originalText;
        });
    }

    function goToStep3() {
        // Get form data
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const countryCode = document.getElementById('country_code').value;
        const title = document.getElementById('title').value;
        const dob = document.getElementById('date_of_birth').value;
        const address = document.getElementById('address').value.trim();
        const city = document.getElementById('city').value.trim();
        const zip = document.getElementById('zip').value.trim();

        // Clear previous errors
        document.getElementById('step2Error').classList.add('hidden');

        // Show loading state
        const nextBtn = document.querySelector('button[onclick="goToStep3()"]');
        const originalText = nextBtn.innerHTML;
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Validating...';

        // Call validator endpoint
        fetch('/api/register/validate-step-2', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                first_name: firstName,
                last_name: lastName,
                phone: phone,
                country_code: countryCode,
                title: title,
                date_of_birth: dob,
                address: address,
                city: city,
                zip: zip
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 2 data
                formData.first_name = firstName;
                formData.last_name = lastName;
                formData.phone = phone;
                formData.country_code = countryCode;
                formData.title = title;
                formData.date_of_birth = dob;
                formData.address = address;
                formData.city = city;
                formData.zip = zip;

                // Proceed to step 3
                currentStep = 3;
                showStep(3);
                updateProgressDots(3);
                updateProgressDotsLeft(3);
            } else {
                // Show errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step2Error', 'step2ErrorText', errorMessages[0]);
                } else {
                    showError('step2Error', 'step2ErrorText', data.message || 'Validation failed');
                }
            }
        })
        .catch(error => {
            showError('step2Error', 'step2ErrorText', 'An error occurred. Please try again.');
        })
        .finally(() => {
            nextBtn.disabled = false;
            nextBtn.innerHTML = originalText;
        });
    }

    function goToStep4() {
        // Get form data
        const occupation = document.getElementById('occupation').value;
        const maritalStatus = document.getElementById('marital_status').value;
        const religion = document.getElementById('religion').value;

        // Clear previous errors
        document.getElementById('step3Error').classList.add('hidden');

        // Show loading state
        const nextBtn = document.querySelector('button[onclick="goToStep4()"]');
        const originalText = nextBtn.innerHTML;
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Validating...';

        // Call validator endpoint
        fetch('/api/register/validate-step-3', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                occupation: occupation,
                marital_status: maritalStatus,
                religion: religion
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 3 data
                formData.occupation = occupation;
                formData.marital_status = maritalStatus;
                formData.religion = religion;

                // Proceed to step 4
                currentStep = 4;
                showStep(4);
                updateProgressDots(4);
                updateProgressDotsLeft(4);
            } else {
                // Show errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step3Error', 'step3ErrorText', errorMessages[0]);
                } else {
                    showError('step3Error', 'step3ErrorText', data.message || 'Validation failed');
                }
            }
        })
        .catch(error => {
            showError('step3Error', 'step3ErrorText', 'An error occurred. Please try again.');
        })
        .finally(() => {
            nextBtn.disabled = false;
            nextBtn.innerHTML = originalText;
        });
    }

    // Step 4 Functions
    let referralCodeValidated = false;
    let referralCodeSkipped = false;

    function validateReferralCode() {
        const referralCode = document.getElementById('referral_code').value.trim();
        const errorDiv = document.getElementById('step4Error');
        const successDiv = document.getElementById('step4Success');
        const loadingDiv = document.getElementById('referralLoading');
        const validateBtn = document.getElementById('validateReferralBtn');

        // Clear previous messages
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');

        if (!referralCode) {
            showError('step4Error', 'step4ErrorText', 'Please enter a referral code');
            return;
        }

        // Show loading state
        loadingDiv.classList.remove('hidden');
        validateBtn.disabled = true;
        validateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        // Call referral validation endpoint
        fetch('/api/register/validate-referral', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ referral_code: referralCode })
        })
        .then(response => response.json())
        .then(data => {
            loadingDiv.classList.add('hidden');
            validateBtn.disabled = false;
            validateBtn.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';

            if (data.success && data.valid) {
                successDiv.classList.remove('hidden');
                document.getElementById('step4SuccessText').textContent = data.message || 'Referral code validated successfully!';
                referralCodeValidated = true;
                formData.referral_code = referralCode;
                formData.referral_data = data.referral_data || { validated: true };
            } else {
                errorDiv.classList.remove('hidden');
                document.getElementById('step4ErrorText').textContent = data.message || 'Invalid referral code';
                referralCodeValidated = false;
            }
        })
        .catch(error => {
            loadingDiv.classList.add('hidden');
            validateBtn.disabled = false;
            validateBtn.innerHTML = '<i class="fas fa-check-circle text-gray-400 hover:text-green-500"></i>';

            // Show error message
            errorDiv.classList.remove('hidden');
            document.getElementById('step4ErrorText').textContent = 'Failed to validate referral code. Please try again.';
            referralCodeValidated = false;
        });
    }

    function skipReferralCode() {
        const errorDiv = document.getElementById('step4Error');
        const successDiv = document.getElementById('step4Success');

        // Clear previous messages
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');

        // Clear referral code input
        document.getElementById('referral_code').value = '';

        // Show skip confirmation
        successDiv.classList.remove('hidden');
        document.getElementById('step4SuccessText').textContent = 'Referral code skipped. You will be part of the owner\'s team.';

        referralCodeSkipped = true;
        referralCodeValidated = false;
        formData.referral_code = null;
        formData.referral_skipped = true;
    }

    function showTerms() {
        // Show terms modal or navigate to terms page
        // For now, we'll just open it in a new window
        window.open('/terms', '_blank', 'width=800,height=600,scrollbars=yes');
    }

    function completeRegistration() {
        // Validate terms agreement
        const termsAgreed = document.getElementById('terms_agreed').checked;
        const errorDiv = document.getElementById('step4Error');

        // Clear previous errors
        errorDiv.classList.add('hidden');

        if (!termsAgreed) {
            showError('step4Error', 'step4ErrorText', 'You must agree to the terms and conditions to continue');
            return;
        }

        // Check if referral code is provided (validated or skipped)
        const referralCode = document.getElementById('referral_code').value.trim();

        if (referralCode && !referralCodeValidated && !referralCodeSkipped) {
            showError('step4Error', 'step4ErrorText', 'Please validate your referral code or skip it');
            return;
        }

        // Save step 4 data
        formData.terms_agreed = termsAgreed;
        formData.referral_code = referralCode || null;
        formData.referral_validated = referralCodeValidated;
        formData.referral_skipped = referralCodeSkipped;

        // Validate step 4 before submission
        fetch('/api/register/validate-step-4', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                terms_agreed: termsAgreed,
                referral_code: referralCode || null,
                referral_validated: referralCodeValidated,
                referral_skipped: referralCodeSkipped
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Step 4 validated, now submit complete registration
                submitCompleteRegistration();
            } else {
                // Show step 4 errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step4Error', 'step4ErrorText', errorMessages[0]);
                } else {
                    showError('step4Error', 'step4ErrorText', data.message || 'Validation failed');
                }
            }
        })
        .catch(error => {
            showError('step4Error', 'step4ErrorText', 'An error occurred. Please try again.');
        });
    }

    function submitCompleteRegistration() {
        const submitBtn = document.querySelector('button[onclick="completeRegistration()"]');
        const originalText = submitBtn.innerHTML;

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating account...';

        // Submit complete registration
        fetch('/api/register/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to success page or dashboard
                window.location.href = data.redirect || '/dashboard';
            } else {
                // Show errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step4Error', 'step4ErrorText', errorMessages[0]);
                } else {
                    showError('step4Error', 'step4ErrorText', data.message || 'Registration failed. Please try again.');
                }
            }
        })
        .catch(error => {
            showError('step4Error', 'step4ErrorText', 'An error occurred. Please try again.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }

    function showStep(stepNumber) {
        // Hide all steps
        document.querySelectorAll('.wizard-step').forEach(step => {
            step.classList.add('hidden');
        });

        // Show current step
        document.getElementById('step' + stepNumber).classList.remove('hidden');
    }

    function updateProgressDots(stepNumber) {
        // Update step circles
        for (let i = 1; i <= 5; i++) {
            const circle = document.getElementById('step' + i + 'Circle');
            const line = document.getElementById('line' + (i - 1));

            if (i <= stepNumber) {
                circle.classList.remove('bg-gray-200', 'text-gray-500');
                circle.classList.add('bg-orange-500', 'text-white');
            } else {
                circle.classList.remove('bg-orange-500', 'text-white');
                circle.classList.add('bg-gray-200', 'text-gray-500');
            }

            // Update connecting lines
            if (line && i <= stepNumber) {
                line.classList.remove('bg-gray-300');
                line.classList.add('bg-orange-500');
            } else if (line) {
                line.classList.remove('bg-orange-500');
                line.classList.add('bg-gray-300');
            }
        }
    }

    function updateProgressDotsLeft(stepNumber) {
        // Update pagination dots on left side
        const dots = document.querySelectorAll('.absolute.bottom-8 .rounded-full');
        dots.forEach((dot, index) => {
            if (index === stepNumber - 1) {
                dot.classList.remove('bg-gray-600');
                dot.classList.add('bg-blue-500');
            } else {
                dot.classList.remove('bg-blue-500');
                dot.classList.add('bg-gray-600');
            }
        });
    }

    function submitRegistration() {
        // Validate step 2
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const title = document.getElementById('title').value;
        const dob = document.getElementById('date_of_birth').value;
        const address = document.getElementById('address').value.trim();
        const city = document.getElementById('city').value.trim();
        const zip = document.getElementById('zip').value.trim();

        // Clear previous errors
        document.getElementById('step2Error').classList.add('hidden');

        if (!firstName || !lastName) {
            showError('step2Error', 'step2ErrorText', 'Please enter both first and last name');
            return;
        }

        if (!phone) {
            showError('step2Error', 'step2ErrorText', 'Please enter your phone number');
            return;
        }

        if (!title) {
            showError('step2Error', 'step2ErrorText', 'Please select a title');
            return;
        }

        if (!dob) {
            showError('step2Error', 'step2ErrorText', 'Please enter your date of birth');
            return;
        }

        if (!address) {
            showError('step2Error', 'step2ErrorText', 'Please enter your address');
            return;
        }

        if (!city || !zip) {
            showError('step2Error', 'step2ErrorText', 'Please enter both city and zip code');
            return;
        }

        // Collect all form data
        const allFormData = {
            ...formData,
            first_name: firstName,
            last_name: lastName,
            phone: phone,
            country_code: document.getElementById('country_code').value,
            title: title,
            date_of_birth: dob,
            address: address,
            city: city,
            zip: zip
        };

        // Submit to server
        submitToServer(allFormData);
    }

    function submitToServer(data) {
        // Find the appropriate submit button based on current step
        let submitBtn;
        if (currentStep === 4) {
            submitBtn = document.querySelector('button[onclick="completeRegistration()"]');
        } else {
            submitBtn = event.target;
        }

        // Show loading state
        if (submitBtn) {
            submitBtn.disabled = true;
            if (currentStep === 4) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating account...';
            } else {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating account...';
            }
        }

        fetch('{{ route("register") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Redirect to success page or dashboard
                window.location.href = result.redirect || '/dashboard';
            } else {
                // Show errors on current step
                let errorStep = 'step' + currentStep + 'Error';
                let errorTextId = 'step' + currentStep + 'ErrorText';

                if (result.errors) {
                    let errorMessages = Object.values(result.errors).flat();
                    showError(errorStep, errorTextId, errorMessages[0]);
                } else {
                    showError(errorStep, errorTextId, result.message || 'Registration failed. Please try again.');
                }
            }
        })
        .catch(error => {
            let errorStep = 'step' + currentStep + 'Error';
            let errorTextId = 'step' + currentStep + 'ErrorText';
            showError(errorStep, errorTextId, 'An error occurred. Please try again.');
        })
        .finally(() => {
            if (submitBtn) {
                submitBtn.disabled = false;
                if (currentStep === 4) {
                    submitBtn.innerHTML = 'Done<i class="fas fa-check ml-2"></i>';
                } else {
                    submitBtn.innerHTML = 'Next<i class="fas fa-arrow-right ml-2"></i>';
                }
            }
        });
    }

    function showError(errorDivId, errorTextId, message) {
        const errorDiv = document.getElementById(errorDivId);
        const errorText = document.getElementById(errorTextId);

        errorText.textContent = message;
        errorDiv.classList.remove('hidden');
        errorDiv.classList.add('error-shake');

        setTimeout(() => {
            errorDiv.classList.remove('error-shake');
        }, 500);

        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        showStep(1);
        updateProgressDots(1);
        updateProgressDotsLeft(1);

        // Add referral code input listener
        const referralInput = document.getElementById('referral_code');
        if (referralInput) {
            referralInput.addEventListener('input', function() {
                // Reset validation states when user types
                referralCodeValidated = false;
                referralCodeSkipped = false;
                document.getElementById('step4Error').classList.add('hidden');
                document.getElementById('step4Success').classList.add('hidden');
                document.getElementById('validateReferralBtn').innerHTML = '<i class="fas fa-check-circle text-gray-400 hover:text-green-500"></i>';
            });
        }
    });
@endsection