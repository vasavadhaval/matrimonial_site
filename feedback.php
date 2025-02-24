<?php 
include 'header.php'; 
include 'send_mail.php'; // Include email function

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // Start session if not already started

    $user_id = isset($_SESSION['user_data']['id']) ? $_SESSION['user_data']['id'] : NULL;
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $review = mysqli_real_escape_string($conn, $_POST["review"]);

    // Store in the database
    $query = "INSERT INTO reviews (user_id, email, review) VALUES ('$user_id', '$email', '$review')";
    
    if (mysqli_query($conn, $query)) {
        // Fetch all admin emails
        $adminQuery = "SELECT email FROM users WHERE role_id = '1'";
        $adminResult = mysqli_query($conn, $adminQuery);
        $adminEmails = [];

        while ($row = mysqli_fetch_assoc($adminResult)) {
            $adminEmails[] = $row['email'];
        }

        // Send email to all admins
        $adminEmailContent = "New feedback received:\n\nUser ID: $user_id\nEmail: $email\nReview: $review";
        foreach ($adminEmails as $adminEmail) {
            sendMail($adminEmail, "New Feedback Received", $adminEmailContent);
        }

        // Send confirmation email to user
        $userEmailContent = "Dear User,\n\nThank you for your feedback! We appreciate your time and effort.\n\nBest regards,\nSupport Team";
        if(sendMail($email, "Thank You for Your Feedback", $userEmailContent)){
            echo "<script>alert('Your feedback has been submitted successfully!'); window.location.href = 'feedback.php';</script>";
        }
    } else {
        echo "<script>alert('Error submitting feedback. Please try again.');</script>";
    }
}
?>

<section id="feedback" class="feedback-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Give Your Feedback</h2>
                    <p class="mt-4">Your feedback helps us improve our services. Please share your experience with us.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contact-box text-center">
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="required">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="review" placeholder="Your Feedback" required="required"></textarea>
                        </div>
                        <button type="submit" class="btn mt-3">
                            <span class="text-white pr-3">
                                <svg class="svg-inline--fa fa-paper-plane fa-w-16" aria-hidden="true" focusable="false" 
                                    data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor" 
                                        d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2
                                        c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2
                                        c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                </svg>
                            </span> Submit Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
