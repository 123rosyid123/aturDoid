{{-- Empty Downline State Component --}}
<div class="w-full min-h-[500px] flex flex-col items-center justify-center gap-16 py-16">
    {{-- Icon and Message --}}
    <div class="flex flex-col items-center gap-4">
        {{-- Icon --}}
        <div class="w-16 h-16 rounded">
            <img src="{{ asset('images/assets/refferal/icons/empty-downline.svg') }}" alt="Empty Downline" class="w-full h-full object-cover">
        </div>
        
        {{-- Title with Decorative Lines --}}
        <div class="w-full max-w-3xl overflow-hidden flex items-center justify-center gap-8">
            <div class="flex-1 h-1.5 bg-gradient-to-b from-[#4286F4] to-[#373B44]"></div>
            <h3 class="text-4xl lg:text-5xl font-bold bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] bg-clip-text text-transparent whitespace-nowrap">
                {{ $message ?? 'Belum Ada Downline' }}
            </h3>
            <div class="flex-1 h-1.5 bg-gradient-to-b from-[#2E5396] to-[#212E5E] opacity-20"></div>
        </div>
    </div>

    {{-- Call to Action Button --}}
    <a href="#referral-section" 
       onclick="event.preventDefault(); scrollToSection('referral-section');"
       class="group px-10 py-5 bg-gradient-to-b from-[#F78422] to-[#E1291C] rounded-lg 
              flex items-center gap-2.5 transition-transform hover:scale-105 active:scale-95
              shadow-lg hover:shadow-xl">
        <span class="text-white text-lg font-medium">
            {{ $buttonText ?? 'Undang Sekarang' }}
        </span>
        <svg class="w-3.5 h-3.5 text-white transition-transform group-hover:translate-x-1" 
             fill="none" 
             stroke="currentColor" 
             viewBox="0 0 24 24">
            <path stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>

