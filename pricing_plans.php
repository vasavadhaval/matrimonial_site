<?php include 'header.php'; ?>

<style>
.ptb_1001 {
    padding: 100px 0 !important;
}

.price-plan-area {
    z-index: 1;
}

.price-plan-wrapper {
    font-size: 16px;
    color: #444;
    width: 100%;
    max-width: 1000px;
}

.single-price-plan {
    width: 25%;
    position: relative;
    float: left;
    overflow: hidden;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    background-color: #fff;
}

.single-price-plan:first-of-type {
    border-radius: 8px 0 0 8px;
}

.single-price-plan:last-of-type {
    border-radius: 0 8px 8px 0;
}

.price-header .plan-title {
    letter-spacing: 2px;
    /*color: #fff;*/
}

.plan-cost .plan-price {
    font-size: 2em;
    font-weight: 600;
}

.plan-cost .plan-type {
    font-size: 0.7em;
    opacity: 0.8;
}

.plan-thumb {
    height: 110px;
    width: 110px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #f3f5f7;
    border-radius: 50%;
}

.single-price-plan .plan-features {
    font-size: 14px;
}

.single-price-plan .plan-features li {
    padding: 8px 20px;
}

.single-price-plan .plan-features i {
    margin-right: 8px;
    color: #444;
}

.single-price-plan .plan-select {
    border-top: 1px solid rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;
}

.plan-select>a {
    font-size: 14px;
    letter-spacing: 3px;
}

.price-plan-wrapper .featured {
    margin-top: -10px;
    -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
    z-index: 1;
    border-radius: 8px;
}

.price-plan-wrapper .featured .plan-select {
    padding: 30px 20px;
}

.btn.btn-bordered {
    border: 2px solid #f55171 !important;
    border-radius: 25px;
    color: #f55171;
}

.btn.btn-bordered:hover,
.btn.btn-bordered:focus {
    color: #fff;
    background: #f55171;
}

.btn:hover,
.btn:focus,
.btn:active {
    color: #fff;
    -webkit-box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}
</style>
<section id="pricing" class="section price-plan-area ptb_100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Marriage Beauro Pricing Plans</h2>
                    <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                    <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Price Plan Wrapper -->
            <div class="price-plan-wrapper">
                <?php
                $query = "SELECT * FROM plans "; // Fetch only active plans
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) :
                    while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <!-- Single Price Plan -->
                <div class="single-price-plan <?= $row['is_active'] ? 'featured' : '' ?>">
                    <!-- Plan Thumb -->
                    <div class="plan-thumb mx-auto my-4">
                        <img class="avatar-lg" src="assets/img/plans/<?= htmlspecialchars($row['plan_image']) ?>"
                            alt="">
                    </div>
                    <!-- Price Header -->
                    <div class="price-header d-flex flex-column align-items-center pb-2">
                        <h4 class="plan-title text-uppercase pb-3">
                            <?= htmlspecialchars($row['plan_name']) ?>
                        </h4>
                        <div class="plan-cost">
                            <span class="plan-price">₹<?= number_format($row['plan_price'], 2) ?></span>
                            <span class="plan-type text-uppercase">/<?= htmlspecialchars($row['plan_type']) ?></span>
                        </div>
                    </div>
                    <!-- Plan Features -->
                    <ul class="plan-features pb-3">
                        <li><i class="icofont-check"></i> <?= htmlspecialchars($row['plan_include1']) ?></li>
                        <li><i class="icofont-check"></i> <?= htmlspecialchars($row['plan_include2']) ?></li>
                        <li><i class="icofont-check"></i> <?= htmlspecialchars($row['plan_include3']) ?></li>
                        <li><i class="icofont-check"></i> <?= htmlspecialchars($row['plan_include4']) ?></li>
                    </ul>
                    <!-- Plan Select -->
                    <div class="plan-select">
                        <button class="btn btn-bordered text-uppercase" onclick="payNow(<?= number_format($row['plan_price'], 2) ?>)">Select Plan</button>
                    </div>
                </div>
                <?php endwhile; else : ?>
                <p class="text-center">No plans available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- FAQ Content -->
                <div class="faq-content">
                    <span class="d-block text-center mt-5">Not sure what to choose? <a href="#">Contact Us</a></span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<button class="btn btn-bordered text-uppercase" onclick="payNow(<?= number_format($row['plan_price'], 2) ?>)">Select
    Plan</button>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function payNow(amount) {
    fetch("check_loginn.php")
        .then(response => response.json())
        .then(data => {
            if (!data.logged_in) {
                alert("You must log in first!");
                window.location.replace("sign_in.php");
                return;
            }

            fetch("razorpay_order.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        amount: amount
                    }) // Send amount dynamically
                })
                .then(response => response.json())
                .then(data => {
                    var options = {
                        "key": "rzp_test_4MC82cqVUpCRpV",
                        "amount": data.amount, // Use dynamic amount
                        "currency": "INR",
                        "name": "Marriage Bureau",
                        "description": "Membership Plan",
                        "image": "your_logo_url.png",
                        "order_id": data.order_id, // Order ID from Razorpay
                        "handler": function(response) {
                            alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                            window.location.href = "verify_payment.php?payment_id=" + response
                                .razorpay_payment_id;
                        },
                        "prefill": {
                            "name": "Customer Name",
                            "email": "customer@example.com",
                            "contact": "9999999999"
                        },
                        "theme": {
                            "color": "#528FF0"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                });
        });
}
</script>