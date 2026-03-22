<?php include 'header.php'; ?>

<div class="brid-banner">
   <img src="images/Contact.png" alt="img">
</div>



<!-- Alert Message -->
<div class="container">
    <?php if (isset($_GET['success']) && $_GET['success'] === "true"): ?>
        <div class="alert alert-success">✅ Thank you! Our team will contact you soon.</div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] === "false"): ?>
        <div class="alert alert-danger">❌ Sorry, message not sent. Please try again.</div>
    <?php endif; ?>
</div>

<!-- Page Contact Info Start -->
<div class="page-contact-us py-5">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Email -->
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="contact-info-item">
                    <div class="icon-box mb-3">
                        <img src="images/icon-mail.svg" alt="Email Icon">
                    </div>
                    <div class="contact-info-content">
                        <h3>Email</h3>
                        <p>Info@thevisaacademy.com</p>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="contact-info-item">
                    <div class="icon-box mb-3">
                        <img src="images/icon-location.svg" alt="Location Icon">
                    </div>
                    <div class="contact-info-content">
                        <h3>Address</h3>
                        <p>477 A, 4th Floor, Aggarwal Millennium Tower 2, NSP Pitampura, New Delhi – 110034</p>
                    </div>
                </div>
            </div>

            <!-- Timing -->
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="contact-info-item">
                    <div class="icon-box mb-3">
                        <img src="images/icon-watch.svg" alt="Time Icon">
                    </div>
                    <div class="contact-info-content">
                        <h3>Timing</h3>
                        <p>Monday to Friday</p>
                        <p>10 AM - 6 PM</p>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="contact-info-item">
                    <div class="icon-box mb-3">
                        <img src="images/icon-phone.svg" alt="Phone Icon">
                    </div>
                    <div class="contact-info-content">
                        <h3>Phone</h3>
                        <p>+91-11-49092777</p>
                        <p>+91-9211299855</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
$feedback = ""; // Initialize feedback message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "aviash120@gmail.com";
    $subject = "New Contact Form Submission";

    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email body
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $feedback = "Thank you! Our team will contact you shortly.";
    } else {
        $feedback = "Sorry, we couldn’t send your message. Please try again later.";
    }
}
?>

<!-- Contact Form Section Start -->
<div class="contact-form-section py-5">
    <div class="container">
        <div class="row">

            <!-- Left Content -->
            <div class="col-lg-6">
                <div class="section-title">
                    <h3>Contact Information</h3>
                    <h2>Let your wanderlust guide you</h2>
                    <p>For all your needs, feel free to reach out to us. Our expert team is ready to assist you with personalized solutions.</p>
                </div>
            </div>

            <!-- Right Form -->
            <div class="col-lg-6">
                <?php if (!empty($feedback)): ?>
                    <div style="background-color: #FFA500; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
                        <?= $feedback ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required style="border: 1px solid #ccc; outline: none;">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required style="border: 1px solid #ccc; outline: none;">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone" required style="border: 1px solid #ccc; outline: none;">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <textarea name="message" class="form-control" rows="4" placeholder="Write Message..." required style="border: 1px solid #ccc; outline: none;"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #FFA500; border: none; padding: 12px 20px; font-size: 16px; color: white; border-radius: 5px;">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Contact Form Section End -->



<!-- Google Map Start -->
<div class="google-map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="google-map-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14024.280971849626!2d77.1319896!3d28.6996217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0167af60a0fb%3A0x4b8bae2b8ce4e0d3!2sAggarwal%20Millennium%20Tower%20II%2C%20Netaji%20Subhash%20Place%2C%20Pitampura%2C%20New%20Delhi%2C%20Delhi%20110034!5e0!3m2!1sen!2sin!4v1719231234567!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" title="The Visa Academy Location" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Google Map End -->

<?php include 'footer.php'; ?>
