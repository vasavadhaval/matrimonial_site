<?php 
include 'header.php'; 
include 'send_mail.php'; // Include email function

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $status = 'pending';

    // Check if the email already exists
    $check_email_query = "SELECT * FROM users WHERE email='$email' AND role_id = 2";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Email already exists. Please use a different email.');
            window.location.href = 'sign_up.php';
        </script>";
    } else {
        $sql = "INSERT INTO users (full_name, email, phone_no, password, status) 
                VALUES ('$full_name', '$email', '$phone_no', '$password', '$status')";

        if (mysqli_query($conn, $sql)) {
            // Notify all admins
            $adminQuery = "SELECT email FROM users WHERE role_id = 1"; // Fetch all admins
            $adminResult = mysqli_query($conn, $adminQuery);
            $adminEmails = [];

            while ($row = mysqli_fetch_assoc($adminResult)) {
                $adminEmails[] = $row['email'];
            }

            // Email content for admins
            $adminEmailContent = "A new user has registered and is awaiting approval:\n\n
                Name: $full_name\n
                Email: $email\n
                Phone No: $phone_no\n
                Status: Pending Approval\n\n
                Please log in to the admin panel to approve or reject the registration.";

            // Send notification to all admins
            foreach ($adminEmails as $adminEmail) {
                sendMail($adminEmail, "New User Registration Pending Approval", $adminEmailContent);
            }

            echo "<script>
                alert('Your profile is created successfully and awaiting admin approval.');
                window.location.href = 'sign_in.php';
            </script>";
        } else {
            echo "<script>alert('Error: " . $sql . " <br> " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>


<section id="contact" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Marriage Beauro Sing Up</h2>
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
                                    <label for="fullName">Full Name</label>
                                    <input type="text" id="fullName" class="form-control" name="full_name"
                                        placeholder="Enter the Full Name" required>
                                </div>
                            </div>


                            <div class="col-12">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" name="email"
                                        placeholder="Enter the G-Mail" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone_no">Phone no :</label>
                                    <input type="text" id="phone_no" class="form-control" name="phone_no" required
                                        placeholder="+91">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" id="password" class="form-control" name="password" required
                                        placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password :</label>
                                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" required
                                        placeholder="Confirm your password">
                                </div>
                            </div>
                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn mt-3 w-100"><span class="text-white ">
                                        <!-- <i class="fas fa-paper-plane"></i> -->
                                    </span>Create Profile</button>
                            </div>
                            <div class="col-12 mt-2">
                                <p class="text-center">
                                    <span>Already have an account?</span>
                                    <a href="sign_in.php">
                                        <span>Sign in instead</span>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(event) {
        var password = $('#password').val();
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