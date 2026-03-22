<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load PHPMailer classes
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

// Get form data
$clientName = $_POST['client_name'];
$clientEmail = $_POST['client_email'];
$pdfFile = $_FILES['agreement'];

// Save uploaded file
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}
$targetFile = $targetDir . basename($pdfFile["name"]);
move_uploaded_file($pdfFile["tmp_name"], $targetFile);

// Create signing link (no expiry)
$link = "https://thevisaacademy.com/sign.php?" .
        "file=" . urlencode($targetFile) .
        "&name=" . urlencode($clientName) .
        "&email=" . urlencode($clientEmail);

// Send email to client
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.in';
    $mail->SMTPAuth = true;
    $mail->Username = 'legal@thevisaacademy.com';
    $mail->Password = 'Ashish120@';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('legal@thevisaacademy.com', 'The Visa Academy');
    $mail->addAddress($clientEmail, $clientName);
    $mail->isHTML(true);
    $mail->Subject = 'Please Sign Your Visa Academy Agreement';
    $mail->Body = "
        Dear $clientName,<br><br>
        Please sign your agreement using the link below:<br>
        <a href='$link'>$link</a><br><br>
        Regards,<br>
        The Visa Academy
    ";

    $mail->send();
    echo "✅ Email sent successfully to $clientEmail";
} catch (Exception $e) {
    echo "❌ Mailer Error: " . $mail->ErrorInfo;
}
?>
