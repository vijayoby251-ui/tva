<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@thevisaacademy.com";
    $subject = "New Contact Form Submission";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = strip_tags(trim($_POST["message"]));

    $email_body = "You have received a new message from The Visa Academy contact form:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n\n";
    $email_body .= "Message:\n$message\n";

    $headers = "From: The Visa Academy <no-reply@thevisaacademy.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $email_body, $headers)) {
        header("Location: contact.php?success=true");
    } else {
        header("Location: contact.php?success=false");
    }
    exit;
}
?>
