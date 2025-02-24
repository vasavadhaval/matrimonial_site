<?php
include 'db.php';

if (isset($_GET['id']) && isset($_GET['action'])) {
    $user_id = intval($_GET['id']);
    $action = $_GET['action'];

    if ($action == 'approve') {
        $new_status = 'active';
    } elseif ($action == 'reject') {
        $new_status = 'rejected';
    } else {
        echo "<script>alert('Invalid action!'); window.location.href='user_list.php';</script>";
        exit;
    }

    // Update user status
    $sql = "UPDATE users SET status='$new_status' WHERE id=$user_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User status updated successfully!'); window.location.href='user_list.php';</script>";
    } else {
        echo "<script>alert('Error updating status: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='user_list.php';</script>";
}
?>
