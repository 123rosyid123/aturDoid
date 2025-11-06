<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AturDOit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" >
    <div class="max-w-lg w-full">

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">
                    Selamat datang di <span class="text-orange-500">AturDOit</span>
                </h2>
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

            <!-- Success Message (if redirected from register) -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-center text-green-700">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="mb-4">
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
                               class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                               placeholder="Enter your Email">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-red-500"></i>
                        </div>
                        <input type="password"
                               id="password"
                               name="password"
                               required
                               class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                               placeholder="Enter your Password">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                </div>

                <!-- Error Message (Dynamic) -->
                <div id="loginError" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                    <span class="text-red-700 text-sm" id="loginErrorText"></span>
                </div>

                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">ATAU</span>
                    </div>
                </div>

                <button type="button" onclick="handleGoogleLogin()" class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center mb-6">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Login menggunakan Google
                </button>

                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                        <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-orange-500 hover:text-orange-600 text-sm font-medium">Forgot
                        Password?</a>
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                        Login
                    </button>
                </div>

                <div class="text-center">
                    <span class="text-gray-600">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-medium">Register</a>
                    </span>
                </div>
            </form>
        </div>

        <!-- Back to Landing -->
        <div class="text-center mt-6">
            <a href="{{ route('landing') }}" class="text-gray-600 hover:text-orange-500 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Back to Home
            </a>
        </div>
    </div>

    <script>
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

        function handleGoogleLogin() {
            // Show loading state on the Google button
            const googleBtn = event.currentTarget;
            const originalContent = googleBtn.innerHTML;
            googleBtn.disabled = true;
            googleBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Connecting to Google...';

            // Redirect to Google OAuth
            window.location.href = '/auth/google';
        }

        // Handle form submission with AJAX
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const errorDiv = document.getElementById('loginError');
            const errorText = document.getElementById('loginErrorText');
            const submitBtn = this.querySelector('button[type="submit"]');

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Logging in...';

            fetch('{{ route("login") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    // Show error
                    errorDiv.classList.remove('hidden');
                    errorText.textContent = data.message;
                    errorDiv.classList.add('error-shake');
                    setTimeout(() => errorDiv.classList.remove('error-shake'), 500);
                }
            })
            .catch(error => {
                errorDiv.classList.remove('hidden');
                errorText.textContent = 'An error occurred. Please try again.';
                errorDiv.classList.add('error-shake');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Login';
            });
        });
    </script>
</body>
</html>
