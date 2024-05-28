<?php
include 'ConnDB.php';

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO mocktail_users (uname, name , email, socials) VALUES (?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssss", $uname, $name, $email, $socials);

// Set parameters and execute the statement
$uname = "BigBadBarry";
$name = "Barry";
$email = "BazzaTheBigFish@elfmail.com";
$socials = '{
            "socials":[
                {"facebook":"big.barry01"},
                {"twitter":"@bigBarry"},
                {"instagram":"@big.barry01"}
            ]
            }';

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();