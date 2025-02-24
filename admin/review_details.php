<?php include 'header.php'; ?>
<?php


// Check if review ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid review ID.'); window.location.href='review_listings.php';</script>";
    exit;
}

$review_id = (int) $_GET['id'];
$sql = "SELECT r.id, r.user_id, r.email, r.review, r.created_at, u.full_name, u.profile_img FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.id = $review_id";
$result = mysqli_query($conn, $sql);
$review = mysqli_fetch_assoc($result);

if (!$review) {
    echo "<script>alert('Review not found.'); window.location.href='review_listings.php';</script>";
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Reviews /</span> Review Details</h4>
                        <div class="app-ecommerce">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">User Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <img src="<?= str_replace('admin/', '', $base_url . '/' . $review['profile_img']); ?>" 
                                                 class="img-fluid mb-3" 
                                                 onerror="this.onerror=null; this.src='<?= $base_url ?>/assets/img/avatar/avatar-1.png';" 
                                                 alt="User Avatar">
                                            <p><strong>Name:</strong> <?= htmlspecialchars($review['full_name']) ?></p>
                                            <p><strong>Email:</strong> <?= htmlspecialchars($review['email']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Review Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Review:</strong> <?= nl2br(htmlspecialchars($review['review'])) ?></p>
                                            <p><strong>Date:</strong> <?= date('d M Y, H:i', strtotime($review['created_at'])) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-center float-end">
                                        <a href="review_listings.php" class="btn btn-secondary">Back to List</a>
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
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
</body>
</html>