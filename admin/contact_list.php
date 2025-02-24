<?php include 'header.php'; 
$sql = "SELECT id, name, email, subject, created_at FROM contact_us ORDER BY created_at DESC";
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Contact Us /</span> List</h4>
                        <div class="card">
                            <h4 class="card-header">Contact Us</h4>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <?php

                                        $count = 1;

                                        while ($row = mysqli_fetch_assoc($result)) :
                                        ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= htmlspecialchars($row['name']) ?></td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td><?= htmlspecialchars($row['subject']) ?></td>
                                            <td><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></td>
                                            <td>
                                                <!-- View Icon -->
                                                <a href="view_contact.php?id=<?= $row['id'] ?>" class="text-info"
                                                    title="View">
                                                    <i class="bx bx-show"></i>
                                                </a>

                                                <!-- Delete Icon -->
                                                <a href="delete_contact.php?id=<?= $row['id'] ?>" class="text-danger"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this contact?');">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            $count++;
                                        endwhile;
                                        ?>
                                    </tbody>

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