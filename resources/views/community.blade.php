@extends('layouts.app')

@section('title', 'Community - AturDOit')

@section('content')
    <!-- Hero Section with Cashflow Club -->
    <section class="relative pt-24 pb-12 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <!-- Headline -->
            <h1 class="text-4xl lg:text-5xl font-bold text-white flex items-center justify-center">
                <span>Join</span>
                <img src="{{ asset('images/assets/community/logo.png') }}" alt="Cashflow Club"
                    class="h-20 lg:h-80 inline-block">
                <span>now!</span>
            </h1>
        </div>

        <!-- Instagram Button -->
        <div class="absolute bottom-8 right-8">
            <a href="https://www.instagram.com/cci_club?igsh=dnRkMjdlaThjbTNu"
               target="_blank"
               class="inline-block">
                <i class="fab fa-instagram text-lg md:text-2xl inline-block bg-white rounded-full p-3 shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300" style="color: #E4405F;"></i>
            </a>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Bangun Mindset Finansial yang Cerdas Bersama CCI
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                    Gabung dengan komunitas Cashflow Club Indonesia dan pelajari cara mengelola uang, membangun aset, serta
                    mencapai kebebasan finansial dengan cara yang menyenangkan dan interaktif!
                </p>
                <a onclick="event.preventDefault(); document.getElementById('join_now').scrollIntoView({ behavior: 'smooth' });"
                    class="inline-block bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                    Gabung Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- About CCI Section -->
    <section class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white">
        <div class=" mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="py-20  px-4 sm:px-6 lg:px-20">
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
                <img src="{{ asset('images/assets/community/cci.png') }}" alt="Cashflow Club"
                    class="h-full w-full object-cover">
            </div>
        </div>
    </section>

    <!-- Main Activities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-12">
                Aktivitas Utama
            </h2>

            <!-- Activities Carousel -->
            <div class="relative pt-20 pb-8" x-data="{
                        currentSlide: 0,
                        getTotalSlides() {
                            return window.innerWidth >= 768 ? 2 : 3;
                        },
                        getTranslateValue() {
                            if (window.innerWidth >= 768) {
                                return this.currentSlide * 0;
                            } else {
                                return this.currentSlide * 100;
                            }
                        }
                    }" x-init="
                        window.addEventListener('resize', () => {
                            if (currentSlide >= getTotalSlides()) {
                                currentSlide = getTotalSlides() - 1;
                            }
                        });
                    ">
                <div class="overflow-hidden py-8">
                    <div class="flex transition-transform duration-500 ease-in-out"
                        :style="`transform: translateX(-${getTranslateValue()}%)`">
                        <!-- Activity 1: Board Game -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                    {{-- <i class="fas fa-dice text-orange-500 text-6xl"></i> --}}
                                    <img src="{{ asset('images/assets/community/main_bareng.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Main Bareng</h3>
                                    {{-- <p class="text-gray-600 text-sm">
                                        Belajar financial literacy melalui permainan board game interaktif
                                    </p> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Activity 2: Offline Gathering -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/gathering.png') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Gathering</h3>
                                    {{-- <p class="text-gray-600 text-sm">
                                        Pertemuan rutin untuk networking dan berbagi pengalaman
                                    </p> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Activity 3: Financial Seminar -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/workshop.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Workshop</h3>
                                    {{-- <p class="text-gray-600 text-sm">
                                        Seminar dan workshop dengan para ahli keuangan
                                    </p> --}}
                                </div>
                            </div>
                        </div>

                        {{-- <!-- Activity 4: Mabar -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/BoardGame.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Board Game</h3>
                                    <p class="text-gray-600 text-sm">
                                        Main bareng sambil belajar keuangan
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity 5: Offline Gathering -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/OfflineGathering.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Offline Gathering</h3>
                                    <p class="text-gray-600 text-sm">
                                        Main bareng sambil belajar keuangan
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity 6: Financial Seminar -->
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <div
                                    class="aspect-square bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                    <img src="{{ asset('images/assets/community/FinancialSeminars.jpg') }}" alt="Cashflow Club"
                                        class="h-full w-full object-cover">
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Financial Seminar</h3>
                                    <p class="text-gray-600 text-sm">
                                        Main bareng sambil belajar keuangan
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : getTotalSlides() - 1"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-orange-500 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-orange-600 transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="currentSlide = currentSlide < getTotalSlides() - 1 ? currentSlide + 1 : 0"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-orange-500 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-orange-600 transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white rounded-3xl p-8 shadow-lg border-4 border-gray-200">
                <!-- Left Content -->
                <div class="lg:px-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        Manfaat Bergabung
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-check text-grey"></i>
                            </div>
                            <p class="text-gray-700">
                                Memahami konsep finansial yang praktis dan langsung dapat diterapkan
                            </p>
                        </li>
                        <li class="flex items-start">
                            <div class="p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-check text-grey"></i>
                            </div>
                            <p class="text-gray-700">
                                Belajar sambil praktek melalui permainan dan simulasi nyata
                            </p>
                        </li>
                        <li class="flex items-start">
                            <div class="p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-check text-grey"></i>
                            </div>
                            <p class="text-gray-700">
                                Jaringan dengan anggota yang memiliki minat serupa—peluang kolaborasi dan dukungan
                            </p>
                        </li>
                        <li class="flex items-start">
                            <div class="p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-check text-grey"></i>
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

    <!-- Mitra yang Berpartisipasi dalam Komunitas CCI Section -->
    <div class="w-full h-full px-24 md:px-32 py-8 bg-white overflow-hidden flex flex-col justify-start items-center gap-8">
        <h2 class="text-center flex flex-col text-black text-4xl md:text-5xl font-semibold leading-[57.60px] break-words">
            Mitra yang Berpartisipasi Dalam Komunitas CCI
        </h2>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 md:gap-8 lg:gap-14 place-items-center">
            <div class="w-full max-w-[336px] md:max-w-full lg:max-w-[336px] flex items-center justify-center">
                <img class="w-full h-auto md:h-24 lg:h-[124px] object-contain" src={{ asset('images/assets/community/SIOEN_Marunda_1.png') }} alt="CCI Organization" />
            </div>
            <div class="w-full max-w-[257px] md:max-w-full lg:max-w-[257px] flex items-center justify-center">
                <img class="w-full h-auto md:h-24 lg:h-[119px] object-contain" src={{ asset('images/assets/community/univ.png') }} alt="CCI Organization" />
            </div>
            <div class="w-full max-w-[243px] md:max-w-full lg:max-w-[243px] flex items-center justify-center">
                <img class="w-full h-auto md:h-20 lg:h-[86px] object-contain" src={{ asset('images/assets/community/Vision.png') }} alt="CCI Organization" />
            </div>
            <div class="w-full max-w-[212px] md:max-w-full lg:max-w-[212px] flex items-center justify-center">
                <img class="w-full h-auto md:h-24 lg:h-[124px] object-contain" src={{ asset('images/assets/community/SenAd.png') }} alt="CCI Organization" />
            </div>
            <div class="w-full max-w-[212px] md:max-w-full lg:max-w-[212px] flex items-center justify-center">
                <img class="w-full h-auto md:h-24 lg:h-[124px] object-contain" src={{ asset('images/assets/community/cakrawala.jpeg') }} alt="CCI Organization" />
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="relative py-20 bg-cover bg-center"
        style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), url('{{ asset('images/assets/community/element.png') }}'), linear-gradient(180deg, rgba(46, 83, 150, 1) 0%, rgba(33, 46, 94, 1) 100%);"
        id="join_now">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
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
