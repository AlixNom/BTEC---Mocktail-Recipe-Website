<?php
    session_start();
    include 'includes/ConnDB.php';

    $season = stripslashes($_SESSION['season']);
    $season = mysqli_real_escape_string($conn, $season);
    $sql = "SELECT * from mocktail_recipes where seasons = '$season'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();


    $agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://newsapi.org/v2/everything?q=mocktails&apiKey=f72e3318d86b4a52b2eea095123bc312',
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

    $data = json_decode($response, true);
    //echo $data['totalResults'];
    if (isset($data['articles']) && count($data['articles']) > 0) {

        $randomIndex = array_rand($data['articles']);
        $article = $data['articles'][$randomIndex];

        //$name = stripslashes($article['name']);
        $author = stripslashes($article['author']);
        $title = stripslashes($article['title']);
        $desc = stripslashes($article['description']);
        $url = stripslashes($article['url']);
        $image = stripslashes($article['urlToImage']);
        $publishedAT = stripslashes($article['publishedAt']);
        $content = stripslashes($article['content']);
    } else {
        echo "No articles found.\n";
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-browse.css">
    <title>Newsletter</title>
</head>

<!-- <body> -->

    <div class="nav">
        <div class="logo">
            Logo
        </div>
        <div class="nav-links">
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
    </div>
    <header>    
        <div class="header-content">
            <h2>The Daily News headlines about mocktails!</h2>
            <div class="line"></div>
        </div>
    </header>
    <button class="owned" onclick = "location.href = 'index.php'">Back</button>
    <div class = "header-container">
        <h4>Newsletter</h4>
    </div>
    <div class = "option-container">
        <h1><?php echo $title?></h1>
        <img src="<?php echo $image?>" width="400" height="300" alt ="">
    </div>
    <div class = "heading">
        <p><?php echo $desc?></p><br>
        <p><?php echo $content?></p>
        <button class="owned" onclick = "location.href = '<?php echo $url?>'">View</button>
    </div>
    <section class="cocktail-section">
        <div class="title">
            <h1>Seasonal Recipes</h1>
            <div class="line"></div>
        </div>
        
        <main>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <div class = "card">
                <div class = "image">
                    <img src="<?php echo $row['image'];?>" alt="">
                </div>
                <div class="caption">
                    <p class = "name"><?php echo $row['title'];?></p>
                    <p class = "serving">Serving: <?php echo $row['servings'];?></p>
                    <p class = "description"><?php echo $row['description'];?></p>
                    
                </div>
                <form method="POST" action="includes/browse-navigation.php">
                    <input type="hidden" name="recipe_id" value="<?php echo $row['id']; ?>">
                    <button class="view" type="submit"> View Recipe</button>
                </form>
            </div>
            <?php
            }?>
        </main>
    </section>
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
<script scr="script.js"></script>
<!-- </body> -->

</html>