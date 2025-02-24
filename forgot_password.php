<?php include 'header.php'; 
include 'send_mail.php'; // Include mail function

if (isset($_POST['submit'])) {
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Check if email exists
        $query = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $user_id = $user['id'];

            // Generate a unique token
            $token = bin2hex(random_bytes(32));

            // Delete any existing token for this user
            mysqli_query($conn, "DELETE FROM password_resets WHERE email = '$email'");

            // Save the token in the database
            $insertQuery = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
            mysqli_query($conn, $insertQuery);

            // Send reset email
            $emailSent = sendResetPasswordMail($base_url,$email, $token);

            if ($emailSent === true) {
                $successMessage = "A password reset link has been sent to your email.";
            } else {
                $errorMessage = "Mail error: " . htmlspecialchars($emailSent);
            }
        } else {
            $errorMessage = "Email not found!";
        }
    } else {
        $errorMessage = "Please enter your email.";
    }
}
?>

<section id="forgot-password" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Forgot Password</h2>
                    <p class="mt-4">Enter your email address, and we will send you a reset link.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contact-box">
                    
                    <?php if (!empty($successMessage)): ?>
                        <div class="alert alert-success"><?= $successMessage ?></div>
                    <?php elseif (!empty($errorMessage)): ?>
                        <div class="alert alert-danger"><?= $errorMessage ?></div>
                    <?php endif; ?>
                    
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Send Reset Link</button>
                            </div>
                            <div class="col-12 mt-2 text-center">
                                <a href="sign_in.php">Back to Login</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
