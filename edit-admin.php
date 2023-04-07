<?php
session_start();
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
                                            <label for="text-input" class=" form-control-label">Tenant Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['tenantName'] ?>
                                                <a href="/ams/modal-for-update.php?update=name&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Email
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['tenantEmail'] ?>
                                                <a href="/ams/modal-for-update.php?update=email&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Mobile
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['tenantContact'] ?>
                                                <a href="/ams/modal-for-update.php?update=mobile&user=<?= $user ?>"
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