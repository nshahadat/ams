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
    <?php
    $user = $_GET['user'];
    $usersql = "SELECT * FROM $tenant WHERE tenantID = '$user'";
    $resultforupdate = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforupdate = $resultforupdate->fetch_assoc();
    ?>
    <?php
    $fetchbldsql = "SELECT * FROM $building";
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Update Tenant Form
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
                                            <label for="text-input" class=" form-control-label">Father's Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['fatherName'] ?>
                                                <a href="/ams/modal-for-update.php?update=fname&user=<?= $user ?>"
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
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Permanent
                                                Address
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['pAddress'] ?>
                                                <a href="/ams/modal-for-update.php?update=address&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Village
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['village'] ?>
                                                <a href="/ams/modal-for-update.php?update=village&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. O.
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['po'] ?>
                                                <a href="/ams/modal-for-update.php?update=po&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. S.
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['ps'] ?>
                                                <a href="/ams/modal-for-update.php?update=ps&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">District
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['district'] ?>
                                                <a href="/ams/modal-for-update.php?update=district&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Monthly Rent
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['monRent'] ?>
                                                <a href="/ams/modal-for-update.php?update=rent&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Start
                                                Date
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['tenantStart'] ?>
                                                <a href="/ams/modal-for-update.php?update=date&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Apartment</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['apartmentName'] ?>
                                                <a href="/ams/modal-for-update.php?update=building&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">NID Number
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['nidNumber'] ?>
                                                <a href="/ams/modal-for-update.php?update=nid&user=<?= $user ?>"
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

<?php
// if (isset($_POST['submitBtn'])) {
//     $tenantName = $_POST['tenantName'];
//     $fName = $_POST['fatherName'];
//     $tenantEmail = $_POST['tenantEmail'];
//     $tenantContact = $_POST['tenantContact'];
//     $pAdd = $_POST['prmntadr'];
//     $vill = $_POST['village'];
//     $po = $_POST['po'];
//     $ps = $_POST['ps'];
//     $district = $_POST['district'];
//     $monRent = $_POST['monRent'];
//     $startDate = $_POST['startDate'];
//     $selectBuilding = $_POST['whichbuilding'];
//     $floor = $_POST['whichfloor'];
//     $side = $_POST['whichwing'];
//     $nidno = $_POST['nidno'];
//     $apartment = "B" . $selectBuilding . "AP" . $floor . $side;

//     $sql = "UPDATE $tenant SET 
//     tenantName = '$tenantName', 
//     apartmentName = '$apartment', 
//     tenantContact = '$tenantContact', 
//     monRent = '$monRent', 
//     tenantStart = '$startDate', 
//     tenantEmail = '$tenantEmail', 
//     building = '$selectBuilding', 
//     fatherName = '$fName', 	
//     pAddress = '$pAdd', 
//     po = '$po', 
//     ps = '$ps', 
//     district = '$district', 
//     village = '$vill', 
//     nidNumber = '$nidno' 
//     WHERE tenantID = '$user'";

//     $mysqli->query($sql) or die($mysqli->error);

//     echo "<script>
//     alert('Updated succesfully');
//     window.location='/ams/tenants-list.php';
//     </script>";
// }
?>
<?php
include ROOT . '/includes/footer.php';
?>