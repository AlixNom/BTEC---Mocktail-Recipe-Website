<?php
include 'includes/connDB.php';
    $sql = "INSERT INTO mocktail_users (uname, name ,surname, email,dob, socials) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $uname, $name, $email, $socials);