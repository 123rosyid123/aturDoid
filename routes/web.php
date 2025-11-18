<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationValidatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

// Landing Page Routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/features', [LandingPageController::class, 'features'])->name('features');
Route::get('/community', [LandingPageController::class, 'community'])->name('community');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/contactus', [LandingPageController::class, 'contactus'])->name('contactus');
Route::post('/contactus', [ContactController::class, 'send'])->name('contact.send');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/api/chart-data', [LandingPageController::class, 'getChartData']);

// Legal Pages Routes
Route::get('/terms-of-service', [LandingPageController::class, 'termsOfService'])->name('terms.service');
Route::get('/legal', [LandingPageController::class, 'legal'])->name('legal');
Route::get('/privacy-policy', [LandingPageController::class, 'privacyPolicy'])->name('privacy.policy');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register/verify/{token}', [RegistrationValidatorController::class, 'verifyEmail'])->name('register.verify');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Google OAuth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Registration Validation Routes
Route::prefix('api/register')->group(function () {
    Route::post('/validate-step-1', [RegistrationValidatorController::class, 'validateStep1']);
    Route::post('/validate-step-2', [RegistrationValidatorController::class, 'validateStep2']);
    Route::post('/validate-step-3', [RegistrationValidatorController::class, 'validateStep3']);
    Route::post('/validate-step-4', [RegistrationValidatorController::class, 'validateStep4']);
    Route::post('/validate-step-5', [RegistrationValidatorController::class, 'validateStep5']);
    Route::post('/validate-referral', [RegistrationValidatorController::class, 'validateReferralCode']);
    Route::post('/complete', [RegistrationValidatorController::class, 'completeRegistration']);
});

// Protected Routes (for future dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/refferal', [LandingPageController::class, 'refferal'])->name('refferal');

    // User API Routes
    Route::prefix('api/user')->group(function () {
        Route::post('/update-upline', [UserController::class, 'updateUplineCode']);
    });
});
