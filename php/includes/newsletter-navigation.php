<?php
session_start();
include 'ConnDB.php';

$agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://newsapi.org/v2/everything?q=mocktail&apiKey=f72e3318d86b4a52b2eea095123bc312',
  CURLOPT_USERAGENT => $agent,
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


$seasontmp = $_GET['season'];
$_SESSION['season'] = $seasontmp;

$data = json_decode($response, true);
//$data = stripslashes($data);
echo $data['totalResults'];
if (isset($data['articles']) && count($data['articles']) > 0) {
    // Randomly select one article
    $randomIndex = array_rand($data['articles']);
    $article = $data['articles'][$randomIndex];

    // Display the selected article
    echo "Source: " . $article['source']['name'] . "\n";
    echo "Author: " . $article['author'] . "\n";
    echo "Title: " . $article['title'] . "\n";
    echo "Description: " . $article['description'] . "\n";
    echo "URL: " . $article['url'] . "\n";
    echo "URL to Image: " . $article['urlToImage'] . "\n";
    echo "Published At: " . $article['publishedAt'] . "\n";
    echo "Content: " . $article['content'] . "\n";
} else {
    echo
 //header("Location: ../newsletter.php");
?>