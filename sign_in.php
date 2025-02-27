<?php include 'header.php'; 

?>
<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND role_id = 2";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] == 'pending') { // Wait for admin approval
            echo "<script>alert('Your account is pending approval. Please wait for admin approval.');</script>";
        } elseif ($password == $row['password']) { // Verify password
            $_SESSION['is_login'] = true;
            $_SESSION['user_data'] = [
                'id' => $row['id'],
                'full_name' => $row['full_name'],
                'email' => $row['email'],
                'phone_no' => $row['phone_no']
            ];
            echo "<script>
                alert('Login successful.');
                window.location.href = 'update_profile.php';
            </script>";
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.');</script>";
    }
}
?>


<section id="contact" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Marriage Beauro Sing In</h2>
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
                <div class="contact-box">
                    <!-- Contact Form -->
                    <form action="#" method="POST">
                        <!-- Personal Information -->
                        <div class="row">


                            <div class="col-12">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" name="email"
                                        placeholder="Enter the G-Mail" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="forgot_password.php">
                                        Forgot Password?
                                    </a>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" name="password" required
                                        placeholder="Enter your password">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn mt-3 w-100"><span class="text-white ">
                                        <!-- <i class="fas fa-paper-plane"></i> -->
                                    </span>Log In</button>
                            </div>
                            <div class="col-12 mt-2">
                                <p class="text-center">
                                    <span>New on our platform?</span>
                                    <a href="sign_up.php">
                                        <span>Registration</span>
                                    </a>
                                </p>
                            </div>


                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>