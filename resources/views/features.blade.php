@extends('layouts.app')

@section('title', 'Features - AturDOit')

@section('content')
<!-- Hero Section -->
<section class="pt-24 pb-12 bg-gradient-to-r from-orange-500 to-orange-600">
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
            <div class="bg-white bg-opacity-20 rounded-2xl p-8 backdrop-blur-sm">
                <div class="bg-white rounded-xl p-6 text-center">
                    <i class="fas fa-hand-holding-usd text-orange-500 text-6xl mb-4"></i>
                    <p class="text-gray-700 font-semibold">Financial Management</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature 1: Smart Financial Tools -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Image -->
            <div class="bg-blue-900 rounded-3xl p-8 order-2 lg:order-1">
                <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="text-center text-white">
                        <i class="fas fa-calculator text-6xl mb-4"></i>
                        <p class="text-lg font-semibold">Financial Calculator</p>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="order-1 lg:order-2">
                <h2 class="text-3xl lg:text-4xl font-bold text-orange-500 mb-6">
                    Smart Financial Tools
                </h2>
                <p class="text-gray-700 mb-4">
                    Catat pemasukan, pengeluaran, aset, dan kewajiban dengan mudah.
                </p>
                <p class="text-gray-600">
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
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Edukasi Finansial Terpadu
                </h2>
                <p class="text-gray-700 mb-4">
                    Pelajari dasar-dasar pengelolaan uang melalui video singkat dan modul pembelajaran online.
                </p>
                <p class="text-gray-600">
                    Bangun pemahaman finansial dari hal sederhana hingga perencanaan jangka panjang.
                </p>
            </div>

            <!-- Right Image -->
            <div class="bg-gradient-to-br from-orange-100 to-orange-200 rounded-3xl p-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-book-reader text-orange-500 text-6xl mb-4"></i>
                        <p class="text-gray-700 font-semibold">Learn & Grow</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature 3: Profil Risiko dan Rasio Keuangan -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Image -->
            <div class="bg-blue-900 rounded-3xl p-8 order-2 lg:order-1">
                <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="text-center text-white">
                        <i class="fas fa-chart-pie text-6xl mb-4"></i>
                        <p class="text-lg font-semibold">Risk Analysis</p>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="order-1 lg:order-2">
                <h2 class="text-3xl lg:text-4xl font-bold text-orange-500 mb-6">
                    Profil Risiko dan Rasio Keuangan
                </h2>
                <p class="text-gray-700 mb-4">
                    Analisis kondisi keuangan Anda secara objektif.
                </p>
                <p class="text-gray-600">
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
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Sistem Afiliasi
                </h2>
                <p class="text-gray-700 mb-4">
                    Dapatkan penghasilan tambahan dari jaringan referral hingga tiga generasi.
                </p>
                <p class="text-gray-600">
                    Tidak perlu menjual produk atau memiliki stok — cukup bagikan link afiliasi Anda.
                </p>
            </div>

            <!-- Right Image -->
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-8">
                <div class="bg-white bg-opacity-20 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="text-center text-white">
                        <i class="fas fa-users text-6xl mb-4"></i>
                        <p class="text-lg font-semibold">Referral Network</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature 5: Platform Penasehat Keuangan Profesional -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Image -->
            <div class="bg-gray-200 rounded-3xl p-8 order-2 lg:order-1">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-user-tie text-orange-500 text-6xl mb-4"></i>
                        <p class="text-gray-700 font-semibold">Professional Advisor</p>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="order-1 lg:order-2">
                <h2 class="text-3xl lg:text-4xl font-bold text-orange-500 mb-6">
                    Platform Penasehat Keuangan Profesional
                </h2>
                <p class="text-gray-700 mb-4">
                    Jika Anda seorang penasehat keuangan bersertifikat atau ahli, aturDOit menyediakan alat kerja digital untuk melayani klien secara profesional.
                </p>
                <p class="text-gray-600">
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
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Koneksi Pengguna dan Penasehat Keuangan
                </h2>
                <p class="text-gray-700 mb-4">
                    AturDOit mempertemukan pengguna yang membutuhkan bimbingan keuangan dengan penasehat keuangan profesional bersertifikat ahli.
                </p>
                <p class="text-gray-600">
                    Pengguna dapat memilih dan menggunakan layanan penasehat keuangan langsung melalui platform kami. Penasehat dapat mendapatkan marketplace digital untuk menawarkan jasa dan membangun reputasi profesional mereka.
                </p>
            </div>

            <!-- Right Image -->
            <div class="bg-gradient-to-br from-orange-100 to-orange-200 rounded-3xl p-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-handshake text-orange-500 text-6xl mb-4"></i>
                        <p class="text-gray-700 font-semibold">Connect & Consult</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
            Siap Mengatur Keuangan Anda dengan Lebih Baik?
        </h2>
        <p class="text-lg text-white opacity-90 mb-8 max-w-2xl mx-auto">
            Bergabunglah dengan ribuan pengguna yang sudah merasakan manfaat aturDOit dalam mengelola keuangan mereka.
        </p>
        <a href="{{ route('register') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
            Daftar Sekarang Gratis
        </a>
    </div>
</section>
@endsection
