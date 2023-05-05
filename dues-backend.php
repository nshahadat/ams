<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$flr = $_GET['flr'];

$sqlfordue = "SELECT * FROM $dues WHERE dueApt = '$flr'";
$resultfordue = mysqli_query($mysqli, $sqlfordue) or die(mysqli_error($mysqli));
$datafordue = $resultfordue->fetch_assoc();

$sqlfort = "SELECT * FROM $tenant WHERE apartmentName = '$flr'";
$resultfort = mysqli_query($mysqli, $sqlfort) or die(mysqli_error($mysqli));
$datafort = $resultfort->fetch_assoc();

$sqlfora = "SELECT * FROM $apartment WHERE apartmentName = '$flr'";
$resultfora = mysqli_query($mysqli, $sqlfora) or die(mysqli_error($mysqli));
$datafora = $resultfora->fetch_assoc();

$_SESSION['prevdues'] = $datafordue['dueAmount'];
$_SESSION['monfair'] = $datafora['aptFair'];

$_SESSION['rentstart'] = $datafort['tenantStart'];
?>

<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Previous Due</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="prevdue" name="receivedfrom" placeholder="<?= $datafordue['dueAmount'] ?>"
            class="form-control" disabled>
    </div>
</div>
<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Tenant Name</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="prevdue" name="receivedfrom" placeholder="<?= $datafort['tenantName'] ?>"
            class="form-control" disabled>
    </div>
</div>
<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Monthly Fair</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="monthly" name="monthlyrent" placeholder="<?= $datafora['aptFair'] ?>"
            class="form-control" disabled>
    </div>
</div>