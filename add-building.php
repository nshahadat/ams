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

    <div class="main-content" style="max-height:100vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Building
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Building Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="buildingName"
                                                placeholder="Enter Building Name" class="form-control" required>
                                            <small class="form-text text-muted">Enter Building Name</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Building
                                                Location</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="buildingLoc"
                                                placeholder="Location of the building" class="form-control" required>
                                            <small class="form-text text-muted">Address of the building</small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="addBld" value="Add" class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="resetform()">Reset</button>
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
if (isset($_POST['addBld'])) {

    $bldName = $_POST['buildingName'];
    $bldLoc = $_POST['buildingLoc'];

    $addbldsql = "INSERT IGNORE INTO $building(buildingName, buildingLoc) VALUES('$bldName', '$bldLoc')";
    $mysqli->query($addbldsql) or die($mysqli->error);
    echo "<script>alert('Building added succesfully')</script>";
}
?>

<?php
include ROOT . '/includes/footer.php';
?>