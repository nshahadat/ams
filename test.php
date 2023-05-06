<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
?>

<?php

// Start the session
session_start();

// Loop through the $_SESSION array
foreach ($_SESSION as $key => $value) {
    // Print the session ID and the key-value pair
    echo "Session ID: " . session_id() . " - " . $key . " = " . $value . "<br>";
}

?>

<?php
include ROOT . '/includes/footer.php';
?>