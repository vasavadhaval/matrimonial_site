<?php include 'header.php'; 

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND role_id = 2";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $otp = rand(100000, 999999);
        $otp = 123456;

        
        // Store OTP in database
        $query = "INSERT INTO otp_verifications (email, otp) VALUES ('$email', '$otp')
                  ON DUPLICATE KEY UPDATE otp = '$otp'";
        mysqli_query($conn, $query);
        
        // Here you would integrate an email sending function
        // mail($email, "Password Reset OTP", "Your OTP is: $otp");
        
        echo "<script>alert('OTP has been sent to your email.'); window.location.href = 'verify_otp.php';</script>";
    } else {
        echo "<script>alert('No user found with this email.');</script>";
    }
}
?>

<section id="forgot-password" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Forgot Password</h2>
                    <p class="mt-4">Enter your email address, and we will send you an OTP to reset your password.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contact-box">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn mt-3 w-100">Send OTP</button>
                            </div>
                            
                            <div class="col-12 mt-2 text-center">
                                <a href="sing_in.php">Back to Login</a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
