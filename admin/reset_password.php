<?php include 'db.php'; 
session_start();
?>
<?php

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
                echo "<script>alert('Password reset successful. You can now log in.'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Error updating password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Invalid or expired token!'); window.location.href = 'forgot_password.php';</script>";
        }
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
                        <h4 class="mb-1">Reset Password 🔒</h4>
                        <p class="mb-6"><span class="fw-medium">Your new password must be different from previously used
                                passwords</span></p>
                        <form id="formAuthentication" method="POST"
                            class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password" id="password" class="form-control" name="new_password"
                                        placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base bx bx-hide"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password" id="confirm-password" class="form-control"
                                        name="confirm_password" placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base bx bx-hide"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary d-grid w-100 mb-6">Set new password</button>
                            <div class="text-center">
                                <a href="auth-login-basic.html">
                                    <i class="icon-base bx bx-chevron-left scaleX-n1-rtl me-1 align-top"></i>
                                    Back to login
                                </a>
                            </div>
                            <input type="hidden">
                        </form>
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