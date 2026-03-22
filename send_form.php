<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $email = htmlspecialchars(trim($_POST['email']));
    $job_title = htmlspecialchars(trim($_POST['job_title']));
    $location = htmlspecialchars(trim($_POST['location']));

    // Email details
    $to = "info@thevisaacademy.com";
    $subject = "New Contact Form Submission - The Visa Academy";
    $message = "You have a new contact form submission:\n\n";
    $message .= "Name: $name\n";
    $message .= "Mobile: $mobile\n";
    $message .= "Email: $email\n";
    $message .= "Job Title: $job_title\n";
    $message .= "Current Location: $location\n";
    
    // Headers
    $headers = "From: noreply@thevisaacademy.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to Thank You page
        header("Location: thankyou.html");
        exit;
    } else {
        echo "<h2 style='color:red; text-align:center;'>❌ Sorry! Something went wrong. Please try again.</h2>";
    }
} else {
    echo "<h2 style='color:red; text-align:center;'>Invalid Request</h2>";
}
?>
