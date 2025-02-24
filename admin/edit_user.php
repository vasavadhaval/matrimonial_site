<?php include 'header.php'; 


// Get user ID from URL parameter
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<p>User not found.</p>";
}

if (isset($_POST['submit'])) {
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

    $profile_img = $user['profile_img'];
    if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == 0) {
        $target_dir = __DIR__ . "/../uploads/"; 
        $target_file = $target_dir . basename($_FILES["profile_img"]["name"]);


        if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
            // $profile_img = $target_file;
            $profile_img =  'uploads/' . basename($_FILES["profile_img"]["name"]);

        }
    }

    $sql = "UPDATE users SET 
            full_name='$full_name', dob='$dob', gender='$gender', email='$email', phone_no='$phone_no', 
            height='$height', weight='$weight', cast='$cast', place_of_birth='$place_of_birth', state='$state', 
            city='$city', religion='$religion', mother_tongue='$mother_tongue', education='$education', 
            occupation='$occupation', income='$income', father_occupation='$father_occupation', 
            mother_occupation='$mother_occupation', siblings='$siblings', partner_age='$partner_age', 
            partner_height='$partner_height', partner_religion='$partner_religion', 
            personality_traits='$personality_traits', hobbies='$hobbies', about_me='$about_me', 
            what_are_you_looking_for='$what_are_you_looking_for', profile_img='$profile_img', status='$status' 
            WHERE id = $user_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Successfully Updated');</script>";
        echo "<script>window.location.href='edit_user.php?id=$user_id';</script>";
    } else {
        echo "<script>alert('Error: ". mysqli_error($conn) ."');</script>";
    }
}
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'sidebar.php'; ?>
            <div class="layout-page">
                <?php include 'navbar.php'; ?>
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users /</span> Edit User</h4>
                        <div class="app-ecommerce">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <div class="row">
                                <div class="col-12 col-lg-4">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Personal Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <img src="<?= str_replace('admin/', '', $base_url . '/' . $user['profile_img']); ?>"
                                                    class="img-fluid mb-3"
                                                    onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';"
                                                    alt="User Avatar">
                                                <div class="mb-3">
                                                    <label class="form-label" for="avatar">Update Avatar</label>
                                                    <input type="file" class="form-control" id="profileImg"
                                                        name="profile_img">
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="fullName">Full Name</label>
                                                            <input type="text" id="fullName" class="form-control"
                                                                name="full_name" placeholder="Enter the Full Name"
                                                                value="<?= htmlspecialchars($user['full_name'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label  class="form-label" for="dob">Date of Birth</label>
                                                            <input type="date" id="dob" class="form-control" name="dob"
                                                                value="<?= htmlspecialchars($user['dob'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label  class="form-label" for="gender">Gender</label>
                                                            <select id="gender" class="form-control" name="gender"
                                                                required>
                                                                <option value="">Select Gender</option>

                                                                <option value="Male"
                                                                    <?= isset($user['gender']) && $user['gender'] == 'Male' ? 'selected' : '' ?>>
                                                                    Male</option>
                                                                <option value="Female"
                                                                    <?= isset($user['gender']) && $user['gender'] == 'Female' ? 'selected' : '' ?>>
                                                                    Female</option>
                                                                <option value="Other"
                                                                    <?= isset($user['gender']) && $user['gender'] == 'Other' ? 'selected' : '' ?>>
                                                                    Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label  class="form-label" for="email">Email</label>
                                                            <input type="text" id="email" class="form-control"
                                                                name="email" placeholder="Enter the G-Mail"
                                                                value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label  class="form-label" for="Phone no">Phone no :</label>
                                                            <input type="text" id="Phone no" class="form-control"
                                                                name="phone_no" placeholder="+91"
                                                                value="<?= htmlspecialchars($user['phone_no'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">


                                                        <div class="form-group ">
                                                            <label  class="form-label" for="height">Height</label>
                                                            <input type="text" id="height" class="form-control"
                                                                name="height"
                                                                value="<?= htmlspecialchars($user['height'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 ">

                                                        <div class="form-group ">
                                                            <label  class="form-label" for="weight">Weight</label>
                                                            <input type="text" id="weight" class="form-control"
                                                                name="weight"
                                                                value="<?= htmlspecialchars($user['weight'] ?? '') ?>">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Additional Information</h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group ">
                                                            <label  class="form-label" for="Cast">Cast</label>
                                                            <select id="Cast" class="form-control" name="cast" required>
                                                                <option value="">Select Cast</option>

                                                                <option value="Brahmin"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Brahmin' ? 'selected' : '' ?>>
                                                                    Brahmin</option>
                                                                <option value="Ezhava"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Ezhava' ? 'selected' : '' ?>>
                                                                    Ezhava</option>
                                                                <option value="Nair"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Nair' ? 'selected' : '' ?>>
                                                                    Nair</option>
                                                                <option value="Kayastha"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Kayastha' ? 'selected' : '' ?>>
                                                                    Kayastha</option>
                                                                <option value="Rajput"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Rajput' ? 'selected' : '' ?>>
                                                                    Rajput</option>
                                                                <option value="Vishwakarma"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Vishwakarma' ? 'selected' : '' ?>>
                                                                    Vishwakarma</option>
                                                                <option value="Maratha"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Maratha' ? 'selected' : '' ?>>
                                                                    Maratha</option>
                                                                <option value="Chavra"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Chavra' ? 'selected' : '' ?>>
                                                                    Chavra</option>
                                                                <option value="nadar"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'nadar' ? 'selected' : '' ?>>
                                                                    nadar</option>
                                                                <option value="Reddy"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Reddy' ? 'selected' : '' ?>>
                                                                    Reddy</option>
                                                                <option value="Iyer"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Iyer' ? 'selected' : '' ?>>
                                                                    Iyer</option>
                                                                <option value="Baniya"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Baniya' ? 'selected' : '' ?>>
                                                                    Baniya</option>
                                                                <option value="Chaurasia"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Chaurasia' ? 'selected' : '' ?>>
                                                                    Chaurasia</option>
                                                                <option value="Yadav"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Yadav' ? 'selected' : '' ?>>
                                                                    Yadav</option>
                                                                <option value="Vanniyar"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Vanniyar' ? 'selected' : '' ?>>
                                                                    Vanniyar</option>
                                                                <option value="Naidu"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Naidu' ? 'selected' : '' ?>>
                                                                    Naidu</option>
                                                                <option value="SC"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'SC' ? 'selected' : '' ?>>
                                                                    SC
                                                                </option>
                                                                <option value="Buddhist"
                                                                    <?= isset($user['cast']) && $user['cast'] == 'Buddhist' ? 'selected' : '' ?>>
                                                                    Buddhist</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 col-md-6">

                                                        <div class="form-group main">
                                                            <label  class="form-label" for="place of birth">Place of birth</label>
                                                            <input type="text" id="place_of_birth" class="form-control"
                                                                name="place_of_birth"
                                                                value="<?= htmlspecialchars($user['place_of_birth'] ?? '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">

                                                        <div class="form-group ">
                                                            <label  class="form-label" for="State">State</label>
                                                            <select id="State" class="form-control" name="state"
                                                                required>
                                                                <option value="">Select State</option>
                                                                <option value="Kerala"
                                                                    <?= isset($user['state']) && $user['state'] == 'Kerala' ? 'selected' : '' ?>>
                                                                    Kerala</option>
                                                                <option value="Uttrakhand"
                                                                    <?= isset($user['state']) && $user['state'] == 'Uttrakhand' ? 'selected' : '' ?>>
                                                                    Uttrakhand</option>
                                                                <option value="Tamilnadu"
                                                                    <?= isset($user['state']) && $user['state'] == 'Tamilnadu' ? 'selected' : '' ?>>
                                                                    Tamilnadu</option>
                                                                <option value="Panjab"
                                                                    <?= isset($user['state']) && $user['state'] == 'Panjab' ? 'selected' : '' ?>>
                                                                    Panjab</option>
                                                                <option value="Gujrat"
                                                                    <?= isset($user['state']) && $user['state'] == 'Gujrat' ? 'selected' : '' ?>>
                                                                    Gujrat</option>
                                                                <option value="Manipur"
                                                                    <?= isset($user['state']) && $user['state'] == 'Manipur' ? 'selected' : '' ?>>
                                                                    Manipur</option>
                                                                <option value="Madhya pradesh"
                                                                    <?= isset($user['state']) && $user['state'] == 'Madhya pradesh' ? 'selected' : '' ?>>
                                                                    Madhya pradesh</option>
                                                                <option value="Odisha"
                                                                    <?= isset($user['state']) && $user['state'] == 'Odisha' ? 'selected' : '' ?>>
                                                                    Odisha</option>
                                                                <option value="Telangana"
                                                                    <?= isset($user['state']) && $user['state'] == 'Telangana' ? 'selected' : '' ?>>
                                                                    Telangana</option>
                                                                <option value="Rajashthan"
                                                                    <?= isset($user['state']) && $user['state'] == 'Rajashthan' ? 'selected' : '' ?>>
                                                                    Rajashthan</option>
                                                                <option value="Delhi"
                                                                    <?= isset($user['state']) && $user['state'] == 'Delhi' ? 'selected' : '' ?>>
                                                                    Delhi</option>
                                                                <option value="Assam"
                                                                    <?= isset($user['state']) && $user['state'] == 'Assam' ? 'selected' : '' ?>>
                                                                    Assam</option>
                                                                <option value="Meghalaya"
                                                                    <?= isset($user['state']) && $user['state'] == 'Meghalaya' ? 'selected' : '' ?>>
                                                                    Meghalaya</option>
                                                                <option value="Sikkim"
                                                                    <?= isset($user['state']) && $user['state'] == 'Sikkim' ? 'selected' : '' ?>>
                                                                    Sikkim</option>
                                                                <option value="West Bengal"
                                                                    <?= isset($user['state']) && $user['state'] == 'West Bengal' ? 'selected' : '' ?>>
                                                                    West Bengal</option>
                                                                <option value="Mizoram"
                                                                    <?= isset($user['state']) && $user['state'] == 'Mizoram' ? 'selected' : '' ?>>
                                                                    Mizoram</option>
                                                                <option value="Bihar"
                                                                    <?= isset($user['state']) && $user['state'] == 'Bihar' ? 'selected' : '' ?>>
                                                                    Bihar</option>
                                                                <option value="Arunachal pradesh"
                                                                    <?= isset($user['state']) && $user['state'] == 'Arunachal pradesh' ? 'selected' : '' ?>>
                                                                    Arunachal pradesh</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">

                                                        <div class="form-group main">
                                                            <label  class="form-label" for="City">City</label>
                                                            <select id="State" class="form-control" name="city"
                                                                required>
                                                                <option value="">Select State</option>
                                                                <option value="Kerala"
                                                                    <?= isset($user['city']) && $user['city'] == 'Kerala' ? 'selected' : '' ?>>
                                                                    Kerala</option>
                                                                <option value="Uttrakhand"
                                                                    <?= isset($user['city']) && $user['city'] == 'Uttrakhand' ? 'selected' : '' ?>>
                                                                    Uttrakhand</option>
                                                                <option value="Tamilnadu"
                                                                    <?= isset($user['city']) && $user['city'] == 'Tamilnadu' ? 'selected' : '' ?>>
                                                                    Tamilnadu</option>
                                                                <option value="Panjab"
                                                                    <?= isset($user['city']) && $user['city'] == 'Panjab' ? 'selected' : '' ?>>
                                                                    Panjab</option>
                                                                <option value="Gujrat"
                                                                    <?= isset($user['city']) && $user['city'] == 'Gujrat' ? 'selected' : '' ?>>
                                                                    Gujrat</option>
                                                                <option value="Manipur"
                                                                    <?= isset($user['city']) && $user['city'] == 'Manipur' ? 'selected' : '' ?>>
                                                                    Manipur</option>
                                                                <option value="Madhya pradesh"
                                                                    <?= isset($user['city']) && $user['city'] == 'Madhya pradesh' ? 'selected' : '' ?>>
                                                                    Madhya pradesh</option>
                                                                <option value="Odisha"
                                                                    <?= isset($user['city']) && $user['city'] == 'Odisha' ? 'selected' : '' ?>>
                                                                    Odisha</option>
                                                                <option value="Telangana"
                                                                    <?= isset($user['city']) && $user['city'] == 'Telangana' ? 'selected' : '' ?>>
                                                                    Telangana</option>
                                                                <option value="Rajashthan"
                                                                    <?= isset($user['city']) && $user['city'] == 'Rajashthan' ? 'selected' : '' ?>>
                                                                    Rajashthan</option>
                                                                <option value="Delhi"
                                                                    <?= isset($user['city']) && $user['city'] == 'Delhi' ? 'selected' : '' ?>>
                                                                    Delhi</option>
                                                                <option value="Assam"
                                                                    <?= isset($user['city']) && $user['city'] == 'Assam' ? 'selected' : '' ?>>
                                                                    Assam</option>
                                                                <option value="Meghalaya"
                                                                    <?= isset($user['city']) && $user['city'] == 'Meghalaya' ? 'selected' : '' ?>>
                                                                    Meghalaya</option>
                                                                <option value="Sikkim"
                                                                    <?= isset($user['city']) && $user['city'] == 'Sikkim' ? 'selected' : '' ?>>
                                                                    Sikkim</option>
                                                                <option value="West Bengal"
                                                                    <?= isset($user['city']) && $user['city'] == 'West Bengal' ? 'selected' : '' ?>>
                                                                    West Bengal</option>
                                                                <option value="Mizoram"
                                                                    <?= isset($user['city']) && $user['city'] == 'Mizoram' ? 'selected' : '' ?>>
                                                                    Mizoram</option>
                                                                <option value="Bihar"
                                                                    <?= isset($user['city']) && $user['city'] == 'Bihar' ? 'selected' : '' ?>>
                                                                    Bihar</option>
                                                                <option value="Arunachal pradesh"
                                                                    <?= isset($user['city']) && $user['city'] == 'Arunachal pradesh' ? 'selected' : '' ?>>
                                                                    Arunachal pradesh</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">


                                                        <div class="form-group">
                                                            <label  class="form-label" for="Religion">Religion</label>
                                                            <select id="Religion" class="form-control" name="religion"
                                                                required>
                                                                <option value="Hindu"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Hindu' ? 'selected' : '' ?>>
                                                                    Hindu</option>
                                                                <option value="Sikh"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Sikh' ? 'selected' : '' ?>>
                                                                    Sikh</option>
                                                                <option value="Christian"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Christian' ? 'selected' : '' ?>>
                                                                    Christian</option>
                                                                <option value="Muslim"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Muslim' ? 'selected' : '' ?>>
                                                                    Muslim</option>
                                                                <option value="Jain"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Jain' ? 'selected' : '' ?>>
                                                                    Jain</option>
                                                                <option value="Buddhist"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Buddhist' ? 'selected' : '' ?>>
                                                                    Buddhist</option>
                                                                <option value="Atheist"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Atheist' ? 'selected' : '' ?>>
                                                                    Atheist</option>
                                                                <option value="Bahai"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Bahai' ? 'selected' : '' ?>>
                                                                    Bahai</option>
                                                                <option value="Jew"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Jew' ? 'selected' : '' ?>>
                                                                    Jew</option>
                                                                <option value="Parsi"
                                                                    <?= isset($user['religion']) && $user['religion'] == 'Parsi' ? 'selected' : '' ?>>
                                                                    Parsi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label  class="form-label" for="Mother Tongue">Mother Tongue</label>
                                                            <select id="Mother Tongue" class="form-control"
                                                                name="mother_tongue" required>
                                                                <option value="Tamil"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Tamil' ? 'selected' : '' ?>>
                                                                    Tamil</option>
                                                                <option value="Panjabi"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Panjabi' ? 'selected' : '' ?>>
                                                                    Panjabi</option>
                                                                <option value="Telugu"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Telugu' ? 'selected' : '' ?>>
                                                                    Telugu</option>
                                                                <option value="Hindi"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Hindi' ? 'selected' : '' ?>>
                                                                    Hindi</option>
                                                                <option value="Benali"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Benali' ? 'selected' : '' ?>>
                                                                    Benali</option>
                                                                <option value="Gujrati"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Gujrati' ? 'selected' : '' ?>>
                                                                    Gujrati</option>
                                                                <option value="Oriya"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Oriya' ? 'selected' : '' ?>>
                                                                    Oriya</option>
                                                                <option value="Urdu"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Urdu' ? 'selected' : '' ?>>
                                                                    Urdu</option>
                                                                <option value="Marathi"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Marathi' ? 'selected' : '' ?>>
                                                                    Marathi</option>
                                                                <option value="Sindhi"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Sindhi' ? 'selected' : '' ?>>
                                                                    Sindhi</option>
                                                                <option value="Kannada"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Kannada' ? 'selected' : '' ?>>
                                                                    Kannada</option>
                                                                <option value="Malayalam"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Malayalam' ? 'selected' : '' ?>>
                                                                    Malayalam</option>
                                                                <option value="Nepali"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Nepali' ? 'selected' : '' ?>>
                                                                    Nepali</option>
                                                                <option value="Hariyani"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Hariyani' ? 'selected' : '' ?>>
                                                                    Hariyani</option>
                                                                <option value="Garhwali"
                                                                    <?= isset($user['mother_tongue']) && $user['mother_tongue'] == 'Garhwali' ? 'selected' : '' ?>>
                                                                    Garhwali</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="education">Highest Education</label>
                                                            <input type="text" id="education" class="form-control"
                                                                name="education"
                                                                value="<?= htmlspecialchars($user['education'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">

                                                        <div class="form-group ">
                                                            <label  class="form-label" for="Occupation">Occupation</label>
                                                            <input type="text" id="occupation" class="form-control"
                                                                name="occupation"
                                                                value="<?= htmlspecialchars($user['occupation'] ?? '') ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <!-- Income -->
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="income">Income</label>
                                                            <input type="text" id="income" class="form-control"
                                                                name="income" value="<?= $user['income'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Father's Occupation -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="fatherOccupation">Father's Occupation</label>
                                                            <input type="text" id="fatherOccupation"
                                                                class="form-control" name="father_occupation"
                                                                value="<?= $user['father_occupation'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Mother's Occupation -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="motherOccupation">Mother's Occupation</label>
                                                            <input type="text" id="motherOccupation"
                                                                class="form-control" name="mother_occupation"
                                                                value="<?= $user['mother_occupation'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Siblings -->
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="siblings">Siblings</label>
                                                            <input type="text" id="siblings" class="form-control"
                                                                name="siblings" value="<?= $user['siblings'] ?? '' ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Family Type -->
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="familyType">Family Type</label>
                                                            <select id="familyType" class="form-control"
                                                                name="family_type" required>
                                                                <option value="Joint"
                                                                    <?= ($user['family_type'] ?? '' == 'Joint') ? 'selected' : '' ?>>
                                                                    Joint
                                                                    Family
                                                                </option>
                                                                <option value="Nuclear"
                                                                    <?= ($user['family_type'] ?? '' == 'Nuclear') ? 'selected' : '' ?>>
                                                                    Nuclear
                                                                    Family</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Partner Preferences -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="partnerAge">Preferred Age Range</label>
                                                            <input type="text" id="partnerAge" class="form-control"
                                                                name="partner_age"
                                                                value="<?= $user['partner_age'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="partnerHeight">Preferred Height</label>
                                                            <input type="text" id="partnerHeight" class="form-control"
                                                                name="partner_height"
                                                                value="<?= $user['partner_height'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="partnerReligion">Preferred Religion</label>
                                                            <input type="text" id="partnerReligion" class="form-control"
                                                                name="partner_religion"
                                                                value="<?= $user['partner_religion'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="partnerEducation">Preferred Education</label>
                                                            <input type="text" id="partnerEducation"
                                                                class="form-control" name="partner_education"
                                                                value="<?= $user['partner_education'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Personal Characteristics -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="personalityTraits">Personality Traits</label>
                                                            <textarea id="personalityTraits" class="form-control"
                                                                name="personality_traits"
                                                                rows="4"><?= $user['personality_traits'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="hobbies">Hobbies/Interests</label>
                                                            <textarea id="hobbies" class="form-control" name="hobbies"
                                                                rows="2"><?= $user['hobbies'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Marital Status -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="maritalStatus">Marital Status</label>
                                                            <select id="maritalStatus" class="form-control"
                                                                name="marital_status" required>
                                                                <option value="Single"
                                                                    <?= ($user['marital_status'] ?? '' == 'Single') ? 'selected' : '' ?>>
                                                                    Single
                                                                </option>
                                                                <option value="Divorced"
                                                                    <?= ($user['marital_status'] ?? '' == 'Divorced') ? 'selected' : '' ?>>
                                                                    Divorced
                                                                </option>
                                                                <option value="Widowed"
                                                                    <?= ($user['marital_status'] ?? '' == 'Widowed') ? 'selected' : '' ?>>
                                                                    Widowed
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- About Me -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="aboutMe">About Me</label>
                                                            <textarea id="aboutMe" class="form-control"
                                                                name="about_me"><?= $user['about_me'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>

                                                    <!-- What are you looking for? -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label  class="form-label" for="lookingFor">What are you looking for?</label>
                                                            <textarea id="lookingFor" class="form-control"
                                                                name="what_are_you_looking_for"
                                                                rows="2"><?= $user['what_are_you_looking_for'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="users.php" class="btn btn-label-secondary">Cancel</a>
                                            <button type="submit" name="submit" class="btn btn-primary">Update
                                                User</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
</body>

</html>