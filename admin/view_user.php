<?php 
include 'header.php'; 

// Fetch user details
$user_id = (int) ($_GET['id'] ?? 1);
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Check if user exists
if (!$user) {
    echo "<div class='alert alert-danger text-center'>User not found.</div>";
    exit;
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
                        <div class="row">
                            <!-- Left Side - User Info -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card mb-4">
                                <div class="card-body pt-12">

                                    <div class="user-avatar-section ">
                                        <div class=" d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded-circle mb-3"
                                                src="<?= str_replace('admin/', '', $base_url . '/' . $user['profile_img']); ?>"
                                                height="120" width="120" alt="User avatar"
                                                onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';">
                                            <h5><?= htmlspecialchars($user['full_name']) ?></h5>
                                           
                                           
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center  flex-wrap my-6 gap-0 gap-md-3 gap-lg-4">
                                        <div class="d-flex align-items-center me-5 gap-4">
                                            
                                        <span class="badge bg-label-secondary">User ID: <?= $user['id'] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center gap-4">
                                        <span
                                                class="badge bg-label-<?= $user['status'] === 'active' ? 'success' : 'danger' ?>">
                                                <?= ucfirst($user['status']) ?>
                                            </span>
                                        </div>
                                    </div>

                                        <h5 class="pb-4 border-bottom mb-4">Personal Details</h5>
                                        <ul class="list-unstyled">
                                            <li><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
                                            <li><strong>Phone:</strong> <?= htmlspecialchars($user['phone_no']) ?></li>
                                            <li><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></li>
                                            <li><strong>Birth Date:</strong> <?= htmlspecialchars($user['dob']) ?></li>
                                            <li><strong>Height:</strong> <?= htmlspecialchars($user['height']) ?> cm
                                            </li>
                                            <li><strong>Weight:</strong> <?= htmlspecialchars($user['weight']) ?> kg
                                            </li>
                                            <li><strong>Religion:</strong> <?= htmlspecialchars($user['religion']) ?>
                                            </li>
                                            <li><strong>Mother Tongue:</strong>
                                                <?= htmlspecialchars($user['mother_tongue']) ?></li>
                                        </ul>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="edit_user.php?id=<?= $user['id'] ?>"
                                                class="btn btn-primary me-2">Edit</a>
                                            <!-- <a href="#" class="btn btn-danger">Suspend</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Additional Information -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Additional Information</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Place of Birth:</strong>
                                                    <?= htmlspecialchars($user['place_of_birth']) ?></p>
                                                <p><strong>State:</strong> <?= htmlspecialchars($user['state']) ?></p>
                                                <p><strong>City:</strong> <?= htmlspecialchars($user['city']) ?></p>
                                                <p><strong>Education:</strong>
                                                    <?= htmlspecialchars($user['education']) ?></p>
                                                <p><strong>Occupation:</strong>
                                                    <?= htmlspecialchars($user['occupation']) ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Income:</strong> <?= htmlspecialchars($user['income']) ?></p>
                                                <p><strong>Father’s Occupation:</strong>
                                                    <?= htmlspecialchars($user['father_occupation']) ?></p>
                                                <p><strong>Mother’s Occupation:</strong>
                                                    <?= htmlspecialchars($user['mother_occupation']) ?></p>
                                                <p><strong>Siblings:</strong> <?= htmlspecialchars($user['siblings']) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Partner Preferences</h5>
                                        <p><strong>Preferred Age:</strong> <?= htmlspecialchars($user['partner_age']) ?>
                                        </p>
                                        <p><strong>Preferred Height:</strong>
                                            <?= htmlspecialchars($user['partner_height']) ?></p>
                                        <p><strong>Preferred Religion:</strong>
                                            <?= htmlspecialchars($user['partner_religion']) ?></p>
                                        <hr>
                                        <h5>About</h5>
                                        <p><strong>Personality Traits:</strong>
                                            <?= htmlspecialchars($user['personality_traits']) ?></p>
                                        <p><strong>Hobbies:</strong> <?= htmlspecialchars($user['hobbies']) ?></p>
                                        <p><strong>About Me:</strong> <?= htmlspecialchars($user['about_me']) ?></p>
                                        <p><strong>What I'm Looking For:</strong>
                                            <?= htmlspecialchars($user['what_are_you_looking_for']) ?></p>
                                    </div>
                                </div>
                            </div>
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