<?php
session_start();
include 'ConnDB.php';

$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

 header("Location: ../newsletter.php");
?>