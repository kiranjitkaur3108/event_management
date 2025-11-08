<!DOCTYPE html>
<html> <head> <meta charset="utf-8"> <title>Contact Confirmation</title> 
<style> 
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; } 
    .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; } /* Using a color similar to your contact form's accent color (#ae674e) */ 
    .header { background-color: #ae674e; color: white; padding: 15px; text-align: center; border-radius: 6px 6px 0 0; } .content { padding: 20px 0; } .message-box { background-color: #f9f9f9; border-left: 5px solid #ae674e; padding: 15px; margin: 20px 0; white-space: pre-wrap; } .footer { text-align: center; font-size: 12px; color: #777; margin-top: 20px; } 
    </style> 
    </head> 
    <body> <div class="container"> <div class="header"> <h2>Thank You, {{ $name }}!</h2> </div> <div class="content"> <p>We have successfully received your message and appreciate you reaching out. A copy of your submission is included below for your records.</p>
        <p>We will review your inquiry and get back to you as soon as possible.</p>
        
        <h3>Your Submitted Message:</h3>
        <div class="message-box">
            {{ $message_body }}
        </div>
        
        <p>Best Regards,</p>
        <p>The {{ config('app.name') }} Team</p>
    </div>
    <div class="footer">
        This is an automated confirmation email.
    </div>
</div>
</body>
</html>
