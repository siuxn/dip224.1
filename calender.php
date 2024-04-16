<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Enable SMTP debugging (0 for no debugging output)
$mail->SMTPDebug = 0;

// Set mailer to use SMTP
$mail->isSMTP();

// Specify SMTP server
$mail->Host = 'smtp.gmail.com'; // Your SMTP server address

// Enable SMTP authentication
$mail->SMTPAuth = true;

// SMTP username
$mail->Username = 'tan.raelyn@gmail.com';

// SMTP password
$mail->Password = 'lmqk opkc dzzd zkwm';

// SMTP encryption (TLS or SSL)
$mail->SMTPSecure = 'tls'; // Options: 'ssl' or 'tls'

// SMTP port (SSL: 465, TLS: 587)
$mail->Port = 587; // Change to the appropriate port for your SMTP server

// Set sender and recipient
$mail->setFrom('tan.raelyn@gmail.com', 'Rae');
$mail->addAddress('tan.raelyn@gmail.com', 'Raelynn');

// Set email subject and message
$mail->Subject = 'Test Email';
$mail->Body    = 'This is a test email sent via SMTP using PHPMailer.';

// Send the email
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>