<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Bergabung - AturDOit</title>
    <style>
        body {
            font-family: 'Roboto', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(180deg, #2E5396 0%, #212E5E 100%);
            padding: 40px 30px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
        }
        .email-body {
            padding: 40px 30px;
        }
        .email-body h2 {
            color: #2E5396;
            margin-top: 0;
        }
        .email-body p {
            margin: 15px 0;
            font-size: 16px;
        }
        .invitation-button {
            display: inline-block;
            margin: 30px 0;
            padding: 15px 40px;
            background: linear-gradient(180deg, #F78422 0%, #E1291C 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }
        .invitation-button:hover {
            opacity: 0.9;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #2E5396;
            padding: 15px;
            margin: 20px 0;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666666;
            font-size: 14px;
        }
        .divider {
            border-top: 1px solid #e0e0e0;
            margin: 30px 0;
        }
        .highlight-box {
            background: linear-gradient(135deg, #F78422 0%, #E1291C 100%);
            color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }
        .highlight-box p {
            margin: 5px 0;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Undangan Bergabung dengan AturDOit</h1>
        </div>
        <div class="email-body">
            <h2>Halo!</h2>
            <p><strong>{{ $inviterName }}</strong> mengundang Anda untuk bergabung dengan AturDOit — platform pengelolaan keuangan yang membantu Anda mengatur uang, membangun jaringan, dan meraih kebebasan finansial.</p>

            <div class="highlight-box">
                <p>🎁 Dapatkan keuntungan dengan kode referral khusus!</p>
                <p style="font-size: 24px; margin-top: 10px;">{{ $referralCode }}</p>
            </div>

            <p>Dengan bergabung melalui undangan ini, Anda akan mendapatkan akses ke:</p>
            <ul style="margin: 15px 0; padding-left: 20px;">
                <li>Smart Financial Tools untuk mengelola keuangan</li>
                <li>Sistem afiliasi 3 generasi untuk penghasilan tambahan</li>
                <li>Edukasi finansial dan koneksi dengan advisor profesional</li>
            </ul>

            <div style="text-align: center;">
                <a href="{{ $invitationUrl }}" class="invitation-button">
                    Daftar Sekarang
                </a>
            </div>

            <div class="info-box">
                <p><strong>✨ Link ini akan langsung membawa Anda ke halaman registrasi dengan kode referral terpasang.</strong></p>
                <p>Proses registrasi mudah dan cepat — cukup beberapa langkah saja!</p>
            </div>

            <div class="divider"></div>

            <p style="color: #666; font-size: 14px;">
                Jika Anda tidak mengenal {{ $inviterName }}, abaikan email ini.
            </p>

            <p style="color: #666; font-size: 14px;">
                Jika tombol tidak berfungsi, salin dan tempel link berikut ke browser Anda:
            </p>
            <p style="word-break: break-all; color: #2E5396; font-size: 13px;">
                {{ $invitationUrl }}
            </p>
        </div>
        <div class="email-footer">
            <p>Email ini dikirim atas undangan dari {{ $inviterName }}.</p>
            <p>&copy; {{ date('Y') }} AturDOit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

