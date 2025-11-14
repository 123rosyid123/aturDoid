@extends('layouts.app')

@section('title', 'AturDOit - Solusi Keuangan Digital Anda')

@section('content')
    <!-- Hero Section -->
    <section
        class="w-full min-h-screen bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] pb-5 pt-20 lg:pt-0 overflow-hidden flex flex-col items-center justify-start">
        <div class="w-full max-w-[1600px] flex-1 flex flex-col items-center justify-start gap-8 lg:gap-[35px] py-12 lg:py-30">
            <!-- Hero Title -->
            <h1
                class="w-full text-center text-black text-3xl sm:text-4xl lg:text-5xl xl:text-[64px] font-bold font-['Roboto'] leading-tight">
                Grow Your Money. Guide Your Friends. Win Together.
            </h1>

            <!-- Hero Subtitle -->
            <p
                class="w-full text-center text-black text-base sm:text-lg lg:text-2xl xl:text-[26px] font-normal font-['Roboto'] leading-relaxed lg:leading-[40px]">
                Kelola keuangan, pantau pengeluaran, dan kembangkan penghasilan Anda dalam satu aplikasi. Dapatkan
                keuntungan tambahan lewat sistem referal yang memberi Anda peluang untuk tumbuh bersama komunitas.
            </p>

            <!-- CTA Button -->
            <div class="flex justify-center items-center gap-6">
                <a href="{{ route('register') }}"
                    class="px-8 lg:px-[35px] py-4 lg:py-5 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] rounded-[14px] text-center text-white text-lg lg:text-xl font-normal font-['Roboto'] leading-7 hover:scale-105 transition-transform duration-300">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Hero Images with Blur Effects -->
            <div class="w-full flex-1 relative flex justify-center items-center gap-4 p-4 min-h-[400px] lg:min-h-[500px]">
                <!-- Blur Effect Right -->
                <div
                    class="absolute right-[10%] lg:right-[15%] top-[20%] w-32 h-48 lg:w-[189px] lg:h-[239px] bg-[linear-gradient(180deg,#F7863D_0%,#E76126_100%)] blur-[150px] opacity-50 z-0">
                </div>

                <!-- Blur Effect Left -->
                <div
                    class="absolute left-[10%] lg:left-[20%] top-[20%] w-32 h-48 lg:w-[187px] lg:h-[239px] bg-[linear-gradient(180deg,#F7863D_0%,#E76126_100%)] rounded-full blur-[150px] opacity-50 z-0">
                </div>

                <!-- Hero Images -->
                <img class="relative z-10 w-full max-w-[500px] lg:max-w-[600px] h-auto object-contain"
                    src="{{ asset('images/assets/home/laptop.png') }}" alt="AturDOit Dashboard" />
                <img class="relative z-10 hidden sm:block w-auto max-w-[150px] lg:max-w-[180px] h-auto object-contain"
                    src="{{ asset('images/assets/home/mobile.png') }}" alt="AturDOit Mobile" />
            </div>
        </div>
    </section>

    <!-- Quote Section - Warren Buffett -->
    <section class="w-full min-h-[400px] lg:min-h-[600px] relative flex justify-between items-end pt-20 lg:pt-20">
        <!-- Background with Gradient -->
        <div
            class="flex-1 h-full min-h-[400px] lg:h-[600px] px-8 sm:px-12 lg:px-32 xl:px-[160px] relative bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] flex justify-end items-center">
            <!-- Quote Content -->
            <div class="relative z-10 flex flex-col justify-center items-end gap-8 lg:gap-[63px] py-12 lg:py-0">
                <div
                    class="text-white text-2xl sm:text-3xl lg:text-5xl xl:text-[64px] font-['Roboto'] italic leading-tight lg:leading-[104px] text-right">
                    <span class="font-normal">Making money is</span>
                    <span class="font-extrabold"> action</span><br />
                    <span class="font-normal">Keeping money is</span>
                    <span class="font-extrabold"> behavior</span><br />
                    <span class="font-normal">Growing money is</span>
                    <span class="font-extrabold"> knowledge</span>
                </div>
                <div
                    class="text-center text-white text-2xl sm:text-3xl lg:text-5xl font-['Roboto'] italic font-normal leading-tight lg:leading-[104px]">
                    - Warren Buffett
                </div>
            </div>

            <!-- Quote Marks -->
            <div
                class="absolute left-[5%] lg:left-[42%] top-[10%] lg:top-[106px] text-white text-4xl lg:text-[64px] font-['Roboto'] italic font-semibold leading-[104px] opacity-30">
                "
            </div>
            <div
                class="absolute right-[5%] lg:right-[8%] bottom-[20%] lg:top-[403px] text-white text-4xl lg:text-[64px] font-['Roboto'] italic font-semibold leading-[104px] opacity-30">
                "
            </div>
        </div>

        <!-- Side Image - Warren Buffett -->
        <img class="hidden lg:block absolute left-4 xl:left-12 bottom-0 w-auto max-w-[350px] xl:max-w-[500px] h-auto object-contain"
            src="{{ asset('images/assets/home/warrent.png') }}" alt="Financial Success" />
    </section>

    <!-- Problems & Solutions Section -->
    <section
        class="w-full min-h-[600px] lg:min-h-[800px] px-6 sm:px-12 lg:px-24 xl:px-[100px] relative overflow-hidden flex justify-center items-center mt-32 lg:mt-[200px]">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="order-2 lg:order-1">
                    <h2
                        class="text-3xl lg:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 lg:mb-8 leading-tight bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                        Masalah Keuangan
                        Sehari-hari dan Solusi
                        dari aturDOit
                    </h2>
                    <p
                        class="text-base lg:text-xl text-gray-600 mb-8 lg:mb-12 leading-relaxed bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                        Kami memahami tantangan yang sering dihadapi banyak orang dalam mengelola keuangan. Karena itu,
                        aturDOit dirancang untuk menjadi solusi yang nyata dan menyeluruh.
                    </p>
                    <a href="{{ route('register') }}"
                        class="inline-block bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white px-6 lg:px-8 py-3 lg:py-4 rounded-xl lg:rounded-2xl text-base lg:text-lg font-semibold hover:from-orange-600 hover:to-red-700 transition-all transform hover:scale-105 shadow-lg">
                        Tangani Masalah Anda →
                    </a>
                </div>

                <!-- Right Content - Orange Card -->
                <div
                    class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] rounded-2xl lg:rounded-3xl p-6 lg:p-12 text-white shadow-2xl order-1 lg:order-2">
                    <h3 class="text-xl lg:text-3xl font-bold mb-4 lg:mb-8 leading-tight">
                        Tidak Punya Sistem Pengelolaan Keuangan yang Terarah
                    </h3>
                    <p class="text-base lg:text-lg mb-6 lg:mb-8 leading-relaxed opacity-90">
                        Sebagian besar orang masih mengandalkan pencatatan manual atau aplikasi terpisah, sehingga sulit
                        memahami kondisi keuangan secara menyeluruh.
                    </p>
                    <div class="text-center text-white rounded-xl lg:rounded-2xl p-6 lg:p-8">
                        <h4 class="text-lg lg:text-xl font-bold mb-4 lg:mb-6">Solusi dari aturDOit:</h4>
                        <p class="text-sm lg:text-base leading-relaxed mb-4">
                            AturDOit menyediakan Smart Financial Tools yang mencatat pemasukan, pengeluaran, aset, dan
                            kewajiban yang secara otomatis akan menyusun laporan keuangan pribadi beserta analisa keuangan
                            dan rekomendasi dari penasehat keuangan yang bersertifikasi dan ditampilkan dalam dashboard yang
                            mudah dipahami.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Utama Section -->
    <section
        class="w-full min-h-screen py-20 px-6 sm:px-12 lg:px-24 xl:px-[100px] bg-white overflow-visible flex flex-col items-center justify-start mt-32 lg:mt-[200px]">
        <!-- Header -->
        <div class="w-full max-w-[1600px] mx-auto flex flex-col lg:flex-row justify-between items-center gap-8 mb-12">
            <div class="flex flex-col justify-center items-center gap-4 flex-1">
                <h2
                    class="text-center text-[#2E5396] text-3xl sm:text-4xl lg:text-5xl xl:text-[64px] font-bold font-['Roboto'] leading-tight bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">
                    Fitur Utama aturDOit
                </h2>
                <p
                    class="w-full max-w-[1112px] text-center text-black text-lg sm:text-xl lg:text-2xl xl:text-[26px] font-normal font-['Roboto'] leading-relaxed lg:leading-[40px]">
                    Kelola keuangan lebih mudah, dari pencatatan hingga bimbingan profesional.
                </p>
            </div>
            <div class="flex justify-center items-center">
                <a href="{{ route('features') }}"
                    class="px-6 lg:px-[20px] py-4 lg:py-4 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] rounded-[14px] text-center text-white text-l lg:text-l font-normal font-['Roboto'] leading-7 hover:scale-105 transition-transform duration-300">
                    Baca Selengkapnya →
                </a>
            </div>
        </div>

        <!-- Features Cards Carousel -->
        <div class="w-full h-full max-w-[1600px] mx-auto relative pt-20 pb-8" x-data="{
                        currentSlide: 0,
                        getTotalSlides() {
                            return window.innerWidth >= 768 ? 3 : 5;
                        },
                        getTranslateValue() {
                            if (window.innerWidth >= 768) {
                                return this.currentSlide * 33.333;
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

            <!-- Carousel Container -->
            <div class="overflow-hidden pt-20 pb-4">
                <div class="flex transition-transform duration-500 ease-in-out"
                    :style="`transform: translateX(-${getTranslateValue()}%)`">

                    <!-- Feature Card 1: Smart Financial Tools -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4 md:px-4">
                        <div
                            class="bg-white shadow-lg rounded-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                            <div class="p-8 pt-20 min-h-[500px] flex flex-col gap-6 relative">
                                <!-- Icon Circle -->
                                <div
                                    class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-chart-line text-white text-5xl"></i>
                                </div>

                                <h3
                                    class="text-center text-gray-900 text-2xl lg:text-3xl font-bold font-['Roboto'] leading-tight">
                                    Smart Financial Tools
                                </h3>

                                <p
                                    class="text-center text-gray-700 text-base lg:text-lg font-normal font-['Roboto'] leading-relaxed flex-1 flex items-center justify-center">
                                    Catat pemasukan, pengeluaran, aset, dan kewajiban dengan cepat dan akurat. Setiap
                                    transaksi otomatis tersusun dalam laporan keuangan lengkap, termasuk arus kas dan neraca
                                    pribadi. Tampilan interaktifnya memudahkan Anda memantau kondisi keuangan kapan pun
                                    tanpa perlu latar belakang akuntansi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2: Edukasi Finansial -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div
                            class="bg-white shadow-lg rounded-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                            <div class="p-8 pt-20 min-h-[500px] flex flex-col gap-6 relative">
                                <!-- Icon Circle -->
                                <div
                                    class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-graduation-cap text-white text-5xl"></i>
                                </div>

                                <h3
                                    class="text-center text-gray-900 text-2xl lg:text-3xl font-bold font-['Roboto'] leading-tight">
                                    Edukasi Finansial
                                </h3>

                                <p
                                    class="text-center text-gray-700 text-base lg:text-lg font-normal font-['Roboto'] leading-relaxed flex-1 flex items-center justify-center">
                                    Pelajari pengelolaan keuangan lewat video dan modul singkat yang mudah dipahami.
                                    Materinya mencakup dasar-dasar finansial, perencanaan keuangan pribadi, hingga strategi
                                    investasi sederhana. Dirancang agar pengguna dapat belajar mandiri dan membangun
                                    kebiasaan finansial yang lebih teratur.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3: Sistem Afiliasi -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div
                            class="bg-white shadow-lg rounded-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                            <div class="p-8 pt-20 min-h-[500px] flex flex-col gap-6 relative">
                                <!-- Icon Circle -->
                                <div
                                    class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-users text-white text-5xl"></i>
                                </div>

                                <h3
                                    class="text-center text-gray-900 text-2xl lg:text-3xl font-bold font-['Roboto'] leading-tight">
                                    Sistem Afiliasi
                                </h3>

                                <p
                                    class="text-center text-gray-700 text-base lg:text-lg font-normal font-['Roboto'] leading-relaxed flex-1 flex items-center justify-center">
                                    Hasilkan pendapatan tambahan melalui sistem afiliasi tiga level yang transparan dan
                                    mudah dijalankan. Bagikan link referral Anda dan dapatkan komisi setiap kali jaringan
                                    Anda bertransaksi premium. Model ini membuka peluang penghasilan pasif tanpa perlu
                                    menjual produk atau memiliki stok.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 4: Platform Advisor Profesional -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div
                            class="bg-white shadow-lg rounded-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                            <div class="p-8 pt-20 min-h-[500px] flex flex-col gap-6 relative">
                                <!-- Icon Circle -->
                                <div
                                    class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-briefcase text-white text-5xl"></i>
                                </div>

                                <h3
                                    class="text-center text-gray-900 text-2xl lg:text-3xl font-bold font-['Roboto'] leading-tight">
                                    Platform Advisor Profesional
                                </h3>

                                <p
                                    class="text-center text-gray-700 text-base lg:text-lg font-normal font-['Roboto'] leading-relaxed flex-1 flex items-center justify-center">
                                    Bagi penasehat keuangan bersertifikat, aturDOit menyediakan ruang kerja digital yang
                                    lengkap dan efisien. Akses alat profesional seperti analisa keuangan, perhitungan
                                    asuransi, penilaian aset, hingga perencanaan pensiun dan warisan. Semua terintegrasi
                                    untuk membantu advisor melayani klien dengan profesionalisme tinggi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 5: Koneksi Pengguna & Advisor -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div
                            class="bg-white shadow-lg rounded-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                            <div class="p-8 pt-20 min-h-[500px] flex flex-col gap-6 relative">
                                <!-- Icon Circle -->
                                <div
                                    class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-handshake text-white text-5xl"></i>
                                </div>

                                <h3
                                    class="text-center text-gray-900 text-2xl lg:text-3xl font-bold font-['Roboto'] leading-tight">
                                    Koneksi Pengguna & Advisor
                                </h3>

                                <p
                                    class="text-center text-gray-700 text-base lg:text-lg font-normal font-['Roboto'] leading-relaxed flex-1 flex items-center justify-center">
                                    AturDOit mempertemukan pengguna yang membutuhkan bimbingan finansial dengan penasehat
                                    keuangan profesional. Pengguna dapat memilih dan menggunakan layanan advisor langsung
                                    melalui marketplace, sementara para advisor memperluas jaringan dan membangun reputasi
                                    di komunitas finansial digital.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : getTotalSlides() - 1"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:opacity-80 transition-opacity">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button @click="currentSlide = currentSlide < getTotalSlides() - 1 ? currentSlide + 1 : 0"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:opacity-80 transition-opacity">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Affiliate Network Section -->
    <section
        class="w-full min-h-screen overflow-hidden flex justify-end items-center mt-32 lg:mt-[0px] relative px-6 sm:px-6 lg:px-0 lg:pr-0">
        <div
            class="w-full flex flex-col lg:flex-row justify-between lg:pl-28 xl:pl-32 2xl:pl-50 items-center gap-8 lg:gap-12">
            <!-- Left Side - White Background with Text -->
            <div class="w-full lg:flex-1 bg-white flex flex-col justify-center items-start lg:py-0">
                <div class="w-full flex flex-col justify-center items-start gap-12 lg:gap-16">
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <h2
                            class="w-full text-3xl sm:text-4xl lg:text-5xl xl:text-[50px] font-bold font-['Roboto'] leading-tight">
                            <span
                                class="bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent">Bangun
                                Jaringan dan </span><br>
                            <span
                                class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_100%)] bg-clip-text text-transparent">Dapatkan
                                Penghasilan</span>
                        </h2>
                    </div>
                    <p
                        class="w-full text-black text-lg sm:text-xl lg:text-2xl font-normal font-['Roboto'] leading-relaxed lg:leading-8">
                        AturDOit menyediakan sistem afiliasi dengan struktur hingga 3 generasi. <br>Pengguna premium dapat
                        memperoleh insentif dari referral langsung dan tidak langsung, tanpa harus menjual produk atau
                        melakukan reselling. Disamping itu akan terdapat tambahan bonus/insentif yang didasarkan dari
                        pencapaian level keuangan anda.
                    </p>
                </div>
            </div>

            <!-- Right Side - Orange Gradient with Image and Incentive Box -->
            <div class="w-full lg:flex-1 relative rounded-2xl p-8 lg:p-12 flex items-center justify-center min-h-[500px]">
                <!-- Background Image -->
                <img class="lg:block absolute w-full object-contain"
                    src="{{ asset('images/assets/home/insentif.png') }}" alt="Network Building" />
            </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 bg-cover bg-center"
        style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), url('{{ asset('images/assets/community/element.png') }}'), linear-gradient(180deg, rgba(46, 83, 150, 1) 0%, rgba(33, 46, 94, 1) 100%);">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left - Cashflow Club Logo -->
                <div class="flex justify-center">
                    <div class="">
                        <img src="{{ asset('images/assets/home/logo.png') }}" alt="Cashflow Club"
                            class="h-full w-full object-cover">
                    </div>
                </div>

                <!-- Right Content -->
                <div class="text-white">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                        Saatnya Mulai Mengubah Cara Anda Mengatur Keuangan
                    </h2>
                    <p class="text-lg mb-8 opacity-90">
                        Keuangan Anda tidak akan berubah jika Anda hanya jadi penonton.Ayo mulai sekarang — atur uangmu,
                        bangun jaringanmu, dan
                        raih kebebasan finansialmu bersama aturDOit.
                    </p>
                    <a href="{{ route('register') }}"
                        class="inline-block px-10 py-5 bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] rounded-lg text-white text-xl font-medium hover:scale-105 transition-transform duration-300">
                        Daftar Sekarang <i class="fas fa-arrow-right ml-2"></i>
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
