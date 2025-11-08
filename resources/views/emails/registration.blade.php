<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Celebrations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .header {
            background-color: #ae674e;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 6px 6px 0 0;
        }

        .content {
            padding: 20px 0;
            color: #333;
        }

        .highlight {
            background-color: #f9f9f9;
            border-left: 5px solid #ae674e;
            padding: 10px 15px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Welcome to Celebrations!</h2>
    </div>

    <div class="content">
        <p>Hello <strong>{{ $user->name }}</strong>,</p>
        <p>Thank you for registering with <strong>Celebrations</strong> — we’re thrilled to have you with us!</p>

        <div class="highlight">
            <p><strong>Registered Email:</strong> {{ $user->email }}</p>
            <p><strong>Account Role:</strong> {{ ucfirst($user->role ?? 'User') }}</p>
        </div>

        <p>You can now explore events, make bookings, and enjoy a great experience on our platform.</p>

        <p>We’re excited to have you on board! 🎉</p>

        <p>Best Regards,<br><strong>The Celebrations Team</strong></p>
    </div>

    <div class="footer">
        This is an automated registration confirmation email from {{ config('app.name') }}.
    </div>
</div>
</body>
</html>
