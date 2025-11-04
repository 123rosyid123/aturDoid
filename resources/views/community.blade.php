@extends('layouts.app')

@section('title', 'Community - AturDOit')

@section('content')
    <!-- Hero Section with Cashflow Club -->
    <section class="pt-24 pb-12 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <!-- Headline -->
            <h1 class="text-4xl lg:text-5xl font-bold text-white flex items-center justify-center">
                <span>Join</span>
                <img src="{{ asset('images/assets/community/logo.png') }}" alt="Cashflow Club"
                    class="h-20 lg:h-80 inline-block">
                <span>now!</span>
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
                    Gabung dengan komunitas Cashflow Club Indonesia dan pelajari cara mengelola uang, membangun aset, serta
                    mencapai kebebasan finansial dengan cara yang menyenangkan dan interaktif!
                </p>
                <a href="{{ route('register') }}"
                    class="inline-block bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                    Gabung Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- About CCI Section -->
    <section class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="py-20  px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6 italic">
                        Tentang CCI
                    </h2>
                    <p class="text-lg mb-6 leading-relaxed">
                        CCI adalah komunitas belajar tentang perencanaan dan strategi keuangan yang mengadaptasi
                        prinsip-prinsip Robert T Kiyosaki.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Fokus kami adalah membantu anggota memahami aliran kas, aset vs liabilitas, membangun portofolio
                        yang seimbang, dan mencapai kebebasan finansial yang bertanggung jawab melalui metode interaktif dan
                        praktis.
                    </p>
                </div>

                <!-- Right Image -->
                <img src="{{ asset('images/assets/community/cci.jpg') }}" alt="Cashflow Club"
                    class="h-full w-full object-cover">
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
            <div class="relative pt-20 pb-8" x-data="{ currentSlide: 0, totalSlides: 2 }">
                <div class="overflow-hidden py-8">
                    <div class="flex transition-transform duration-500 ease-in-out"
                        :style="`transform: translateX(-${currentSlide * 33.333}%)`">
                        <!-- Activity 1: Board Game -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                    {{-- <i class="fas fa-dice text-orange-500 text-6xl"></i> --}}
                                    <img src="{{ asset('images/assets/community/mabar.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
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
                                <div
                                    class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/gathering.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
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
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/seminar.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Financial Seminar</h3>
                                    <p class="text-gray-600 text-sm">
                                        Seminar dan workshop dengan para ahli keuangan
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity 4: Mabar -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/mabar2.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Game with Staff</h3>
                                    <p class="text-gray-600 text-sm">
                                        Main bareng sambil belajar keuangan
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
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white rounded-3xl p-8 shadow-lg border-4 border-gray-200">
                <!-- Left Content -->
                <div class="">
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
                                Akses awal ke event, materi, dan program pengembangan dari aturDOit sebagai alat pendukung
                                pengelolaan keuangan
                            </p>
                        </li>
                    </ul>
                </div>

                <!-- Right Image -->
                <img src="{{ asset('images/assets/community/bergabung.png') }}" alt="Cashflow Club"
                    class="h-full w-full object-cover">
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    {{-- <section class="py-20 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)]" style="background-image: url('{{ asset('images/assets/community/element.png') }}')"> --}}
    <section class="relative py-20 bg-cover bg-center" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), url('{{ asset('images/assets/community/element.png') }}'), linear-gradient(180deg, rgba(46, 83, 150, 1) 0%, rgba(33, 46, 94, 1) 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left - Cashflow Club Logo -->
                <div class="flex justify-center">
                    <div class="">
                        <img src="{{ asset('images/assets/community/logo.png') }}" alt="Cashflow Club"
                            class="h-full w-full object-cover">
                    </div>
                </div>

                <!-- Right Content -->
                <div class="text-white">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                        Tunggu Apa Lagi?<br>
                        Bergabung Sekarang!
                    </h2>
                    <p class="text-lg mb-8 opacity-90">
                        Bergabunglah dengan kami sekarang, belajar, dan mengambil kebiasaan finansial yang baik bisa dimulai
                        dengan cara yang interaktif, bersama teman, dan melalui permainan.
                    </p>
                    <div class="relative w-full sm:w-[255px]">
                        <input type="email" placeholder="Masukan alamat E-mail Anda"
                            class="w-full bg-white/20 text-[#d9dbe1] placeholder:text-[#d9dbe1] text-sm leading-5 rounded-lg px-4 py-2 pr-12 focus:outline-none focus:ring-2 focus:ring-orange-500"
                            style="font-family: 'Inter', sans-serif;">
                        <button type="button"
                            class="absolute top-1/2 right-3 -translate-y-1/2 text-white hover:text-orange-400 transition-colors">
                            <i class="fas fa-paper-plane text-sm"></i>
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
