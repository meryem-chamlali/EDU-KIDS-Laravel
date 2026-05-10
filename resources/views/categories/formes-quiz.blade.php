@extends('layouts.app')

@section('content')
<div class="quiz-container">
    <div class="floating-decorations">
        <div class="floating-shape circle"></div>
        <div class="floating-shape square"></div>
        <div class="floating-shape triangle"></div>
        <div class="floating-shape star"></div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('formes') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Formes</span>
        </a>
    </div>

    <div class="quiz-content">
        <h1>Quiz des Formes Géométriques</h1>
        <div id="encouragement" class="encouragement"></div>
        
        <div id="question-container" class="question-box">
            <p id="question-text"></p>
            <div id="options-container" class="options-grid"></div>
        </div>

        <div id="result-container" class="result-box" style="display: none;">
            <h2>Quiz Terminé!</h2>
            <p>Score: <span id="score">0</span> / <span id="total-questions">0</span></p>
            <button onclick="restartQuiz()" class="restart-button">Recommencer le Quiz</button>
        </div>
    </div>
</div>

<style>
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #E1F5FE, #F3E5F5);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.floating-decorations {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.floating-shape {
    position: absolute;
    opacity: 0.2;
    animation: float 20s infinite linear;
}

.floating-shape.circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #FF69B4;
    top: 20%;
    left: 10%;
}

.floating-shape.square {
    width: 80px;
    height: 80px;
    background: #4CAF50;
    top: 60%;
    right: 15%;
    transform: rotate(45deg);
}

.floating-shape.triangle {
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-bottom: 87px solid #2196F3;
    bottom: 20%;
    left: 20%;
}

.floating-shape.star {
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-bottom: 100px solid #FFC107;
    position: absolute;
    top: 30%;
    right: 30%;
}

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(20px, 20px) rotate(180deg); }
    100% { transform: translate(0, 0) rotate(360deg); }
}

.navigation-bar {
    position: relative;
    z-index: 2;
    margin-bottom: 2rem;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(45deg, #FF6B6B, #FF8787);
    color: white;
    padding: 12px 25px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
    transition: transform 0.3s ease;
}

.back-button:hover {
    transform: translateY(-2px);
}

.quiz-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

h1 {
    color: #FF69B4;
    font-size: 2.5rem;
    margin-bottom: 2rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.encouragement {
    font-size: 1.2rem;
    color: #4CAF50;
    margin-bottom: 1rem;
    min-height: 2rem;
}

.question-box {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    border: 3px solid #FF69B4;
}

#question-text {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 2rem;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.option-button {
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    border: none;
    padding: 1rem;
    border-radius: 15px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.option-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
}

.option-button.correct {
    background: linear-gradient(45deg, #4CAF50, #81C784);
    animation: pulse-green 0.5s;
}

.option-button.incorrect {
    background: linear-gradient(45deg, #f44336, #e57373);
    animation: shake 0.5s;
}

@keyframes pulse-green {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.result-box {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 2rem;
    margin-top: 2rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}

.restart-button {
    background: linear-gradient(45deg, #2196F3, #64B5F6);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 1.2rem;
    cursor: pointer;
    margin-top: 1rem;
    transition: all 0.3s ease;
}

.restart-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
}
</style>

<script>
const questions = [
    {
        question: "Quelle forme a 4 côtés égaux et 4 angles droits?",
        options: ["Carré", "Rectangle", "Triangle", "Cercle"],
        correct: 0
    },
    {
        question: "Quelle forme n'a pas de côtés et est parfaitement ronde?",
        options: ["Triangle", "Cercle", "Carré", "Rectangle"],
        correct: 1
    },
    {
        question: "Quelle forme a 3 côtés et 3 angles?",
        options: ["Carré", "Cercle", "Triangle", "Rectangle"],
        correct: 2
    },
    {
        question: "Quelle forme ressemble à un carré étiré?",
        options: ["Cercle", "Triangle", "Ovale", "Rectangle"],
        correct: 3
    },
    {
        question: "Quelle forme ressemble à un cercle étiré?",
        options: ["Rectangle", "Triangle", "Ovale", "Carré"],
        correct: 2
    },
    {
        question: "Quelle forme ressemble à un carré posé sur sa pointe?",
        options: ["Losange", "Triangle", "Rectangle", "Cercle"],
        correct: 0
    },
    {
        question: "Quelle forme brille dans le ciel la nuit?",
        options: ["Cercle", "Triangle", "Étoile", "Carré"],
        correct: 2
    },
    {
        question: "Quelle forme symbolise l'amour?",
        options: ["Triangle", "Cœur", "Cercle", "Rectangle"],
        correct: 1
    }
];

const encouragements = [
    "Super! Continue comme ça! ⭐",
    "Excellent travail! 🌟",
    "Tu es très fort(e)! 🎉",
    "Bravo! Tu maîtrises les formes! 📐",
    "Continue, tu es sur la bonne voie! 🎯",
    "Fantastique! 🌈",
    "Tu es un(e) champion(ne)! 🏆",
    "Incroyable! 🎨"
];

let currentQuestion = 0;
let score = 0;
let questionsArray = [...questions];

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function displayQuestion() {
    const question = questionsArray[currentQuestion];
    document.getElementById('question-text').textContent = question.question;
    
    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';
    
    const options = [...question.options];
    const correctAnswer = options[question.correct];
    shuffleArray(options);
    const newCorrectIndex = options.indexOf(correctAnswer);
    
    options.forEach((option, index) => {
        const button = document.createElement('button');
        button.className = 'option-button';
        button.textContent = option;
        button.onclick = () => checkAnswer(index === newCorrectIndex);
        optionsContainer.appendChild(button);
    });
}

function showEncouragement() {
    const encouragement = encouragements[Math.floor(Math.random() * encouragements.length)];
    document.getElementById('encouragement').textContent = encouragement;
    setTimeout(() => {
        document.getElementById('encouragement').textContent = '';
    }, 2000);
}

function checkAnswer(isCorrect) {
    const buttons = document.querySelectorAll('.option-button');
    buttons.forEach(button => button.disabled = true);
    
    if (isCorrect) {
        score++;
        showEncouragement();
        buttons[Array.from(buttons).findIndex(button => button.textContent === questionsArray[currentQuestion].options[questionsArray[currentQuestion].correct])].classList.add('correct');
    } else {
        buttons[Array.from(buttons).findIndex(button => button.textContent === questionsArray[currentQuestion].options[questionsArray[currentQuestion].correct])].classList.add('correct');
        buttons.forEach(button => {
            if (button.textContent !== questionsArray[currentQuestion].options[questionsArray[currentQuestion].correct]) {
                button.classList.add('incorrect');
            }
        });
    }
    
    setTimeout(() => {
        currentQuestion++;
        if (currentQuestion < questionsArray.length) {
            displayQuestion();
        } else {
            showResult();
        }
    }, 1500);
}

function showResult() {
    document.getElementById('question-container').style.display = 'none';
    document.getElementById('result-container').style.display = 'block';
    document.getElementById('score').textContent = score;
    document.getElementById('total-questions').textContent = questionsArray.length;
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    questionsArray = shuffleArray([...questions]);
    document.getElementById('question-container').style.display = 'block';
    document.getElementById('result-container').style.display = 'none';
    displayQuestion();
}

// Démarrer le quiz
document.addEventListener('DOMContentLoaded', () => {
    questionsArray = shuffleArray([...questions]);
    displayQuestion();
});
</script>
@endsection 