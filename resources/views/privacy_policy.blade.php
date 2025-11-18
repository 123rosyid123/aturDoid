@extends('layouts.app')

@section('title', 'Privacy Policy - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="w-full min-h-[300px] bg-gradient-to-b from-[#F78422] to-[#E1291C] px-6 sm:px-12 lg:px-24 xl:px-[100px] py-12 lg:py-16 flex items-center justify-center">
        <div class="max-w-[1600px] w-full">
            <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-bold font-['Roboto'] text-center lg:text-left">
                Privacy Policy
            </h1>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-12">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-gradient-to-b from-[#2E5396] to-[#212E5E] rounded-lg shadow-lg p-8 lg:p-16 relative"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, #2E5396 0%, #212E5E 100%);">
                <h2 class="text-white text-3xl lg:text-5xl font-bold font-['Roboto'] mb-6 lg:mb-8">
                    Kebijakan Privasi
                </h2>
                <p class="text-white text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                    Dengan menggunakan aplikasi dan situs aturDOit, Anda menyetujui pengumpulan dan penggunaan data sesuai kebijakan ini.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-16">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-[#F4F4F4] rounded-lg shadow-lg p-8 lg:p-16 space-y-16 lg:space-y-24">
                
                <!-- Data yang Kami Kumpulkan -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Data yang Kami Kumpulkan
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Kami mengumpulkan data seperti:<br/>
                        • Nama, email, nomor WhatsApp, dan informasi akun<br/>
                        • Data transaksi dan aktivitas dalam aplikasi<br/>
                        • Data teknis seperti perangkat dan log aktivitas
                    </p>
                </div>

                <!-- Cara Kami Menggunakan Data -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Cara Kami Menggunakan Data
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Data digunakan untuk:<br/>
                        • Menyediakan dan meningkatkan layanan<br/>
                        • Membuat laporan keuangan otomatis<br/>
                        • Menghubungkan Anda dengan advisor<br/>
                        • Menjalankan sistem afiliasi<br/>
                        • Mengirimkan notifikasi dan update
                    </p>
                </div>

                <!-- Berbagi Data -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Berbagi Data
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Data dapat dibagikan kepada:<br/>
                        • Advisor (jika Anda memilih konsultasi)<br/>
                        • Penyedia pembayaran<br/>
                        • Penyedia teknologi pendukung<br/>
                        <br/>
                        Kami tidak menjual data pribadi kepada pihak lain.
                    </p>
                </div>

                <!-- Keamanan Data -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Keamanan Data
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Data disimpan dengan sistem yang aman dan terenkripsi. Anda bertanggung jawab atas keamanan akun Anda sendiri.
                    </p>
                </div>

                <!-- Hak Pengguna -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Hak Pengguna
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Anda dapat:<br/>
                        • Mengakses atau memperbarui data Anda<br/>
                        • Menghapus akun<br/>
                        • Menghubungi kami terkait privasi data
                    </p>
                </div>

                <!-- Perubahan Kebijakan -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Perubahan Kebijakan
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Kebijakan dapat berubah sewaktu-waktu. Penggunaan berkelanjutan berarti Anda menerima versi terbaru.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-16">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-gradient-to-b from-[#2E5396] to-[#212E5E] rounded-lg shadow-lg p-8 lg:p-16 relative"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, #2E5396 0%, #212E5E 100%);">
                <h2 class="text-white text-3xl lg:text-5xl font-bold font-['Roboto'] mb-6 lg:mb-8">
                    Kontak
                </h2>
                <p class="text-white text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                    Pertanyaan terkait ketentuan ini dapat dikirimkan ke: <a href="mailto:support@aturdoit.co.id" class="text-[#F78422] hover:underline">support@aturdoit.co.id</a>
                </p>
            </div>
        </div>
    </section>
@endsection
