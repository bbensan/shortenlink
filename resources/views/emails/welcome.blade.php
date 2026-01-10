<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Lovilink</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f4f4f4;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 20px 40px; text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px 8px 0 0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 700;">Welcome to Lovilink!</h1>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="margin: 0 0 20px 0; color: #333333; font-size: 16px; line-height: 1.6;">
                                Hi <strong>{{ $userName }}</strong>,
                            </p>
                            
                            <p style="margin: 0 0 20px 0; color: #333333; font-size: 16px; line-height: 1.6;">
                                Thank you for signing up to Lovilink. We are excited to have you on board and look forward to helping you create amazing shortened links!
                            </p>
                            
                            <p style="margin: 0 0 30px 0; color: #333333; font-size: 16px; line-height: 1.6;">
                                To get started, please verify your email address by clicking the button below:
                            </p>
                            
                            <!-- CTA Button -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="center" style="padding: 0 0 30px 0;">
                                        <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 14px 32px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 6px rgba(102, 126, 234, 0.3);">Verify Email Address</a>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Alternative Link -->
                            <p style="margin: 0 0 30px 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                If the button doesn't work, you can copy and paste this link into your browser:
                            </p>
                            <p style="margin: 0 0 30px 0; color: #667eea; font-size: 14px; line-height: 1.6; word-break: break-all;">
                                <a href="{{ $verificationUrl }}" style="color: #667eea; text-decoration: underline;">{{ $verificationUrl }}</a>
                            </p>
                            
                            <!-- Security Notice -->
                            <div style="padding: 20px; background-color: #f8f9fa; border-left: 4px solid #667eea; border-radius: 4px; margin: 30px 0;">
                                <p style="margin: 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                    <strong>Security Notice:</strong> If you did not request this verification email, please ignore this message. No action is required from your side.
                                </p>
                            </div>
                            
                            <p style="margin: 30px 0 0 0; color: #333333; font-size: 16px; line-height: 1.6;">
                                Thank you for using Lovilink. If you have any questions, feel free to reach out to our support team.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 30px 40px; background-color: #f8f9fa; border-radius: 0 0 8px 8px; border-top: 1px solid #e9ecef;">
                            <p style="margin: 0 0 10px 0; color: #666666; font-size: 14px; text-align: center; line-height: 1.6;">
                                Best regards,<br>
                                <strong style="color: #333333;">The Lovilink Team</strong>
                            </p>
                            <p style="margin: 20px 0 0 0; color: #999999; font-size: 12px; text-align: center; line-height: 1.5;">
                                This email was sent to {{ $userEmail }}. If you have any questions, please contact our support team.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
