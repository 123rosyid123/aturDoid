{{-- Affiliator Card Component --}}
@php
    $statusColor = strtolower($status) === 'active' ? 'text-green-500' : 'text-red-500';
    $statusText = ucfirst($status);
@endphp

<div class="flex items-center justify-between px-4 py-2 bg-gray-100 shadow-md rounded-lg hover:shadow-lg transition-shadow">
    {{-- User Info --}}
    <div class="flex flex-col gap-2">
        <h4 class="text-2xl lg:text-3xl font-bold text-black">
            {{ $name }}
        </h4>
        <div class="flex items-center gap-3">
            <span class="{{ $statusColor }} text-xl lg:text-2xl">
                {{ $statusText }}
            </span>
            <span class="text-sm text-black">
                Affiliated On: {{ $affiliatedOn }}
            </span>
        </div>
    </div>

    {{-- Affiliator Count --}}
    <div class="flex flex-col items-end gap-4">
        <span class="text-xl lg:text-2xl font-bold text-black">
            Affiliate:
        </span>
        <span class="text-xl lg:text-2xl text-black">
            {{ $downlineCount }}
        </span>
    </div>
</div>

