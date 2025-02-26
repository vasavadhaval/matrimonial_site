            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../assets/img/logo/logo2.png" alt="" srcset="" width="55px;">

                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">MB</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <?php
                    $currentFile = basename($_SERVER['PHP_SELF']);
                    $isDashboard = ($currentFile == 'dashboard.php');
                    $isUserList = ($currentFile == 'user_list.php' || $currentFile == 'view_user.php' || $currentFile == 'edit_user.php');
                    $isReviewList = ($currentFile == 'review_listings.php' || $currentFile == 'review_details.php');
                    $isContactList = ($currentFile == 'contact_list.php' || $currentFile == 'view_contact.php');
                    $isPlanList = ($currentFile == 'plan_list.php' || $currentFile == 'plan_details.php' || $currentFile == 'create_plan.php' || $currentFile == 'edit_plan.php');
                    ?>
                    <!-- Dashboards -->
                    <li class="menu-item <?php echo $isDashboard ? 'active open' : ''; ?>">
                        <a href="dashboard.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </li>

                    <!-- Users -->
                    <li class="menu-item <?php echo $isUserList ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon bx bx-user"></i>
                            <div data-i18n="Users">Users</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo ($currentFile == 'user_list.php') ? 'active' : ''; ?>">
                                <a href="user_list.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Reviews -->
                    <li class="menu-item <?php echo $isReviewList ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon bx bx-star"></i>
                            <div data-i18n="Reviews">Reviews</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item <?php echo ($currentFile == 'review_listings.php') ? 'active' : ''; ?>">
                                <a href="review_listings.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="Review List">Review List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $isContactList ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon bx bx-envelope"></i>
                            <div data-i18n="Contact Us">Contact Us</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $currentFile == 'contact_list.php' ? 'active' : ''; ?>">
                                <a href="contact_list.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo $isPlanList ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon bx bx-layer"></i>
                            <div data-i18n="Plans">Plans</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $currentFile == 'plan_list.php' ? 'active' : ''; ?>">
                                <a href="plan_list.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </aside>
            <!-- / Menu -->