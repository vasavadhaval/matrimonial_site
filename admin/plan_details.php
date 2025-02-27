<?php
include 'header.php'; // Include header file

// Fetch plan details
if (isset($_GET['id'])) {
    $plan_id = $_GET['id'];
    $query = "SELECT * FROM plans WHERE id = '$plan_id'";
    $result = mysqli_query($conn, $query);
    $plan = mysqli_fetch_assoc($result);

    if (!$plan) {
        echo "<script>alert('Plan not found'); window.location.href='plan_list.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='plan_list.php';</script>";
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Plans /</span> Plan Details</h4>
                        <div class="app-ecommerce">
                            <div class="row">
                                <!-- Left Column: Plan Details -->
                                <div class="col-12 col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Plan Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Plan Name:</strong> <?php echo $plan['plan_name']; ?></p>
                                            <p><strong>Plan Price:</strong> ₹<?php echo $plan['plan_price']; ?></p>
                                            <p><strong>Plan Type:</strong> <?php echo ucfirst($plan['plan_type']); ?></p>
                                            <p><strong>Plan Image:</strong></p>
                                            <img src="<?= str_replace('admin/', '', $base_url . '/' . $plan['plan_image']); ?>" 
                                                     alt="Plan Picture" class="Plan-img img-fluid"
                                                     onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';"    >
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column: Plan Features -->
                                <div class="col-12 col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Plan Features</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><?php echo $plan['plan_include1']; ?></li>
                                                <li><?php echo $plan['plan_include2']; ?></li>
                                                <li><?php echo $plan['plan_include3']; ?></li>
                                                <li><?php echo $plan['plan_include4']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Back Button -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="plan_list.php" class="btn btn-label-secondary">Back to Plans</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
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
    <script src="assets/js/main.js"></script>
</body>