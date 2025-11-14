{{-- Referral Email Input Component --}}
<div class="space-y-2">
    <label class="text-xl lg:text-2xl font-medium">
        {{ $label }}
    </label>
    <div class="flex items-center gap-3 w-full max-w-lg px-3 py-2.5 bg-white border border-black/50 rounded-lg">
        <input
            type="email"
            placeholder="{{ $placeholder }}"
            class="flex-1 text-black text-base placeholder-gray-500 bg-transparent border-none focus:outline-none focus:ring-0"
            id="referralEmail"
        />
        <button
            onclick="sendReferralEmail()"
            class="flex-shrink-0 p-2 bg-gradient-to-b from-[#F7863D] to-[#E76126] rounded-lg border border-gray-500/50 hover:opacity-90 transition-opacity"
            title="Send invitation"
        >
            <svg class="w-4 h-4 text-white transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
        </button>
    </div>
</div>

