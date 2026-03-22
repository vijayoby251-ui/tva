<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = "aviash120@gmail.com";
$subject = "New Website Lead";

$body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

$headers = "From: no-reply@thevisaacademy.com";

mail($to, $subject, $body, $headers);

header("Location: thank-you.html");
exit();
}
?>
