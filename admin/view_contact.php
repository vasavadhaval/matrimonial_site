
<?php include 'header.php'; ?>
<?php

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid contact ID.'); window.location.href='contact_list.php';</script>";
    exit;
}

$contact_id = intval($_GET['id']);
$sql = "SELECT name, email, subject, message, created_at FROM contact_us WHERE id = $contact_id";
$result = mysqli_query($conn, $sql);
$contact = mysqli_fetch_assoc($result);

if (!$contact) {
    echo "<script>alert('Contact not found.'); window.location.href='contact_list.php';</script>";
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
                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Contact Us /</span> View</h4>

                    <div class="card">
                            <div class="card-body">
                                <p><strong>Name:</strong> <?= htmlspecialchars($contact['name']) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($contact['email']) ?></p>
                                <p><strong>Subject:</strong> <?= htmlspecialchars($contact['subject']) ?></p>
                                <p><strong>Message:</strong></p>
                                <p><?= nl2br(htmlspecialchars($contact['message'])) ?></p>
                                <p><strong>Date:</strong> <?= date('d M Y, H:i', strtotime($contact['created_at'])) ?></p>
                                <a href="contact_list.php" class="btn btn-secondary">Back</a>
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

