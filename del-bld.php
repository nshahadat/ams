<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$bld = $_GET['bld'];

$selsqlbld = "SELECT * FROM building WHERE buildingName = '$bld'";
$resultbld = mysqli_query($mysqli, $selsqlbld) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultbld) > 0) {

    $delsqlbld = "DELETE FROM building WHERE buildingName = '$bld'";
    mysqli_query($mysqli, $delsqlbld) or die(mysqli_error($mysqli));

}


echo "<script>
alert('Building Deleted Succesfully');
window.location = '/ams/building-list.php';
</script>";