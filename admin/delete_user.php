<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $sql = "DELETE FROM users WHERE id = $user_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User deleted successfully!'); window.location.href='user_list.php';</script>";
    } else {
        echo "<script>alert('Error deleting user: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='user_list.php';</script>";
}
?>
