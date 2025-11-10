<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AturDOit</title>
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
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
        }
        .email-body {
            padding: 30px;
        }
        .field-label {
            font-weight: bold;
            color: #2E5396;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        .field-value {
            padding: 10px;
            background-color: #f8f9fa;
            border-left: 3px solid #2E5396;
            margin-bottom: 15px;
        }
        .message-content {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Contact Us Message</h1>
        </div>
        <div class="email-body">
            <p>You have received a new contact message from AturDOit website:</p>
            
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $name ?? 'Not provided' }}</div>
            
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $email }}</div>
            
            <div class="field-label">Message:</div>
            <div class="field-value message-content">{{ $messageContent }}</div>
        </div>
        <div class="email-footer">
            <p>This email was sent from the Contact Us form on AturDOit website.</p>
            <p>&copy; {{ date('Y') }} AturDOit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
