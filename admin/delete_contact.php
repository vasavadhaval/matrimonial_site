<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $contact_id = intval($_GET['id']);
    $sql = "DELETE FROM contact_us WHERE id = $contact_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Contact entry deleted successfully!'); window.location.href='contact_list.php';</script>";
    } else {
        echo "<script>alert('Error deleting contact entry: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='contact_list.php';</script>";
}
?>
