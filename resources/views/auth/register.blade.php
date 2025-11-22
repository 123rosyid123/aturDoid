@extends('layouts.auth')

@section('title', 'Register - AturDOit')

@push('styles')
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
@endpush

@section('content')
    <div class="flex min-h-screen">
            <!-- Left Section - Chart Background -->
            <div class="hidden md:flex md:w-2/5 bg-black flex-col justify-between relative overflow-hidden">
                <img src="{{ asset('images/signup.png') }}" alt="Chart Background" class="absolute inset-0 w-full h-full object-cover opacity-80">

                <!-- Progress Dots -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                </div>
            </div>

            <!-- Right Section - Multi-Step Wizard -->
            <div class="w-full md:w-3/5 flex items-center justify-center p-8 bg-gray-50">
                <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg">
                    <div class="head">
                        <!-- Logo -->
                        <div class="text-center my-8">
                            <img src="{{ asset('images/icons/logo.png') }}" alt="AturDOit Logo" class="mx-auto">
                        </div>

                        <!-- Progress Steps -->
                        <div class="flex justify-center mb-8 overflow-x-auto px-2">
                            <div class="flex items-center space-x-1 sm:space-x-3 min-w-max">
                                <div class="flex flex-col items-center">
                                    <div id="step1Circle" class="w-6 h-6 sm:w-8 sm:h-8 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white rounded-full flex items-center justify-center text-xs sm:text-sm font-semibold">1</div>
                                    <span class="mt-1 text-[10px] sm:text-xs text-gray-700 whitespace-nowrap">Email</span>
                                </div>
                                <div id="line1" class="w-4 sm:w-8 h-px bg-gray-300"></div>
                                <div class="flex flex-col items-center">
                                    <div id="step2Circle" class="w-6 h-6 sm:w-8 sm:h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-xs sm:text-sm font-semibold">2</div>
                                    <span class="mt-1 text-[10px] sm:text-xs text-gray-500 whitespace-nowrap">Password</span>
                                </div>
                                <div id="line2" class="w-4 sm:w-8 h-px bg-gray-300"></div>
                                <div class="flex flex-col items-center">
                                    <div id="step3Circle" class="w-6 h-6 sm:w-8 sm:h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-xs sm:text-sm font-semibold">3</div>
                                    <span class="mt-1 text-[10px] sm:text-xs text-gray-500 whitespace-nowrap">Profile</span>
                                </div>
                                <div id="line3" class="w-4 sm:w-8 h-px bg-gray-300"></div>
                                <div class="flex flex-col items-center">
                                    <div id="step4Circle" class="w-6 h-6 sm:w-8 sm:h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-xs sm:text-sm font-semibold">4</div>
                                    <span class="mt-1 text-[10px] sm:text-xs text-gray-500 whitespace-nowrap">Refferal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content p-8">
                        <!-- Step 1: Account Creation -->
                        <div id="step1" class="wizard-step">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Daftarkan Email Anda</h2>
                                <p class="text-gray-600">Isi email anda agar bisa di verifikasi dan lanjut ke langkah berikutnya.</p>
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
                                <button type="button" onclick="goToStep2()" class="w-full bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Kirim Verifikasi Email
                                </button>
                            </div>

                            <div class="text-center mb-6">
                                <span class="text-gray-500">Already have an account?
                                    <a href="{{ route('login') }}" class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] hover:text-orange-600 font-medium bg-clip-text text-transparent">Log in</a>
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

                        <!-- Step 2: Password -->
                        <div id="step2" class="wizard-step hidden">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Atur Password Anda</h2>
                                <p class="text-gray-600">Masukkan kata sandi Anda — demi keamanan akun Anda.</p>
                            </div>

                            <!-- Error Message (Dynamic) -->
                            <div id="step2Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                <span class="text-red-700 text-sm" id="step2ErrorText"></span>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-key text-gray-400"></i>
                                    </div>
                                    <input type="password" id="password" name="password" required
                                        class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Masukkan password anda disini">

                                    <button type="button" onclick="togglePassword('password')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- password confirmation --}}
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-medium mb-2">Password confirmation</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-key text-gray-400"></i>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Masukkan ulang password anda disini">
                                    <button type="button" onclick="togglePassword('password_confirmation')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-6">
                                <button type="button" onclick="goToStep3()"
                                    class="w-full bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Konfirmasi Password
                                </button>
                            </div>

                            <div class="text-center mb-6">
                                <span class="text-gray-500">Already have an account?
                                    <a href="{{ route('login') }}"
                                        class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] hover:text-orange-600 font-medium bg-clip-text text-transparent">Log
                                        in</a>
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

                            <button type="button" onclick="handleGoogleSignUp()"
                                class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center">
                                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                </svg>
                                Sign up with Google
                            </button>
                        </div>

                        <!-- Step 3: Profile Information -->
                        <div id="step3" class="wizard-step hidden">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Lengkapi Informasi Anda</h2>
                                <p class="text-gray-600">Hampir selesai! Lengkapi profil untuk lanjut tahap berikutnya.</p>
                            </div>

                            <!-- Error Message (Dynamic) -->
                            <div id="step3Error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                <span class="text-red-700 text-sm" id="step3ErrorText"></span>
                            </div>

                            <!-- Name Fields -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-medium mb-2">Nama Depan</label>
                                    <input type="text"
                                           id="first_name"
                                           name="first_name"
                                           value="{{ old('first_name') }}"
                                           required
                                           class="form-input w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="First Name">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-medium mb-2">Nama Belakang</label>
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
                                <label class="block text-gray-700 text-sm font-medium mb-2">Nomor Telepon</label>
                                <div class="flex">
                                    <select id="country_code" name="country_code" class="appearance-none px-3 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                        <option value="+62">🇮🇩 +62</option>
                                        <option value="+370">🇱🇹 +370</option>
                                        <option value="+1">🇺🇸 +1</option>
                                    </select>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           required
                                           class="form-input flex-1 px-3 py-3 border-t border-r border-b border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="123456789">
                                </div>
                            </div>

                            <!-- Gender and Job -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-medium mb-2">Jenis Kelamin</label>
                                    <select id="gender"
                                            name="gender"
                                            required
                                            class="form-input appearance-none w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="laki-laki">Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-medium mb-2">Pekerjaan</label>
                                    <select id="occupation"
                                            name="occupation"
                                            required
                                            class="form-input appearance-none w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="student">Mahasiswa</option>
                                        <option value="employee">Karyawan</option>
                                        <option value="business_owner">Pemilik Bisnis</option>
                                        <option value="freelancer">Freelancer</option>
                                        <option value="professional">Profesional</option>
                                        <option value="unemployed">Pengangguran</option>
                                        <option value="retired">Pensiunan</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-medium mb-2">Negara</label>
                                <select id="country"
                                        name="country"
                                        required
                                        class="form-input appearance-none w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                    <option value="">Pilih Negara</option>
                                    <option value="indonesia">Indonesia</option>
                                    <option value="malaysia">Malaysia</option>
                                    <option value="singapore">Singapore</option>
                                    <option value="thailand">Thailand</option>
                                    <option value="philippines">Philippines</option>
                                    <option value="vietnam">Vietnam</option>
                                    <option value="united States">United States</option>
                                    <option value="united kingdom">United Kingdom</option>
                                    <option value="australia">Australia</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="flex justify-between items-center">
                                <button type="button" onclick="goToStep2()" class="flex items-center px-6 py-3 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Balik
                                </button>
                                <button type="button" onclick="goToStep4()" class="flex items-center px-6 py-3 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Lanjut
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 4: Referral Code -->
                        <div id="step4" class="wizard-step hidden">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Masukkan Kode Referal</h2>
                                <p class="text-gray-600">Punya kode referal? masukkan kode tersebut di kolom dibawah untuk mendapatkan keuntungannya!</p>
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
                                <label class="block text-gray-700 text-sm font-medium mb-2">Kode Referal</label>
                                <div class="flex gap-3">
                                    <div class="relative flex-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-gift text-gray-400"></i>
                                        </div>
                                        <input type="text"
                                            id="referral_code"
                                            name="referral_code"
                                            value="{{ old('referral_code', request()->query('ref')) }}"
                                            class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Masukkan Kode Referal"></input>
                                    </div>
                                    <button type="button" id="validateReferralBtn" onclick="validateReferralCode()" class="text-white bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] rounded-lg px-4 py-3 font-medium hover:opacity-90 transition-opacity whitespace-nowrap">
                                        Validasi
                                    </button>
                                </div>
                            </div>
                            <!-- Affiliator Info Section (Hidden by default, shown after validation) -->
                            <div id="affiliatorInfo" class="hidden mb-6">
                                <div class="p-4 bg-white rounded-lg border border-gray-300 shadow-md">
                                    <div class="text-center">
                                        <span class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent font-bold text-base">Nama Affiliator: </span>
                                        <span id="affiliatorName" class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent text-base">-</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Helper Text -->
                            <div class="mb-6 text-center">
                                <p class="text-gray-600 text-sm">
                                    Tidak memiliki kode?
                                    <button type="button" onclick="skipReferralCode()" class="text-red-500 hover:text-red-600 font-medium">
                                        Tenang aja!
                                    </button>
                                    Kalau kamu lewati bagian ini, kamu otomatis jadi bagian dari tim pemilik.
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
                                        Dengan menggunakan aplikasi ini, Anda menyetujui
                                        <a href="#" onclick="showTerms()" class="text-blue-600 hover:text-blue-800 underline">ketentuan</a> kami.
                                        Kami menjaga data pribadi Anda tetap aman dan hanya menggunakannya untuk menjalankan aplikasi.
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
                                <button type="button" onclick="goToStep3()" class="flex items-center px-6 py-3 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Balik
                                </button>
                                <button type="button" onclick="completeRegistration()" class="flex items-center px-6 py-3 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Lanjut
                                    <i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Done -->
                        <div id="done" class="wizard-step hidden">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Berhasil! Akunmu siap digunakan! 🎉</h2>
                                <p class="text-gray-600">Kamu sudah siap! Selamat datang — yuk mulai!</p>
                            </div>

                            {{-- icon check besar dengan border circle rounded berwarna hijau --}}
                            <div class="flex justify-center mb-6">
                                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-500 text-6xl"></i>
                                </div>
                            </div>

                            <div class="mb-6">
                                <button type="button" onclick="window.location.href='{{ route('landing') }}'" class="w-full bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Lanjutkan
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Back to Landing -->
                    <div class="text-center mb-8">
                        <a href="{{ route('landing') }}" class="text-gray-600 hover:text-orange-500 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentStep = 1;
    let formData = {};

    // Check if email is verified from session
    @if(session('verified') && session('email'))
        formData.email = "{{ session('email') }}";
        document.getElementById('email').value = "{{ session('email') }}";

        // Show success message
        const step1Error = document.getElementById('step1Error');
        const step1ErrorText = document.getElementById('step1ErrorText');

        step1Error.classList.remove('hidden', 'bg-red-50', 'border-red-200');
        step1Error.classList.add('bg-green-50', 'border-green-200');
        step1ErrorText.classList.remove('text-red-700');
        step1ErrorText.classList.add('text-green-700');
        step1Error.querySelector('i').classList.remove('fa-exclamation-triangle', 'text-red-500');
        step1Error.querySelector('i').classList.add('fa-check-circle', 'text-green-500');
        step1ErrorText.textContent = "{{ session('message') }}";

        // Auto proceed to step 2 after 2 seconds
        setTimeout(() => {
            currentStep = 2;
            showStep(2);
            updateProgressDots(2);
            updateProgressDotsLeft(2);
        }, 2000);
    @endif

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

        // Get referral code from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const refCode = urlParams.get('ref');

        // Clear previous errors
        document.getElementById('step1Error').classList.add('hidden');

        // Show loading state
        const nextBtn = document.querySelector('button[onclick="goToStep2()"]');
        const originalText = nextBtn.innerHTML;
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending verification...';

        // Prepare request body with referral code if present
        const requestBody = { email: email };
        if (refCode) {
            requestBody.ref = refCode;
        }

        // Call validator endpoint
        fetch('/api/register/validate-step-1', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 1 data
                formData.email = email;
                // Save referral code if present
                if (refCode) {
                    formData.ref = refCode;
                }

                // Show success message
                showError('step1Error', 'step1ErrorText', data.message || 'Email verifikasi telah dikirim! Silakan cek email Anda.');
                document.getElementById('step1Error').classList.remove('bg-red-50', 'border-red-200');
                document.getElementById('step1Error').classList.add('bg-green-50', 'border-green-200');
                document.getElementById('step1ErrorText').classList.remove('text-red-700');
                document.getElementById('step1ErrorText').classList.add('text-green-700');
                document.getElementById('step1Error').querySelector('i').classList.remove('fa-exclamation-triangle', 'text-red-500');
                document.getElementById('step1Error').querySelector('i').classList.add('fa-check-circle', 'text-green-500');

                // Disable form inputs
                document.getElementById('email').disabled = true;
                nextBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Email Terkirim';
            } else {
                // Show errors
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).flat();
                    showError('step1Error', 'step1ErrorText', errorMessages[0]);
                } else {
                    showError('step1Error', 'step1ErrorText', data.message || 'Validation failed');
                }
                nextBtn.disabled = false;
                nextBtn.innerHTML = originalText;
            }
        })
        .catch(error => {
            showError('step1Error', 'step1ErrorText', 'An error occurred. Please try again.');
            nextBtn.disabled = false;
            nextBtn.innerHTML = originalText;
        });
    }

    function goToStep3() {
        // Get form data from step 2 (Password)
        const password = document.getElementById('password').value.trim();
        const passwordConfirmation = document.getElementById('password_confirmation').value.trim();

        const nextBtn = event.target;
        const originalText = nextBtn.innerHTML;

        // Clear previous errors
        hideError('step2Error');

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
                password: password,
                password_confirmation: passwordConfirmation
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 2 data
                formData.password = password;

                // Proceed to step 3 (Profile)
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
        // Get form data from step 3 (Profile)
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const phoneNumber = document.getElementById('phone').value.trim();
        const countryCode = document.getElementById('country_code').value;
        const gender = document.getElementById('gender').value;
        const occupation = document.getElementById('occupation').value;
        const country = document.getElementById('country').value;

        // Combine country code with phone number
        const fullPhone = countryCode + phoneNumber;

        const nextBtn = event.target;
        const originalText = nextBtn.innerHTML;

        // Clear previous errors
        hideError('step3Error');

        nextBtn.disabled = true;
        nextBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

        // Call validator endpoint
        fetch('/api/register/validate-step-3', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                first_name: firstName,
                last_name: lastName,
                phone: fullPhone,
                gender: gender,
                occupation: occupation,
                country: country
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Save step 3 data with full phone number
                formData.first_name = firstName;
                formData.last_name = lastName;
                formData.phone = fullPhone;
                formData.gender = gender;
                formData.occupation = occupation;
                formData.country = country;

                // Proceed to step 4 (Referral)
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

    // Step 4 Functions (Referral)
    let referralCodeValidated = false;
    let referralCodeSkipped = false;

    function validateReferralCode() {
        const referralCode = document.getElementById('referral_code').value.trim();
        const errorDiv = document.getElementById('step4Error');
        const successDiv = document.getElementById('step4Success');
        const loadingDiv = document.getElementById('referralLoading');
        const validateBtn = document.getElementById('validateReferralBtn');
        const affiliatorInfo = document.getElementById('affiliatorInfo');

        // Clear previous messages
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');
        affiliatorInfo.classList.add('hidden');

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
            
            if (data.success && data.valid) {
                successDiv.classList.remove('hidden');
                document.getElementById('step4SuccessText').textContent = data.message || 'Referral code validated successfully!';
                
                // Show affiliator info section
                affiliatorInfo.classList.remove('hidden');
                document.getElementById('affiliatorName').textContent = data.data?.affiliator_name || 'Unknown';
                
                // Change button to success state
                validateBtn.classList.remove('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]');
                validateBtn.classList.add('bg-green-500');
                validateBtn.innerHTML = '<i class="fas fa-check-circle"></i>';
                
                referralCodeValidated = true;
                formData.referral_code = referralCode;
                formData.referral_data = data.referral_data || { validated: true };
            } else {
                errorDiv.classList.remove('hidden');
                document.getElementById('step4ErrorText').textContent = data.message || 'Invalid referral code';
                referralCodeValidated = false;
                affiliatorInfo.classList.add('hidden');
                validateBtn.innerHTML = 'Validasi';
            }
        })
        .catch(error => {
            loadingDiv.classList.add('hidden');
            validateBtn.disabled = false;
            validateBtn.innerHTML = 'Validasi';

            // Show error message
            errorDiv.classList.remove('hidden');
            document.getElementById('step4ErrorText').textContent = 'Failed to validate referral code. Please try again.';
            referralCodeValidated = false;
            affiliatorInfo.classList.add('hidden');
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

        // Save step 4 data (Referral)
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
                // Hide all error messages
                hideError('step4Error');

                // Show done step instead of redirect
                showStep('done');

                // Hide progress dots
                const progressDots = document.querySelector('.flex.justify-center.mb-8');
                if (progressDots) {
                    progressDots.style.display = 'none';
                }
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
        const stepId = (stepNumber === 'done') ? 'done' : 'step' + stepNumber;
        document.getElementById(stepId).classList.remove('hidden');
    }

    function updateProgressDots(stepNumber) {
        // Update step circles
        for (let i = 1; i <= 4; i++) {
            const circle = document.getElementById('step' + i + 'Circle');
            const line = document.getElementById('line' + (i - 1));

            if (i <= stepNumber) {
                circle.classList.remove('bg-gray-200', 'text-gray-500');
                circle.classList.add('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]', 'text-white');
            } else {
                circle.classList.remove('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]', 'text-white');
                circle.classList.add('bg-gray-200', 'text-gray-500');
            }

            // Update connecting lines
            if (line && i <= stepNumber) {
                line.classList.remove('bg-gray-300');
                line.classList.add('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]');
            } else if (line) {
                line.classList.remove('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]');
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

    function hideError(errorDivId) {
        const errorDiv = document.getElementById(errorDivId);
        if (errorDiv) {
            errorDiv.classList.add('hidden');
        }
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        showStep(1);
        updateProgressDots(1);
        updateProgressDotsLeft(1);

        // Check for referral code in URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const refCode = urlParams.get('ref');

        if (refCode) {
            const referralInput = document.getElementById('referral_code');
            if (referralInput && !referralInput.value) {
                referralInput.value = refCode;
            }
        }

        // Add referral code input listener
        const referralInput = document.getElementById('referral_code');
        if (referralInput) {
            referralInput.addEventListener('input', function() {
                // Reset validation states when user types
                referralCodeValidated = false;
                referralCodeSkipped = false;
                
                const validateBtn = document.getElementById('validateReferralBtn');
                const affiliatorInfo = document.getElementById('affiliatorInfo');
                
                // Hide messages and affiliator info
                document.getElementById('step4Error').classList.add('hidden');
                document.getElementById('step4Success').classList.add('hidden');
                affiliatorInfo.classList.add('hidden');
                
                // Reset button to default state
                validateBtn.classList.remove('bg-green-500');
                validateBtn.classList.add('bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]');
                validateBtn.innerHTML = 'Validasi';
            });
        }
    });
</script>
@endpush
