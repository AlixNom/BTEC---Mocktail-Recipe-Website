<?php
session_start();
include 'ConnDB.php';

$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

$season = stripslashes($_SESSION['season']);
$season = mysqli_real_escape_string($conn, $season);

$sql = "SELECT * from mocktail_recipes'";



header("Location: ../newsletter.php");?>