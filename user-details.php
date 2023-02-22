<?php
session_start();
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
include ROOT . '/includes/header.php';
include ROOT . '/includes/header-mobile.php';
include ROOT . '/includes/sidebar.php'; ?>
<div class="page-container">
    <?php
    include ROOT . '/includes/header-desktop.php';
    ?>
    <?php
    $user = $_GET['user'];
    $usersql = "SELECT * FROM $tenant WHERE tenantID = '$user'";
    $resultforb01 = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforb01 = $resultforb01->fetch_assoc();
    $dataforb01['nidFrontDir'];
    $dataforb01['nidBackDir'];
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header custom__div">
                                <strong class="card-title">Tenant Information</strong>
                                <a href="/ams/delete-user.php?id=<?= $dataforb01['tenantID'] ?>"><input type="submit"
                                        value="Delete" class="btn btn-danger card-title"></a>
                                <a href="/ams/update-user.php?user=<?= $dataforb01['tenantID'] ?>"><input type="submit"
                                        value="Update" class="btn btn-danger card-title"></a>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" style="width:20vh;"
                                        src="<?= $dataforb01['profilepic'] ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1" style="height:5vh">
                                        <?= $dataforb01['tenantName'] ?>
                                    </h5>
                                    <div class="location text-sm-center">
                                        <i class="fa fa-map-marker"></i>
                                        <?= $dataforb01['pAddress'] ?>
                                    </div>
                                    <div class="location text-sm-center">
                                        <i class="fa fa-mobile"></i>
                                        <?= $dataforb01['tenantContact'] ?>
                                    </div>
                                    <div class="location text-sm-center">
                                        <i class="fa fa-envelope"></i>
                                        <?= $dataforb01['tenantEmail'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <div>
                                        Father's Name: <span>
                                            <?= $dataforb01['fatherName'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        Post Office: <span>
                                            <?= $dataforb01['po'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        Police Station: <span>
                                            <?= $dataforb01['ps'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        District: <span>
                                            <?= $dataforb01['district'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        Village: <span>
                                            <?= $dataforb01['village'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        NID: <span>
                                            <?= $dataforb01['nidNumber'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        <img src="<?= $dataforb01['nidFrontDir'] ?>" alt=""
                                            style="width:50%; padding: 2vh 0 0 2vh;">
                                        <img src="<?= $dataforb01['nidBackDir'] ?>" alt=""
                                            style="width:50%; padding: 2vh 0 0 2vh;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ROOT . '/includes/footer.php';
?>