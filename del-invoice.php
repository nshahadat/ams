<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';

$user = $_SESSION['usertype'];
if (isset($user)) {
    if ($user != 'admin') {
        echo "<script>
        alert('Youre not allowed to delete invoices.');
        window.location='/ams/dashboard.php';
        </script>";
    } else {
        $apt = $_GET['apt'];
        $month = $_GET['month'];
        $year = $_GET['year'];

        $delsql = "DELETE FROM invoice WHERE apartment = '$apt' AND month = '$month' AND year = '$year'";
        mysqli_query($mysqli, $delsql) or die(mysqli_error($mysqli));
    }
}