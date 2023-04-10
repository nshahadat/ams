<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
include ROOT . '/includes/header.php';
include ROOT . '/includes/header-mobile.php'; ?>

<?php
$fetchbldsql = "SELECT * FROM $building";
$resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
?>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Drop your Complain
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Your email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="useremail"
                                                placeholder="Drop your valid email" class="form-control" required>
                                            <small class="help-block form-text">Remember, you have to be a member of the
                                                building to
                                                drop a complain</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Complain
                                                Details</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="details" id="textarea-input" rows="9"
                                                placeholder="Content..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building of the
                                                Apartment</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="select" class="form-control">
                                                <?php while ($databld = $resultbld->fetch_assoc()) { ?>
                                                    <option value="<?= $databld['buildingName'] ?>">
                                                        <?= $databld['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Floor</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichfloor" id="select" class="form-control">
                                                <?php for ($af = 0; $af < 15; $af++) { ?>
                                                    <option value="<?= $af ?>">
                                                        <?= $af ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Side</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichwing" id="select" class="form-control">
                                                <?php for ($cnt = 1; $cnt < 2; $cnt++) {
                                                    foreach (range('A', 'Z') as $sideapt) { ?>
                                                        <option value="<?= $sideapt ?>">
                                                            <?= $sideapt ?>
                                                        </option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="complainBtn" value="Drop"
                                            class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="resetform()">
                                            Reset
                                        </button>
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
if (isset($_POST['complainBtn'])) {
    $cmpEmail = $_POST['useremail'];
    $cmpDetails = $_POST['details'];
    $selectBuilding = $_POST['whichbuilding'];
    $floor = $_POST['whichfloor'];
    $side = $_POST['whichwing'];
    $cmpApt = "B" . $selectBuilding . "AP" . $floor . $side;

    $cmpsql = "INSERT IGNORE INTO $complain(cmpEmail, cmpDetails, cmpApt) VALUES ('$cmpEmail', '$cmpDetails', '$cmpApt')";
    $mysqli->query($cmpsql) or die($mysqli->error);
    echo "<script>
    alert('Your complaint is submitted.');
    window.location='/ams/index.php';</script>";

}
?>
<?php
include ROOT . '/includes/footer.php';
?>