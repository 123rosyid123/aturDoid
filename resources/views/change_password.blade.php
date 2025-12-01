@extends('layouts.app')

@section('title', 'Ubah Kata Sandi - AturDOit')


@section('content')
<div class="bg-white min-h-screen">
    <!-- Profile Content -->
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8  w-full py-16 lg:py-24">
        <!-- Error Messages (only show if not success) -->
        @if($errors->any() && !session('success'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="w-full flex flex-col items-center gap-8 bg-white p-4 rounded-lg">
            <img src="{{ asset('images/icons/logo2.png') }}" alt="AturDOit" class="h-30">

            @if(session('success'))
            <!-- Success Card -->
            <div class="w-full max-w-3xl bg-white shadow-2xl rounded-3xl p-10">
                <div class="flex flex-col items-center gap-8">
                    <!-- Success Icon -->
                    <div class="w-22 h-22 relative flex items-center justify-center">
                        <div class="w-20 h-20 rounded-full border-8 border-green-500 flex items-center justify-center">
                            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Success Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-black text-center">
                        Kata Sandi Berhasil Diubah
                    </h1>
                    
                    <!-- Success Message -->
                    <p class="text-xl text-[#606778] text-center">
                        Kata sandi Anda telah berhasil diperbarui. Silakan gunakan kata sandi baru Anda untuk login.
                    </p>
                    
                    <!-- Back to Profile Button -->
                    <a href="{{ route('profile') }}" 
                       class="w-full h-16 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-lg text-white text-2xl font-bold hover:shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center">
                        Kembali Ke Profile
                    </a>
                </div>
            </div>
            @else
            <!-- Change Password Form Card -->
            <div class="w-full max-w-3xl bg-white shadow-2xl rounded-3xl p-10">
                <!-- Header Section -->
                <div class="flex flex-col items-center gap-5 mb-8">
                    <!-- Icon -->
                    <div class="w-22 h-22 relative">
                        <img src="{{ asset('images/icons/key.svg') }}" alt="Password Change">
                        {{-- <div class="w-16 h-16 absolute top-3 left-3 rounded-full border-8 border-[#F78422]"></div> --}}
                    </div>
                    
                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-black text-center">
                        Ubah Kata Sandi Anda
                    </h1>
                    
                    <!-- Subtitle -->
                    <p class="text-xl md:text-2xl font-bold text-[#606778] text-center px-6">
                        Silakan masukkan kata sandi Anda di bawah ini.
                    </p>
                </div>

                <!-- Form Section -->
                <form action="{{ route('password.change.update') }}" method="POST" class="flex flex-col gap-5">
                    @csrf

                    <!-- Current Password Field -->
                    <div class="flex flex-col gap-2">
                        <label for="current_password" class="text-[#4D5959] text-lg font-bold">
                            Kata Sandi Lama
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="current_password" 
                                   name="current_password"
                                   value="{{ old('current_password') }}"
                                   required
                                   class="w-full px-6 py-4 pr-12 border border-[#838383] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F78422] focus:border-[#F78422] text-gray-700 font-semibold"
                                   placeholder="Masukkan kata sandi lama">
                            <button type="button" 
                                    onclick="togglePasswordVisibility('current_password')"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg id="eye-current_password" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password Field -->
                    <div class="flex flex-col gap-2">
                        <label for="new_password" class="text-[#4D5959] text-lg font-bold">
                            Kata Sandi Baru
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="new_password" 
                                   name="new_password"
                                   required
                                   class="w-full px-6 py-4 pr-12 border border-[#838383] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F78422] focus:border-[#F78422] text-gray-700 font-semibold"
                                   placeholder="Masukkan kata sandi baru">
                            <button type="button" 
                                    onclick="togglePasswordVisibility('new_password')"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg id="eye-new_password" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        @error('new_password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="flex flex-col gap-2">
                        <label for="new_password_confirmation" class="text-[#4D5959] text-lg font-bold">
                            Konfirmasi Kata Sandi Baru
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="new_password_confirmation" 
                                   name="new_password_confirmation"
                                   required
                                   class="w-full px-6 py-4 pr-12 border border-[#838383] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F78422] focus:border-[#F78422] text-gray-700 font-semibold"
                                   placeholder="Konfirmasi kata sandi baru">
                            <button type="button" 
                                    onclick="togglePasswordVisibility('new_password_confirmation')"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg id="eye-new_password_confirmation" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full h-16 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-lg text-white text-2xl font-bold hover:shadow-lg transform hover:scale-[1.02] transition-all duration-200">
                        Ubah Kata Sandi
                    </button>
                </form>

                <!-- Back Link -->
                <div class="mt-6 text-center">
                    <a href="{{ route('profile') }}" 
                       class="text-gray-400 hover:text-gray-600 text-lg font-bold transition-colors duration-200">
                        ← Kembali ke profil
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility(fieldId) {
        const field = document.getElementById(fieldId);
        const eyeIcon = document.getElementById('eye-' + fieldId);
        
        if (field.type === 'password') {
            field.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            `;
        } else {
            field.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }
</script>
@endpush
