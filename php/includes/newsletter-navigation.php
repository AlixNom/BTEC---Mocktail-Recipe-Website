<?php
session_start();
include 'ConnDB.php';
$apiUrl = "https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312";

// Use cURL to make the GET request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute the request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    die('Error occurred: ' . curl_error($ch));
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the response contains articles
if (isset($data['articles'])) {
    // Extract the first three articles
    $articles = array_slice($data['articles'], 0, 3);

    // Print the articles
    foreach ($articles as $index => $article) {
        echo "Article " . ($index + 1) . ":\n";
        echo "Title: " . $article['title'] . "\n";
        echo "Description: " . $article['description'] . "\n";
        echo "URL: " . $article['url'] . "\n\n";
    }
} else {
    echo "No articles found.\n";
}


$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

echo(stringify($data));

// header("Location: ../newsletter.php");
?>