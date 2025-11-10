<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - AturDOit</title>
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
        .verification-button {
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
        .verification-button:hover {
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Verifikasi Email Anda</h1>
        </div>
        <div class="email-body">
            <h2>Halo!</h2>
            <p>Terima kasih telah mendaftar di AturDOit. Untuk melanjutkan proses registrasi, silakan verifikasi alamat email Anda dengan mengklik tombol di bawah ini:</p>

            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="verification-button">
                    Verifikasi Email & Lanjutkan Registrasi
                </a>
            </div>

            <div class="info-box">
                <p><strong>⏰ Link verifikasi ini berlaku selama 24 jam.</strong></p>
                <p>Setelah verifikasi berhasil, Anda akan diarahkan untuk melanjutkan pengisian data registrasi.</p>
            </div>

            <div class="divider"></div>

            <p style="color: #666; font-size: 14px;">
                Jika Anda tidak merasa mendaftar di AturDOit, abaikan email ini.
            </p>

            <p style="color: #666; font-size: 14px;">
                Jika tombol tidak berfungsi, salin dan tempel link berikut ke browser Anda:
            </p>
            <p style="word-break: break-all; color: #2E5396; font-size: 13px;">
                {{ $verificationUrl }}
            </p>
        </div>
        <div class="email-footer">
            <p>Email ini dikirim secara otomatis, mohon untuk tidak membalas.</p>
            <p>&copy; {{ date('Y') }} AturDOit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
