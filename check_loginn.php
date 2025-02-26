<?php
session_start();
$response = ['logged_in' => isset($_SESSION['is_login']) && $_SESSION['is_login'] === true];
echo json_encode($response);
?>
