<?php include 'header.php'; 

include 'send_mail.php'; // Include email function

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    // Store in the database
    $query = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $query)) {
        // Fetch all admin emails
        $adminQuery = "SELECT email FROM users WHERE role_id = '1'";
        $adminResult = mysqli_query($conn, $adminQuery);
        $adminEmails = [];

        while ($row = mysqli_fetch_assoc($adminResult)) {
            $adminEmails[] = $row['email'];
        }
// echo "email_test";
//         print_r($adminEmails);
//         exit;
        // Send email to all admins
        $adminEmailContent = "New contact form submission from:\n\nName: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
        foreach ($adminEmails as $adminEmail) {
            sendMail($adminEmail, "New Contact Form Submission", $adminEmailContent);
        }

        // Send confirmation email to user
        $userEmailContent = "Dear $name,\n\nThank you for reaching out! We have received your message and will contact you soon.\n\nBest regards,\nSupport Team";
        if(sendMail($email, "We Received Your Message", $userEmailContent)){

            echo "<script>alert('Your message has been sent successfully!'); window.location.href = 'contact_us.php';</script>";
        }

    } else {
        echo "<script>alert('Error submitting form. Please try again.');</script>";
    }
}
?>

<section id="contact" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Get In Touch</h2>
                    <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                    <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Contact Box -->
                <div class="contact-box text-center">
                    <!-- Contact Form -->
                    <form id="" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn mt-3"><span class="text-white pr-3"><svg
                                            class="svg-inline--fa fa-paper-plane fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="paper-plane" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z">
                                            </path>
                                        </svg><!-- <i class="fas fa-paper-plane"></i> --></span>Send Message</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
