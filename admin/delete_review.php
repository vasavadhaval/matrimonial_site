<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $review_id = intval($_GET['id']);

    $sql = "DELETE FROM reviews WHERE id = $review_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Review deleted successfully!'); window.location.href='review_listings.php';</script>";
    } else {
        echo "<script>alert('Error deleting review: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='review_listings.php';</script>";
}
?>
