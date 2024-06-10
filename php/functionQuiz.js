const questions = [
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

const questionElement =document.getElementById("question");
const answerButton =document.getElementById("answer-buttons");
const nextButton =document.getElementById("next");

let currentQuestionIndex=0;
let score = 0;

function startQuiz(){
    currentQuestionIndex= 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();

};

function showQuestion(){
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButton.appendChild(button);
        if(answer.correct){
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click",selectAnswer);
    });
}

function resetState(){
    nextButton.style.display = "none";
    while(answerButton.firstChild){
        answerButton.removeChild(answerButton.firstChild);
    }
}

function selectAnswer(e){
    const selectBtn  = e.target;
    const isCorrect = selectBtn.dataset.correct === "true";
    if(isCorrect){
        selectBtn.classList.add("correct");
    }else{
        selectBtn.classList.remove("incorrect");
    }
}

startQuiz();
