@extends('layouts.app')

@section('content')
<div class="quiz-world">
    <div class="floating-items">
        <span class="floating-item">🥕</span>
        <span class="floating-item">🥬</span>
        <span class="floating-item">🥦</span>
        <span class="floating-item">🍅</span>
        <span class="floating-item">🥒</span>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire.legumes') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Légumes</span>
        </a>
    </div>

    <div class="quiz-container">
        <h1 class="quiz-title">Quiz des Légumes</h1>
        
        <div class="score-display">
            <div class="score-bubble">
                Score: <span id="score">0</span> / <span id="totalQuestions">0</span>
            </div>
        </div>

        <div id="questionContainer" class="question-container">
            <!-- Les questions seront injectées ici par JavaScript -->
        </div>

        <div id="feedback" class="feedback hidden">
            <div id="successMessage" class="success-message hidden">
                <div class="celebration">
                    <span class="emoji">🎉</span>
                    <span class="emoji">⭐</span>
                    <span class="emoji">🌟</span>
                </div>
                <p class="feedback-text">Super! C'est la bonne réponse!</p>
                <p class="encouragement">Continue comme ça, champion(ne)!</p>
            </div>
            <div id="errorMessage" class="error-message hidden">
                <div class="encouragement-emoji">
                    <span class="emoji">💪</span>
                    <span class="emoji">✨</span>
                </div>
                <p class="feedback-text">Pas tout à fait...</p>
                <p class="encouragement">Essaie encore, tu peux y arriver!</p>
            </div>
        </div>

        <div class="button-container">
            <button id="nextButton" class="game-button next-button hidden">
                Question Suivante 
                <span class="button-emoji">→</span>
            </button>
            <button id="restartButton" class="game-button restart-button hidden">
                Recommencer le Quiz 
                <span class="button-emoji">🔄</span>
            </button>
        </div>
    </div>
</div>

<style>
.quiz-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F1, #E5F2FF, #F1FFE5);
    padding: 2rem;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    position: relative;
    overflow: hidden;
}

.floating-items {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.floating-item {
    position: absolute;
    font-size: 2.5rem;
    animation: float 15s infinite linear;
    opacity: 0.3;
}

.floating-item:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-item:nth-child(2) { top: 20%; right: 20%; animation-delay: -3s; }
.floating-item:nth-child(3) { bottom: 30%; left: 30%; animation-delay: -6s; }
.floating-item:nth-child(4) { bottom: 10%; right: 10%; animation-delay: -9s; }
.floating-item:nth-child(5) { top: 50%; left: 50%; animation-delay: -12s; }

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
    25% { transform: translate(20px, -20px) rotate(90deg) scale(1.1); }
    50% { transform: translate(0, -40px) rotate(180deg) scale(1); }
    75% { transform: translate(-20px, -20px) rotate(270deg) scale(1.1); }
}

.navigation-bar {
    margin-bottom: 2rem;
    position: relative;
    z-index: 10;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.back-button:hover {
    transform: translateX(-5px) scale(1.02);
    background: linear-gradient(45deg, #FF8E8E, #FF6B6B);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.quiz-container {
    max-width: 800px;
    margin: 0 auto;
    background: white;
    border-radius: 30px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 3px solid #FFD700;
    position: relative;
    z-index: 1;
}

.quiz-title {
    text-align: center;
    color: #FF6B6B;
    font-size: 3rem;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.score-display {
    text-align: center;
    margin-bottom: 2rem;
}

.score-bubble {
    display: inline-block;
    background: linear-gradient(45deg, #FFD700, #FFA500);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    font-size: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.question {
    text-align: center;
    margin-bottom: 2rem;
    padding: 2rem;
    background: #F8F9FA;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.question img {
    max-width: 250px;
    height: auto;
    margin-bottom: 1.5rem;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.question img:hover {
    transform: scale(1.05);
}

.question h2 {
    color: #444;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.option-button {
    background: linear-gradient(45deg, #4CAF50, #66BB6A);
    color: white;
    border: none;
    padding: 1.2rem;
    border-radius: 15px;
    font-size: 1.3rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.option-button:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.option-button.correct {
    background: linear-gradient(45deg, #4CAF50, #81C784);
    animation: correctAnswer 0.5s ease;
}

.option-button.incorrect {
    background: linear-gradient(45deg, #FF5252, #FF8A80);
    animation: incorrectAnswer 0.5s ease;
}

@keyframes correctAnswer {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

@keyframes incorrectAnswer {
    0%, 100% { transform: translateX(0); }
    20%, 60% { transform: translateX(-5px); }
    40%, 80% { transform: translateX(5px); }
}

.feedback {
    text-align: center;
    margin: 2rem 0;
    padding: 1.5rem;
    border-radius: 20px;
}

.success-message, .error-message {
    padding: 1.5rem;
    border-radius: 20px;
    animation: fadeInUp 0.5s ease;
}

.success-message {
    background: linear-gradient(45deg, #81C784, #A5D6A7);
    color: white;
}

.error-message {
    background: linear-gradient(45deg, #FF8A80, #FFAB91);
    color: white;
}

.celebration, .encouragement-emoji {
    margin-bottom: 1rem;
}

.emoji {
    font-size: 2.5rem;
    margin: 0 0.5rem;
    animation: spin 2s infinite linear;
}

@keyframes spin {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.2); }
    100% { transform: rotate(360deg) scale(1); }
}

.feedback-text {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.encouragement {
    font-size: 1.2rem;
    font-style: italic;
}

.game-button {
    padding: 15px 30px;
    border-radius: 25px;
    font-size: 1.3rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.next-button {
    background: linear-gradient(45deg, #4CAF50, #66BB6A);
}

.restart-button {
    background: linear-gradient(45deg, #2196F3, #42A5F5);
}

.game-button:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.button-emoji {
    font-size: 1.5rem;
    animation: wiggle 2s infinite;
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-10deg); }
    75% { transform: rotate(10deg); }
}

.hidden {
    display: none;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
    .quiz-container {
        padding: 1.5rem;
        margin: 1rem;
    }

    .options-grid {
        grid-template-columns: 1fr;
    }

    .quiz-title {
        font-size: 2.2rem;
    }

    .option-button {
        font-size: 1.1rem;
        padding: 1rem;
    }

    .floating-item {
        font-size: 2rem;
    }
}
</style>

<script>
const questions = [
    {
        image: '/images/legumes/carrote.PNG',
        question: "Quel est ce légume orange et croquant ?",
        options: ["Carotte", "Poivron", "Tomate", "Oignon"],
        correctAnswer: "Carotte"
    },
    {
        image: '/images/legumes/tomate.PNG',
        question: "Quel est ce légume rouge et juteux ?",
        options: ["Poivron", "Tomate", "Carotte", "Aubergine"],
        correctAnswer: "Tomate"
    },
    {
        image: '/images/legumes/brocoli.PNG',
        question: "Quel est ce légume vert qui ressemble à un petit arbre ?",
        options: ["Épinards", "Courgette", "Brocoli", "Salade"],
        correctAnswer: "Brocoli"
    },
    {
        image: '/images/legumes/aubergine.PNG',
        question: "Quel est ce légume violet ?",
        options: ["Poivron", "Courgette", "Oignon", "Aubergine"],
        correctAnswer: "Aubergine"
    },
    {
        image: '/images/legumes/ognion.PNG',
        question: "Quel est ce légume qui peut faire pleurer ?",
        options: ["Ail", "Oignon", "Pomme de terre", "Poivron"],
        correctAnswer: "Oignon"
    },
    {
        image: '/images/legumes/chou fleur.PNG',
        question: "Quel est ce légume blanc qui ressemble à un nuage ?",
        options: ["Chou-fleur", "Pomme de terre", "Ail", "Oignon"],
        correctAnswer: "Chou-fleur"
    }
];

let currentQuestion = 0;
let score = 0;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function displayQuestion() {
    const questionContainer = document.getElementById('questionContainer');
    const question = questions[currentQuestion];
    
    const optionsHTML = shuffleArray([...question.options])
        .map(option => `
            <button class="option-button" onclick="checkAnswer('${option}')">
                ${option}
            </button>
        `).join('');

    questionContainer.innerHTML = `
        <div class="question">
            <img src="${question.image}" alt="Légume à identifier">
            <h2>${question.question}</h2>
        </div>
        <div class="options-grid">
            ${optionsHTML}
        </div>
    `;

    document.getElementById('score').textContent = score;
    document.getElementById('totalQuestions').textContent = questions.length;
    
    hideElement('nextButton');
    hideElement('restartButton');
    hideElement('feedback');
}

function checkAnswer(selectedAnswer) {
    const question = questions[currentQuestion];
    const buttons = document.querySelectorAll('.option-button');
    const feedback = document.getElementById('feedback');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    buttons.forEach(button => {
        button.disabled = true;
        if (button.textContent.trim() === question.correctAnswer) {
            button.classList.add('correct');
        } else if (button.textContent.trim() === selectedAnswer && selectedAnswer !== question.correctAnswer) {
            button.classList.add('incorrect');
        }
    });

    if (selectedAnswer === question.correctAnswer) {
        score++;
        document.getElementById('score').textContent = score;
        showElement(successMessage);
        hideElement(errorMessage);
        playSound('success');
    } else {
        showElement(errorMessage);
        hideElement(successMessage);
        playSound('error');
    }

    showElement(feedback);

    if (currentQuestion < questions.length - 1) {
        showElement('nextButton');
    } else {
        showElement('restartButton');
    }
}

function nextQuestion() {
    currentQuestion++;
    if (currentQuestion < questions.length) {
        displayQuestion();
    }
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    shuffleArray(questions);
    displayQuestion();
    playSound('restart');
}

function showElement(element) {
    if (typeof element === 'string') {
        element = document.getElementById(element);
    }
    element.classList.remove('hidden');
}

function hideElement(element) {
    if (typeof element === 'string') {
        element = document.getElementById(element);
    }
    element.classList.add('hidden');
}

function playSound(type) {
    const sounds = {
        success: '/audio/success.mp3',
        error: '/audio/error.mp3',
        restart: '/audio/restart.mp3'
    };
    
    const audio = new Audio(sounds[type]);
    audio.play().catch(error => console.log('Erreur audio:', error));
}

// Initialisation du quiz
document.addEventListener('DOMContentLoaded', () => {
    shuffleArray(questions);
    displayQuestion();

    document.getElementById('nextButton').addEventListener('click', nextQuestion);
    document.getElementById('restartButton').addEventListener('click', restartQuiz);
});
</script>
@endsection 