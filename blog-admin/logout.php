<?php
ob_start();
session_start();
unset($_SESSION['user']); // will delete just the name data
session_destroy(); // will delete ALL data associated with that user..
header('Location: index.php');
?>