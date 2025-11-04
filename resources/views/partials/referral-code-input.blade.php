{{-- Referral Code Input Component --}}
<div class="space-y-2">
    <label class="text-xl lg:text-2xl font-medium">
        {{ $label }}
    </label>
    <div class="flex items-center gap-3 w-full max-w-lg px-3 py-2.5 bg-white border border-black/50 rounded-lg">
        <span class="flex-1 text-gray-500 text-base">
            {{ $code }}
        </span>
        <button 
            onclick="copyToClipboard('{{ $code }}')" 
            class="flex-shrink-0 p-2 bg-gradient-to-b from-[#F7863D] to-[#E76126] rounded-lg border border-gray-500/50 hover:opacity-90 transition-opacity"
            title="Copy to clipboard"
        >
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
            </svg>
        </button>
    </div>
</div>

