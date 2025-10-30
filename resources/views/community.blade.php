@extends('layouts.app')

@section('title', 'Community - AturDOit')

@section('content')
<!-- Hero Section with Cashflow Club -->
<section class="pt-24 pb-12 bg-gradient-to-r from-orange-500 to-orange-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Cashflow Club Logo -->
        <div class="mb-8">
            <div class="inline-block bg-purple-800 rounded-full p-8 shadow-2xl">
                <div class="relative">
                    <div class="text-white text-center">
                        <div class="text-xl font-light mb-2">Club</div>
                        <div class="text-5xl font-bold text-yellow-400" style="font-family: 'Impact', sans-serif; letter-spacing: 2px;">
                            CA$HFLOW
                        </div>
                        <div class="text-sm mt-2">Indonesia</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Headline -->
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            Join <span class="text-yellow-300">CA$HFLOW</span> now!
        </h1>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                Bangun Mindset Finansial yang Cerdas Bersama CCI
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                Gabung dengan komunitas Cashflow Club Indonesia dan pelajari cara mengelola uang, membangun aset, serta mencapai kebebasan finansial dengan cara yang menyenangkan dan interaktif!
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                Gabung Sekarang
            </a>
        </div>
    </div>
</section>

<!-- About CCI Section -->
<section class="py-20 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold mb-6 italic">
                    Tentang CCI
                </h2>
                <p class="text-lg mb-6 leading-relaxed">
                    CCI adalah komunitas belajar tentang perencanaan dan strategi keuangan yang mengadaptasi prinsip-prinsip Robert T Kiyosaki.
                </p>
                <p class="text-lg leading-relaxed">
                    Fokus kami adalah membantu anggota memahami aliran kas, aset vs liabilitas, membangun portofolio yang seimbang, dan mencapai kebebasan finansial yang bertanggung jawab melalui metode interaktif dan praktis.
                </p>
            </div>

            <!-- Right Image -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-2xl">
                <div class="aspect-video bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-users text-gray-400 text-8xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Activities Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-12">
            Aktivitas Utama
        </h2>

        <!-- Activities Carousel -->
        <div class="relative" x-data="{ currentSlide: 0, totalSlides: 3 }">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentSlide * 33.333}%)`">
                    <!-- Activity 1: Board Game -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="aspect-square bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                <i class="fas fa-dice text-orange-500 text-6xl"></i>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Board Game</h3>
                                <p class="text-gray-600 text-sm">
                                    Belajar financial literacy melalui permainan board game interaktif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Activity 2: Offline Gathering -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <i class="fas fa-handshake text-blue-500 text-6xl"></i>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Offline Gathering</h3>
                                <p class="text-gray-600 text-sm">
                                    Pertemuan rutin untuk networking dan berbagi pengalaman
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Activity 3: Financial Seminar -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-green-500 text-6xl"></i>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Financial Seminar</h3>
                                <p class="text-gray-600 text-sm">
                                    Seminar dan workshop dengan para ahli keuangan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : totalSlides - 1" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-orange-500 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-orange-600 transition-colors">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button @click="currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-orange-500 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-orange-600 transition-colors">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="bg-white rounded-3xl p-8 shadow-lg border-4 border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Manfaat Bergabung
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="bg-orange-100 rounded-full p-2 mr-4 flex-shrink-0">
                            <i class="fas fa-check text-orange-500"></i>
                        </div>
                        <p class="text-gray-700">
                            Memahami konsep finansial yang praktis dan langsung dapat diterapkan
                        </p>
                    </li>
                    <li class="flex items-start">
                        <div class="bg-orange-100 rounded-full p-2 mr-4 flex-shrink-0">
                            <i class="fas fa-check text-orange-500"></i>
                        </div>
                        <p class="text-gray-700">
                            Belajar sambil praktek melalui permainan dan simulasi nyata
                        </p>
                    </li>
                    <li class="flex items-start">
                        <div class="bg-orange-100 rounded-full p-2 mr-4 flex-shrink-0">
                            <i class="fas fa-check text-orange-500"></i>
                        </div>
                        <p class="text-gray-700">
                            Jaringan dengan anggota yang memiliki minat serupa—peluang kolaborasi dan dukungan
                        </p>
                    </li>
                    <li class="flex items-start">
                        <div class="bg-orange-100 rounded-full p-2 mr-4 flex-shrink-0">
                            <i class="fas fa-check text-orange-500"></i>
                        </div>
                        <p class="text-gray-700">
                            Akses awal ke event, materi, dan program pengembangan dari aturDOit sebagai alat pendukung pengelolaan keuangan
                        </p>
                    </li>
                </ul>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <div class="bg-gradient-to-br from-orange-200 to-orange-300 rounded-3xl p-8">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl">
                        <div class="aspect-video bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-lightbulb text-orange-500 text-8xl"></i>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 bg-orange-500 rounded-full w-24 h-24 flex items-center justify-center shadow-xl">
                    <i class="fas fa-star text-white text-4xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left - Cashflow Club Logo -->
            <div class="flex justify-center">
                <div class="bg-purple-800 rounded-full p-12 shadow-2xl">
                    <div class="text-white text-center">
                        <div class="text-2xl font-light mb-2">Club</div>
                        <div class="text-6xl font-bold text-yellow-400" style="font-family: 'Impact', sans-serif; letter-spacing: 2px;">
                            CA$HFLOW
                        </div>
                        <div class="text-lg mt-2">Indonesia</div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="text-white">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                    Tunggu Apa Lagi?<br>
                    Bergabung Sekarang!
                </h2>
                <p class="text-lg mb-8 opacity-90">
                    Bergabunglah dengan kami sekarang, belajar, dan mengambil kebiasaan finansial yang baik bisa dimulai dengan cara yang interaktif, bersama teman, dan melalui permainan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="email" placeholder="Masukan alamat email Anda..." class="flex-1 px-6 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <button class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors flex items-center justify-center">
                        <span>Submit</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Additional carousel functionality can be added here if needed
</script>
@endpush

