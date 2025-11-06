{{-- <footer class="py-12 lg:py-16 w-full" style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%), linear-gradient(180deg, rgb(46, 83, 150) 0%, rgb(33, 46, 94) 99.98%);"> --}}
<footer class="py-12 lg:py-16 w-full" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, rgba(46, 83, 150, 1) 0%, rgba(33, 46, 94, 1) 100%);">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-24">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-12 lg:gap-8">
            <!-- Company Info -->
            <div class="flex flex-col gap-8 lg:gap-10">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/icons/logo.png') }}" alt="AturDOit Logo" class="h-12 lg:h-14 w-auto">
                </div>

                <!-- Copyright -->
                <div class="text-sm text-[#F5F7FA] leading-5" style="font-family: 'Inter', sans-serif;">
                    <p>Copyright © 2025 AturDOit</p>
                    <p>All rights reserved</p>
                </div>

                <!-- Social Links -->
                <div class="flex gap-4">
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <i class="fab fa-instagram text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <i class="fab fa-dribbble text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <i class="fab fa-twitter text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <i class="fab fa-youtube text-white text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Columns -->
            <div class="flex flex-col sm:flex-row gap-8 lg:gap-8">
                <!-- Company Column -->
                <div class="flex flex-col gap-6">
                    <h4 class="text-lg lg:text-xl font-semibold text-white leading-7" style="font-family: 'Inter', sans-serif;">Company</h4>
                    <ul class="flex flex-col gap-3 text-sm text-[#F5F7FA] leading-5" style="font-family: 'Inter', sans-serif;">
                        <li><a href="{{ route('community') }}" class="hover:text-orange-400 transition-colors">Community</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-orange-400 transition-colors">About us</a></li>
                        <li><a href="{{ route('contactus') }}" class="hover:text-orange-400 transition-colors">Contact us</a></li>
                    </ul>
                </div>

                <!-- Support Column -->
                <div class="flex flex-col gap-6">
                    <h4 class="text-lg lg:text-xl font-semibold text-white leading-7" style="font-family: 'Inter', sans-serif;">Support</h4>
                    <ul class="flex flex-col gap-3 text-sm text-[#F5F7FA] leading-5" style="font-family: 'Inter', sans-serif;">
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Help center</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Terms of service</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Legal</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Privacy policy</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Status</a></li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div class="flex flex-col gap-6">
                    <h4 class="text-lg lg:text-xl font-semibold text-white leading-7 whitespace-nowrap" style="font-family: 'Inter', sans-serif;">Ikuti Perkembangannya</h4>
                    <div class="relative w-full sm:w-[255px]">
                        <input
                            type="email"
                            placeholder="Masukan alamat E-mail Anda"
                            class="w-full bg-white/20 text-[#d9dbe1] placeholder:text-[#d9dbe1] text-sm leading-5 rounded-lg px-4 py-2 pr-12 focus:outline-none focus:ring-2 focus:ring-orange-500"
                            style="font-family: 'Inter', sans-serif;"
                        >
                        <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 text-white hover:text-orange-400 transition-colors">
                            <i class="fas fa-paper-plane text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
