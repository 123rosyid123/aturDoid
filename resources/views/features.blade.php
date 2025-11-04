@extends('layouts.app')

@section('title', 'Features - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="pt-24 pb-12 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                        Kelola Keuangan Pribadi dan Profesional dalam Satu Aplikasi.
                    </h1>
                    <p class="text-lg mb-8 opacity-90">
                        Akses berbagai alat perencanaan, laporan, dan edukasi finansial yang membantu Anda memahami pengeluaran, mengatur anggaran, dan mengambil keputusan keuangan yang lebih baik, dan mencapai kemandiriian finansial!
                    </p>
                </div>

                <!-- Right Content - Image Placeholder -->
                <img src="{{ asset('images/assets/features/banner.png') }}" alt="">
            </div>
        </div>
    </section>

    <!-- Feature 1: Smart Financial Tools -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                <img src="{{ asset('images/assets/features/smart_financial_tools.png') }}" alt="" class="relative lg:scale-110 transform transition-transform duration-300 hover:scale-115">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent">
                        Smart Financial Tools
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4">
                        Catat pemasukan, pengeluaran, aset, dan kewajiban dengan mudah.
                        <br>
                        Dapatkan laporan arus kas, laporan keuangan, dan neraca pribadi otomatis dalam satu tampilan yang ringkas dan interaktif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 2: Edukasi Finansial Terpadu -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                        Edukasi Finansial Terpadu
                    </h2>
                    <p class="text-gray-700 mb-4 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                        Pelajari dasar-dasar pengelolaan uang melalui video singkat dan modul pembelajaran online.
                        Bangun pemahaman finansial dari hal sederhana hingga perencanaan jangka panjang.
                    </p>
                </div>

                <!-- Right Image -->
                    <img src="{{ asset('images/assets/features/financial_education.png') }}" alt="" class="relative lg:scale-110 ">
            </div>
        </div>
    </section>

    <!-- Feature 3: Profil Risiko dan Rasio Keuangan -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                    <img src="{{ asset('images/assets/features/riskimage.png') }}" alt="" class="relative lg:scale-110 origin-bottom-right">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl lg:text-4xl font-bold bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-6">
                        Profil Risiko dan Rasio Keuangan
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4">
                        Analisis kondisi keuangan Anda secara objektif.
                        <br>
                        Lihat rasio penting dan profil risiko untuk mengetahui seberapa sehat keuangan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 4: Sistem Afiliasi -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-6">
                        Sistem Afiliasi
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-4">
                        Dapatkan penghasilan tambahan dari jaringan referral hingga tiga generasi.
                        <br>Tidak perlu menjual produk atau memiliki stok — cukup bagikan link afiliasi Anda.
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                    <img src="{{ asset('images/assets/features/penasehat.png') }}" alt=""
                        class="relative lg:scale-100 origin-bottom-left">

                <!-- Right Content -->
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl lg:text-4xl font-bold bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-6">
                        Platform Penasehat Keuangan Profesional
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent mb-4">
                        Jika Anda seorang penasehat keuangan bersertifikat atau ahli, aturDOit menyediakan alat kerja digital untuk melayani klien secara profesional.
                        <br>
                        Termasuk fitur analisa keuangan, perhitungan kebutuhan asuransi, manajemen klien, perhitungan pajak, perencanaan dana pensiun, hingga legacy planning.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature 6: Koneksi Pengguna dan Penasehat Keuangan -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                        Koneksi Pengguna dan Penasehat Keuangan
                    </h2>
                    <p class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent mb-4">
                        AturDOit mempertemukan pengguna yang membutuhkan bimbingan keuangan dengan penasehat keuangan profesional bersertifikat ahli.
                        <br>Pengguna dapat memilih dan menggunakan layanan penasehat keuangan langsung melalui platform kami. Penasehat dapat mendapatkan marketplace digital untuk menawarkan jasa dan membangun reputasi profesional mereka.
                    </p>
                </div>

                <!-- Right Image -->
                    <img src="{{ asset('images/assets/features/koneksi.png') }}" alt="" class="relative lg:scale-100 origin-bottom-left">
            </div>
        </div>
    </section>

@endsection
