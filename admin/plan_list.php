<?php include 'header.php'; ?>
<?php
// Fetch plans data
$sql = "SELECT * FROM plans ORDER BY created_at DESC"; 
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
                            <div class="d-flex justify-content-between align-items-center mb-3 card-header">
                                <h5 class="mb-0">Plans List</h5>
                                <a href="create_plan.php" class="btn btn-primary">+ New Plan</a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plan Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Includes</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Created At</th>
                                            <th>Actions</th> <!-- Action column -->
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php $count = 1; ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?= htmlspecialchars($row['plan_name']) ?></td>
                                            <td>₹<?= number_format($row['plan_price'], 2) ?></td>
                                            <td><?= htmlspecialchars($row['plan_type']) ?></td>
                                            <td>
                                                <ul>
                                                    <li><?= htmlspecialchars($row['plan_include1']) ?></li>
                                                    <li><?= htmlspecialchars($row['plan_include2']) ?></li>
                                                    <li><?= htmlspecialchars($row['plan_include3']) ?></li>
                                                    <li><?= htmlspecialchars($row['plan_include4']) ?></li>
                                                </ul>
                                            </td>
                                            <td>


                                                    <img src="<?= str_replace('admin/', '', $base_url . '/' . $row['plan_image']); ?>" 
                                                     alt="Plan Picture" class="Plan-img"
                                                     onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';"    width="50" height="50" style="border-radius: 5px;">
                                            </td>
                                            <td>
                                                <?php if ($row['is_active'] == 1): ?>
                                                <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></td>
                                            <td>
                                                <!-- View -->
                                                <a href="plan_details.php?id=<?= $row['id'] ?>" class="text-info">
                                                    <i class="bx bx-show"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="edit_plan.php?id=<?= $row['id'] ?>" class="text-primary">
                                                    <i class="bx bx-edit"></i>
                                                </a>

                                                <!-- Delete -->
                                                <a href="delete_plan.php?id=<?= $row['id'] ?>"
                                                    onclick="return confirm('Are you sure you want to delete this plan?');"
                                                    class="text-danger">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">No plans found</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

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