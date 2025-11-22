<nav class="fixed w-full top-0 z-50 bg-white shadow-sm" x-data="{ mobileMenu: false }">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('landing') }}" class="flex items-center">
                    <img src="{{ asset('images/icons/logo.png') }}" alt="AturDOit Logo" class="h-15 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation - Centered -->
            @guest
                <div class="hidden md:flex items-center space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('landing') }}" class="text-gray-{{ request()->routeIs('landing') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Home</a>
                    <a href="{{ route('features') }}" class="text-gray-{{ request()->routeIs('features') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Features</a>
                    <a href="{{ route('community') }}" class="text-gray-{{ request()->routeIs('community') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Community</a>
                    <a href="{{ route('about') }}" class="text-gray-{{ request()->routeIs('about') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">About Us</a>
                    <a href="{{ route('contactus') }}" class="text-gray-600 hover:text-orange-500 text-sm font-medium transition-colors">Contact Us</a>
                </div>

                <!-- Login Button - Right Side -->
                <div class="hidden md:flex items-center">
                    <a href="{{ route('login') }}" class="bg-white text-black border mx-2 px-6 py-2 rounded-lg text-sm font-medium hover:bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] transition-colors">Sign Up</a>
                </div>
            @else
                <div class="hidden md:flex items-center space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('landing') }}" class="text-gray-{{ request()->routeIs('landing') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Home</a>
                    <a href="{{ route('features') }}" class="text-gray-{{ request()->routeIs('features') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Features</a>
                    <a href="{{ route('community') }}" class="text-gray-{{ request()->routeIs('community') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">Community</a>
                    <a href="{{ route('about') }}" class="text-gray-{{ request()->routeIs('about') ? '900' : '600' }} hover:text-orange-500 text-sm font-medium transition-colors">About Us</a>
                    <a href="{{ route('contactus') }}" class="text-gray-600 hover:text-orange-500 text-sm font-medium transition-colors">Contact Us</a>
                </div>

                <!-- User Actions - Right Side -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- User Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-orange-500 transition-all">
                            @php
                                $navAvatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&background=orange&color=fff&size=32';
                                if (Auth::user()->avatar) {
                                    if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)) {
                                        $navAvatarUrl = Auth::user()->avatar;
                                    } else {
                                        $navAvatarUrl = url('/avatars/' . basename(Auth::user()->avatar));
                                    }
                                }
                            @endphp
                            <img src="{{ $navAvatarUrl }}" alt="User Avatar" class="w-8 h-8 rounded-full object-cover">
                            <span class="text-sm font-medium">{{ Auth::user()->first_name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                            {{-- <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-tachometer-alt mr-2 text-gray-400"></i>
                                Dashboard
                            </a> --}}
                            <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-user mr-2 text-gray-400"></i>
                                My Profile
                            </a>
                            {{-- <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-cog mr-2 text-gray-400"></i>
                                Settings
                            </a> --}}
                            <hr class="my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    <a href="{{ route('refferal') }}" class="bg-gradient-to-b from-[#F78422] to-[#E1291C]  text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600 transition-colors">Invite</a>
                </div>
            @endguest

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="mobileMenu = !mobileMenu" class="text-gray-500 hover:text-gray-900 p-2">
                    <i class="fas" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenu" x-transition class="md:hidden bg-white border-t">
        @guest
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('landing') }}" class="text-gray-{{ request()->routeIs('landing') ? '900' : '600' }} block px-3 py-2 text-base font-medium">Home</a>
                <a href="{{ route('features') }}" class="text-gray-{{ request()->routeIs('features') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">Features</a>
                <a href="{{ route('community') }}" class="text-gray-{{ request()->routeIs('community') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">Community</a>
                <a href="{{ route('about') }}" class="text-gray-{{ request()->routeIs('about') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">About Us</a>
                <a href="#contact" class="text-gray-600 hover:text-gray-900 block px-3 py-2 text-base font-medium">Contact Us</a>
                <a href="{{ route('login') }}" class="w-full text-center bg-white text-black border px-3 py-2 rounded-lg text-base font-medium block">Login</a>
                <a href="{{ route('register') }}" class="w-full text-center bg-orange-500 text-white px-3 py-2 rounded-lg text-base font-medium block">Sign Up</a>
            </div>
        @else
        <div class="px-2 pt-2 pb-3 space-y-1">
            <div class="flex items-center space-x-3 px-3 py-2 border-b">
                @php
                    $mobileAvatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&background=orange&color=fff&size=40';
                    if (Auth::user()->avatar) {
                        if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)) {
                            $mobileAvatarUrl = Auth::user()->avatar;
                        } else {
                            $mobileAvatarUrl = url('/avatars/' . basename(Auth::user()->avatar));
                        }
                    }
                @endphp
                <img src="{{ $mobileAvatarUrl }}" alt="User Avatar" class="w-10 h-10 rounded-full object-cover">
                <div>
                    <div class="text-sm font-medium text-gray-900">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <a href="{{ route('landing') }}" class="text-gray-{{ request()->routeIs('landing') ? '900' : '600' }} block px-3 py-2 text-base font-medium">Home</a>
            <a href="{{ route('features') }}" class="text-gray-{{ request()->routeIs('features') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">Features</a>
            <a href="{{ route('community') }}" class="text-gray-{{ request()->routeIs('community') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">Community</a>
            <a href="{{ route('about') }}" class="text-gray-{{ request()->routeIs('about') ? '900' : '600' }} hover:text-gray-900 block px-3 py-2 text-base font-medium">About Us</a>
            <a href="#contact" class="text-gray-600 hover:text-gray-900 block px-3 py-2 text-base font-medium">Contact Us</a>
            {{-- <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                <i class="fas fa-tachometer-alt mr-2 text-gray-400"></i>
                Dashboard
            </a> --}}
            <a href="{{ route('profile') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                <i class="fas fa-user mr-2 text-gray-400"></i>
                My Profile
            </a>
            {{-- <a href="{{ route('settings') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                <i class="fas fa-cog mr-2 text-gray-400"></i>
                Settings
            </a> --}}
            <a href="{{ route('refferal') }}" class="w-full bg-gradient-to-b from-[#F78422] to-[#E1291C]  text-white px-3 py-2 rounded-lg text-base font-medium hover:bg-orange-600 transition-colors text-center block">Invite</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 text-left">
                    <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>
                    Logout
                </button>
            </form>
        </div>
        @endguest
    </div>
</nav>
