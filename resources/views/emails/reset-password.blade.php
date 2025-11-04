<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - AturDOit</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f4f4f4;">
        <tr>
            <td style="padding: 40px 0;">
                <table role="presentation" style="width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #2E5396 0%, #212E5E 100%); padding: 40px 30px; text-align: center; border-radius: 8px 8px 0 0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: bold;">
                                AturDOit
                            </h1>
                            <p style="margin: 10px 0 0 0; color: #ffffff; font-size: 14px; opacity: 0.9;">
                                Your Financial Management Partner
                            </p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <!-- Greeting -->
                            <h2 style="margin: 0 0 20px 0; color: #333333; font-size: 24px; font-weight: 600;">
                                Hello, {{ $userName }}!
                            </h2>

                            <p style="margin: 0 0 20px 0; color: #666666; font-size: 16px; line-height: 1.6;">
                                We received a request to reset your password for your AturDOit account. If you didn't make this request, you can safely ignore this email.
                            </p>

                            <p style="margin: 0 0 30px 0; color: #666666; font-size: 16px; line-height: 1.6;">
                                To reset your password, click the button below:
                            </p>

                            <!-- CTA Button -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin: 0 0 30px 0;">
                                <tr>
                                    <td style="text-align: center; padding: 0;">
                                        <a href="{{ $resetUrl }}" 
                                           style="display: inline-block; padding: 16px 40px; background: linear-gradient(135deg, #F78422 0%, #E1291C 100%); color: #ffffff; text-decoration: none; border-radius: 8px; font-size: 16px; font-weight: 600; box-shadow: 0 4px 6px rgba(247, 132, 34, 0.3);">
                                            Reset My Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Alternative Link -->
                            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 6px; margin: 0 0 30px 0;">
                                <p style="margin: 0 0 10px 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                    <strong>If the button doesn't work, copy and paste this link into your browser:</strong>
                                </p>
                                <p style="margin: 0; color: #2E5396; font-size: 14px; word-break: break-all; line-height: 1.6;">
                                    <a href="{{ $resetUrl }}" style="color: #2E5396; text-decoration: underline;">
                                        {{ $resetUrl }}
                                    </a>
                                </p>
                            </div>

                            <!-- Security Notice -->
                            <div style="border-left: 4px solid #FFC107; padding: 15px 20px; background-color: #FFF9E6; border-radius: 4px; margin: 0 0 30px 0;">
                                <p style="margin: 0 0 10px 0; color: #333333; font-size: 14px; font-weight: 600;">
                                    ⚠️ Security Notice:
                                </p>
                                <p style="margin: 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                    This password reset link will expire in <strong>24 hours</strong>. If you didn't request this reset, please contact our support team immediately.
                                </p>
                            </div>

                            <!-- Additional Info -->
                            <p style="margin: 0 0 10px 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                For your security:
                            </p>
                            <ul style="margin: 0 0 20px 0; padding-left: 20px; color: #666666; font-size: 14px; line-height: 1.8;">
                                <li>Never share your password with anyone</li>
                                <li>Use a strong, unique password</li>
                                <li>Enable two-factor authentication if available</li>
                            </ul>

                            <p style="margin: 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                If you have any questions or concerns, please don't hesitate to contact our support team.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 30px; text-align: center; border-radius: 0 0 8px 8px; border-top: 1px solid #e9ecef;">
                            <p style="margin: 0 0 15px 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                Best regards,<br>
                                <strong style="color: #2E5396;">The AturDOit Team</strong>
                            </p>

                            <!-- Social Links -->
                            <div style="margin: 0 0 20px 0;">
                                <a href="#" style="display: inline-block; margin: 0 10px; color: #2E5396; text-decoration: none; font-size: 20px;">
                                    <img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook" style="width: 24px; height: 24px;">
                                </a>
                                <a href="#" style="display: inline-block; margin: 0 10px; color: #2E5396; text-decoration: none; font-size: 20px;">
                                    <img src="https://img.icons8.com/color/48/000000/twitter--v1.png" alt="Twitter" style="width: 24px; height: 24px;">
                                </a>
                                <a href="#" style="display: inline-block; margin: 0 10px; color: #2E5396; text-decoration: none; font-size: 20px;">
                                    <img src="https://img.icons8.com/color/48/000000/instagram-new--v1.png" alt="Instagram" style="width: 24px; height: 24px;">
                                </a>
                            </div>

                            <p style="margin: 0 0 10px 0; color: #999999; font-size: 12px; line-height: 1.6;">
                                © {{ date('Y') }} AturDOit. All rights reserved.
                            </p>

                            <p style="margin: 0; color: #999999; font-size: 12px; line-height: 1.6;">
                                This email was sent to <a href="mailto:{{ $email }}" style="color: #2E5396; text-decoration: none;">{{ $email }}</a>
                            </p>
                        </td>
                    </tr>
                </table>

                <!-- Spam Notice -->
                <table role="presentation" style="width: 600px; margin: 20px auto 0; text-align: center;">
                    <tr>
                        <td>
                            <p style="margin: 0; color: #999999; font-size: 11px; line-height: 1.6;">
                                This is an automated email. Please do not reply to this message.<br>
                                If you're having trouble clicking the button, copy and paste the URL into your web browser.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

