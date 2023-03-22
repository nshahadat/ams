<?php
session_start();
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$flr = $_GET['flr'];

$sqlfordue = "SELECT * FROM $dues WHERE dueApt = '$flr'";
$resultfordue = mysqli_query($mysqli, $sqlfordue) or die(mysqli_error($mysqli));
$datafordue = $resultfordue->fetch_assoc();

$_SESSION['prevdues'] = $datafordue['dueAmount'];
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