<?php include 'header.php'; 

if (isset($_POST['verify'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);
    
    // Check if OTP is valid and not expired
    $query = "SELECT * FROM otp_verifications WHERE email = '$email' AND otp = '$otp' AND expires_at > NOW()";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // OTP is valid
        echo "<script>alert('OTP verified successfully.'); window.location.href = 'reset_password.php?email=$email';</script>";
    } else {
        echo "<script>alert('Invalid or expired OTP. Please try again.');</script>";
    }
}
?>

<section id="verify-otp" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Verify OTP</h2>
                    <p class="mt-4">Enter the OTP sent to your email address.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contact-box">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="otp">OTP</label>
                            <input type="text" id="otp" class="form-control" name="otp" placeholder="Enter OTP" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="verify" class="btn mt-3 w-100">Verify OTP</button>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <a href="forgot_password.php">Resend OTP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
