<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - AturDOit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-login.jpg') }}')">
    <div class="max-w-md w-full">

        <!-- Reset Password Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-key text-green-500 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Reset Your Password
                </h2>
                <p class="text-gray-600 text-sm">
                    Please enter your new password below.
                </p>
            </div>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center text-red-700">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span id="errorText"></span>
                </div>
            </div>

            <!-- Reset Password Form -->
            <form id="resetPasswordForm">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ $token }}">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email"
                               id="email"
                               name="email"
                               required
                               class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter your email address">
                    </div>
                    <div id="emailError" class="text-red-600 text-sm mt-1 hidden"></div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password"
                               id="password"
                               name="password"
                               required
                               class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter new password">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="togglePassword"></i>
                        </button>
                    </div>
                    <div id="passwordError" class="text-red-600 text-sm mt-1 hidden"></div>
                    <p class="text-gray-500 text-xs mt-1">
                        <i class="fas fa-info-circle mr-1"></i>
                        Password must be at least 8 characters long
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Confirm New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               required
                               class="form-input w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Confirm new password">
                        <button type="button" onclick="togglePassword('password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="togglePasswordConfirm"></i>
                        </button>
                    </div>
                    <div id="passwordConfirmationError" class="text-red-600 text-sm mt-1 hidden"></div>
                </div>

                <!-- Password Strength Indicator -->
                <div class="mb-6">
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div id="strengthBar" class="h-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                    </div>
                    <p id="strengthText" class="text-xs text-gray-500"></p>
                </div>

                <div class="mb-6">
                    <button type="submit" 
                            id="submitBtn"
                            class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-[1.02] flex items-center justify-center">
                        <span id="submitText">Reset Password</span>
                        <i id="loadingIcon" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-blue-900 hover:text-blue-800 text-sm font-medium flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = fieldId === 'password' ? document.getElementById('togglePassword') : document.getElementById('togglePasswordConfirm');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Password strength checker
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let message = '';
            let color = '';
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            switch(strength) {
                case 0:
                case 1:
                    message = 'Very Weak';
                    color = 'bg-red-500';
                    strengthBar.style.width = '20%';
                    break;
                case 2:
                    message = 'Weak';
                    color = 'bg-orange-500';
                    strengthBar.style.width = '40%';
                    break;
                case 3:
                    message = 'Fair';
                    color = 'bg-yellow-500';
                    strengthBar.style.width = '60%';
                    break;
                case 4:
                    message = 'Good';
                    color = 'bg-blue-500';
                    strengthBar.style.width = '80%';
                    break;
                case 5:
                    message = 'Strong';
                    color = 'bg-green-500';
                    strengthBar.style.width = '100%';
                    break;
            }
            
            strengthBar.className = `h-full transition-all duration-300 ${color}`;
            strengthText.textContent = password.length > 0 ? `Password Strength: ${message}` : '';
        });

        // Form submission
        document.getElementById('resetPasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingIcon = document.getElementById('loadingIcon');
            const token = document.getElementById('token').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            
            // Reset error messages
            errorMessage.classList.add('hidden');
            document.getElementById('emailError').classList.add('hidden');
            document.getElementById('passwordError').classList.add('hidden');
            document.getElementById('passwordConfirmationError').classList.add('hidden');
            
            // Show loading
            submitBtn.disabled = true;
            submitText.textContent = 'Resetting...';
            loadingIcon.classList.remove('hidden');
            
            try {
                const response = await fetch('{{ route('password.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ 
                        token, 
                        email, 
                        password, 
                        password_confirmation 
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Show success and redirect
                    submitBtn.classList.remove('from-green-500', 'to-green-600');
                    submitBtn.classList.add('from-green-600', 'to-green-700');
                    submitText.innerHTML = '<i class="fas fa-check mr-2"></i>Password Reset Successfully!';
                    loadingIcon.classList.add('hidden');
                    
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                } else {
                    // Show errors
                    if (data.errors) {
                        if (data.errors.email) {
                            document.getElementById('emailError').textContent = data.errors.email[0];
                            document.getElementById('emailError').classList.remove('hidden');
                        }
                        if (data.errors.password) {
                            document.getElementById('passwordError').textContent = data.errors.password[0];
                            document.getElementById('passwordError').classList.remove('hidden');
                        }
                        if (data.errors.password_confirmation) {
                            document.getElementById('passwordConfirmationError').textContent = data.errors.password_confirmation[0];
                            document.getElementById('passwordConfirmationError').classList.remove('hidden');
                        }
                    } else {
                        errorText.textContent = data.message || 'An error occurred. Please try again.';
                        errorMessage.classList.remove('hidden');
                    }
                    
                    submitBtn.disabled = false;
                    submitText.textContent = 'Reset Password';
                    loadingIcon.classList.add('hidden');
                }
            } catch (error) {
                errorText.textContent = 'Network error. Please check your connection and try again.';
                errorMessage.classList.remove('hidden');
                submitBtn.disabled = false;
                submitText.textContent = 'Reset Password';
                loadingIcon.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

