<?php
session_start();
include 'ConnDB.php';
$apiUrl = "https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


if ($response === false) {
    die('Error occurred: ' . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);
print_r($data);

// if (isset($data['articles'])) {

//     $articles = array_slice($data['articles'], 0, 3);

//     foreach ($articles as $index => $article) {
//         echo "Article " . ($index + 1) . ":\n";
//         echo "Title: " . $article['title'] . "\n";
//         echo "Description: " . $article['description'] . "\n";
//         echo "URL: " . $article['url'] . "\n\n";
//     }
// } else {
//     echo "No articles found.\n";
// }


$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;


// header("Location: ../newsletter.php");
?>