<?php
session_start();
include 'ConnDB.php';

if (isset($_GET['season'])){
    $seasontmp = $_GET['season'];
    $_SESSION['season'] = $seasontmp;
    header("Location: ../newsletter.php");} else{
        header("Location: ../newsletter.php");
    }
?>