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
                    $isUserList = ($currentFile == 'user_list.php');
                    ?>
                    <!-- Dashboards -->
                    <li class="menu-item <?php echo $isDashboard ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                            <span class="badge rounded-pill bg-danger ms-auto">1</span>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $isDashboard ? 'active' : ''; ?>">
                                <a href="dashboard.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $isUserList ? 'active open' : ''; ?> ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-user"></i>
                            <div data-i18n="Users">Users</div>
                        </a>
                        <ul class="menu-sub <?php echo $isUserList ? 'active' : ''; ?>">
                            <li class="menu-item">
                                <a href="user_list.php" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </aside>
            <!-- / Menu -->