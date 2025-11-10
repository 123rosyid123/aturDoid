@extends('layouts.app')

@section('title', 'Verifikasi Gagal - AturDOit')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-red-100">
                <svg class="h-12 w-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Verifikasi Gagal
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ $message }}
            </p>
        </div>
        <div class="mt-8 space-y-4">
            <a href="{{ route('register') }}"
               class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[linear-gradient(180deg,#2E5396_0%,#212E5E_100%)] hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kembali ke Halaman Registrasi
            </a>
        </div>
    </div>
</div>
@endsection
