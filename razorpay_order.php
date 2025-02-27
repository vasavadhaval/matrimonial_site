<?php
session_start();
require('razorpay/Razorpay.php');

use Razorpay\Api\Api;

// Razorpay API credentials
$keyId = "rzp_test_4MC82cqVUpCRpV";
$keySecret = "soUuqhqxNU8s6hX8rfRwUH1L";

$api = new Api($keyId, $keySecret);

// Read JSON request from JavaScript
$data = json_decode(file_get_contents("php://input"), true);


// print_r($data);
// exit;
 $amount = isset($data['amount']) ? $data['amount'] * 100 : 9900; // Convert to paisa
// print_r($amount);
$orderData = [
    'receipt'         => 'order_' . time(),
    'amount'          => $amount,  // Dynamic amount in paisa
    'currency'        => 'INR',
    'payment_capture' => 1
];

$order = $api->order->create($orderData);

// Store order ID in session
$_SESSION['razorpay_order_id'] = $order['id'];
$_SESSION['plan_id'] = $data['plan_id'];

// Return JSON response
echo json_encode([
    'order_id' => $order['id'],
    'amount'   => $amount
]);
?>
