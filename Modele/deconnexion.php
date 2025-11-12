<?php

session_start();
ini_set('dispaly_errors', 1);
ini_set('dispaly_startup_errors', 1);
error_reporting(E_ALL);
session_destroy();
header("Location: ../Vue/index.php");
exit();
?>
