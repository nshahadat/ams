<?php
session_start();
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$cmp = $_GET['cmp'];

$sql = "DELETE FROM $complain WHERE cmpID = $cmp";
$mysqli->query($sql) or die($mysqli->error);

echo "<script>
alert('Complain Deleted.');
window.location='/ams/check-complain.php';</script>";