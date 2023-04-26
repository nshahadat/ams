<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
include ROOT . '/includes/header.php';
include ROOT . '/functions.php';
include ROOT . '/includes/header-mobile.php';
include ROOT . '/includes/sidebar.php'; ?>
<div class="page-container">
    <?php
    include ROOT . '/includes/header-desktop.php';
    ?>

    <?php
    $usersql = "SELECT * FROM admin";
    $resultforupdate = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforupdate = $resultforupdate->fetch_assoc();
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Update Admin
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Admin Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['adminName'] ?>
                                                <a href="/ams/modal-for-admin.php?update=name" target="_blank"><input
                                                        type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Admin Email
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['adminEmail'] ?>
                                                <a href="/ams/modal-for-admin.php?update=email" target="_blank"><input
                                                        type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Admin password
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <a href="/ams/modal-for-admin.php?update=password"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>