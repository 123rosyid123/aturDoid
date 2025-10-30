<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page
     */
    public function index()
    {
        // Data untuk landing page
        $data = [
            'stats' => [
                'users' => '50K+',
                'transactions' => 'Rp 10M+',
                'rating' => '4.8★'
            ],
            'features' => [
                [
                    'icon' => 'fa-chart-line',
                    'color' => 'orange',
                    'title' => 'Analisis Real-time',
                    'description' => 'Pantau performa keuangan Anda dengan grafik dan analisis yang mudah dipahami'
                ],
                [
                    'icon' => 'fa-wallet',
                    'color' => 'blue',
                    'title' => 'Multi-rekening',
                    'description' => 'Kelola semua rekening bank Anda dalam satu platform terintegrasi'
                ],
                [
                    'icon' => 'fa-piggy-bank',
                    'color' => 'green',
                    'title' => 'Auto-saving',
                    'description' => 'Sistem otomatis yang membantu Anda menabung secara konsisten'
                ],
                [
                    'icon' => 'fa-bullseye',
                    'color' => 'purple',
                    'title' => 'Goal Tracking',
                    'description' => 'Tetapkan dan capai tujuan finansial Anda dengan tracking otomatis'
                ],
                [
                    'icon' => 'fa-shield-alt',
                    'color' => 'red',
                    'title' => 'Keamanan Terjamin',
                    'description' => 'Enkripsi data tingkat bank untuk melindungi informasi keuangan Anda'
                ],
                [
                    'icon' => 'fa-mobile-alt',
                    'color' => 'indigo',
                    'title' => 'Mobile App',
                    'description' => 'Akses keuangan Anda kapan saja dan dimana saja melalui smartphone'
                ]
            ],
            'community_features' => [
                [
                    'icon' => 'fa-users',
                    'color' => 'orange',
                    'title' => 'Forum Diskusi',
                    'description' => 'Bagikan pengalaman dan dapatkan tips dari anggota komunitas lainnya'
                ],
                [
                    'icon' => 'fa-graduation-cap',
                    'color' => 'blue',
                    'title' => 'Kursus Gratis',
                    'description' => 'Akses materi pembelajaran tentang literasi keuangan yang komprehensif'
                ],
                [
                    'icon' => 'fa-calendar-alt',
                    'color' => 'green',
                    'title' => 'Event & Webinar',
                    'description' => 'Ikuti webinar dan workshop dengan ahli keuangan profesional'
                ],
                [
                    'icon' => 'fa-trophy',
                    'color' => 'purple',
                    'title' => 'Challenge & Reward',
                    'description' => 'Ikuti challenge menabung dan dapatkan reward menarik'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Putri',
                    'role' => 'Professional, Jakarta',
                    'avatar' => 'user1',
                    'content' => 'AturDOit membantu saya mengelola keuangan dengan lebih baik. Fitur auto-savingnya sangat berguna!',
                    'rating' => 5
                ],
                [
                    'name' => 'Budi Santoso',
                    'role' => 'Entrepreneur, Surabaya',
                    'avatar' => 'user2',
                    'content' => 'Komunitasnya sangat supportive. Saya jadi lebih termotivasi untuk mencapai tujuan finansial saya.',
                    'rating' => 5
                ]
            ]
        ];

        return view('landing', $data);
    }

    /**
     * Display the features page
     */
    public function features()
    {
        return view('features');
    }

    /**
     * Display the community page
     */
    public function community()
    {
        return view('community');
    }

    /**
     * Handle AJAX requests for dynamic content
     */
    public function getChartData(Request $request)
    {
        // Simulate real-time chart data
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            'values' => [3200000, 3500000, 3300000, 4100000, 3900000, 5200000, 4800000, 5500000],
            'growth' => '+12.5%',
            'total' => 'Rp 5.2M'
        ];

        return response()->json($chartData);
    }
}
