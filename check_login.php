<?php
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    // header("Location: sign_in.php");

    echo "<script>window.location.href='sign_in.php';</script>";
    exit; // Always add exit after a header redirect
}

$user_id = $_SESSION['user_data']['id']; // Get user ID from session
?>
