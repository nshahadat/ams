<?php

if (isset($_SESSION['username'])) {
    header('Location:/ams/dashboard.php');
}