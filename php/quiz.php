<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiz</title>
</head>

<body>

<div class='nav'>
        <div class='logo'>
            Logo
        </div>
        <div class='nav-links'>
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
</div>

<?php
if(isset($_SESSION['status-warning'])) {
?>
    <div class="alert-error">
        <strong>Invalid!</strong> <?php echo $_SESSION['status-warning'];?>
    </div>
<?php unset($_SESSION['status-warning']); } ?>

    <div class='login'>
            <div class='form form-box'>
                <h3>Mocktail Knowledge</h3>
                <div class="form">
                    <h2 id = "question" class="question">Question?</h2>
                    <div class="answer-buttons" id='answer-buttons'>
                        <button class ="btn">Answer 1</button>
                        <button class ="btn">Answer 2</button>
                        <button class ="btn">Answer 3</button>
                        <button class ="btn">Answer 4</button>
                    </div>
                    <button id ="next" class="next">Next</button>
                </div>
            </div>
        </div>
    <!--<a href='subscribe.php'>Subscribe</a>-->";
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
    <script type="text/javascript" src="functionQuiz.js"></script>
</body>
</html>
