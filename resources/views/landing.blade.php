@extends('layouts.app')

@section('title', 'AturDOit - Solusi Keuangan Digital Anda')

@section('content')
<!-- Hero Section -->
<section id="home" class="py-16 lg:py-24 bg-white relative overflow-hidden min-h-screen flex items-center">
    <!-- Background Elements -->
    <div class="absolute top-32 lg:top-64 left-8 lg:left-32 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>
    <div class="absolute top-32 lg:top-64 right-8 lg:right-80 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-8 lg:mb-16">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 mb-6 lg:mb-8 leading-tight tracking-tight">
                Grow Your Money. Guide Your Friends. Win Together.
            </h1>
            <p class="text-base lg:text-xl xl:text-2xl text-gray-600 max-w-3xl lg:max-w-4xl mx-auto mb-8 lg:mb-12 leading-relaxed px-4">
                Kelola keuangan, pantau pengeluaran, dan kembangkan penghasilan Anda dalam satu aplikasi. Dapatkan keuntungan tambahan lewat sistem referal yang memberi Anda peluang untuk tumbuh bersama komunitas.
            </p>
            <div class="flex justify-center">
                <a href="{{ route('register') }}" class="inline-block cursor-pointer">
                    <img src="{{ asset('images/button-daftar.png') }}" alt="Daftar Sekarang" class="max-w-full h-auto">
                </a>
            </div>
        </div>

        <!-- Device Mockup -->
        <div class="flex justify-center items-center mt-12 lg:mt-16">
            <div class="cursor-pointer">
                <img src="{{ asset('images/device.png') }}" alt="AturDOit App Dashboard" class="max-w-full h-auto rounded-lg shadow-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Warren Buffett Quote Section -->
<section class="bg-gradient-to-r from-orange-500 to-red-600 py-20 lg:py-32 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-64 lg:top-96 left-32 lg:left-64 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-10 blur-3xl"></div>
    <div class="absolute top-64 lg:top-96 right-80 lg:right-96 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-10 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center">
            <div class="cursor-pointer">
                <img src="{{ asset('images/Quote.png') }}" alt="Warren Buffett Quote" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</section>

<!-- Daily Problems Section -->
<section class="py-20 lg:py-32 bg-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-64 lg:top-96 right-32 lg:right-64 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>
    <div class="absolute top-64 lg:top-96 left-80 lg:left-32 w-32 lg:w-48 h-40 lg:h-60 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="order-2 lg:order-1">
                <h2 class="text-3xl lg:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 lg:mb-8 leading-tight">
                    <span class="bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Masalah Keuangan</span><br>
                    Sehari-hari dan Solusi<br>
                    dari aturDOit
                </h2>
                <p class="text-base lg:text-xl text-gray-600 mb-8 lg:mb-12 leading-relaxed">
                    Kami memahami tantangan yang sering dihadapi banyak orang dalam mengelola keuangan. Karena itu, aturDOit dirancang untuk menjadi solusi yang nyata dan menyeluruh.
                </p>
                <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white px-6 lg:px-8 py-3 lg:py-4 rounded-xl lg:rounded-2xl text-base lg:text-lg font-semibold hover:from-orange-600 hover:to-red-700 transition-all transform hover:scale-105 shadow-lg">
                    Tangani Masalah Anda →
                </a>
            </div>

            <!-- Right Content - Orange Card -->
            <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl lg:rounded-3xl p-6 lg:p-12 text-white shadow-2xl order-1 lg:order-2">
                <h3 class="text-xl lg:text-3xl font-bold mb-4 lg:mb-8 leading-tight">
                    Tidak Punya Sistem Pengelolaan Keuangan yang Terarah
                </h3>
                <p class="text-base lg:text-lg mb-6 lg:mb-8 leading-relaxed opacity-90">
                    Sebagian besar orang masih mengandalkan pencatatan manual atau aplikasi terpisah, sehingga sulit memahami kondisi keuangan secara menyeluruh.
                </p>
                <div class="bg-white text-gray-900 rounded-xl lg:rounded-2xl p-6 lg:p-8">
                    <h4 class="text-lg lg:text-xl font-bold mb-4 lg:mb-6">Solusi dari aturDOit:</h4>
                    <p class="text-sm lg:text-base leading-relaxed mb-4">
                        AturDOit menyediakan Smart Financial Tools yang mencatat pemasukan, pengeluaran, aset, dan kewajiban yang secara otomatis akan menyusun laporan keuangan pribadi beserta analisa keuangan dan rekomendasi dari penasehat keuangan yg bersertifikasi dan ditampilkan dalam dashboard yang mudah dipahami.
                    </p>
                    <div class="flex justify-center space-x-2">
                        <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Fitur Utama aturDOit
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Kelola keuangan lebih mudah, dan rapatkan keuntungan bersama-sama!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl text-center hover:shadow-lg transition-shadow">
                <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clipboard-list text-orange-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Financial Tools</h3>
                <p class="text-gray-600 text-sm">
                    Catat pemasukan, pengeluaran, serta alat keuangan yang membantu Anda mengelola uang dengan lebih efisien. Dengan fitur ini, Anda dapat melacak keuangan dengan lebih terstruktur dan mencapai tujuan finansial dengan lebih mudah.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl text-center hover:shadow-lg transition-shadow">
                <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-orange-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Edukasi Finansial</h3>
                <p class="text-gray-600 text-sm">
                    Pelajari pengelolaan keuangan secara cerdas melalui artikel, video, dan webinar dari para ahli keuangan. Tingkatkan pengetahuan Anda tentang investasi, tabungan, dan strategi keuangan yang efektif untuk mencapai kebebasan finansial.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl text-center hover:shadow-lg transition-shadow">
                <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-link text-orange-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Sistem Afiliasi</h3>
                <p class="text-gray-600 text-sm">
                    Hasilkan pendapatan tambahan melalui sistem afiliasi kami. Ajak teman-teman untuk bergabung dan dapatkan komisi dari setiap transaksi mereka. Semakin banyak Anda mengajak, semakin besar penghasilan Anda!
                </p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('features') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                Jelajahi Sekarang
            </a>
        </div>
    </div>
</section>

<!-- Network Section -->
<section id="community" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center">
            <div class="cursor-pointer">
                <img src="{{ asset('images/Insentive.png') }}" alt="AturDOit Insentive Plan" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Logo -->
            <div class="flex justify-center">
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-12 shadow-2xl">
                    <div class="text-white text-center">
                        <i class="fas fa-chart-line text-6xl mb-4"></i>
                        <div class="text-4xl font-bold">atur<span class="text-blue-900">DOit</span></div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="text-white">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                    Saatnya Mulai<br>
                    Mengubah Cara Anda<br>
                    Mengatur Keuangan
                </h2>
                <p class="text-lg mb-8 opacity-90">
                    Bergabung Anda dapat lebih mudah dalam mengelola keuangan Anda dengan lebih baik. Dengan fitur-fitur yang kami sediakan, Anda dapat mencapai tujuan finansial Anda dengan lebih mudah. Bergabunglah dengan komunitas kami sekarang!
                </p>
                <a href="{{ route('register') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function scrollToSection(sectionId) {
        document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
    }
</script>
@endpush
