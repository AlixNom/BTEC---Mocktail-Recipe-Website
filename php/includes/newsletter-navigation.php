<?php
session_start();
include 'ConnDB.php';
$url = "https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312";

$data = file_get_contents($url);

$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

var_dump($data);

// header("Location: ../newsletter.php");
?>