<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Contact Form Submission</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
.container { width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
h1 { color: #333333; font-size: 24px; margin-bottom: 20px; }
h3 { color: #555555; border-bottom: 1px solid #eeeeee; padding-bottom: 5px; margin-top: 25px; }
.detail-item { margin-bottom: 10px; line-height: 1.5; }
.detail-label { font-weight: bold; color: #333333; display: inline-block; width: 80px; }
.message-box { background-color: #f9f9f9; border: 1px solid #e0e0e0; padding: 15px; border-radius: 4px; white-space: pre-wrap; margin-top: 10px; }
.reply-button { display: inline-block; background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-top: 20px; }
.footer { margin-top: 30px; border-top: 1px solid #eeeeee; padding-top: 15px; font-size: 12px; color: #999999; }
</style>
</head>
<body>
<div class="container">
<h1>🔔 New Contact Form Submission</h1>

    <p>A user has submitted a new message through the contact form on your website.</p>

    <h3>Submission Details</h3>
    <div class="detail-item">
        <span class="detail-label">Name:</span> 
        <span>{{ $data['name'] }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Email:</span> 
        <span>{{ $data['email'] }}</span>
    </div>

    <h3>Message</h3>
    <div class="message-box">
        {{ $data['message'] }}
    </div>

    <a href="mailto:{{ $data['email'] }}" class="reply-button">Reply Directly to {{ $data['name'] }}</a>

    <div class="footer">
        This notification was sent automatically by the {{ config('app.name') }} system.
    </div>
</div>

</body>
</html>
