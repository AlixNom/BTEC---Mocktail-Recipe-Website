<?php
session_start();
include 'ConnDB.php';
$url = "https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312";

$data = json_encode($url);

$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

echo($data);

// header("Location: ../newsletter.php");
?>