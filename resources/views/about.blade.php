@extends('layouts.app')

@section('title', 'About Us - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden w-full bg-cover bg-center" style="background-image: url('{{ asset('images/assets/about/hero.png') }}'); box-shadow: inset 0px -35px 54.7px 0px #000000;">
        <!-- Overlay hitam semi-transparan (opsional) -->
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-32 lg:py-40">
            <div class="text-white space-y-6 lg:space-y-8">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight" style="font-family: 'Roboto', sans-serif;">
                    About Us
                </h1>
                <p class="text-lg sm:text-xl lg:text-3xl font-light leading-relaxed max-w-6xl" style="font-family: 'Roboto', sans-serif;">
                    <span class="font-bold">AturDOit</span> adalah platform manajemen keuangan dan edukasi finansial yang membantu individu dan profesional memahami, mengatur, serta mengembangkan kondisi keuangannya secara cerdas dan terarah.<br><br>
                    Kami percaya bahwa literasi keuangan bukan hanya soal angka — tetapi tentang membangun kebiasaan, mindset, dan strategi hidup yang berkelanjutan.
                </p>
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"></div>
        <!-- Visi Section -->
        <div class=" relative mx-auto px-4 sm:px-6 lg:px-24 pb-24">
            <!-- Visi Badge -->
            <div class="absolute left-4 sm:left-8 lg:left-40 sm:-top-5 lg:-top-5 z-20">
                <div class="rounded-2xl sm:rounded-3xl px-8 sm:px-12 lg:px-16 py-2 sm:py-3 lg:py-4 shadow-2xl" style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%), linear-gradient(180deg, rgb(46, 83, 150) 0%, rgb(33, 46, 94) 99.98%);">
                    <h2 class="text-3xl sm:text-4xl lg:text-6xl font-extrabold text-white tracking-wider" style="font-family: 'Roboto', sans-serif; letter-spacing: 2px;">
                        Visi
                    </h2>
                </div>
            </div>

            <!-- Visi Content -->
            <div class="relative pt-8 sm:pt-10 lg:pt-8">
                <div class="rounded-tr-[60px] rounded-br-[60px] sm:rounded-tr-[80px] sm:rounded-br-[80px] lg:rounded-tr-[100px] lg:rounded-br-[100px] py-12 sm:py-16 lg:py-20 pl-8 sm:pl-16 lg:pl-32 pr-4 sm:pr-8 lg:pr-12 shadow-2xl w-full lg:max-w-5xl" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%);">
                    <p class="text-white text-lg sm:text-xl lg:text-3xl font-light leading-relaxed" style="font-family: 'Roboto', sans-serif;">
                        Menjadi ekosistem finansial digital yang memberdayakan masyarakat untuk mencapai kemandirian dan kesejahteraan finansial melalui teknologi, edukasi, dan komunitas.
                    </p>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>

    <!-- Misi Section -->
    <section class="relative py-20 sm:py-28 lg:py-32 overflow-visible w-full" style="box-shadow: 0px 2px 33.5px 0px rgba(0,0,0,0.46); background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, rgba(46, 83, 150, 1) 0%, rgba(33, 46, 94, 1) 100%);">
        <!-- Langkah Kami Badge -->
        <div class="absolute left-1/2 -translate-x-1/2 -top-10 sm:-top-12 lg:-top-14 z-20">
            <div class="rounded-2xl sm:rounded-3xl px-8 sm:px-12 lg:px-16 py-2 sm:py-3 lg:py-4 shadow-2xl" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%);">
                <h2 class="text-3xl sm:text-4xl lg:text-6xl font-extrabold text-white whitespace-nowrap" style="font-family: 'Roboto', sans-serif;">
                    Langkah Kami
                </h2>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12">
            <div class="rounded-3xl p-4 sm:p-8 lg:p-16" >
                <!-- First Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-6 lg:mb-8">
                    <!-- Card 1: Literasi Finansial -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-book text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6" style="font-family: 'Roboto', sans-serif;">
                            Literasi Finansial
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Meningkatkan pemahaman dan kesadaran finansial masyarakat Indonesia agar dapat mengelola uang dengan lebih bijak dan terencana.
                        </p>
                    </div>

                    <!-- Card 2: Solusi Digital -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-cogs text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6" style="font-family: 'Roboto', sans-serif;">
                            Solusi Digital
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Menyediakan alat praktis dan aman untuk membantu pengelolaan keuangan pribadi maupun profesional, kapan pun dan di mana pun.
                        </p>
                    </div>

                    <!-- Card 3: Koneksi Advisor -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-user-tie text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6" style="font-family: 'Roboto', sans-serif;">
                            Koneksi Advisor
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Menghubungkan pengguna dengan penasehat keuangan bersertifikat agar edukasi dan layanan finansial lebih mudah diakses dan terpercaya.
                        </p>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Card 4: Komunitas Finansial -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-users text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6" style="font-family: 'Roboto', sans-serif;">
                            Komunitas Finansial
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Membangun komunitas pembelajar aktif melalui CCI (Cashflow Club Indonesia) untuk belajar, berbagi, dan bertumbuh bersama menuju kemandirian finansial.
                        </p>
                    </div>

                    <!-- Card 5: Pengembangan Karier Finansial -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-certificate text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6 text-center" style="font-family: 'Roboto', sans-serif;">
                            Pengembangan<br class="hidden sm:block">Karier Finansial
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Memberikan peluang bagi pengguna untuk berkembang menjadi advisor profesional melalui sistem dukungan, sertifikasi, dan pelatihan berkelanjutan.
                        </p>
                    </div>

                    <!-- Card 6: Kolaborasi & Inovasi -->
                    <div class="rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col items-center text-center justify-start min-h-[400px] sm:min-h-[450px] lg:min-h-[500px]" style="background: linear-gradient(180deg, #f78422 2.033%, #e1291c 119.27%); box-shadow: 2px 2px 16px 0px rgba(0,0,0,0.25);">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-30 lg:h-30 mb-6 lg:mb-8 flex items-center justify-center">
                            <i class="fas fa-handshake text-white text-6xl sm:text-7xl lg:text-8xl"></i>
                        </div>
                        <h3 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 lg:mb-6" style="font-family: 'Roboto', sans-serif;">
                            Kolaborasi & Inovasi
                        </h3>
                        <p class="text-white text-base sm:text-lg lg:text-xl font-light leading-normal" style="font-family: 'Roboto', sans-serif;">
                            Terus berinovasi dan berkolaborasi dengan lembaga pendidikan, komunitas, dan mitra profesional guna menciptakan ekosistem finansial digital yang berkelanjutan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
