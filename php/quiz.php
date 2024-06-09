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
                    <h2 id = "question">Question?</h2>
                    <div class='answer-buttons'>
                        <button class ="btn">Answer 1</button>
                        <button class ="btn">Answer 2</button>
                        <button class ="btn">Answer 3</button>
                        <button class ="btn">Answer 4</button>
                    </div>
                    <button class ="next">Next</button>
                </div>
            </div>
        </div>
    <!--<a href='subscribe.php'>Subscribe</a>-->";
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
    <script>const questions = [
    {
        question: "Which glass is traditionally used to serve a Bloody Mary mocktail? ",
        answers: [
            {text: "Highball glass", correct: true},
            {text: "Virgin Mary", correct: false},
            {text: "Shirley Temple", correct: false},
            {text: "Virgin Pina Colada", correct: false},
        ]
    },
    {
        question: "What mocktail was created as a promotional tool for a children’s movie in the 1930s? ",
        answers: [
            {text: "Highball glass", correct: false},
            {text: "Virgin Mary", correct: false},
            {text: "Shirley Temple", correct: true},
            {text: "Virgin Pina Colada", correct: false},
        ]
    },
    {
        question: "What is the most used citrus fruit in mocktails?",
        answers: [
            {text: "Lime", correct: false},
            {text: "Orange", correct: false},
            {text: "Lemon", correct: true},
            {text: "Grapefruit", correct: false},
        ]
    },
    {
        question: " Apple Cider Mocktail is a beverage that is popular in which season?",
        answers: [
            {text: "Winter", correct: false},
            {text: "Autumn", correct: true},
            {text: "Spring", correct: false},
            {text: "Summer", correct: false},
        ]
    },
    {
        question: "Redemption Bar is a famous mocktail bar in which British city? ",
        answers: [
            {text: "London", correct: false},
            {text: "Manchester", correct: true},
            {text: "Sheffield", correct: false},
            {text: "Aberdeen", correct: false},
        ]
    },
];

const questionElement =document.getElement("question");
const answerButton =document.getElement("answer-buttons");
const nextButton =document.getElement("next");

let currentQuestionIndex=0;
let score = 0;

function startQuiz(){
    currentQuestionIndex= 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();

};

function showQuestion(){
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButton.appendChild(button);
    });
}

startQuiz();
</script>
</body>
</html>
