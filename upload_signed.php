<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

$data = file_get_contents("php://input");

if (!$data) {
    http_response_code(400);
    echo "No data received.";
    exit;
}

$name = $_GET['name'] ?? 'Anonymous';
$clientEmail = $_GET['email'] ?? ''; // get client email from URL

// Create signed directory if it doesn't exist
$signedDir = "signed/";
if (!file_exists($signedDir)) {
    mkdir($signedDir, 0777, true);
}

$filename = $signedDir . "Signed_" . preg_replace("/[^a-zA-Z0-9]/", "_", $name) . "_" . date('Ymd_His') . ".pdf";
file_put_contents($filename, $data);

// Send email
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
$mail->addAddress('legal@thevisaacademy.com', 'Admin');
    if (filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
    $mail->addAddress($clientEmail, $name); // send to client too
}

    $mail->isHTML(true);
    $mail->Subject = 'Signed Agreement Received';
    $mail->Body = "A signed agreement has been submitted by <b>$name</b>.";

    $mail->addAttachment($filename);

    $mail->send();
    echo "✅ Signed PDF uploaded and emailed successfully.";
} catch (Exception $e) {
    echo "❌ Mailer Error: " . $mail->ErrorInfo;
}
// Optional: Delete or rename the original file after signing
if (file_exists($file)) {
    rename($file, $file . '.used'); // prevents re-signing
}

?>
