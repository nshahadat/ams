<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$del = $_GET['user'];

$sql = "DELETE FROM manager WHERE managerID = $del";
$mysqli->query($sql) or die($mysqli->error);


echo "<script>
alert('Manager Deleted Succesfully.');
window.location='/ams/manager-list.php';</script>";