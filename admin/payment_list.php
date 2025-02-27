<?php include 'header.php'; ?>
<?php
// Fetch payment data with user and plan details
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
        p.razorpay_payment_id, 
        p.razorpay_order_id, 
        p.amount, 
        p.currency, 
        p.status, 
        p.created_at
    FROM payments p
    LEFT JOIN users u ON p.user_id = u.id
    LEFT JOIN plans pl ON p.plan_id = pl.id
";
$result = mysqli_query($conn, $sql);
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'sidebar.php'; ?>
            <div class="layout-page">
                <?php include 'navbar.php'; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <h5 class="card-header">Payment Listings</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Payment ID</th>
                                            <th>Order ID</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']) ?></td>
                                            <td>
                                                <img src="<?= str_replace('admin/', '', $base_url . '/' . $row['profile_img']); ?>" 
                                                     alt="Profile" class="Plan-img"
                                                     onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';"    width="40" height="40" style="border-radius: 5px;">

                                                <?= htmlspecialchars($row['full_name']) ?><br>
                                                <?= htmlspecialchars($row['email']) ?>
                                            </td>
                                            <td>

                                            <img src="<?= str_replace('admin/', '', $base_url . '/' . $row['plan_image']); ?>" 
                                                     alt="Plan" class="Plan-img"
                                                     onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';"    width="40" height="40" style="border-radius: 5px;">


                                                <?= htmlspecialchars($row['plan_name']) ?> (<?= htmlspecialchars($row['plan_type']) ?>)
                                            </td>
                                            <td><?= htmlspecialchars($row['amount']) ?></td>
                                            <td><?= htmlspecialchars($row['currency']) ?></td>
                                            <td><?= htmlspecialchars($row['razorpay_payment_id']) ?></td>
                                            <td><?= htmlspecialchars($row['razorpay_order_id']) ?></td>
                                            <td><?= htmlspecialchars($row['status']) ?></td>
                                            <td>
                                                <a href="payment_details.php?id=<?= $row['id'] ?>" class="text-info">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">No payments found</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
    <script src="assets/js/dashboards-analytics.js"></script>
</body>

</html>
