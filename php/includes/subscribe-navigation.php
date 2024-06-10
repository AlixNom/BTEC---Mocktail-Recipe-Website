<?php 
session_start();

$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

header("Location: test.php");
