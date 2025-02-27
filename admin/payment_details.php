<?php include 'header.php'; ?>
<?php
// Include database connection

// Get payment ID from URL
$payment_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($payment_id > 0) {
    // Fetch payment details with user and plan data
    $sql = "
        SELECT 
            p.id, 
            p.user_id, 
            u.full_name, 
            u.profile_img, 
            u.email, 
            p.plan_id, 
            pl.plan_name, 
            pl.plan_price, 
            pl.plan_image, 
            pl.plan_type, 
            pl.plan_include1, 
            pl.plan_include2, 
            pl.plan_include3, 
            pl.plan_include4,
            p.razorpay_payment_id, 
            p.razorpay_order_id, 
            p.amount, 
            p.currency, 
            p.status, 
            p.created_at
        FROM payments p
        LEFT JOIN users u ON p.user_id = u.id
        LEFT JOIN plans pl ON p.plan_id = pl.id
        WHERE p.id = $payment_id
    ";
    
    $result = mysqli_query($conn, $sql);
    $payment = mysqli_fetch_assoc($result);

    if (!$payment) {
        echo "<script>alert('Payment not found'); window.location.href = 'payment_list.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href = 'payment_list.php';</script>";
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Payments /</span> Payment Details</h4>
                        
                        <div class="app-ecommerce">
                            <div class="row">
                                <!-- User & Plan Information Section -->
                                <div class="col-12 col-lg-4">
                                    <!-- User Information -->
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="mb-0">User Information</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <img src="<?= str_replace('admin/', '', $base_url . '/' . $payment['profile_img']); ?>" 
                                                 class="img-fluid rounded-circle mb-3" width="120"
                                                 onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';" 
                                                 alt="User Avatar">
                                            <p class="fw-bold"><?= htmlspecialchars($payment['full_name']) ?></p>
                                            <p class="text-muted"><?= htmlspecialchars($payment['email']) ?></p>
                                        </div>
                                    </div>

                                    <!-- Plan Information -->
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">Plan Information</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <img src="<?= str_replace('admin/', '', $base_url . '/' . $payment['plan_image']); ?>" 
                                                class="img-fluid rounded-circle mb-3" width="120"
                                                onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';" 
                                                alt="Plan Image">
                                            
                                            <h6 class="fw-bold"><?= htmlspecialchars($payment['plan_name']) ?></h6>
                                            
                                            <p class="badge bg-info">Price: <?= htmlspecialchars($payment['plan_price']) ?> USD</p>
                                            
                                            <ul class="list-unstyled mt-3">
                                                <?php foreach (['plan_include1', 'plan_include2', 'plan_include3', 'plan_include4'] as $feature): ?>
                                                    <?php if (!empty($payment[$feature])): ?>
                                                        <li><i class="bi bi-check-circle text-success"></i> <?= htmlspecialchars($payment[$feature]) ?></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <!-- Payment Details Section -->
                                <div class="col-12 col-lg-8">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-header bg-warning text-dark">
                                            <h5 class="mb-0">Payment Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Transaction ID</th>
                                                        <td><?= htmlspecialchars($payment['transaction_id']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment Method</th>
                                                        <td><?= htmlspecialchars($payment['payment_method']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount</th>
                                                        <td><span class="badge bg-primary">₹<?= htmlspecialchars($payment['amount']) ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>
                                                            <?php if ($payment['status'] == 'success') { ?>
                                                                <span class="badge bg-success">Completed</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger">Pending</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date</th>
                                                        <td><?= date('d M Y, H:i', strtotime($payment['created_at'])) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-center float-end">
                                        <a href="payment_listings.php" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Back to List
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <p class="mb-0">© <?= date('Y') ?> Your Company. All rights reserved.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Scripts -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
</body>
