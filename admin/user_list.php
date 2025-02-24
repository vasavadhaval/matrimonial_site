<?php include 'header.php'; ?>
<?php
// Fetch user data excluding admin users
$sql = "SELECT * FROM users WHERE role_id != 1"; 
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
                            <h5 class="card-header">User List</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Status</th>
                                            <th>Actions</th> <!-- New column for actions -->
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td>
                                                <img src="<?= str_replace('admin/', '', $base_url . '/' . $row['profile_img']); ?>" 
                                                     alt="Profile Picture" class="profile-img"
                                                     onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';">
                                            </td>
                                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td><?= htmlspecialchars($row['phone_no']) ?></td>
                                            <td>
                                                <span class="badge bg-label-<?= $row['status'] === 'active' ? 'success' : 'danger' ?>">
                                                    <?= ucfirst($row['status']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <!-- View -->
                                                <a href="view_user.php?id=<?= $row['id'] ?>" class="text-info">
                                                    <i class="bx bx-show"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="edit_user.php?id=<?= $row['id'] ?>" class="text-primary">
                                                    <i class="bx bx-edit"></i>
                                                </a>

                                                <!-- Delete -->
                                                <a href="delete_user.php?id=<?= $row['id'] ?>" class="text-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                    <i class="bx bx-trash"></i>
                                                </a>

                                                <!-- Approve & Reject (Only if pending) -->
                                                <?php if ($row['status'] == 'pending'): ?>
                                                    <a href="update_user_status.php?id=<?= $row['id'] ?>>&action=approve" class="text-success">
                                                        <i class="bx bx-check"></i>
                                                    </a>
                                                    <a href="update_user_status.php?id=<?= $row['id'] ?>&action=reject" class="text-warning">
                                                        <i class="bx bx-x"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>


                                        </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No users found</td>
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
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
</body>

</html>
