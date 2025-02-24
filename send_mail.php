<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer/src/Exception.php");
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

function sendResetPasswordMail($base_url,$email, $token) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; 
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = "vasavadhaval1149@gmail.com"; 
    $mail->Password = "fabo owqq rguo zmqs";

    $mail->From = "vasavadhaval1149@gmail.com";
    $mail->FromName = "Marriage Beauro";
    $mail->Subject = "Password Reset Request";

    if (!empty($email)) {
        $mail->addAddress($email);
    } else {
        return "Recipient email is missing!";
    }

    $resetLink = $base_url."/reset_password.php?token=$token";
    $mail_body = '
    <html>
    <head><title>Password Reset</title></head>
    <body>
        <h2>Password Reset Request</h2>
        <p>You requested a password reset. Click the button below to reset your password:</p>
        <p><a href="'.$resetLink.'" style="background:#20e277; color:#fff; padding:10px 20px; text-decoration:none; border-radius:5px;">Reset Password</a></p>
        <p>If you did not request this, please ignore this email.</p>
    </body>
    </html>';
    
    $mail->Body = $mail_body;
    $mail->IsHTML(true);

    if ($mail->Send()) {
        return true; 
    } else {
        return $mail->ErrorInfo; 
    }
}
function sendMail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = "smtp.gmail.com"; 
        $mail->Port = 587; 
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
    
        $mail->Username = "vasavadhaval1149@gmail.com"; 
        $mail->Password = "fabo owqq rguo zmqs";
    
        $mail->From = "vasavadhaval1149@gmail.com";
        $mail->FromName = "Marriage Beauro";
        $mail->Subject = "Password Reset Request";
        // Email settings
        $mail->setFrom('vasavadhaval1149@example.com', 'Support Team'); // Change this
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->Send()) {
            return true; 
        } else {
            return $mail->ErrorInfo; 
        }
    } catch (Exception $e) {
        return "Mail Error: " . $mail->ErrorInfo;
    }
}
?>
