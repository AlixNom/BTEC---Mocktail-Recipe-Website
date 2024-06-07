<?php
session_start();
include 'ConnDB.php';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
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