<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? 'New Website Enquiry');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    http_response_code(400);
    exit('Please fill all required fields.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Invalid email address.');
}

$to = 'aviash120@gmail.com';
$mail_subject = 'Website Lead: ' . $subject;

$body = "Name: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Phone: {$phone}\n";
$body .= "Subject: {$subject}\n\n";
$body .= "Message:\n{$message}\n";

$headers = [];
$headers[] = 'From: Visa Academy <no-reply@YOURDOMAIN.com>';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

$sent = mail($to, $mail_subject, $body, implode("\r\n", $headers));

if ($sent) {
    header('Location: thank-you.html');
    exit;
}

http_response_code(500);
echo 'Something went wrong. Please try again.';
