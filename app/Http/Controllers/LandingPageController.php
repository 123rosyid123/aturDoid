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
        // Data untuk landing page sesuai design Figma
        $data = [
            'hero' => [
                'title' => 'Grow Your Money. Guide Your Friends. Win Together.',
                'subtitle' => 'Kelola keuangan, pantau pengeluaran, dan kembangkan penghasilan Anda dalam satu aplikasi. Dapatkan keuntungan tambahan lewat sistem referal yang memberi Anda peluang untuk tumbuh bersama komunitas.',
                'cta_text' => 'Daftar Sekarang',
                'cta_link' => route('register')
            ],
            'warren_buffett' => [
                'quote' => 'Making money is action Keeping money is behavior Growing money is knowledge',
                'author' => '- Warren Buffett'
            ],
            'financial_problem' => [
                'title' => 'Masalah Keuangan Sehari-hari dan Solusi dari aturDOit',
                'subtitle' => 'Kami memahami tantangan yang sering dihadapi banyak orang dalam mengelola keuangan. Karena itu, aturDOit dirancang untuk menjadi solusi yang nyata dan menyeluruh.',
                'problem' => 'Tidak Punya Sistem Pengelolaan Keuangan yang Terarah',
                'problem_desc' => 'Sebagian besar orang masih mengandalkan pencatatan manual atau aplikasi terpisah, sehingga sulit memahami kondisi keuangan secara menyeluruh.',
                'solution' => 'AturDOit menyediakan Smart Financial Tools yang mencatat pemasukan, pengeluaran, aset, dan kewajiban yang secara otomatis akan menyusun laporan keuangan pribadi beserta analisa keuangan dan rekomendasi dari penasehat keuangan yg bersertifikasi dan ditampilkan dalam dashboard yang mudah dipahami.',
                'cta_text' => 'Tangani Masalah Anda'
            ],
            'features' => [
                [
                    'title' => 'Smart Financial Tools',
                    'description' => 'Catat pemasukan, pengeluaran, aset, dan kewajiban dengan cepat dan akurat. Setiap transaksi otomatis tersusun dalam laporan keuangan lengkap, termasuk arus kas dan neraca pribadi. Tampilan interaktifnya memudahkan Anda memantau kondisi keuangan kapan pun tanpa perlu latar belakang akuntansi.',
                    'icon' => 'fa-clipboard-list',
                    'color' => 'orange'
                ],
                [
                    'title' => 'Edukasi Finansial',
                    'description' => 'Pelajari pengelolaan keuangan lewat video dan modul singkat yang mudah dipahami. Materinya mencakup dasar-dasar finansial, perencanaan keuangan pribadi, hingga strategi investasi sederhana. Dirancang agar pengguna dapat belajar mandiri dan membangun kebiasaan finansial yang lebih teratur.',
                    'icon' => 'fa-graduation-cap',
                    'color' => 'blue'
                ],
                [
                    'title' => 'Sistem Afiliasi',
                    'description' => 'Hasilkan pendapatan tambahan melalui sistem afiliasi tiga level yang transparan dan mudah dijalankan. Bagikan link referral Anda dan dapatkan komisi setiap kali jaringan Anda bertransaksi premium. Model ini membuka peluang penghasilan pasif tanpa perlu menjual produk atau memiliki stok.',
                    'icon' => 'fa-link',
                    'color' => 'green'
                ],
                [
                    'title' => 'Platform Advisor Profesional',
                    'description' => 'Bagi penasehat keuangan bersertifikat, aturDOit menyediakan ruang kerja digital yang lengkap dan efisien. Akses alat profesional seperti analisa keuangan, perhitungan asuransi, penilaian aset, hingga perencanaan pensiun dan warisan. Semua terintegrasi untuk membantu advisor melayani klien dengan profesionalisme tinggi.',
                    'icon' => 'fa-user-tie',
                    'color' => 'purple'
                ],
                [
                    'title' => 'Koneksi Pengguna & Advisor',
                    'description' => 'AturDOit mempertemukan pengguna yang membutuhkan bimbingan finansial dengan penasehat keuangan profesional. Pengguna dapat memilih dan menggunakan layanan advisor langsung melalui marketplace, sementara para advisor memperluas jaringan dan membangun reputasi di komunitas finansial digital.',
                    'icon' => 'fa-handshake',
                    'color' => 'indigo'
                ]
            ],
            'network' => [
                'title' => 'Bangun Jaringan dan Dapatkan Penghasilan',
                'description' => 'AturDOit menyediakan sistem afiliasi dengan struktur hingga 3 generasi. Pengguna premium dapat memperoleh insentif dari referral langsung dan tidak langsung, tanpa harus menjual produk atau melakukan reselling. Disamping itu akan terdapat tambahan bonus/insentif yang didasarkan dari pencapaian level keuangan anda',
                'incentives' => [
                    [
                        'generation' => 'Gen 1',
                        'percentage' => '20%',
                        'description' => 'Komisi dari referral langsung'
                    ],
                    [
                        'generation' => 'Gen 2',
                        'percentage' => '5%',
                        'description' => 'Komisi dari referral tingkat 2'
                    ],
                    [
                        'generation' => 'Gen 3',
                        'percentage' => '5%',
                        'description' => 'Komisi dari referral tingkat 3'
                    ]
                ]
            ],
            'cta' => [
                'title' => 'Saatnya Mulai Mengubah Cara Anda Mengatur Keuangan',
                'description' => 'Keuangan Anda tidak akan berubah jika Anda hanya jadi penonton. Ayo mulai sekarang — atur uangmu, bangun jaringanmu, dan raih kebebasan finansialmu bersama aturDOit.',
                'button_text' => 'Daftar Sekarang'
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
