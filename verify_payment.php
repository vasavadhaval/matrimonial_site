<?php
session_start();
require('db.php'); // Include database connection
require('razorpay/Razorpay.php');

use Razorpay\Api\Api;
$keyId = "rzp_test_4MC82cqVUpCRpV";
$keySecret = "soUuqhqxNU8s6hX8rfRwUH1L";

$api = new Api($keyId, $keySecret);

$payment_id = $_GET['payment_id'];

try {
    // Fetch payment details from Razorpay
    $payment = $api->payment->fetch($payment_id);

    // Retrieve order ID, user ID, and plan ID from session
    $razorpay_order_id = $_SESSION['razorpay_order_id'] ?? '';
    $plan_id = $_SESSION['plan_id'] ?? 0;
    $user_id =  $_SESSION['user_data']['id'] ?? 0;

    $amount = $payment['amount'] / 100; // Convert from paisa to ₹
    $currency = $payment['currency'];
    $status = ($payment['status'] == 'captured') ? 'success' : 'failed';

    // Insert payment into database
    $sql = "INSERT INTO payments (user_id, plan_id, razorpay_payment_id, razorpay_order_id, amount, currency, status) 
            VALUES ('$user_id', '$plan_id', '$payment_id', '$razorpay_order_id', '$amount', '$currency', '$status')";


if (mysqli_query($conn, $sql)) {
    echo "<script>
        window.location.href='my_profile.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . mysqli_error($conn) . "');
    </script>";
}

} catch (Exception $e) {
    echo "Payment Verification Failed: " . $e->getMessage();
}

$conn->close();
?>
