// Auth Modal Management
function showRegister() {
    const modal = document.getElementById('authModal');
    const content = document.getElementById('authContent');

    content.innerHTML = `
        <div class="flex min-h-screen">
            <!-- Left Section - Chart Background -->
            <div class="hidden md:flex md:w-2/5 bg-gray-900 rounded-l-2xl p-8 flex-col justify-between">
                <div>
                    <div class="text-white mb-8">
                        <h3 class="text-2xl font-bold mb-2">Start Your Financial Journey</h3>
                        <p class="text-gray-400">Join thousands of users managing their finances smarter</p>
                    </div>

                    <!-- Mini Chart -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400 text-sm">Portfolio Growth</span>
                            <span class="text-green-400 text-sm">+18.2%</span>
                        </div>
                        <div class="flex items-end justify-between h-32 space-x-1">
                            <div class="bg-green-500 w-4 h-12 rounded-t"></div>
                            <div class="bg-red-500 w-4 h-16 rounded-t"></div>
                            <div class="bg-green-500 w-4 h-20 rounded-t"></div>
                            <div class="bg-green-500 w-4 h-16 rounded-t"></div>
                            <div class="bg-red-500 w-4 h-24 rounded-t"></div>
                            <div class="bg-green-500 w-4 h-32 rounded-t"></div>
                            <div class="bg-green-500 w-4 h-28 rounded-t"></div>
                            <div class="bg-red-500 w-4 h-20 rounded-t"></div>
                        </div>
                    </div>
                </div>

                <!-- Progress Dots -->
                <div class="flex justify-center space-x-2">
                    <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                </div>
            </div>

            <!-- Right Section - Register Form -->
            <div class="w-full md:w-3/5 p-8">
                <button onclick="closeAuthModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <div id="registerStep1">
                    <!-- Progress Steps -->
                    <div class="flex justify-center mb-8">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">1</div>
                                <span class="ml-2 text-sm text-gray-700">Account</span>
                            </div>
                            <div class="w-12 h-px bg-gray-300"></div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                                <span class="ml-2 text-sm text-gray-500">Verify</span>
                            </div>
                            <div class="w-12 h-px bg-gray-300"></div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                                <span class="ml-2 text-sm text-gray-500">Profile</span>
                            </div>
                            <div class="w-12 h-px bg-gray-300"></div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">4</div>
                                <span class="ml-2 text-sm text-gray-500">Referral</span>
                            </div>
                            <div class="w-12 h-px bg-gray-300"></div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">5</div>
                                <span class="ml-2 text-sm text-gray-500">Complete</span>
                            </div>
                        </div>
                    </div>

                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Let's create an account</h2>
                        <p class="text-gray-600">Let's set up your account! It only takes a moment—enter your details below!</p>
                    </div>

                    <!-- Form -->
                    <form onsubmit="handleRegisterStep1(event)">
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="regEmail" required
                                    class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Enter your Email here">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-gray-400"></i>
                                </div>
                                <input type="password" id="regPassword" required
                                    class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Enter your Password">
                                <button type="button" onclick="togglePassword('regPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-6">
                            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                                Next Step
                            </button>
                        </div>

                        <div class="text-center mb-6">
                            <span class="text-gray-500">Already have an account?
                                <a href="#" onclick="showLogin()" class="text-orange-500 hover:text-orange-600 font-medium">Log in</a>
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
                    </form>
                </div>
            </div>
        </div>
    `;

    modal.classList.remove('hidden');
}

function showLogin() {
    const modal = document.getElementById('authModal');
    const content = document.getElementById('authContent');

    content.innerHTML = `
        <div class="p-8">
            <button onclick="closeAuthModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">
                    Welcome to <span class="text-orange-500">AturDOit</span>
                </h2>
            </div>

            <!-- Form -->
            <form onsubmit="handleLogin(event)">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="loginEmail" required
                            class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            placeholder="Enter your Email">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-red-500"></i>
                        </div>
                        <input type="password" id="loginPassword" required
                            class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            placeholder="Enter your Password">
                        <button type="button" onclick="togglePassword('loginPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                </div>

                <!-- Error Message (Hidden by default) -->
                <div id="loginError" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                    <span class="text-red-700 text-sm" id="loginErrorText"></span>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="rememberMe" class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                        <label for="rememberMe" class="ml-2 text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="#" class="text-orange-500 hover:text-orange-600 text-sm font-medium">Forgot Password?</a>
                </div>

                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                        Login
                    </button>
                </div>

                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">OR</span>
                    </div>
                </div>

                <button type="button" onclick="handleGoogleLogin()" class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center mb-6">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Login with Google
                </button>

                <div class="text-center">
                    <span class="text-gray-600">Don't have an account?
                        <a href="#" onclick="showRegister()" class="text-orange-500 hover:text-orange-600 font-medium">Register</a>
                    </span>
                </div>
            </form>
        </div>
    `;

    modal.classList.remove('hidden');
}

function closeAuthModal(event) {
    if (event && event.target !== event.currentTarget) return;
    document.getElementById('authModal').classList.add('hidden');
}

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

// Form Handlers
function handleRegisterStep1(event) {
    event.preventDefault();
    const email = document.getElementById('regEmail').value;
    const password = document.getElementById('regPassword').value;

    // Simulate validation and proceed to next step
    showRegisterStep2(email, password);
}

function showRegisterStep2(email, password) {
    const content = document.getElementById('authContent');
    content.innerHTML = `
        <div class="flex min-h-screen">
            <!-- Left Section - Chart Background -->
            <div class="hidden md:flex md:w-2/5 bg-gray-900 rounded-l-2xl p-8 flex-col justify-between">
                <div>
                    <div class="text-white mb-8">
                        <h3 class="text-2xl font-bold mb-2">Verify Your Email</h3>
                        <p class="text-gray-400">We sent a verification code to ${email}</p>
                    </div>

                    <!-- Mini Chart -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400 text-sm">Email Status</span>
                            <span class="text-yellow-400 text-sm">Pending</span>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-4">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-envelope text-yellow-400 text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Dots -->
                <div class="flex justify-center space-x-2">
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                </div>
            </div>

            <!-- Right Section - Verification Form -->
            <div class="w-full md:w-3/5 p-8">
                <button onclick="closeAuthModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <!-- Progress Steps -->
                <div class="flex justify-center mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">Account</span>
                        </div>
                        <div class="w-12 h-px bg-orange-500"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                            <span class="ml-2 text-sm text-gray-700">Verify</span>
                        </div>
                        <div class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                            <span class="ml-2 text-sm text-gray-500">Profile</span>
                        </div>
                        <div class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">4</div>
                            <span class="ml-2 text-sm text-gray-500">Referral</span>
                        </div>
                        <div class="w-12 h-px bg-gray-300"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-semibold">5</div>
                            <span class="ml-2 text-sm text-gray-500">Complete</span>
                        </div>
                    </div>
                </div>

                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Check your email</h2>
                    <p class="text-gray-600">We sent a 6-digit verification code to ${email}</p>
                </div>

                <!-- Verification Code Input -->
                <form onsubmit="handleVerification(event)">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Enter verification code</label>
                        <div class="flex justify-center space-x-2">
                            <input type="text" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" onkeyup="moveToNext(this, 'code2')">
                            <input type="text" id="code2" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" onkeyup="moveToNext(this, 'code3')">
                            <input type="text" id="code3" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" onkeyup="moveToNext(this, 'code4')">
                            <input type="text" id="code4" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" onkeyup="moveToNext(this, 'code5')">
                            <input type="text" id="code5" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" onkeyup="moveToNext(this, 'code6')">
                            <input type="text" id="code6" maxlength="1" class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                            Verify Code
                        </button>
                    </div>

                    <div class="text-center">
                        <span class="text-gray-600">Didn't receive the code?
                            <a href="#" onclick="resendCode()" class="text-orange-500 hover:text-orange-600 font-medium">Resend</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    `;
}

function moveToNext(current, nextFieldId) {
    if (current.value.length >= 1 && nextFieldId) {
        const nextField = document.getElementById(nextFieldId);
        if (nextField) nextField.focus();
    }
}

function handleVerification(event) {
    event.preventDefault();
    // Simulate verification success
    showSuccessPage();
}

function showSuccessPage() {
    const content = document.getElementById('authContent');
    content.innerHTML = `
        <div class="p-8 text-center">
            <div class="mb-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-green-500 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Registration Complete!</h2>
                <p class="text-gray-600">Welcome to AturDOit! Your account has been successfully created.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-trophy text-orange-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Welcome Bonus!</h3>
                <p class="text-gray-600 mb-4">Get started with a free premium trial for 30 days</p>
                <div class="bg-orange-100 text-orange-700 px-4 py-2 rounded-lg inline-block">
                    <i class="fas fa-gift mr-2"></i>
                    Premium Access Unlocked
                </div>
            </div>

            <button onclick="closeAuthModal(); showDashboard()" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Go to Dashboard
            </button>
        </div>
    `;
}

function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const errorDiv = document.getElementById('loginError');
    const errorText = document.getElementById('loginErrorText');

    // Simulate login validation
    if (email === 'demo@aturdoit.com' && password === 'demo123') {
        closeAuthModal();
        showDashboard();
    } else {
        // Show error
        errorDiv.classList.remove('hidden');
        if (password === 'wrong') {
            errorText.textContent = 'Wrong password. Try again or click Forgot password to reset it.';
        } else if (email === 'wrong@email.com') {
            errorText.textContent = 'Email not found. Please check your email address or create a new account.';
        } else {
            errorText.textContent = 'Invalid email or password. Please try again.';
        }
    }
}

function handleGoogleSignUp() {
    // Simulate Google sign-up
    showSuccessPage();
}

function handleGoogleLogin() {
    // Simulate Google login
    closeAuthModal();
    showDashboard();
}

function showDashboard() {
    // Redirect to dashboard (for demo, just show alert)
    alert('Welcome to your dashboard! (This would redirect to the main app)');
}

function resendCode() {
    // Simulate resending code
    alert('Verification code has been resent to your email');
}