<?php include 'header.php'; ?>
<?php include 'check_login.php'; ?>

<?php
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "No user found.";
    }
    $sql_payment = "
    SELECT p.*, pl.plan_name, pl.plan_price, pl.plan_image, pl.plan_type, 
           pl.plan_include1, pl.plan_include2, pl.plan_include3, pl.plan_include4 
    FROM payments p
    LEFT JOIN plans pl ON p.plan_id = pl.id
    WHERE p.user_id = $user_id 
    ORDER BY p.created_at DESC 
    LIMIT 1";
    
$result_payment = mysqli_query($conn, $sql_payment);
$payment = mysqli_fetch_assoc($result_payment);
?>
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            color:#f55171;
            margin-top: 20px;
        }
        .info-item {
            margin-bottom: 8px;
        }
    </style>
<section id="contact" class="contact-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">My Profile</h2>
                    <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                    <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati.</p>
                </div>
            </div>
        </div>
 
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="text-center">

                <img src="<?= htmlspecialchars($base_url . '/' . $user['profile_img']) ?>" 
                    alt="Profile Picture" 
                    class="profile-img" 
                    onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';">

                    <h3 class="mt-3"><?= htmlspecialchars($user['full_name']) ?></h3>
                    <p class="text-muted"><?= htmlspecialchars($user['occupation']) ?> | <?= htmlspecialchars($user['city']) ?>, <?= htmlspecialchars($user['state']) ?></p>
                <?php if ($user['status'] == 'active'): ?>
                    <span class="badge badge-success">Active</span>
                <?php else: ?>
                    <span class="badge badge-secondary"><?php echo $user['status']; ?></span>
                <?php endif; ?>
                </div>

                <hr>

                <!-- Personal Information -->
                <div class="section-title">Personal Information</div>
                <div class="row">
                    <div class="col-md-6 info-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></div>
                    <div class="col-md-6 info-item"><strong>Phone:</strong> <?= htmlspecialchars($user['phone_no']) ?></div>
                    <div class="col-md-6 info-item"><strong>Date of Birth:</strong> <?= htmlspecialchars($user['dob']) ?></div>
                    <div class="col-md-6 info-item"><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></div>
                    <div class="col-md-6 info-item"><strong>Height:</strong> <?= htmlspecialchars($user['height']) ?> cm</div>
                    <div class="col-md-6 info-item"><strong>Weight:</strong> <?= htmlspecialchars($user['weight']) ?> kg</div>
                    <div class="col-md-6 info-item"><strong>Religion:</strong> <?= htmlspecialchars($user['religion']) ?></div>
                    <div class="col-md-6 info-item"><strong>Mother Tongue:</strong> <?= htmlspecialchars($user['mother_tongue']) ?></div>
                </div>

                <hr>

                <!-- Family Details -->
                <div class="section-title">Family Details</div>
                <div class="row">
                    <div class="col-md-6 info-item"><strong>Father's Occupation:</strong> <?= htmlspecialchars($user['father_occupation']) ?></div>
                    <div class="col-md-6 info-item"><strong>Mother's Occupation:</strong> <?= htmlspecialchars($user['mother_occupation']) ?></div>
                    <div class="col-md-6 info-item"><strong>Siblings:</strong> <?= htmlspecialchars($user['siblings']) ?></div>
                </div>

                <hr>

                <!-- Partner Preferences -->
                <div class="section-title">Partner Preferences</div>
                <div class="row">
                    <div class="col-md-6 info-item"><strong>Preferred Age:</strong> <?= htmlspecialchars($user['partner_age']) ?></div>
                    <div class="col-md-6 info-item"><strong>Preferred Height:</strong> <?= htmlspecialchars($user['partner_height']) ?> cm</div>
                    <div class="col-md-6 info-item"><strong>Preferred Religion:</strong> <?= htmlspecialchars($user['partner_religion']) ?></div>
                </div>

                <hr>

                <!-- About Me -->
                <div class="section-title">About Me</div>
                <p><?= nl2br(htmlspecialchars($user['about_me'])) ?></p>

                <hr>

                <!-- Hobbies & Interests -->
                <div class="section-title">Hobbies & Interests</div>
                <p><?= nl2br(htmlspecialchars($user['hobbies'])) ?></p>

                <hr>

                <!-- What are you looking for -->
                <div class="section-title">What are you looking for?</div>
                <p><?= nl2br(htmlspecialchars($user['what_are_you_looking_for'])) ?></p>

                <hr>

                <div class="text-center">
                    <a href="update_profile.php" class="btn btn-primary">Edit Profile</a>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>

            </div>
        </div>

<!-- Display the Current Plan and Payment Details -->
<?php if ($payment): ?>
        <!-- Current Plan -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Current Plan</h5>
                </div>
                <div class="card-body text-center">
                    <img src="<?= htmlspecialchars($payment['plan_image'] ?: 'default_plan.png') ?>" 
                         class="img-fluid rounded mb-3" width="100" 
                         alt="Plan Image">
                    <h6 class="fw-bold"><?= htmlspecialchars($payment['plan_name']) ?></h6>
                    <p class="badge bg-info">Price: <?= htmlspecialchars($payment['plan_price']) ?> USD</p>
                    <p class="text-muted">Type: <?= htmlspecialchars($payment['plan_type']) ?></p>
                    
                    <ul class="list-group text-start">
                        <li class="list-group-item"><?= htmlspecialchars($payment['plan_include1']) ?></li>
                        <li class="list-group-item"><?= htmlspecialchars($payment['plan_include2']) ?></li>
                        <li class="list-group-item"><?= htmlspecialchars($payment['plan_include3']) ?></li>
                        <li class="list-group-item"><?= htmlspecialchars($payment['plan_include4']) ?></li>
                    </ul>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Payment Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Order ID:</strong> <?= htmlspecialchars($payment['razorpay_order_id']) ?></p>
                    <p><strong>Payment ID:</strong> <?= htmlspecialchars($payment['razorpay_payment_id']) ?></p>
                    <p><strong>Amount Paid:</strong> <?= htmlspecialchars($payment['amount']) ?> <?= htmlspecialchars($payment['currency']) ?></p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-<?= $payment['status'] === 'success' ? 'success' : 'danger' ?>">
                            <?= htmlspecialchars($payment['status']) ?>
                        </span>
                    </p>
                    <p><strong>Purchased On:</strong> <?= date("d M Y", strtotime($payment['created_at'])) ?></p>
                </div>
            </div>
        </div>
        <?php else: ?>
    <!-- No Membership Found -->
    <div class="col-md-4">

        <div class="alert alert-warning text-center">
            <h5>No Membership Found</h5>
            <p>Upgrade now to enjoy exclusive benefits and features!</p>
            <a href="pricing_plans" class="btn btn-primary">Upgrade Now</a>
        </div>
    </div>
<?php endif; ?>
    </div>
</div>
    </div>
</section>
<?php include 'footer.php'; ?>