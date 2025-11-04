<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Celebrations</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2 style="color: #ae674e;">Hello {{ $user->name }},</h2>
    <p>Thank you for registering with <strong>Celebrations</strong>.</p>
    <p>Your account has been created using this email: <strong>{{ $user->email }}</strong>.</p>
    <p>We’re excited to have you on board — check out events and get started!</p>
    <br>
    <p>Best regards,<br>The Celebrations Team</p>
</body>
</html>
