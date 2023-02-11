<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <h4>Apartment Management System</h4>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="active">
                    <a href="/ams/dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-home"></i>Building</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/ams/add-building.php">Add Building</a>
                        </li>
                        <li>
                            <a href="/ams/building-list.php">Building List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-city-alt"></i>Apartment</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/ams/add-apt.php">Add Apartment</a>
                        </li>
                        <li>
                            <a href="/ams/apt-list.php">Apartment List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-accounts"></i>Tenant</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/ams/add-tenant.php">Add Tenant</a>
                        </li>
                        <li>
                            <a href="/ams/tenants-list.php">Tenant List</a>
                        </li>
                        <li>
                            <a href="/ams/rent-collect.php">Collect Rent</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-male-female"></i>Staff</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/ams/add-staff.php">Add Staff</a>
                        </li>
                        <li>
                            <a href="/ams/staff-list.php">Staff List</a>
                        </li>
                        <li>
                            <a href="/ams/add-staff-role.php">Add/Delete Staff Role</a>
                        </li>
                        <li>
                            <a href="/ams/staff-payment.php">Staff Payment</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/ams/rent-status.php">
                        <i class="fas  fa-bar-chart-o"></i>Rent Status</a>
                </li>
                <li>
                    <a href="/ams/check-complain.php">
                        <i class="fas fa-check-square"></i>Check Complain</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->