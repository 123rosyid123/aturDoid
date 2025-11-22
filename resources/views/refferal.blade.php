@extends('layouts.app')

@section('title', 'AturDOit - Referral Program')

@push('styles')
<style>
    /* Apply Roboto font to referral page */
    .referral-page {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endpush

@section('content')
                        <div class="referral-page">
                            {{-- Hero Section --}}
                            <section id="referral-section" class="w-full bg-gradient-to-b from-[#F78422] to-[#E1291C] overflow-hidden">
                                <div class="">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                                        {{-- Left Side: Welcome Message --}}
                                        <div class="relative bg-white overflow-hidden p-8 py-auto lg:p-12 min-h-[400px] lg:min-h-[800px]">
                                            <div class="absolute inset-0 overflow-hidden">
                                                <img src="{{ asset('images/assets/refferal/hero.png') }}" alt="Background" class="w-full h-full object-cover">
                                                {{-- Dark Overlay --}}
                                                <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/60 to-black/70"></div>
                                            </div>
                                            <div class="relative z-10 space-y-6 py-12 lg:py-40 2xl:px-[5vw]">
                                                <h1 class="text-4xl lg:text-6xl font-black italic text-white drop-shadow-lg">
                                                    Welcome {{ $user->first_name . ' ' . $user->last_name ?? 'John Doe' }}!
                                                </h1>
                                                <p class="text-xl lg:text-2xl text-white leading-relaxed drop-shadow-md">
                                                    Ubah koneksimu jadi peluang! <br><br> Bagikan kode referalmu kepada teman-teman —
                                                    <br><br>setiap kali
                                                    seseorang bergabung menggunakan kodemu, kalian berdua akan mendapatkan hadiah. Terus bagikan,
                                                    terus hasilkan, dan raih kesuksesan finansial bersama.
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Right Side: Referral Options --}}
                                        <div class="space-y-6 text-white px-4 lg:px-8 py-12 lg:py-20">
                                            @include('partials.referral-link-input', [
        'label' => 'Invite menggunakan Link berikut:',
        'value' => $referralLink ?? 'https://dummylandingpagewebsite.com',
        'type' => 'link'
    ])

                                            <div class="flex items-center gap-2 max-w-lg">
                                                <div class="flex-1 h-0.5 bg-white"></div>
                                                <span class="text-xl font-medium">atau</span>
                                                <div class="flex-1 h-0.5 bg-white"></div>
                                            </div>

                                            @include('partials.referral-email-input', [
        'label' => 'Invite melalui email:',
        'placeholder' => 'Input Email'
    ])

                                            <div class="flex items-center gap-2 max-w-lg">
                                                <div class="flex-1 h-0.5 bg-white"></div>
                                                <span class="text-xl font-medium">atau</span>
                                                <div class="flex-1 h-0.5 bg-white"></div>
                                            </div>

                                            @include('partials.referral-code-input', [
        'label' => 'Invite melalui Kode Referral:',
        'code' => $referralCode ?? 'iJSIb8fbINSninf0L2BdonO9'
    ])
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- Upline Section --}}
                            <section class="w-full bg-gradient-to-b from-[#2E5396] to-[#212E5E] bg-opacity-20 overflow-hidden">
                                <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 max-w-[1600px]">
                                    <div class="max-w-5xl mx-auto text-center space-y-8">
                                        <div class="space-y-6">
                                            <h2 class="text-4xl lg:text-6xl font-bold text-white">
                                                Gabung dengan Jaringan Finansial Anda
                                            </h2>
                                            <p class="text-xl lg:text-2xl text-white leading-relaxed max-w-4xl mx-auto">
                                                Masukkan kode referral untuk terhubung dengan upline dan kembangkan peluang penghasilan bersama
                                                sistem afiliasi aturDOit.
                                            </p>
                                        </div>

                                        <div class="space-y-4">
                                            <p class="text-xl lg:text-2xl text-white">
                                                {{ isset($uplineCode) && $uplineCode ? 'Kode Referral Anda:' : 'Masukan Kode Referral Anda:' }}
                                            </p>

                                            @if(isset($uplineCode) && $uplineCode)
                                                {{-- Display existing upline code (read-only) --}}
                                                <div class="flex justify-center">
                                                    <div class="w-full max-w-2xl px-4 py-3 bg-[#DADADA] border border-black/50 rounded-lg">
                                                        <p class="text-black text-lg">
                                                            {{ $uplineCode }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                {{-- Input field for entering upline code --}}
                                                <div class="flex justify-center">
                                                    <div class="w-full max-w-2xl">
                                                        <!-- Error Message (Dynamic) -->
                                                        <div id="uplineError" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                                                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                                            <span class="text-red-700 text-sm" id="uplineErrorText"></span>
                                                        </div>

                                                        <!-- Success Message (Dynamic) -->
                                                        <div id="uplineSuccess" class="hidden mb-4 p-3 bg-green-50 border border-green-200 rounded-lg flex items-center">
                                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                            <span class="text-green-700 text-sm" id="uplineSuccessText"></span>
                                                        </div>

                                                        <div class="flex gap-3">
                                                            <div class="relative flex-1">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <i class="fas fa-gift text-gray-400"></i>
                                                                </div>
                                                                <input type="text"
                                                                       id="upline_referral_code"
                                                                       name="upline_referral_code"
                                                                       class="w-full pl-10 pr-3 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                                                                       placeholder="Masukkan Kode Referal">
                                                            </div>
                                                            <button type="button"
                                                                    id="validateUplineBtn"
                                                                    onclick="validateUplineReferralCode()"
                                                                    class="text-white bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-lg px-4 py-3 font-medium hover:opacity-90 transition-opacity whitespace-nowrap">
                                                                Validasi
                                                            </button>
                                                        </div>
                                                        <!-- Affiliator Info Section (Hidden by default, shown after validation) -->
                                                        <div id="affiliatorInfo" class="hidden mt-4 w-full shadow-md">
                                                            <div class="flex flex-col sm:flex-row items-stretch gap-4">
                                                                <!-- Save Button -->
                                                                <button type="button"
                                                                        onclick="saveUplineCodeFromAffiliate()"
                                                                        class="flex-1 px-6 py-4 bg-gradient-to-b from-[#F78422] to-[#E1291C] text-white rounded-lg border border-black/50 shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-3 font-bold text-base">
                                                                    <i class="fas fa-save w-6 h-6 flex items-center justify-center"></i>
                                                                    <span>Save Referral Code</span>
                                                                </button>
                                                                
                                                                <!-- Affiliator Name Display -->
                                                                <div class="px-6 py-4 bg-gradient-to-b from-[#2E5396] to-[#212E5E] rounded-lg border border-black/50 shadow-md flex items-center justify-center">
                                                                    <div class="text-center">
                                                                        <span class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent font-bold text-base">Nama Affiliator: </span>
                                                                        <span id="affiliatorName" class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent text-base">-</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Loading State -->
                                                        <div id="uplineLoading" class="hidden mt-3 text-center">
                                                            <div class="inline-flex items-center">
                                                                <i class="fas fa-spinner fa-spin mr-2 text-white"></i>
                                                                <span class="text-white">Validating referral code...</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- Affiliator Section --}}
                            <section class="w-full bg-white overflow-hidden py-16">
                                <div class="container mx-auto px-4 lg:px-8 max-w-[1600px]">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                                        {{-- Affiliator List --}}
                                        <div class="space-y-8">
                                            <h2 class="text-4xl lg:text-5xl font-bold bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                                                Direct Affiliator ({{ $totalDownline ?? 729 }})
                                            </h2>

                                            <div class="max-h-[760px] overflow-y-auto pr-4 space-y-8">
                                                @forelse($downlines ?? [] as $downline)
                                                    @php
                                                        $affiliatedDate = isset($downline->upline_created_at) && $downline->upline_created_at 
                                                            ? $downline->upline_created_at->format('d M Y') 
                                                            : '-';
                                                    @endphp
                                                    @include('partials.downline-card', [
            'name' => $downline['first_name'] . ' ' . $downline['last_name'],
            'status' => $downline['status'],
            'affiliatedOn' => $affiliatedDate,
            'downlineCount' => $downline->downlines()->count()
        ])
                                                @empty
                                                    @include('partials.empty-downline', [
            'message' => 'Belum Ada Affiliator',
            'buttonText' => 'Undang Sekarang'
        ])
                                                @endforelse
                                            </div>
                                        </div>

                                        {{-- Affiliator Info Panel --}}
                                        <div class="bg-white rounded-lg p-6 lg:p-8 space-y-12">
                                            <h3 class="text-4xl lg:text-6xl font-bold bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent">
                                                Affiliator
                                            </h3>

                                            <div class="space-y-6 text-lg lg:text-2xl text-black leading-relaxed">
                                                <p>
                                                    AturDOit menyediakan sistem afiliasi dengan struktur hingga 3 generasi. Pengguna premium dapat
                                                    memperoleh insentif dari referral langsung dan tidak langsung, tanpa harus menjual produk atau
                                                    melakukan reselling. Disamping itu akan terdapat tambahan bonus/insentif yang didasarkan dari
                                                    pencapaian level keuangan anda
                                                </p>
                                                <p>
                                                    Untuk saat ini, Anda hanya dapat melihat Direct Affiliator atau Generasi Pertama Anda. Selain itu,
                                                    Anda juga dapat melihat downline milik generasi pertama Anda.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
@endsection

@push('scripts')
<script>
    // Scroll to section
    function scrollToSection(sectionId) {
        document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
    }

    // Store validated referral data globally
    let validatedReferralData = null;

    // Validate upline referral code
    function validateUplineReferralCode() {
        const referralCode = document.getElementById('upline_referral_code').value.trim();
        const errorDiv = document.getElementById('uplineError');
        const successDiv = document.getElementById('uplineSuccess');
        const loadingDiv = document.getElementById('uplineLoading');
        const validateBtn = document.getElementById('validateUplineBtn');
        const affiliatorInfo = document.getElementById('affiliatorInfo');

        // Clear previous messages
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');
        affiliatorInfo.classList.add('hidden');

        if (!referralCode) {
            showUplineError('Please enter a referral code');
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
                document.getElementById('uplineSuccessText').textContent = data.message || 'Referral code validated successfully! Click save to confirm.';

                // Store validated data
                validatedReferralData = {
                    code: referralCode,
                    affiliatorName: data.data?.affiliator_name || 'Unknown'
                };

                // Show affiliator info section
                affiliatorInfo.classList.remove('hidden');
                document.getElementById('affiliatorName').textContent = validatedReferralData.affiliatorName;
                
                // Change button to success state
                validateBtn.classList.remove('bg-gradient-to-b', 'from-[#F78422]', 'to-[#E1291C]');
                validateBtn.classList.add('bg-green-500');
                validateBtn.innerHTML = '<i class="fas fa-check-circle"></i>';
            } else {
                showUplineError(data.message || 'Invalid referral code');
                affiliatorInfo.classList.add('hidden');
                validatedReferralData = null;
                validateBtn.innerHTML = 'Validasi';
            }
        })
        .catch(error => {
            loadingDiv.classList.add('hidden');
            validateBtn.disabled = false;
            validateBtn.innerHTML = 'Validasi';
            showUplineError('Failed to validate referral code. Please try again.');
            affiliatorInfo.classList.add('hidden');
            validatedReferralData = null;
        });
    }

    // Save upline code from new affiliator info button
    function saveUplineCodeFromAffiliate() {
        if (!validatedReferralData) {
            showUplineError('Please validate referral code first');
            return;
        }

        const saveBtn = event.target.closest('button');
        const originalText = saveBtn.innerHTML;

        // Show loading state
        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';

        // Submit to server
        fetch('/api/user/update-upline', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ upline_code: validatedReferralData.code })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Kode upline berhasil disimpan!', 'success');
                // Reload page to show updated upline code
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                showUplineError(data.message || 'Gagal menyimpan kode upline');
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
        })
        .catch(error => {
            showUplineError('Terjadi kesalahan. Silakan coba lagi.');
            saveBtn.disabled = false;
            saveBtn.innerHTML = originalText;
        });
    }

    // Skip upline code
    function skipUplineCode() {
        const errorDiv = document.getElementById('uplineError');
        const successDiv = document.getElementById('uplineSuccess');

        // Clear previous messages
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');

        // Clear referral code input
        document.getElementById('upline_referral_code').value = '';

        // Hide save button
        document.getElementById('uplineSaveBtn').classList.add('hidden');

        // Show skip confirmation
        successDiv.classList.remove('hidden');
        document.getElementById('uplineSuccessText').textContent = 'You can add an upline code later from your profile settings.';
    }

    // Show upline error
    function showUplineError(message) {
        const errorDiv = document.getElementById('uplineError');
        const errorText = document.getElementById('uplineErrorText');

        errorText.textContent = message;
        errorDiv.classList.remove('hidden');
    }

    // Copy text to clipboard
    function copyToClipboard(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function() {
                showNotification('Berhasil disalin ke clipboard!', 'success');
            }).catch(function(err) {
                fallbackCopyToClipboard(text);
            });
        } else {
            fallbackCopyToClipboard(text);
        }
    }

    // Fallback copy method for older browsers
    function fallbackCopyToClipboard(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            const successful = document.execCommand('copy');
            if (successful) {
                showNotification('Berhasil disalin ke clipboard!', 'success');
            } else {
                showNotification('Gagal menyalin teks', 'error');
            }
        } catch (err) {
            showNotification('Gagal menyalin teks', 'error');
        }

        document.body.removeChild(textArea);
    }

    // Send referral email
    function sendReferralEmail() {
        const emailInput = document.getElementById('referralEmail');
        const email = emailInput.value.trim();

        if (!email) {
            showNotification('Silakan masukkan alamat email', 'error');
            return;
        }

        if (!isValidEmail(email)) {
            showNotification('Format email tidak valid', 'error');
            return;
        }

        // Show loading state
        showNotification('Mengirim invitation...', 'info');

        // TODO: Replace with actual API call
        // For now, just simulate success
        setTimeout(() => {
            showNotification('Invitation berhasil dikirim ke ' + email, 'success');
            emailInput.value = '';
        }, 1000);
    }

    // Validate email format
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Show notification
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotification = document.getElementById('notification');
        if (existingNotification) {
            existingNotification.remove();
        }

        // Create notification element
        const notification = document.createElement('div');
        notification.id = 'notification';
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Add referral code input listener to reset validation state
    document.addEventListener('DOMContentLoaded', function() {
        const uplineReferralInput = document.getElementById('upline_referral_code');
        const validateBtn = document.getElementById('validateUplineBtn');
        const affiliatorInfo = document.getElementById('affiliatorInfo');
        const successDiv = document.getElementById('uplineSuccess');
        const errorDiv = document.getElementById('uplineError');

        if (uplineReferralInput && validateBtn) {
            uplineReferralInput.addEventListener('input', function() {
                // Reset validation states when user types
                validatedReferralData = null;
                
                // Hide success/error messages
                if (successDiv) successDiv.classList.add('hidden');
                if (errorDiv) errorDiv.classList.add('hidden');
                if (affiliatorInfo) affiliatorInfo.classList.add('hidden');
                
                // Reset button to original state
                validateBtn.disabled = false;
                validateBtn.classList.remove('bg-green-500');
                validateBtn.classList.add('bg-gradient-to-b', 'from-[#F78422]', 'to-[#E1291C]');
                validateBtn.innerHTML = 'Validasi';
            });
        }
    });
</script>
@endpush
