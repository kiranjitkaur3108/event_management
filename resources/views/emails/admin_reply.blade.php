<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reply from Celebrations</title>
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
        }
        .message-box { 
            background-color: #f9f9f9; 
            border-left: 5px solid #ae674e; 
            padding: 15px; 
            margin: 20px 0; 
            white-space: pre-wrap; 
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
        <h2>Reply from Celebrations</h2>
    </div>
    <div class="content">
        <p>Hello {{ $contact->name }},</p>
        <p>We are replying to your message:</p>

        <div class="message-box">
            {{ $messageBody }}
        </div>

        <p>Best Regards,<br>The Celebrations Team</p>
    </div>
</div>
</body>
</html>
