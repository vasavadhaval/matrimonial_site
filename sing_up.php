<?php include 'header.php'; 

?>

<?php

if (isset($_POST['submit'])) {

//     Array
// (
//     [full_name] => Josephine Rivas
//     [dob] => 1972-12-08
//     [gender] => widowed
//     [email] => gujir@mailinator.com
//     [phone_no] => +1 (881) 302-7116
//     [height] => Perferendis ipsam au
//     [weight] => Placeat ex blanditi
//     [cast] => Brahmin
//     [place_of_birth] => Doloribus incididunt
//     [state] => Arunachal pradesh
//     [city] => Tamilnadu
//     [religion] => Buddhist
//     [mother_tongue] => Oriya
//     [education] => Ipsum earum non des
//     [occupation] => Itaque deserunt est 
//     [income] => 394
//     [father_occupation] => Cupidatat numquam ha
//     [mother_occupation] => Dolorem enim nihil e
//     [siblings] => Alias facere amet d
//     [partner_age] => Nostrum optio autem
//     [partner_height] => Adipisicing incididu
//     [partner_religion] => Cillum sit dolore ni
//     [personality_traits] => Perferendis pariatur
//     [hobbies] => Sunt sit similique 
//     [about_me] => Eum ut rem enim quas
//     [submit] => 
// )


    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    
    $status = 'pending';

    $sql = "INSERT INTO users (full_name, email, phone_no, password, status) 
            VALUES ('$full_name', '$email', '$phone_no', '$password', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Your profile is created successfully.');
            window.location.href = 'sing_in.php';
        </script>";
    } else {
        echo "<script>alert('Error: " . $sql . " <br> " . mysqli_error($conn) . "');</script>";
    }

    // if (mysqli_query($conn, $sql)) {

    //     $_SESSION['is_login'] = true;
    //     $_SESSION['user_data'] = [
    //         'full_name' => $full_name,
    //         'email' => $email,
    //         'phone_no' => $phone_no
    //     ];
    //     echo "<script>
    //         if (confirm('Your profile is created successfully. Do you want to stay logged in?')) {
    //             window.location.href = 'update_profile.php';
    //         } else {";

    //         session_unset();
    //         session_destroy();

    //            echo "   window.location.href = 'sing_in.php';
    //         }
    //           </script>";
    // } else {
    //     echo "<script>alert('Error:  ". $sql ." <br> ". mysqli_error($conn).");</script>";
    // }


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