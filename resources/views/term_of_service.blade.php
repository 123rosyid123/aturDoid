@extends('layouts.app')

@section('title', 'Terms of Service - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="w-full min-h-[300px] bg-gradient-to-b from-[#F78422] to-[#E1291C] px-6 sm:px-12 lg:px-24 xl:px-[100px] py-12 lg:py-16 flex items-center justify-center">
        <div class="max-w-[1600px] w-full">
            <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-bold font-['Roboto'] text-center lg:text-left">
                Terms of Service
            </h1>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-12">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-gradient-to-b from-[#2E5396] to-[#212E5E] rounded-lg shadow-lg p-8 lg:p-16 relative"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, #2E5396 0%, #212E5E 100%);">
                <h2 class="text-white text-3xl lg:text-5xl font-bold font-['Roboto'] mb-6 lg:mb-8">
                    Ketentuan Layanan
                </h2>
                <p class="text-white text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                    Dengan menggunakan aplikasi dan situs aturDOit, Anda dianggap telah membaca dan menyetujui ketentuan layanan berikut:
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-16">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-[#F4F4F4] rounded-lg shadow-lg p-8 lg:p-16 space-y-16 lg:space-y-24">
                
                <!-- Penggunaan Platform -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Penggunaan Platform
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        AturDOit menyediakan alat pengelolaan keuangan, edukasi finansial, sistem afiliasi, dan fitur penghubung dengan penasehat keuangan bersertifikat.<br/>
                        Platform bukan lembaga keuangan atau penyedia nasihat investasi resmi.
                    </p>
                </div>

                <!-- Akun Pengguna -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Akun Pengguna
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Anda wajib memberikan informasi yang benar saat mendaftar dan menjaga kerahasiaan akun Anda. Segala aktivitas yang terjadi melalui akun Anda menjadi tanggung jawab Anda.
                    </p>
                </div>

                <!-- Layanan Advisor -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Layanan Advisor
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Advisor yang terdaftar adalah pihak ketiga bersertifikat. AturDOit hanya menjadi perantara — segala saran, keputusan, atau hasil konsultasi merupakan tanggung jawab pengguna dan advisor.
                    </p>
                </div>

                <!-- Program Afiliasi -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Program Afiliasi
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Anda dapat memperoleh komisi dari jaringan referral sesuai aturan yang berlaku. Penyalahgunaan sistem referral dapat mengakibatkan penghentian akun.
                    </p>
                </div>

                <!-- Pembayaran Premium -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Pembayaran Premium
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Fitur premium berbayar sesuai paket yang tersedia. Tidak ada pengembalian dana kecuali dinyatakan secara khusus.
                    </p>
                </div>

                <!-- Pembatasan Tanggung Jawab -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Pembatasan Tanggung Jawab
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        AturDOit tidak bertanggung jawab atas:<br/>
                        • Keputusan finansial pengguna<br/>
                        • Kesalahan input data<br/>
                        • Gangguan teknis di luar kendali kami<br/>
                        • Layanan yang diberikan advisor pihak ketiga
                    </p>
                </div>

                <!-- Perubahan Ketentuan -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Perubahan Ketentuan
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Ketentuan layanan dapat diperbarui sewaktu-waktu. Penggunaan berkelanjutan berarti Anda menerima versi terbaru.
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
