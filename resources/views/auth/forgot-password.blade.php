<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - AturDOit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat">
    <div class="max-w-2xl w-full">

        <!-- Forgot Password Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock text-orange-500 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Lupa Password?
                </h2>
                <p class="text-gray-600 text-sm">
                    Masukkan email anda dibawah ini dan kami akan mengirimkan link reset password.
                </p>
            </div>

            <!-- Success Message -->
            <div id="successMessage" class="hidden mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center text-green-700">
                    {{-- <i class="fas fa-check-circle mr-2"></i> --}}
                    {{-- <span id="successText"></span> --}}
                    <p>
                        Kami telah mengirimkan tautan untuk mengatur ulang kata sandi ke <span id="emailText"></span>. Silakan periksa kotak masuk
                        (serta folder spam/junk) dan ikuti petunjuk di email tersebut.
                        <br><br>
                        Tidak menerima email?
                        <br><br>
                            1. Tunggu 1–2 menit dan periksa kembali. <br>
                            2. Pastikan kamu memasukkan alamat email yang benar. <br>
                            3. Klik di sini untuk mengirim ulang tautan. <br>
                    </p>
                </div>
            </div>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center text-red-700">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span id="errorText"></span>
                </div>
            </div>

            <!-- Forgot Password Form -->
            <form id="forgotPasswordForm">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email"
                               id="email"
                               name="email"
                               required
                               class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                               placeholder="Masukkan Email anda disini">
                    </div>
                    <div id="emailError" class="text-red-600 text-sm mt-1 hidden"></div>
                </div>

                <div class="mb-6">
                    <button type="submit"
                            id="submitBtn"
                            class="w-full bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-red-600 transition-all transform hover:scale-[1.02] flex items-center justify-center">
                        <span id="submitText">Submit</span>
                        <i id="loadingIcon" class="fas fa-spinner ml-2" style="display: none;"></i>
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-blue-900 hover:text-blue-800 text-sm font-medium flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Login
                    </a>
                </div>
            </form>

            <!-- Reset Link Display (For Testing - Only in Development) -->
            @if(config('app.env') !== 'production')
            <div id="resetLinkContainer" class="hidden mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-blue-900 font-semibold mb-2">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-xs font-bold text-yellow-800">DEVELOPMENT MODE</span>
                    <br>
                    Click the link below to reset your password
                </p>
                <a id="resetLink" href="#" target="_blank" class="text-blue-600 hover:text-blue-800 underline text-sm break-all"></a>
            </div>
            @endif
        </div>

        <!-- Additional Help -->
        <div class="mt-6 text-center">
            <p class="text-gray-600 text-sm">
                Need more help?
                <a href="{{ route('contactus') }}" class="text-orange-500 hover:text-orange-600 font-medium">Contact Support</a>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingIcon = document.getElementById('loadingIcon');
            const email = document.getElementById('email').value;
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            const successMessage = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            const emailText = document.getElementById('emailText');
            const emailError = document.getElementById('emailError');
            const resetLinkContainer = document.getElementById('resetLinkContainer'); // May be null in production
            const resetLink = document.getElementById('resetLink'); // May be null in production

            // Reset messages
            errorMessage.classList.add('hidden');
            successMessage.classList.add('hidden');
            emailError.classList.add('hidden');
            if (resetLinkContainer) resetLinkContainer.classList.add('hidden');

            // Show loading
            submitBtn.disabled = true;
            submitText.textContent = 'Sending...';
            loadingIcon.style.display = 'inline-block';
            loadingIcon.classList.add('fa-spin');

            try {
                const response = await fetch('{{ route('password.email') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ email })
                });

                const data = await response.json();

                if (data.success) {
                    emailText.textContent = data.email;
                    successMessage.classList.remove('hidden');
                    document.getElementById('email').value = '';

                    // Show reset link for testing (only in development)
                    if (data.reset_url && resetLinkContainer) {
                        resetLink.href = data.reset_url;
                        resetLink.textContent = data.reset_url;
                        resetLinkContainer.classList.remove('hidden');
                    }
                } else {
                    if (data.errors && data.errors.email) {
                        emailError.textContent = data.errors.email[0];
                        emailError.classList.remove('hidden');
                    } else {
                        errorText.textContent = data.message || 'An error occurred. Please try again.';
                        errorMessage.classList.remove('hidden');
                    }
                }
            } catch (error) {
                errorText.textContent = 'Network error. Please check your connection and try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitText.textContent = 'Submit';
                loadingIcon.style.display = 'none';
                loadingIcon.classList.remove('fa-spin');
            }
        });
    </script>
</body>
</html>

