<?php
include 'header.php'; // Include header file

// Check if plan_id is provided
if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='plan_list.php';</script>";
    exit;
}

$plan_id = $_GET['id'];

// Fetch existing plan details
$sql = "SELECT * FROM plans WHERE id = '$plan_id'";
$result = mysqli_query($conn, $sql);
$plan = mysqli_fetch_assoc($result);

if (!$plan) {
    echo "<script>alert('Plan not found!'); window.location.href='plan_list.php';</script>";
    exit;
}

if (isset($_POST['update'])) {
    $plan_name = $_POST['plan_name'];
    $plan_price = $_POST['plan_price'];
    $plan_type = $_POST['plan_type'];
    $plan_include1 = $_POST['plan_include1'];
    $plan_include2 = $_POST['plan_include2'];
    $plan_include3 = $_POST['plan_include3'];
    $plan_include4 = $_POST['plan_include4'];
    $is_active = isset($_POST['is_active']) ? 1 : 0; // Set to 1 if checked, else 0

    // Image handling
    $plan_image = $plan['plan_image']; // Keep existing image by default

    // Image Upload Handling
    if (isset($_FILES['plan_image']) && $_FILES['plan_image']['error'] == 0) {
        $target_dir = __DIR__ . "/../uploads/"; 
        $image_name = time() . "_" . basename($_FILES["plan_image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["plan_image"]["tmp_name"], $target_file)) {
            // $plan_image = $target_file;
            $plan_image =  'uploads/' .  $image_name;

        }
    }


    // Update query
    $update_sql = "UPDATE plans SET 
                    plan_name = '$plan_name', 
                    plan_price = '$plan_price', 
                    plan_type = '$plan_type', 
                    plan_image = '$plan_image', 
                    plan_include1 = '$plan_include1', 
                    plan_include2 = '$plan_include2', 
                    plan_include3 = '$plan_include3', 
                    plan_include4 = '$plan_include4',
                    is_active = '$is_active'
                  WHERE id = '$plan_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Plan Updated Successfully'); window.location.href='plan_list.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Plans /</span> Edit Plan</h4>
                        <div class="app-ecommerce">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Plan Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_name">Plan Name</label>
                                                    <input type="text" id="plan_name" class="form-control"
                                                        name="plan_name" value="<?= $plan['plan_name']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_price">Plan Price</label>
                                                    <input type="number" id="plan_price" class="form-control"
                                                        name="plan_price" value="<?= $plan['plan_price']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_type">Plan Type</label>
                                                    <select id="plan_type" class="form-control" name="plan_type"
                                                        required>
                                                        <option value="weekly"
                                                            <?= ($plan['plan_type'] == 'weekly') ? 'selected' : ''; ?>>
                                                            Weekly</option>
                                                        <option value="monthly"
                                                            <?= ($plan['plan_type'] == 'monthly') ? 'selected' : ''; ?>>
                                                            Monthly</option>
                                                        <option value="yearly"
                                                            <?= ($plan['plan_type'] == 'yearly') ? 'selected' : ''; ?>>
                                                            Yearly</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="is_active">Active</label>
                                                    <input type="checkbox" id="is_active" name="is_active" value="1"
                                                        <?php echo ($plan['is_active'] == 1) ? 'checked' : ''; ?>>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_image">Upload Image</label>
                                                    <input type="file" id="plan_image" class="form-control"
                                                        name="plan_image" accept="image/*">
                                                    <img src="<?= $plan['plan_image']; ?>" width="100" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Plan Features</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_include1">Plan Include
                                                        #1</label>
                                                    <input type="text" id="plan_include1" class="form-control"
                                                        name="plan_include1" value="<?= $plan['plan_include1']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_include2">Plan Include
                                                        #2</label>
                                                    <input type="text" id="plan_include2" class="form-control"
                                                        name="plan_include2" value="<?= $plan['plan_include2']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_include3">Plan Include
                                                        #3</label>
                                                    <input type="text" id="plan_include3" class="form-control"
                                                        name="plan_include3" value="<?= $plan['plan_include3']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="plan_include4">Plan Include
                                                        #4</label>
                                                    <input type="text" id="plan_include4" class="form-control"
                                                        name="plan_include4" value="<?= $plan['plan_include4']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="plans.php" class="btn btn-label-secondary">Cancel</a>
                                            <button type="submit" name="update" class="btn btn-primary">Update
                                                Plan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>