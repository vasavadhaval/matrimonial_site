<?php include 'header.php'; 

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    // $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        // $query = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
        $query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Password reset successful. You can now log in.'); window.location.href = 'sing_in.php';</script>";
        } else {
            echo "<script>alert('Error updating password. Please try again.');</script>";
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
                            <a href="sing_in.php">Back to Login</a>
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