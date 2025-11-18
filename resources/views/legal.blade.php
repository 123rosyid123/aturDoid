@extends('layouts.app')

@section('title', 'Legal - AturDOit')

@section('content')
    <!-- Hero Section -->
    <section class="w-full min-h-[300px] bg-gradient-to-b from-[#F78422] to-[#E1291C] px-6 sm:px-12 lg:px-24 xl:px-[100px] py-12 lg:py-16 flex items-center justify-center">
        <div class="max-w-[1600px] w-full">
            <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-bold font-['Roboto'] text-center lg:text-left">
                Legal
            </h1>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-12">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-gradient-to-b from-[#2E5396] to-[#212E5E] rounded-lg shadow-lg p-8 lg:p-16 relative"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(180deg, #2E5396 0%, #212E5E 100%);">
                <h2 class="text-white text-3xl lg:text-5xl font-bold font-['Roboto'] mb-6 lg:mb-8">
                    Legal Disclaimer
                </h2>
                <p class="text-white text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                    aturDOit menyediakan informasi dan alat pengelolaan keuangan untuk tujuan edukasi. Segala keputusan finansial menjadi tanggung jawab pengguna sepenuhnya.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="w-full bg-white px-6 sm:px-12 lg:px-24 xl:px-[100px] py-8 lg:py-16">
        <div class="max-w-[1600px] mx-auto">
            <div class="bg-[#F4F4F4] rounded-lg shadow-lg p-8 lg:p-16 space-y-16 lg:space-y-24">
                
                <!-- Hak Kekayaan Intelektual -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Hak Kekayaan Intelektual
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Seluruh konten dan fitur dalam platform dilindungi hukum. Pengguna tidak boleh menyalin atau menyebarkan materi tanpa izin.
                    </p>
                </div>

                <!-- Tanggung Jawab Pengguna -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Tanggung Jawab Pengguna
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Pengguna bertanggung jawab atas penggunaan platform, data yang dimasukkan, dan keputusan finansial yang diambil sendiri.
                    </p>
                </div>

                <!-- Batasan Tanggung Jawab -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Batasan Tanggung Jawab
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Platform tidak bertanggung jawab atas kerugian, kesalahan data, layanan pihak ketiga, atau gangguan teknis di luar kendali.
                    </p>
                </div>

                <!-- Perubahan Ketentuan Hukum -->
                <div class="space-y-4">
                    <h3 class="text-[#F78422] text-3xl lg:text-5xl font-bold font-['Roboto'] leading-tight lg:leading-[72px]">
                        Perubahan Ketentuan Hukum
                    </h3>
                    <p class="text-black text-lg lg:text-3xl font-normal font-['Roboto'] leading-relaxed lg:leading-[60px]">
                        Ketentuan ini dapat berubah kapan saja. Penggunaan berkelanjutan berarti Anda menyetujui perubahan tersebut.
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
