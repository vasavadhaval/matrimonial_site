<?php include 'header.php'; ?>
<?php include 'check_login.php'; ?>

<style>
.ptb_1001 {
    padding: 100px 0 !important;
}

/* **********************************
:: 27.0 BLOG PAGE DETAILS AREA CSS
*************************************/
/*Single Widget*/
.single-widget {
    margin-bottom: 35px;
}

.sidebar .single-widget:last-child {
    margin-bottom: 0;
}

.widget-content {
    position: relative;
}

/*Search Widget*/
.search-widget input {
    background-color: #f7f7f7;
    border: 1px solid #eee;
    color: #444;
    height: 45px;
    padding: 10px 15px;
    width: 100%;
    -webkit-transition: -webkit-box-shadow 1s ease 0s;
    transition: -webkit-box-shadow 1s ease 0s;
    transition: box-shadow 1s ease 0s;
    transition: box-shadow 1s ease 0s, -webkit-box-shadow 1s ease 0s;
}

.search-widget input:focus {
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

/*Catagory Widget*/
.widget .single-accordion {
    border: 1px solid #eee;
    border-radius: 4px;
}

.widget .single-accordion h5 a {
    color: #444;
    border-bottom: 1px solid #eee;
}

.widget-items li a {
    position: relative;
    border-bottom: 1px solid #eee;
}


.widget-items li a::before {
    position: absolute;
    content: '';
    height: 100%;
    width: 0px;
    top: 0;
    bottom: 0;
    left: 0;
    background-color: transparent;
    -webkit-transition: all 0.1s ease 0s;
    transition: all 0.1s ease 0s;
}

.widget-items li a:hover,
.widget-items li a:focus,
.widget-items li a.active {
    background-color: #f7f7f7;
}

.widget-items li a:hover::before,
.widget-items li a:focus::before,
.widget-items li a.active::before {
    width: 2px;
    background-color: #0056b3;
}

.widget-items li a span {
    line-height: 1.4;
}

/*Post Widget*/
.post-thumb img {
    border: 1px solid #eee;
}

.post-widget .widget-items .post-date {
    font-size: 13px;
    line-height: 1;
}

.post-content h6 {
    font-weight: 400;
    line-height: 20px;
}

/*Tags Widget*/
.tags-widget .single-accordion {
    border: none;
}

.tags-widget-items a {
    border: 1px solid #e5e5e5;
    font-size: 12px;
}

/*Blog Details*/
.appia-blog .meta-info {
    border-bottom: 1px solid #eee;
}

.meta-info>ul>li {
    position: relative;
}

.meta-info>ul>li::after {
    position: absolute;
    content: '';
    height: 30%;
    width: 2px;
    background-color: #777;
    top: 50%;
    left: 100%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.meta-info>ul>li:last-child::after {
    display: none;
}

.appia-blog .blog-share a {
    padding: 0 10px;
}

.blog-share .social-icons>a {
    width: 35px;
    height: 35px;
    font-size: 16px;
}

.blog-share .social-icons>a.facebook:hover {
    background-color: #3b5999 !important;
    color: #fff;
}

.blog-share .social-icons>a.twitter:hover {
    background-color: #55acee !important;
    color: #fff;
}

.blog-share .social-icons>a.google-plus:hover {
    background-color: #dd4b39 !important;
    color: #fff;
}

.blog-share .social-icons svg {
    line-height: 35px;
}

.blog-share .social-icons>a:hover svg:first-child {
    margin-top: -35px;
}

.appia-blog .blog-details .blog-title>a {
    font-size: 24px;
}

.blockquote {
    background-color: #f7f7f7;
    position: relative;
}

.blockquote::after {
    position: absolute;
    content: '';
    height: 100%;
    width: 2px;
    top: 0;
    left: 0;
}

.blog-comments {
    margin-top: 20px;
}

.admin {
    border-top: 1px solid #e5e5e5;
}

.admin-thumb img,
.comments-thumb img {
    border: 1px solid #eee;
}

.comments,
.blog-contact {
    margin-left: 200px;
}

.single-comments {
    border: 1px solid #eee;
    margin-bottom: 1rem;
}

.single-comments:last-of-type {
    margin-bottom: 0;
}

.comments-content>h5>a:last-child {
    color: #00cff2;
}

.contact-box.comment-box {
    text-align: left;
}

.contact-box.comment-box .form-group input {
    font-size: 15px;
    border: 1px solid #e5e5e5;
}

.contact-box.comment-box .form-group textarea {
    font-size: 15px;
    border: 1px solid #e5e5e5;
    height: 150px;
}

.recent-blog-area {
    padding-top: 80px;
}

.widget-items li a {
    position: relative;
    border-bottom: 1px solid #eee;
    padding: 7px 17px !important;
}

/* Hide default checkbox */
.widget-items li input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 16px;
    height: 16px;
    border: 2px solid #f55171;
    /* Border color */
    border-radius: 3px;
    cursor: pointer;
    position: relative;
}

/* Custom checked state */
.widget-items li input[type="checkbox"]:checked {
    background-color: #f55171;
    /* Change check background color */
    border-color: #f55171;
}

/* Add checkmark when checked */
.widget-items li input[type="checkbox"]:checked::after {
    content: "\2713";
    color: white;
    font-size: 12px;
    font-weight: bold;
    position: absolute;
    left: 2px;
    top: -5px;
}

.highlight {
    color: #f55171 !important;
    font-weight: bold;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<section id="blog" class="section blog-area ptb_1001 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <aside class="sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <!-- Search Widget -->
                        <div class="widget-content search-widget">
                            <form action="#">
                                <input type="text" id="nameSearch" placeholder="Search by name..." class="form-control">
                            </form>
                        </div>
                    </div>
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <div class="accordions widget catagory-widget mb-1" id="gender-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion1">
                                        Gender
                                    </a>
                                </h5>
                                <!-- Gender Widget Content -->
                                <div id="accordion1" class="accordion-content widget-content collapse show"
                                    data-parent="#gender-accordion">
                                    <!-- Gender Widget Items -->
                                    <ul class="widget-items">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="male" name="gender[]" value="Male">
                                            <label for="male" class="ml-2 my-1">Male</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="female" name="gender[]" value="Female">
                                            <label for="female" class="ml-2 my-1">Female</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="other" name="gender[]" value="Other">
                                            <label for="other" class="ml-2 my-1">Other</label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <!-- Religion Widget -->
                        <div class="accordions widget catagory-widget mb-1" id="religion-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion-religion">
                                        Religion
                                    </a>
                                </h5>
                                <!-- Religion Widget Content -->
                                <div id="accordion-religion" class="accordion-content widget-content collapse show"
                                    data-parent="#religion-accordion">
                                    <!-- Religion Widget Items -->
                                    <ul class="widget-items">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="hindu" name="religion[]" value="Hindu">
                                            <label for="hindu" class="ml-2 my-1">Hindu</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="sikh" name="religion[]" value="Sikh">
                                            <label for="sikh" class="ml-2 my-1">Sikh</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="christian" name="religion[]" value="Christian">
                                            <label for="christian" class="ml-2 my-1">Christian</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="muslim" name="religion[]" value="Muslim">
                                            <label for="muslim" class="ml-2 my-1">Muslim</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="jain" name="religion[]" value="Jain">
                                            <label for="jain" class="ml-2 my-1">Jain</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="buddhist" name="religion[]" value="Buddhist">
                                            <label for="buddhist" class="ml-2 my-1">Buddhist</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="atheist" name="religion[]" value="Atheist">
                                            <label for="atheist" class="ml-2 my-1">Atheist</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="bahai" name="religion[]" value="Bahai">
                                            <label for="bahai" class="ml-2 my-1">Bahai</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="jew" name="religion[]" value="Jew">
                                            <label for="jew" class="ml-2 my-1">Jew</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="parsi" name="religion[]" value="Parsi">
                                            <label for="parsi" class="ml-2 my-1">Parsi</label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>



                        <div class="accordions widget catagory-widget mb-1" id="caste-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion-caste">
                                        Caste
                                    </a>
                                </h5>
                                <!-- Caste Widget Content -->
                                <div id="accordion-caste" class="accordion-content widget-content collapse show"
                                    data-parent="#caste-accordion">
                                    <!-- Caste Widget Items -->
                                    <ul class="widget-items">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="brahmin" name="caste[]" value="Brahmin">
                                            <label for="brahmin" class="ml-2 my-1">Brahmin</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="ezhava" name="caste[]" value="Ezhava">
                                            <label for="ezhava" class="ml-2 my-1">Ezhava</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="nair" name="caste[]" value="Nair">
                                            <label for="nair" class="ml-2 my-1">Nair</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="kayastha" name="caste[]" value="Kayastha">
                                            <label for="kayastha" class="ml-2 my-1">Kayastha</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="rajput" name="caste[]" value="Rajput">
                                            <label for="rajput" class="ml-2 my-1">Rajput</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="vishwakarma" name="caste[]" value="Vishwakarma">
                                            <label for="vishwakarma" class="ml-2 my-1">Vishwakarma</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="maratha" name="caste[]" value="Maratha">
                                            <label for="maratha" class="ml-2 my-1">Maratha</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="chavra" name="caste[]" value="Chavra">
                                            <label for="chavra" class="ml-2 my-1">Chavra</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="nadar" name="caste[]" value="Nadar">
                                            <label for="nadar" class="ml-2 my-1">Nadar</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="reddy" name="caste[]" value="Reddy">
                                            <label for="reddy" class="ml-2 my-1">Reddy</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="iyer" name="caste[]" value="Iyer">
                                            <label for="iyer" class="ml-2 my-1">Iyer</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="baniya" name="caste[]" value="Baniya">
                                            <label for="baniya" class="ml-2 my-1">Baniya</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="chaurasia" name="caste[]" value="Chaurasia">
                                            <label for="chaurasia" class="ml-2 my-1">Chaurasia</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="yadav" name="caste[]" value="Yadav">
                                            <label for="yadav" class="ml-2 my-1">Yadav</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="vanniyar" name="caste[]" value="Vanniyar">
                                            <label for="vanniyar" class="ml-2 my-1">Vanniyar</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="naidu" name="caste[]" value="Naidu">
                                            <label for="naidu" class="ml-2 my-1">Naidu</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="sc" name="caste[]" value="SC">
                                            <label for="sc" class="ml-2 my-1">SC</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="buddhist" name="caste[]" value="Buddhist">
                                            <label for="buddhist" class="ml-2 my-1">Buddhist</label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- City Widget -->
                        <div class="accordions widget catagory-widget mb-1" id="city-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion-city">
                                        Cities
                                    </a>
                                </h5>
                                <!-- City Widget Content -->
                                <div id="accordion-city" class="accordion-content widget-content collapse"
                                    data-parent="#city-accordion">
                                    <!-- City Widget Items -->
                                    <ul class="widget-items list-unstyled">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="kerala" name="city[]" value="Kerala">
                                            <label for="kerala" class="ml-2 my-1">Kerala</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="uttrakhand" name="city[]" value="Uttrakhand">
                                            <label for="uttrakhand" class="ml-2 my-1">Uttrakhand</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="tamilnadu" name="city[]" value="Tamilnadu">
                                            <label for="tamilnadu" class="ml-2 my-1">Tamilnadu</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="panjab" name="city[]" value="Panjab">
                                            <label for="panjab" class="ml-2 my-1">Panjab</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="gujrat" name="city[]" value="Gujrat">
                                            <label for="gujrat" class="ml-2 my-1">Gujrat</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="manipur" name="city[]" value="Manipur">
                                            <label for="manipur" class="ml-2 my-1">Manipur</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="madhya_pradesh" name="city[]"
                                                value="Madhya Pradesh">
                                            <label for="madhya_pradesh" class="ml-2 my-1">Madhya Pradesh</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="odisha" name="city[]" value="Odisha">
                                            <label for="odisha" class="ml-2 my-1">Odisha</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="telangana" name="city[]" value="Telangana">
                                            <label for="telangana" class="ml-2 my-1">Telangana</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="rajashthan" name="city[]" value="Rajashthan">
                                            <label for="rajashthan" class="ml-2 my-1">Rajashthan</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="delhi" name="city[]" value="Delhi">
                                            <label for="delhi" class="ml-2 my-1">Delhi</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="assam" name="city[]" value="Assam">
                                            <label for="assam" class="ml-2 my-1">Assam</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="meghalaya" name="city[]" value="Meghalaya">
                                            <label for="meghalaya" class="ml-2 my-1">Meghalaya</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="sikkim" name="city[]" value="Sikkim">
                                            <label for="sikkim" class="ml-2 my-1">Sikkim</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="west_bengal" name="city[]" value="West Bengal">
                                            <label for="west_bengal" class="ml-2 my-1">West Bengal</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="mizoram" name="city[]" value="Mizoram">
                                            <label for="mizoram" class="ml-2 my-1">Mizoram</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="bihar" name="city[]" value="Bihar">
                                            <label for="bihar" class="ml-2 my-1">Bihar</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="arunachal_pradesh" name="city[]"
                                                value="Arunachal Pradesh">
                                            <label for="arunachal_pradesh" class="ml-2 my-1">Arunachal Pradesh</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Marital Status Widget -->
                        <div class="accordions widget catagory-widget mb-1" id="marital-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion-marital">
                                        Marital Status
                                    </a>
                                </h5>
                                <!-- Marital Status Widget Content -->
                                <div id="accordion-marital" class="accordion-content widget-content collapse"
                                    data-parent="#marital-accordion">
                                    <!-- Marital Status Widget Items -->
                                    <ul class="widget-items">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="single" name="marital_status[]" value="Single">
                                            <label for="single" class="ml-2 my-1">Single</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="divorced" name="marital_status[]"
                                                value="Divorced">
                                            <label for="divorced" class="ml-2 my-1">Divorced</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="widowed" name="marital_status[]" value="Widowed">
                                            <label for="widowed" class="ml-2 my-1">Widowed</label>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <!-- Family Type Widget -->
                        <div class="accordions widget catagory-widget mb-1" id="family-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3"
                                        data-toggle="collapse" href="#accordion-family">
                                        Family Type
                                    </a>
                                </h5>
                                <!-- Family Type Widget Content -->
                                <div id="accordion-family" class="accordion-content widget-content collapse"
                                    data-parent="#family-accordion">
                                    <!-- Family Type Widget Items -->
                                    <ul class="widget-items">
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="joint" name="family_type[]" value="Joint">
                                            <label for="joint" class="ml-2 my-1">Joint</label>
                                        </li>
                                        <li class="d-flex align-items-center p-2">
                                            <input type="checkbox" id="nuclear" name="family_type[]" value="Nuclear">
                                            <label for="nuclear" class="ml-2 my-1">Nuclear</label>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>

                    </div>

                </aside>
            </div>
            <!-- <pre id="jsonOutput"></pre> -->

            <div class="col-12 col-lg-9">
                <div class="row">
                    <?php
                            $sql = "SELECT * FROM users WHERE role_id != 1 AND status != 'pending'";
                            $result = mysqli_query($conn, $sql);
                            ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-12 mb-2 user_profile">
                        <!-- Single Blog -->
                        <div class="single-blog res-margin d-flex align-items-center">
                            <!-- Blog Thumb -->
                            <div class="blog-thumb p-4">
                                <a href="#"><img src="<?= htmlspecialchars($base_url . '/' . $row['profile_img']) ?>"
                                        alt="Profile Picture" style="width: 299px;"></a>
                            </div>
                            <!-- Blog Content -->
                            <div class="blog-content p-4 w-100">
                                <!-- Meta Info -->
                                <!-- <ul class="meta-info d-flex justify-content-between">
                                                <li>By <a href="#">Anna Sword</a></li>
                                                <li><a href="#">Feb 05, 2019</a></li>
                                            </ul> -->
                                <!-- Blog Title -->
                                <h3 class="blog-title my-3 user-name"><a
                                        href="#"><?= htmlspecialchars($row['full_name']) ?></a>
                                </h3>
                                <p><?= htmlspecialchars($row['what_are_you_looking_for']) ?></p>


                                <div class="widget-content tags-widget-items pt-2">
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-gender">
                                        <i class="fa fa-venus-mars"></i> <?= htmlspecialchars($row['gender']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-caste">
                                        <i class="fa fa-users"></i> <?= htmlspecialchars($row['cast']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-mother-tongue">
                                        <i class="fa fa-language"></i> <?= htmlspecialchars($row['mother_tongue']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-religion">
                                        <i class="fa fa-book"></i> <?= htmlspecialchars($row['religion']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-state">
                                        <i class="fa fa-map-marker"></i> <?= htmlspecialchars($row['state']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-city">
                                        <i class="fa fa-building"></i> <?= htmlspecialchars($row['city']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-education">
                                        <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($row['education']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-occupation">
                                        <i class="fa fa-briefcase"></i> <?= htmlspecialchars($row['occupation']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-personality-traits">
                                        <i class="fa fa-smile"></i> <?= htmlspecialchars($row['personality_traits']); ?>
                                    </a>
                                    <a href="#" class="d-inline-block mt-2 mr-1 px-2 py-1 tag-hobbies">
                                        <i class="fa fa-music"></i> <?= htmlspecialchars($row['hobbies']); ?>
                                    </a>
                                </div>
                                <hr>
                                <?php if ($loginuser_payment): ?>

                                <?php
                                    $premium_plan_id = 3; // Define the premium plan ID
                                    $is_premium_user = isset($loginuser_payment['plan_id']) && $loginuser_payment['plan_id'] == $premium_plan_id;
                                    ?>
                                <div class="row">
                                    <div class="col-md-6 info-item"><strong>Email:</strong>
                                        <?php if ($is_premium_user): ?>
                                        <?php 
                                            $email = htmlspecialchars($row['email']);
                                            $outlook_link = "https://outlook.live.com/mail/0/deeplink/compose?to=" . urlencode($email);
                                        ?>
                                        <a href="<?= $outlook_link ?>" target="_blank">
                                            <?= $email ?>
                                        </a>
                                        <?php else: ?>
                                        ******@*****.com
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 info-item"><strong>Phone:</strong>
                                        <?php if ($is_premium_user): ?>
                                        <?php 
                                            // Remove non-numeric characters from the phone number
                                            $cleaned_phone = preg_replace('/\D/', '', $row['phone_no']); 

                                            // Generate WhatsApp link
                                            $whatsapp_link = "https://wa.me/" . $cleaned_phone;
                                        ?>
                                        <a href="<?= htmlspecialchars($whatsapp_link) ?>" target="_blank">
                                            <?= htmlspecialchars($row['phone_no']) ?>
                                        </a>
                                        <?php else: ?>
                                        *******<?= substr(preg_replace('/\D/', '', $row['phone_no']), -2) ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 info-item"><strong>Date of Birth:</strong>
                                        <?= $is_premium_user ? htmlspecialchars($row['dob']) : '****-**-**' ?>
                                    </div>

                                </div>
                                <?php else: ?>
                                <!-- No Membership Found -->
                                <div class="alert alert-warning text-center">
                                    <h5>No Membership Found</h5>
                                    <p>Upgrade now to unlock <strong>Personal Information, Family Details, and Partner
                                            Preferences</strong>!</p>
                                    <p>Enjoy exclusive benefits and gain full access to user details.</p>
                                    <a href="pricing_plans.php" class="btn btn-primary">Upgrade Now</a>
                                </div>

                                <?php endif; ?>

                                <a href="user_details.php?id=<?= htmlspecialchars($row['id']) ?>"
                                    class="blog-btn  mt-3">Read More</a>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    <div class="col-12 mb-2 text-center no_user_profile_found" style="display: none;">
                        <p class="text-danger font-weight-bold">No matching data found.</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<script>
$(document).ready(function() {
    let jsonData = {}; // Store selected values

    $("input[type='checkbox']").change(function() {

        let category = $(this).attr("name").replace("[]", ""); // Extract category name
        let value = $(this).val();

        // Initialize if not exists
        if (!jsonData[category]) {
            jsonData[category] = [];
        }

        if ($(this).prop("checked")) {
            if (!jsonData[category].includes(value)) {
                jsonData[category].push(value);
            }
        } else {
            jsonData[category] = jsonData[category].filter(item => item !== value);
        }

        updateTags(); // Update highlights
        checkAndShowAllProfiles(); // Check again when input changes

    });

    function updateTags() {
        $(".user_profile").hide();
        $(".tags-widget-items a").each(function() {
            let tagClass = $(this).attr("class").split(" ").find(cls => cls.startsWith("tag-"));
            if (!tagClass) return;

            let category = tagClass.replace("tag-", "").replace("-", "_"); // Convert class to JSON key
            let tagValue = $(this).text().trim(); // Get text inside <a>

            if (jsonData[category] && jsonData[category].includes(tagValue)) {
                $(this).addClass("highlight");
                $(this).closest('.user_profile').show();

            } else {
                $(this).removeClass("highlight");
            }
            filterByUsername();

        });

        // Update JSON Output
        // $("#jsonOutput").text(JSON.stringify(jsonData, null, 2));
    }
    $("#nameSearch").on("input", function() {
        filterByUsername();
        checkAndShowAllProfiles(); // Check again when input changes

    });

    function filterByUsername() {


        let usernameQuery = $("#nameSearch").val().trim().toLowerCase();

        // if (usernameQuery === "") {
        //     $(".user_profile:visible").show(); // Show all visible profiles when input is empty
        //     return;
        // }

        $(".user_profile:visible").each(function() {
            let userName = $(this).find(".user-name a").text().trim().toLowerCase();
            if (usernameQuery && !userName.includes(usernameQuery)) {
                $(this).hide(); // Hide if username doesn't match
            } else if (usernameQuery) {
                $(this).show(); // Show if username matches
            }
        });
    }

    function checkAndShowAllProfiles() {
        let allEmpty = Object.values(jsonData).every(arr => arr.length === 0);

        let usernameInput = $("#nameSearch"); // Check if input exists
        let usernameEmpty = usernameInput.length === 0 || usernameInput.val().trim() === "";

        if (allEmpty && usernameEmpty) {

            $(".user_profile").show(); // Show all profiles
        } else {

            let visibleCount = $(".user_profile:visible").length;

            if (visibleCount === 0) {
                $(".no_user_profile_found").show(); // Show "No matching data found" message
            } else {
                $(".no_user_profile_found").hide(); // Hide message if profiles are visible
            }

        }


    }

});
</script>