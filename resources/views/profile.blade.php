@extends('layouts.app')

@section('title', 'Profile - AturDOit')

@push('styles')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<style>
    .avatar-upload {
        position: relative;
        max-width: 150px;
        margin: 0 auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        bottom: 0;
        z-index: 1;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit label {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        width: 150px;
        height: 150px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Select2 height matching phone input */
    #country_code_profile + .select2-container .select2-selection--single {
        height: auto !important;
        padding: 16px 40px 16px 16px !important;
        line-height: 1.5 !important;
        display: flex !important;
        align-items: center !important;
    }

    #country_code_profile + .select2-container .select2-selection__rendered {
        line-height: 1.5 !important;
        padding: 0 !important;
        padding-right: 0 !important;
    }

    #country_code_profile + .select2-container .select2-selection__arrow {
        height: 100% !important;
        top: 0 !important;
        right: 12px !important;
    }

    /* Select2 height matching for country dropdown */
    #country + .select2-container .select2-selection--single {
        height: auto !important;
        padding: 16px 40px 16px 16px !important;
        line-height: 1.5 !important;
        display: flex !important;
        align-items: center !important;
    }

    #country + .select2-container .select2-selection__rendered {
        line-height: 1.5 !important;
        padding: 0 !important;
        padding-right: 0 !important;
    }

    #country + .select2-container .select2-selection__arrow {
        height: 100% !important;
        top: 0 !important;
        right: 12px !important;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Profile Content -->
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8  w-full py-16 lg:py-24">
        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900">Personal Information</h1>
                {{-- <p class="mt-1 text-sm text-gray-600">Update your personal details and profile picture</p> --}}
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="px-8 py-6">
                @csrf
                @method('PUT')

                <!-- Avatar Upload -->
                <div class="mb-8">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="avatarUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                            <label for="avatarUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            @php
                                $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&size=200&background=F78422&color=fff';
                                
                                if (Auth::user()->avatar) {
                                    // Check if avatar is a full URL (from Google) or local path
                                    if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)) {
                                        // Full URL (from Google OAuth)
                                        $avatarUrl = Auth::user()->avatar;
                                    } else {
                                        // Local uploaded file
                                        $avatarUrl = url('/avatars/' . basename(Auth::user()->avatar));
                                    }
                                }
                            @endphp
                            <div id="avatarPreview" style="background-image: url('{{ $avatarUrl }}');">
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-center mt-2 text-sm text-gray-500">Click the edit icon to upload a new avatar</p> --}}
                </div>

                <!-- Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-bold text-gray-700 mb-2">Nama Pertama</label>
                        <input type="text" 
                               id="first_name" 
                               name="first_name" 
                               value="{{ old('first_name', Auth::user()->first_name) }}"
                               class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold"
                               placeholder="Masukkan nama pertama">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-bold text-gray-700 mb-2">Nama Terakhir</label>
                        <input type="text" 
                               id="last_name" 
                               name="last_name" 
                               value="{{ old('last_name', Auth::user()->last_name) }}"
                               class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold"
                               placeholder="Masukkan nama terakhir">
                    </div>

                    {{-- <!-- Email (Read Only) -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               value="{{ Auth::user()->email }}"
                               class="w-full px-6 py-4 border border-gray-300 rounded-lg bg-gray-100 text-gray-500 font-semibold cursor-not-allowed"
                               readonly>
                        <p class="mt-1 text-xs text-gray-500">Email tidak dapat diubah</p>
                    </div> --}}

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon</label>
                        @php
                            $userPhone = old('phone', Auth::user()->phone ?? '');
                            $countryCode = '+62';
                            $phoneNumber = '';
                            
                            // Load countries from JSON file
                            $countriesJson = file_get_contents(public_path('countries.json'));
                            $countries = json_decode($countriesJson, true);
                            
                            // Extract country code and phone number
                            if (!empty($userPhone) && str_starts_with($userPhone, '+')) {
                                // Try to match country codes from JSON (check longest codes first)
                                $matched = false;
                                // Sort countries by dial_code length (longest first) to match longer codes first
                                usort($countries, function($a, $b) {
                                    return strlen($b['dial_code']) - strlen($a['dial_code']);
                                });
                                
                                foreach ($countries as $country) {
                                    $dialCode = $country['dial_code'];
                                    if (str_starts_with($userPhone, $dialCode)) {
                                        $countryCode = $dialCode;
                                        $phoneNumber = substr($userPhone, strlen($dialCode));
                                        $matched = true;
                                        break;
                                    }
                                }
                                
                                // Fallback: extract country code using regex
                                if (!$matched) {
                                    preg_match('/^(\+\d{1,4})(.*)$/', $userPhone, $matches);
                                    if (isset($matches[1]) && isset($matches[2])) {
                                        $countryCode = $matches[1];
                                        $phoneNumber = $matches[2];
                                    } else {
                                        $phoneNumber = $userPhone;
                                    }
                                }
                            } else {
                                $phoneNumber = $userPhone;
                            }
                            
                            // Sort countries alphabetically by name for display
                            usort($countries, function($a, $b) {
                                return strcmp($a['name'], $b['name']);
                            });
                        @endphp
                        <div class="flex" id="phone-wrapper">
                            <select id="country_code_profile" 
                                    data-country-code
                                    class="form-select px-4 py-4 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white text-gray-700 font-semibold"
                                    style="min-width: 150px; max-width: 200px;">
                                @foreach($countries as $country)
                                    <option value="{{ $country['dial_code'] }}" {{ $countryCode == $country['dial_code'] ? 'selected' : '' }}>
                                        {{ $country['flag'] }} {{ $country['name'] }} ({{ $country['dial_code'] }})
                                    </option>
                                @endforeach
                            </select>
                            <input type="tel" 
                                   id="phone_number_input" 
                                   data-phone-number
                                   value="{{ $phoneNumber }}"
                                   class="flex-1 px-6 py-4 border-t border-r border-b border-gray-300 rounded-r-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold"
                                   placeholder="123456789">
                        </div>
                        <!-- Hidden field that will be sent to backend -->
                        <input type="hidden" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
                    </div>

                    {{-- <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" 
                               id="date_of_birth" 
                               name="date_of_birth" 
                               value="{{ old('date_of_birth', Auth::user()->date_of_birth ? (is_object(Auth::user()->date_of_birth) ? Auth::user()->date_of_birth->format('Y-m-d') : Auth::user()->date_of_birth) : '') }}"
                               class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold">
                    </div> --}}

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select id="gender" 
                                name="gender"
                                class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('gender', Auth::user()->gender) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('gender', Auth::user()->gender) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-bold text-gray-700 mb-2">Negara</label>
                        @php
                            // Load countries from JSON file for country dropdown
                            $countriesForSelect = json_decode(file_get_contents(public_path('countries.json')), true);
                            
                            // Sort countries alphabetically by name
                            usort($countriesForSelect, function($a, $b) {
                                return strcmp($a['name'], $b['name']);
                            });
                            
                            // Get selected country - try to match by code first, then by name
                            $selectedCountry = old('country', Auth::user()->country ?? '');
                            $selectedCountryCode = '';
                            
                            // Map old country values to country codes
                            $countryMapping = [
                                'indonesia' => 'ID',
                                'malaysia' => 'MY',
                                'singapore' => 'SG',
                                'thailand' => 'TH',
                                'philippines' => 'PH',
                                'vietnam' => 'VN',
                                'brunei' => 'BN',
                                'other' => ''
                            ];
                            
                            if (!empty($selectedCountry)) {
                                // Check if it's an old value that needs mapping
                                if (isset($countryMapping[strtolower($selectedCountry)])) {
                                    $selectedCountryCode = $countryMapping[strtolower($selectedCountry)];
                                } else {
                                    // Try to find by code directly
                                    foreach ($countriesForSelect as $country) {
                                        if (strtolower($country['code']) === strtolower($selectedCountry)) {
                                            $selectedCountryCode = $country['code'];
                                            break;
                                        }
                                    }
                                }
                            }
                        @endphp
                        <select id="country" 
                                name="country"
                                class="form-select w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold">
                            <option value="">Pilih Negara</option>
                            @foreach($countriesForSelect as $country)
                                <option value="{{ $country['code'] }}" {{ $selectedCountryCode == $country['code'] ? 'selected' : '' }}>
                                    {{ $country['flag'] }} {{ $country['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Occupation -->
                    <div>
                        <label for="occupation" class="block text-sm font-bold text-gray-700 mb-2">Pekerjaan</label>
                        <select id="occupation"
                            name="occupation"
                            required
                            class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 font-semibold">
                           <option value="" {{ old('occupation', Auth::user()->occupation) == '' ? 'selected' : '' }}>Pilih Pekerjaan</option>
                           <option value="student" {{ old('occupation', Auth::user()->occupation) == 'student' ? 'selected' : '' }}>Mahasiswa</option>
                           <option value="employee" {{ old('occupation', Auth::user()->occupation) == 'employee' ? 'selected' : '' }}>Karyawan</option>
                           <option value="business_owner" {{ old('occupation', Auth::user()->occupation) == 'business_owner' ? 'selected' : '' }}>Pemilik Bisnis</option>
                           <option value="freelancer" {{ old('occupation', Auth::user()->occupation) == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                           <option value="professional" {{ old('occupation', Auth::user()->occupation) == 'professional' ? 'selected' : '' }}>Profesional</option>
                           <option value="unemployed" {{ old('occupation', Auth::user()->occupation) == 'unemployed' ? 'selected' : '' }}>Pengangguran</option>
                           <option value="retired" {{ old('occupation', Auth::user()->occupation) == 'retired' ? 'selected' : '' }}>Pensiunan</option>
                           <option value="other" {{ old('occupation', Auth::user()->occupation) == 'other' ? 'selected' : '' }} >Lainnya</option>
                       </select>
                    </div>
                </div>

                <!-- Password Section -->
                <div class="mt-8 pt-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Kata Sandi</h2>
                    </div>
                    <div class="flex">
                        <a href="{{ route('password.change') }}" 
                        class="px-8 py-4 bg-gradient-to-b from-[#F78422] to-[#E1291C] text-white text-lg font-medium rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            Ubah Kata Sandi
                        </a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-center">
                    <button type="submit" 
                            class="px-12 py-4 bg-gradient-to-b from-[#F78422] to-[#E1291C] text-white text-xl font-medium rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Initialize Select2 for country code dropdown
    $(document).ready(function() {
        $('#country_code_profile').select2({
            theme: 'bootstrap-5',
            width: 'auto',
            placeholder: 'Select country code',
            allowClear: false,
            minimumResultsForSearch: 0,
            templateResult: function(country) {
                if (!country.id) {
                    return country.text;
                }
                var $country = $(country.element);
                return $('<span>' + $country.text() + '</span>');
            },
            templateSelection: function(country) {
                if (!country.id) {
                    return country.text;
                }
                var $country = $(country.element);
                var fullText = $country.text();
                // Extract flag and dial code (format: "🇮🇩 Indonesia (+62)" -> "🇮🇩 +62")
                var match = fullText.match(/^([^\s]+)\s+.+?\s+\(([^)]+)\)$/);
                if (match) {
                    var flag = match[1];
                    var dialCode = match[2];
                    return $('<span>' + flag + ' ' + dialCode + '</span>');
                }
                return $('<span>' + fullText + '</span>');
            }
        });

        // Update phone number when country code changes (Select2 compatible)
        $('#country_code_profile').on('select2:select', function() {
            updatePhoneNumber();
        });

        // Initialize Select2 for country dropdown
        $('#country').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Pilih Negara',
            allowClear: true,
            minimumResultsForSearch: 0,
            templateResult: function(country) {
                if (!country.id) {
                    return country.text;
                }
                var $country = $(country.element);
                return $('<span>' + $country.text() + '</span>');
            },
            templateSelection: function(country) {
                if (!country.id) {
                    return country.text;
                }
                var $country = $(country.element);
                return $('<span>' + $country.text() + '</span>');
            }
        });
    });

    // Function to update phone number
    function updatePhoneNumber() {
        const phoneHiddenField = document.getElementById('phone');
        const countryCodeSelect = document.getElementById('country_code_profile');
        const phoneNumberInput = document.querySelector('[data-phone-number]');
        
        if (phoneHiddenField && countryCodeSelect && phoneNumberInput) {
            const countryCode = countryCodeSelect.value;
            const phoneNumber = phoneNumberInput.value.trim();
            
            if (phoneNumber) {
                phoneHiddenField.value = countryCode + phoneNumber;
            } else {
                phoneHiddenField.value = '';
            }
        }
    }

    // Avatar Preview - Vanilla JavaScript
    document.getElementById('avatarUpload').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var preview = document.getElementById('avatarPreview');
                preview.style.backgroundImage = 'url(' + event.target.result + ')';
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Combine country code and phone number before form submission
    const profileForm = document.querySelector('form');
    if (profileForm) {
        profileForm.addEventListener('submit', function(e) {
            const countryCodeSelect = document.querySelector('[data-country-code]');
            const phoneNumberInput = document.querySelector('[data-phone-number]');
            const phoneHiddenField = document.getElementById('phone');
            
            if (countryCodeSelect && phoneNumberInput && phoneHiddenField) {
                const countryCode = countryCodeSelect.value;
                const phoneNumber = phoneNumberInput.value.trim();
                
                // Combine country code with phone number
                if (phoneNumber) {
                    phoneHiddenField.value = countryCode + phoneNumber;
                    console.log('Phone number set to:', phoneHiddenField.value);
                } else {
                    phoneHiddenField.value = '';
                }
            }
        });
        
        // Also update on input change for real-time feedback
        const phoneNumberInput = document.querySelector('[data-phone-number]');
        
        if (phoneNumberInput) {
            phoneNumberInput.addEventListener('input', updatePhoneNumber);
        }
    }
</script>
@endpush