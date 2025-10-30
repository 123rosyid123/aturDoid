@extends('layouts.app')

@section('title', 'AturDOit - Solusi Keuangan Digital Anda')

@section('content')
<!-- Hero Section -->
<section id="home" class="pt-24 pb-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Grow Your Money. Guide Your Friends. Win Together.
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                Kelola keuangan, pantau pengeluaran, dan kembangkan pengetahuan Anda. Ajukan satu, aplikasi. Dapatkan pengalaman terbaik untuk mencapai tujuan finansial Anda bersama komunitas tumbuh ke bersama komunitas.
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-all transform hover:scale-105">
                Daftar Sekarang
            </a>
        </div>

        <!-- Device Mockups -->
        <div class="flex justify-center items-center gap-8 mt-12">
            <div class="hidden lg:block">
                <div class="bg-gray-900 rounded-lg p-4 shadow-2xl" style="width: 400px; height: 280px;">
                    <div class="bg-white rounded h-full flex items-center justify-center">
                        <div class="text-center p-8">
                            <i class="fas fa-chart-line text-orange-500 text-6xl mb-4"></i>
                            <p class="text-gray-600">Dashboard Preview</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-gray-900 rounded-3xl p-3 shadow-2xl" style="width: 200px; height: 400px;">
                    <div class="bg-white rounded-2xl h-full flex items-center justify-center">
                        <div class="text-center p-6">
                            <i class="fas fa-mobile-alt text-orange-500 text-5xl mb-4"></i>
                            <p class="text-gray-600 text-sm">Mobile App</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Warren Buffett Quote Section -->
<section class="bg-orange-500 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="inline-block bg-gray-200 rounded-full p-2 mb-4">
                    <i class="fas fa-user-tie text-6xl text-gray-700"></i>
                </div>
            </div>
            <div class="text-white">
                <p class="text-2xl lg:text-3xl font-light mb-4">
                    "Making money is <span class="font-bold">action</span>
                </p>
                <p class="text-2xl lg:text-3xl font-light mb-4">
                    Keeping money is <span class="font-bold">behavior</span>
                </p>
                <p class="text-2xl lg:text-3xl font-light mb-6">
                    Growing money is <span class="font-bold">knowledge</span>"
                </p>
                <p class="text-xl italic">- Warren Buffett</p>
            </div>
        </div>
    </div>
</section>

<!-- Daily Problems Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    <span class="text-blue-600">Masalah Keuangan</span><br>
                    Sehari-hari dan Solusi<br>
                    dari aturDOit
                </h2>
                <p class="text-gray-600 mb-6">
                    Banyak orang menghadapi kesulitan dalam mengelola keuangan mereka. Kami di aturDOit memahami tantangan ini dan menyediakan solusi yang tepat untuk membantu Anda mencapai stabilitas finansial.
                </p>
                <a href="{{ route('register') }}" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg text-base font-semibold hover:bg-orange-600 transition-colors">
                    Gabung Sekarang
                </a>
            </div>

            <!-- Right Content - Orange Card -->
            <div class="bg-orange-500 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-4">
                    Tidak Punya Sistem Pengelolaan<br>
                    Keuangan yang Terstruktur
                </h3>
                <p class="mb-6">
                    Banyak orang tidak memiliki sistem yang jelas untuk mengelola uang mereka. Tanpa struktur yang baik, sulit untuk melacak pengeluaran dan mencapai tujuan finansial.
                </p>
                <div class="bg-white text-gray-900 rounded-lg p-6">
                    <h4 class="font-bold mb-3">Solusi dari aturDOit:</h4>
                    <p class="text-sm mb-4">
                        AturDOit menyediakan Smart Financial Tools yang mencatat pengeluaran dan pemasukan secara otomatis, sehingga Anda dapat dengan mudah melacak keuangan Anda. Dengan fitur ini, Anda dapat mengatur keuangan dengan lebih terstruktur dan mencapai tujuan finansial dengan lebih mudah.
                    </p>
                    <div class="flex justify-center space-x-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Bangun Jaringan dan<br>
                    <span class="text-orange-500">Dapatkan Penghasilan</span>
                </h2>
                <p class="text-gray-600 mb-8">
                    AturDOit menyediakan sistem afiliasi dengan struktur tingkat 3 generasi yang memungkinkan Anda mendapatkan penghasilan pasif. Semakin banyak orang yang Anda ajak bergabung, semakin besar potensi penghasilan Anda. Tidak hanya itu, bergabung dengan komunitas kami juga memberikan Anda akses ke berbagai peluang networking dan kolaborasi.
                </p>
            </div>

            <!-- Right Content - Incentive Plan -->
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-6">Rincian Insentif</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div>
                            <div class="font-bold">Gen 1 | 20%</div>
                            <div class="text-sm opacity-90">Komisi dari referral langsung</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <i class="fas fa-user-friends text-2xl"></i>
                        </div>
                        <div>
                            <div class="font-bold">Gen 2 | 5%</div>
                            <div class="text-sm opacity-90">Komisi dari referral tingkat 2</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <i class="fas fa-user text-2xl"></i>
                        </div>
                        <div>
                            <div class="font-bold">Gen 3 | 5%</div>
                            <div class="text-sm opacity-90">Komisi dari referral tingkat 3</div>
                        </div>
                    </div>
                </div>
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
