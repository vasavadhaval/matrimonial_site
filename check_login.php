<?php
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    // header("Location: sign_in.php");

    echo "<script>window.location.href='sign_in.php';</script>";
    exit; // Always add exit after a header redirect
}

$login_user_id = $_SESSION['user_data']['id']; // Get user ID from session
?>
<?php
    $sql = "SELECT * FROM users WHERE id = $login_user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $login_user_data = mysqli_fetch_assoc($result);
    } else {
        echo "No user found.";
    }
    $sql_payment = "
    SELECT p.*, pl.plan_name, pl.plan_price, pl.plan_image, pl.plan_type, 
           pl.plan_include1, pl.plan_include2, pl.plan_include3, pl.plan_include4 
    FROM payments p
    LEFT JOIN plans pl ON p.plan_id = pl.id
    WHERE p.user_id = $login_user_id 
    ORDER BY p.created_at DESC 
    LIMIT 1";
    
$result_payment = mysqli_query($conn, $sql_payment);
$loginuser_payment = mysqli_fetch_assoc($result_payment);
?>