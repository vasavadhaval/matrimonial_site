<?php include 'db.php'; 
session_start();
?>
<?php 
include '../send_mail.php'; // Include mail function

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


<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Marriage Beauro Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo/logo2.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo"><img src="../assets/img/logo/logo2.png" alt=""
                                        srcset="" width="55px;">
                                </span>
                                <span class="app-brand-text demo text-heading fw-bold">Marriage Beauro</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Forgot Password? 🔒</h4>
                        <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="formAuthentication" class="mb-6"  method="POST">
                            <?php if (!empty($successMessage)): ?>
                            <div class="alert alert-success"><?= $successMessage ?></div>
                            <?php elseif (!empty($errorMessage)): ?>
                            <div class="alert alert-danger"><?= $errorMessage ?></div>
                            <?php endif; ?>
                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="auth-login-basic.html" class="d-flex justify-content-center">
                                <i class="icon-base bx bx-chevron-left scaleX-n1-rtl me-1"></i>
                                Back to login
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>