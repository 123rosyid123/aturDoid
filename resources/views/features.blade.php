@extends('layouts.app')

@section('title', 'Features - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="mt-16 pb-12 md:pb-0 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]">
        <div class=" mx-auto px-4 lg:pr-0 ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white pt-12 lg:pl-8 xl:pl-20 2xl:pl-40">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6 font-['Roboto']">
                        Kelola Keuangan Pribadi dan Profesional dalam Satu Aplikasi.
                    </h1>
                    <p class="text-lg lg:text-3xl mb-8 py-4 opacity-90 font-['Roboto']">
                        Akses berbagai alat perencanaan, laporan, dan edukasi finansial yang membantu Anda memahami
                        pengeluaran, mengatur anggaran, dan mengambil keputusan keuangan yang lebih baik, dan mencapai
                        kemandirian finansial!
                    </p>
                </div>

                <!-- Right Content - Image Placeholder -->
                <div class="h-full flex items-center">
                    <img src="{{ asset('images/assets/features/banner.png') }}" class="w-full h-full object-contain" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 1: Smart Financial Tools -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                <img src="{{ asset('images/assets/features/smart_financial_tools.png') }}" alt=""
                    class="relative lg:scale-110 transform transition-transform duration-300 hover:scale-115">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2
                        class="text-3xl lg:text-5xl font-bold mb-6 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent font-['Roboto']">
                        Smart Financial Tools
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4 font-['Roboto'] lg:text-3xl">
                        Catat pemasukan, pengeluaran, aset, dan kewajiban dengan mudah.
                        <br><br>
                        Dapatkan laporan arus kas, laporan keuangan, dan neraca pribadi otomatis dalam satu tampilan yang
                        ringkas dan interaktif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 2: Edukasi Finansial Terpadu -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2
                        class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent font-['Roboto']">
                        Edukasi Finansial Terpadu
                    </h2>
                    <p
                        class="text-gray-700 mb-4 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent font-['Roboto'] lg:text-3xl">
                        Pelajari dasar-dasar pengelolaan uang melalui video singkat dan modul pembelajaran online. <br><br>
                        Bangun pemahaman finansial dari hal sederhana hingga perencanaan jangka panjang.
                    </p>
                </div>

                <!-- Right Image -->
                <img src="{{ asset('images/assets/features/financial_education.png') }}" alt=""
                    class="relative lg:scale-110 ">
            </div>
        </div>
    </section>

    <!-- Feature 3: Profil Risiko dan Rasio Keuangan -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                <img src="{{ asset('images/assets/features/riskimage.png') }}" alt=""
                    class="relative lg:scale-110 origin-bottom-right">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2
                        class="text-3xl lg:text-5xl font-bold bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-6 font-['Roboto']">
                        Profil Risiko dan Rasio Keuangan
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4 font-['Roboto'] lg:text-3xl">
                        Analisis kondisi keuangan Anda secara objektif.
                        <br><br>
                        Lihat rasio penting dan profil risiko untuk mengetahui seberapa sehat keuangan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 4: Sistem Afiliasi -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2
                        class="text-3xl lg:text-5xl font-bold bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-6 font-['Roboto']">
                        Sistem Afiliasi
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-4 font-['Roboto'] lg:text-3xl">
                        Dapatkan penghasilan tambahan dari jaringan referral hingga tiga generasi.
                        <br><br>Tidak perlu menjual produk atau memiliki stok — cukup bagikan link afiliasi Anda.
                    </p>
                </div>

                <!-- Right Image -->
                <img src="{{ asset('images/assets/features/afiliasi.png') }}" alt=""
                    class="relative lg:scale-110 origin-bottom-left">
            </div>
        </div>
    </section>

    <!-- Feature 5: Platform Penasehat Keuangan Profesional -->
    <section class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                <img src="{{ asset('images/assets/features/penasehat.png') }}" alt=""
                    class="relative lg:scale-100 origin-bottom-left">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2
                        class="text-3xl lg:text-5xl font-bold bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-6 font-['Roboto']">
                        Platform Penasehat Keuangan Profesional
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4 font-['Roboto'] lg:text-3xl">
                        Jika Anda seorang penasehat keuangan bersertifikat atau ahli, aturDOit menyediakan alat kerja
                        digital untuk melayani klien secara profesional.
                        <br><br>
                        Termasuk fitur analisa keuangan, perhitungan kebutuhan asuransi, manajemen klien, perhitungan pajak,
                        perencanaan dana pensiun, hingga legacy planning.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 6: Koneksi Pengguna dan Penasehat Keuangan -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2
                        class="text-3xl lg:text-5xl font-bold mb-6 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent font-['Roboto']">
                        Koneksi Pengguna dan Penasehat Keuangan
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-4 font-['Roboto'] lg:text-3xl">
                        AturDOit mempertemukan pengguna yang membutuhkan bimbingan keuangan dengan penasehat keuangan
                        profesional bersertifikat ahli.
                        <br><br>Pengguna dapat memilih dan menggunakan layanan penasehat keuangan langsung melalui platform
                        kami. Penasehat dapat mendapatkan marketplace digital untuk menawarkan jasa dan membangun reputasi
                        profesional mereka.
                    </p>
                </div>

                <!-- Right Image -->
                <img src="{{ asset('images/assets/features/koneksi.png') }}" alt=""
                    class="relative lg:scale-100 origin-bottom-left">
            </div>
        </div>
    </section>

@endsection
