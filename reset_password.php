<?php include 'header.php'; 

$token = isset($_GET['token']) ? $_GET['token'] : '';

if (!$token) {
    echo "<script>alert('Invalid or expired link!'); window.location.href = 'forgot_password.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Validate token and get email
        $query = "SELECT email FROM password_resets WHERE token = '$token' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];

            // Update password WITHOUT encryption
            $updateQuery = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
            
            if (mysqli_query($conn, $updateQuery)) {
                // Remove token from database
                mysqli_query($conn, "DELETE FROM password_resets WHERE token = '$token'");
                echo "<script>alert('Password reset successful. You can now log in.'); window.location.href = 'sign_in.php';</script>";
            } else {
                echo "<script>alert('Error updating password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Invalid or expired token!'); window.location.href = 'forgot_password.php';</script>";
        }
    }
}
?>

<section id="reset-password" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Reset Password</h2>
                    <p class="mt-4">Enter your new password below.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contact-box">
                    <form action="#" method="POST">
                        <input type="hidden" name="email" value="<?php echo $_GET['email'] ?? ''; ?>">
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Enter new password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn mt-3 w-100">Reset Password</button>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <a href="sign_in.php">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(event) {
        var password = $('#new_password').val();
        var confirmPassword = $('#confirm_password').val();
        
        if (password !== confirmPassword) {
            event.preventDefault();
            if ($('#password-error').length === 0) {
                $('#confirm_password').after('<span id="password-error" style="color: red;">Passwords do not match</span>');
            }
        } else {
            $('#password-error').remove();
        }
    });
});
</script>