<?php
session_start();
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$bld = $_GET['bld'];
$flr = $_GET['flr'];
$side = $_GET['side'];
$apartment = "B" . $bld . "AP" . $flr . $side;

$sqlfordue = "SELECT * FROM $rent WHERE rentApt = '$apartment'";
$resultfordue = mysqli_query($mysqli, $sqlfordue) or die(mysqli_error($mysqli));
$datafordue = $resultfordue->fetch_assoc();
?>

<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Previous Due</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="text-input" name="receivedfrom" placeholder="<?= $datafordue['rentDue'] ?>"
            class="form-control" disabled>
    </div>
</div>