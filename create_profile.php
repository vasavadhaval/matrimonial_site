<?php include 'header.php'; ?>

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
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cast = $_POST['cast'];
    $place_of_birth = $_POST['place_of_birth'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $religion = $_POST['religion'];
    $mother_tongue = $_POST['mother_tongue'];
    $education = $_POST['education'];
    $occupation = $_POST['occupation'];
    $income = $_POST['income'];
    $father_occupation = $_POST['father_occupation'];
    $mother_occupation = $_POST['mother_occupation'];
    $siblings = $_POST['siblings'];
    $partner_age = $_POST['partner_age'];
    $partner_height = $_POST['partner_height'];
    $partner_religion = $_POST['partner_religion'];
    $personality_traits = $_POST['personality_traits'];
    $hobbies = $_POST['hobbies'];
    $about_me = $_POST['about_me'];
    $what_are_you_looking_for = $_POST['what_are_you_looking_for'];
    $status = 'pending';

    $sql = "INSERT INTO users (full_name, dob, gender, email, phone_no, height, weight, cast, place_of_birth, state, city, religion, mother_tongue, education, occupation, income, father_occupation, mother_occupation, siblings, partner_age, partner_height, partner_religion, personality_traits, hobbies, about_me, what_are_you_looking_for, status) 
            VALUES ('$full_name', '$dob', '$gender', '$email', '$phone_no', '$height', '$weight', '$cast', '$place_of_birth', '$state', '$city', '$religion', '$mother_tongue', '$education', '$occupation', '$income', '$father_occupation', '$mother_occupation', '$siblings', '$partner_age', '$partner_height', '$partner_religion', '$personality_traits', '$hobbies', '$about_me', '$what_are_you_looking_for', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error:  ". $sql ." <br> ". mysqli_error($conn).");</script>";
    }


}
?>

<section id="contact" class="contact-area ptb_100 mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Marriage Beauro Profile</h2>
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
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" class="form-control" name="dob" required>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="Kerala">Select Gender</option>

                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
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
                                    <label for="Phone no">Phone no :</label>
                                    <input type="text" id="Phone no" class="form-control" name="phone_no" required
                                        placeholder="+91">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">


                                <div class="form-group menu">
                                    <label for="height">Height</label>
                                    <input type="text" id="height" class="form-control" name="height" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group main">
                                    <label for="weight">Weight</label>
                                    <input type="text" id="weight" class="form-control" name="weight">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">


                                <div class="form-group menu">
                                    <label for="Cast">Cast</label>
                                    <select id="Cast" class="form-control" name="cast" required>
                                        <option value="Kerala">Select Cast</option>

                                        <option value="Brahmin">Brahmin</option>
                                        <option value="Ezhava">Ezhava</option>
                                        <option value="Nair">Nair</option>
                                        <option value="Kayastha">Kayastha</option>
                                        <option value="Rajput">Rajput</option>
                                        <option value="Vishwakarma">Vishwakarma</option>
                                        <option value="Maratha">Maratha</option>
                                        <option value="Chavra">Chavra</option>
                                        <option value="nadar">nadar</option>
                                        <option value="Reddy">Reddy</option>
                                        <option value="Iyer">Iyer</option>
                                        <option value="Baniya">Baniya</option>
                                        <option value="Chaurasia">Chaurasia</option>
                                        <option value="Yadav">Yadav</option>
                                        <option value="Vanniyar">Vanniyar</option>
                                        <option value="Naidu">Naidu</option>
                                        <option value="SC">SC</option>
                                        <option value="Buddhist">Buddhist</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group main">
                                    <label for="place of birth">Place of birth</label>
                                    <input type="text" id="weight" class="form-control" name="place_of_birth">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group menu">
                                    <label for="State">State</label>
                                    <select id="State" class="form-control" name="state" required>
                                        <option value="Kerala">Select State</option>

                                        <option value="Kerala">Kerala</option>
                                        <option value="Uttrakhand">Uttrakhand</option>
                                        <option value="Tamilnadu">Tamilnadu</option>
                                        <option value="Panjab">Panjab</option>
                                        <option value="Gujrat">Gujrat</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Madhya pradesh">Madhya pradesh</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Rajashthan">Rajashthan</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Arunachal pradesh">Arunachal pradesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group main">
                                    <label for="City">City</label>
                                    <select id="State" class="form-control" name="city" required>
                                        <option value="Kerala">Select City</option>

                                        <option value="Kerala">Kerala</option>
                                        <option value="Uttrakhand">Uttrakhand</option>
                                        <option value="Tamilnadu">Tamilnadu</option>
                                        <option value="Panjab">Panjab</option>
                                        <option value="Gujrat">Gujrat</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Madhya pradesh">Madhya pradesh</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Rajashthan">Rajashthan</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Arunachal pradesh">Arunachal pradesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">


                                <div class="form-group">
                                    <label for="Religion">Religion</label>
                                    <select id="Religion" class="form-control" name="religion" required>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Buddhist">Buddhist</option>
                                        <option value="Atheist">Atheist</option>
                                        <option value="Bahai">Bahai</option>
                                        <option value="Jew">Jew</option>
                                        <option value="Parsi">Parsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="Mother Tongue">Mother Tongue</label>
                                    <select id="Mother Tongue" class="form-control" name="mother_tongue" required>
                                        <option value="Tamil">Kerala</option>
                                        <option value="Panjabi">Panjabi</option>
                                        <option value="Telugu">Telugu</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Benali">Benali</option>
                                        <option value="Gujrati">Gujrati</option>
                                        <option value="Oriya">Oriya</option>
                                        <option value="Urdu">Urdu</option>
                                        <option value="Marathi">Marathi</option>
                                        <option value="Sindhi">Sindhi</option>
                                        <option value="Kannada">Kannada</option>
                                        <option value="Malayalam">Malayalam</option>
                                        <option value="Nepali">Nepali</option>
                                        <option value="Hariyani">Hariyani</option>
                                        <option value="Garhwali">Garhwali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">


                                <!-- Education & Profession -->
                                <div class="form-group">
                                    <label for="education">Highest Education</label>
                                    <input type="text" id="education" class="form-control" name="education" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">

                                <div class="form-group menu">
                                    <label for="Occupation">Occupation</label>
                                    <input type="text" id="height" class="form-control" name="occupation" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group main">
                                    <label for="Income">Income</label>
                                    <input type="text" id="weight" class="form-control" name="income">
                                </div>
                            </div>
                            <div class="col-12">

                                <!-- Family Information -->
                                <div class="form-group">
                                    <label for="fatherOccupation">Father's Occupation</label>
                                    <input type="text" id="fatherOccupation" class="form-control"
                                        name="father_occupation">
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="motherOccupation">Mother's Occupation</label>
                                    <input type="text" id="motherOccupation" class="form-control"
                                        name="mother_occupation">
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group menu">
                                    <label for="Siblings">Siblings</label>
                                    <input type="text" id="Siblings" class="form-control" name="siblings" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group main">
                                    <label for="Fmily Type">Family Type</label>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="Joint">Joint Family</option>
                                        <option value="nuclear">nuclear Family</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">

                                <!-- Partner Preferences -->
                                <div class="form-group">
                                    <label for="partnerAge">Preferred Age Range</label>
                                    <input type="text" id="partnerAge" class="form-control" name="partner_age">
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="partnerHeight">Preferred Height</label>
                                    <input type="text" id="partnerHeight" class="form-control" name="partner_height">
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="partnerReligion">Preferred Religion</label>
                                    <input type="text" id="partner_religion" class="form-control"
                                        name="partner_religion">
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="partnerReligion">Preferred edujcation</label>
                                    <input type="text" id="partner_religion" class="form-control"
                                        name="partner_religion">
                                </div>
                            </div>
                            <div class="col-12">

                                <!-- Personal Characteristics -->
                                <div class="form-group">
                                    <label for="personalityTraits">Personality Traits</label>
                                    <textarea id="personalityTraits" class="form-control" name="personality_traits"
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="hobbies">Hobbies/Interests</label>
                                    <textarea id="hobbies" class="form-control" name="hobbies" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="gender">Marital Status</label>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="Single">Single</option>
                                        <option value="divorce">divorce</option>
                                        <option value="widowed">widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="About Me">About Me</label>
                                    <textarea id="About Me" class="form-control" name="about_me"></textarea>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="What are ypu lokking for ?">What are you lokking for ?</label>
                                    <textarea id="What are ypu lokking for ?" class="form-control"
                                        name="what_are_you_looking_for" rows="2"></textarea>
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