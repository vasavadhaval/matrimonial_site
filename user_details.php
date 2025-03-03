<?php include 'header.php'; ?>
<?php include 'check_login.php'; ?>

<?php
    if (isset($_GET['id'])) {
        $user_id = intval($_GET['id']); // Prevent SQL injection

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);


        } else {
            echo "<div class='alert alert-danger'>User not found.</div>";
            exit;
        }
    } else {
        echo "<div class='alert alert-warning'>Invalid user ID.</div>";
        exit;
    }
?>

<section class="section discover-area overflow-hidden ptb_100 mt-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <!-- Discover Thumb -->
                <div class="service-thumb discover-thumb mx-auto text-center pt-4 pt-lg-0">
                    <img src="<?= htmlspecialchars($base_url . '/' . $user['profile_img']) ?>" alt="">

                </div>
            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <!-- Discover Text -->
                <div class="discover-text pt-4 pt-lg-0">
                    <h3 class="mt-3"><?= htmlspecialchars($user['full_name']) ?></h3>
                    <p class="text-muted"><?= htmlspecialchars($user['occupation']) ?></p>

                    <div class="widget-content tags-widget-items pt-2">
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-gender">
                            <i class="fa fa-venus-mars"></i> <?= htmlspecialchars($user['gender']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-caste">
                            <i class="fa fa-users"></i> <?= htmlspecialchars($user['cast']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-mother-tongue">
                            <i class="fa fa-language"></i> <?= htmlspecialchars($user['mother_tongue']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-religion">
                            <i class="fa fa-book"></i> <?= htmlspecialchars($user['religion']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-state">
                            <i class="fa fa-map-marker"></i> <?= htmlspecialchars($user['state']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-city">
                            <i class="fa fa-building"></i> <?= htmlspecialchars($user['city']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-education">
                            <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($user['education']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-occupation">
                            <i class="fa fa-briefcase"></i> <?= htmlspecialchars($user['occupation']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-personality-traits">
                            <i class="fa fa-smile"></i> <?= htmlspecialchars($user['personality_traits']); ?>
                        </a>
                        <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-hobbies">
                            <i class="fa fa-music"></i> <?= htmlspecialchars($user['hobbies']); ?>
                        </a>
                    </div>

                    <hr>
                    <?php if ($loginuser_payment): ?>

                    <!-- Personal Information -->
                    <?php
                    $premium_plan_id = 3; // Define the premium plan ID
                    $is_premium_user = isset($loginuser_payment['plan_id']) && $loginuser_payment['plan_id'] == $premium_plan_id;
                    ?>

                    <!-- Personal Information -->
                    <div class="section-title">Personal Information</div>
                    <div class="row">
                        <div class="col-md-6 info-item"><strong>Email:</strong>
                            <?php if ($is_premium_user): ?>
                            <?php 
                                    $email = htmlspecialchars($user['email']);
                                    $outlook_link = "https://outlook.live.com/mail/0/deeplink/compose?to=" . urlencode($email);
                                ?>
                            <a href="<?= $outlook_link ?>" target="_blank">
                                <?= $email ?>
                            </a>
                            <?php else: ?>
                            ******@*****.com
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 info-item"><strong>Phone:</strong>
                            <?php if ($is_premium_user): ?>
                            <?php 
                                // Remove non-numeric characters from the phone number
                                $cleaned_phone = preg_replace('/\D/', '', $row['phone_no']); 

                                // Generate WhatsApp link
                                $whatsapp_link = "https://wa.me/" . $cleaned_phone;
                            ?>
                            <a href="<?= htmlspecialchars($whatsapp_link) ?>" target="_blank">
                                <?= htmlspecialchars($row['phone_no']) ?>
                            </a>
                            <?php else: ?>
                            *******<?= substr(preg_replace('/\D/', '', $row['phone_no']), -2) ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 info-item"><strong>Date of Birth:</strong>
                            <?= $is_premium_user ? htmlspecialchars($user['dob']) : '****-**-**' ?>
                        </div>
                        <div class="col-md-6 info-item"><strong>Gender:</strong>
                            <?= htmlspecialchars($user['gender']) ?>
                        </div>
                        <div class="col-md-6 info-item"><strong>Height:</strong>
                            <?= $is_premium_user ? htmlspecialchars($user['height']) . ' cm' : '*** cm' ?>
                        </div>
                        <div class="col-md-6 info-item"><strong>Weight:</strong>
                            <?= $is_premium_user ? htmlspecialchars($user['weight']) . ' kg' : '*** kg' ?>
                        </div>
                        <div class="col-md-6 info-item"><strong>Religion:</strong>
                            <?= htmlspecialchars($user['religion']) ?>
                        </div>
                        <div class="col-md-6 info-item"><strong>Mother Tongue:</strong>
                            <?= htmlspecialchars($user['mother_tongue']) ?>
                        </div>
                    </div>


                    <hr>

                    <!-- Family Details -->
                    <div class="section-title">Family Details</div>
                    <div class="row">
                        <div class="col-md-6 info-item"><strong>Father's Occupation:</strong>
                            <?= htmlspecialchars($user['father_occupation']) ?></div>
                        <div class="col-md-6 info-item"><strong>Mother's Occupation:</strong>
                            <?= htmlspecialchars($user['mother_occupation']) ?></div>
                        <div class="col-md-6 info-item"><strong>Siblings:</strong>
                            <?= htmlspecialchars($user['siblings']) ?></div>
                    </div>

                    <hr>

                    <!-- Partner Preferences -->
                    <div class="section-title">Partner Preferences</div>
                    <div class="row">
                        <div class="col-md-6 info-item"><strong>Preferred Age:</strong>
                            <?= htmlspecialchars($user['partner_age']) ?></div>
                        <div class="col-md-6 info-item"><strong>Preferred Height:</strong>
                            <?= htmlspecialchars($user['partner_height']) ?> cm</div>
                        <div class="col-md-6 info-item"><strong>Preferred Religion:</strong>
                            <?= htmlspecialchars($user['partner_religion']) ?></div>
                    </div>
                    <?php else: ?>
                    <!-- No Membership Found -->
                    <div class="alert alert-warning text-center">
                        <h5>No Membership Found</h5>
                        <p>Upgrade now to unlock <strong>Personal Information, Family Details, and Partner
                                Preferences</strong>!</p>
                        <p>Enjoy exclusive benefits and gain full access to user details.</p>
                        <a href="pricing_plans.php" class="btn btn-primary">Upgrade Now</a>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</section>
<?php include 'footer.php'; ?>