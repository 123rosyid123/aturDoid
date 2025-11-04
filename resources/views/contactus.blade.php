@extends('layouts.app')

@section('title', 'Contact Us - AturDOit')

@section('content')
    <!-- Contact Section -->
    <section class="relative min-h-screen w-full py-16 lg:py-24 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-6 bg-center bg-contain bg-no-repeat min-h-[500px] flex flex-col justify-center" style="background-image: url('{{ asset('images/assets/contactus/logo.png') }}');">
                    <div class="space-y-4 shadow-2xl drop-shadow-lg rounded-2xl p-6 bg-black/10">
                        <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white leading-tight drop-shadow-lg" style="font-family: 'Inter', sans-serif;">
                            Hubungi Kami!
                        </h1>
                        <p class="text-base sm:text-lg text-white/90 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                            Tim aturDOit siap membantu Anda. Kami terbuka untuk pertanyaan, kerja sama, maupun dukungan penggunaan aplikasi dan komunitas.
                        </p>
                    </div>

                </div>

                <!-- Right Form -->
                <div class="w-full">
                    <div class="bg-[linear-gradient(180deg,#F78422_0%,#E1291C_96%)] rounded-3xl p-8 sm:p-12 lg:p-16 shadow-2xl">
                        <form action="#" method="POST" class="space-y-8">
                            @csrf

                            <!-- Name Field -->
                            <div class="space-y-2">
                                <label for="name" class="block text-white text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">
                                    Name
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Name"
                                    class="w-full px-6 py-4 rounded-2xl border border-black/50 text-gray-800 text-lg sm:text-xl placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all bg-white"
                                    style="font-family: 'Roboto', sans-serif;"
                                >
                            </div>

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="block text-white text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">
                                    Email<span class="text-white">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    required
                                    class="w-full px-6 py-4 rounded-2xl border border-black/50 text-gray-800 text-lg sm:text-xl placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all bg-white"
                                    style="font-family: 'Roboto', sans-serif;"
                                >
                            </div>

                            <!-- Message Field -->
                            <div class="space-y-2">
                                <label for="message" class="block text-white text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">
                                    Message<span class="text-white">*</span>
                                </label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="6"
                                    placeholder="Message"
                                    required
                                    class="w-full px-6 py-4 rounded-2xl border border-black/50 text-gray-800 text-lg sm:text-xl placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all resize-none bg-white"
                                    style="font-family: 'Roboto', sans-serif;"
                                ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full px-8 py-5 bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] text-white text-xl sm:text-2xl font-normal rounded-2xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300"
                                style="font-family: 'Roboto', sans-serif;"
                            >
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
