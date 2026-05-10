@extends('layouts.app')

@section('content')
<div class="quiz-container">
    <div class="quiz-background">
        <div class="floating-color" style="background: #FF0000"></div>
        <div class="floating-color" style="background: #00FF00"></div>
        <div class="floating-color" style="background: #0000FF"></div>
        <div class="floating-color" style="background: #FFFF00"></div>
        <div class="floating-color" style="background: #FF00FF"></div>
    </div>

    <a href="{{ route('colors.index') }}" class="back-button">
        <span class="back-arrow">←</span>
        <span class="back-text">Retour aux Couleurs</span>
    </a>

    <div class="quiz-content">
        <h1>Quiz des Couleurs</h1>
        <div id="progress-bar" class="progress-bar">
            <div id="progress" class="progress"></div>
        </div>
        <div id="encouragement" class="encouragement"></div>
        <div id="question-container">
            <h2 id="question-text"></h2>
            <div id="options-container"></div>
        </div>
        <div id="result-container" class="hidden">
            <p id="result-text"></p>
            <div class="result-buttons">
                <button onclick="restartQuiz()" class="restart-button">Recommencer le Quiz</button>
                <a href="{{ route('colors.index') }}" class="return-button">Retourner aux Couleurs</a>
            </div>
        </div>
    </div>
</div>

<style>
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F0, #E5F0FF, #F0FFE5);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.quiz-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}

.floating-color {
    position: absolute;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    animation: float 20s infinite linear;
    opacity: 0.2;
}

.floating-color:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-color:nth-child(2) { top: 30%; right: 20%; animation-delay: -4s; }
.floating-color:nth-child(3) { bottom: 20%; left: 30%; animation-delay: -8s; }
.floating-color:nth-child(4) { bottom: 30%; right: 10%; animation-delay: -12s; }
.floating-color:nth-child(5) { top: 50%; left: 50%; animation-delay: -16s; }

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg) scale(1); }
    33% { transform: translate(30px, -50px) rotate(120deg) scale(1.2); }
    66% { transform: translate(-30px, 50px) rotate(240deg) scale(0.8); }
    100% { transform: translate(0, 0) rotate(360deg) scale(1); }
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
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}

.back-button:hover {
    transform: translateX(-5px);
    background: linear-gradient(45deg, #FF8787, #FF6B6B);
    color: white;
    text-decoration: none;
}

.back-arrow {
    font-size: 1.5rem;
}

.quiz-content {
    max-width: 800px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.95);
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1;
}

.progress-bar {
    width: 100%;
    height: 10px;
    background: #f0f0f0;
    border-radius: 5px;
    margin: 1rem 0 2rem;
    overflow: hidden;
}

.progress {
    width: 0%;
    height: 100%;
    background: linear-gradient(45deg, #4CAF50, #81C784);
    transition: width 0.3s ease;
}

h1 {
    text-align: center;
    color: #FF6B6B;
    font-size: 2.5rem;
    margin-bottom: 2rem;
}

.encouragement {
    text-align: center;
    font-size: 1.2rem;
    color: #4CAF50;
    margin-bottom: 1rem;
    min-height: 2rem;
    padding: 1rem;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.encouragement.error {
    color: #FF6B6B;
    background: rgba(255, 107, 107, 0.1);
}

.encouragement.success {
    color: #4CAF50;
    background: rgba(76, 175, 80, 0.1);
}

#question-container {
    margin-bottom: 2rem;
}

#question-text {
    font-size: 1.5rem;
    color: #2C3E50;
    margin-bottom: 1.5rem;
    text-align: center;
}

#options-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.option-button {
    background: white;
    border: 2px solid #FF6B6B;
    padding: 1rem;
    border-radius: 15px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #2C3E50;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.color-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.option-button:hover {
    background: #FFE5E5;
    transform: translateY(-2px);
}

.option-button.correct {
    background: #4CAF50;
    color: white;
    border-color: #4CAF50;
}

.option-button.incorrect {
    background: #FF6B6B;
    color: white;
    border-color: #FF6B6B;
}

.hidden {
    display: none;
}

#result-container {
    text-align: center;
}

#result-text {
    font-size: 1.3rem;
    color: #2C3E50;
    margin-bottom: 1.5rem;
}

.result-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.restart-button, .return-button {
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.return-button {
    background: linear-gradient(45deg, #FF6B6B, #FF8787);
}

.restart-button:hover, .return-button:hover {
    transform: scale(1.05);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .quiz-container {
        padding: 1rem;
    }

    h1 {
        font-size: 2rem;
    }

    #question-text {
        font-size: 1.3rem;
    }

    .option-button {
        font-size: 1rem;
    }

    .result-buttons {
        flex-direction: column;
    }
}
</style>

<script>
const questions = [
    {
        question: "Quelle est la couleur du ciel par une belle journée ?",
        options: [
            { text: "Bleu", color: "#0000FF" },
            { text: "Rouge", color: "#FF0000" },
            { text: "Vert", color: "#00FF00" },
            { text: "Jaune", color: "#FFFF00" }
        ],
        correct: "Bleu",
        encouragement: "Bravo ! Le ciel est d'un beau bleu par une journée ensoleillée ! 🌤️",
        error: "Ce n'est pas grave ! Le ciel est bleu quand il fait beau."
    },
    {
        question: "Quelle est la couleur des fraises mûres ?",
        options: [
            { text: "Rouge", color: "#FF0000" },
            { text: "Vert", color: "#00FF00" },
            { text: "Orange", color: "#FFA500" },
            { text: "Violet", color: "#FF00FF" }
        ],
        correct: "Rouge",
        encouragement: "Super ! Les fraises rouges sont délicieuses ! 🍓",
        error: "Essaie encore ! Les fraises deviennent rouges quand elles sont mûres."
    },
    {
        question: "Quelle est la couleur de l'herbe ?",
        options: [
            { text: "Vert", color: "#00FF00" },
            { text: "Jaune", color: "#FFFF00" },
            { text: "Marron", color: "#A52A2A" },
            { text: "Bleu", color: "#0000FF" }
        ],
        correct: "Vert",
        encouragement: "Excellent ! L'herbe est verte grâce à la chlorophylle ! 🌱",
        error: "Pas tout à fait ! L'herbe est verte comme les feuilles des arbres."
    },
    {
        question: "Quelle est la couleur du soleil ?",
        options: [
            { text: "Jaune", color: "#FFFF00" },
            { text: "Orange", color: "#FFA500" },
            { text: "Rouge", color: "#FF0000" },
            { text: "Blanc", color: "#FFFFFF" }
        ],
        correct: "Jaune",
        encouragement: "Parfait ! Le soleil brille d'un beau jaune ! ☀️",
        error: "Réessaie ! Le soleil apparaît jaune dans le ciel."
    },
    {
        question: "Quelle est la couleur des nuages ?",
        options: [
            { text: "Blanc", color: "#FFFFFF" },
            { text: "Gris", color: "#808080" },
            { text: "Bleu", color: "#0000FF" },
            { text: "Rose", color: "#FFC0CB" }
        ],
        correct: "Blanc",
        encouragement: "Bravo ! Les nuages sont blancs comme le coton ! ☁️",
        error: "Ce n'est pas ça ! Les nuages sont blancs quand il fait beau."
    },
    {
        question: "Quelle est la couleur du chocolat ?",
        options: [
            { text: "Marron", color: "#A52A2A" },
            { text: "Noir", color: "#000000" },
            { text: "Rouge", color: "#FF0000" },
            { text: "Orange", color: "#FFA500" }
        ],
        correct: "Marron",
        encouragement: "Super ! Le chocolat est d'un délicieux marron ! 🍫",
        error: "Pas exactement ! Le chocolat est marron comme l'écorce des arbres."
    },
    {
        question: "Quelle est la couleur des oranges ?",
        options: [
            { text: "Orange", color: "#FFA500" },
            { text: "Jaune", color: "#FFFF00" },
            { text: "Rouge", color: "#FF0000" },
            { text: "Vert", color: "#00FF00" }
        ],
        correct: "Orange",
        encouragement: "Excellent ! Les oranges sont... orange ! 🍊",
        error: "Essaie encore ! Les oranges sont de la couleur orange."
    },
    {
        question: "Quelle est la couleur du ciel la nuit ?",
        options: [
            { text: "Noir", color: "#000000" },
            { text: "Bleu", color: "#0000FF" },
            { text: "Gris", color: "#808080" },
            { text: "Violet", color: "#FF00FF" }
        ],
        correct: "Noir",
        encouragement: "Parfait ! Le ciel est noir pendant la nuit ! 🌙",
        error: "Ce n'est pas grave ! La nuit, le ciel devient noir."
    }
];

let currentQuestion = 0;
let score = 0;
let questionsOrder = [];

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function updateProgressBar() {
    const progress = ((currentQuestion + 1) / questions.length) * 100;
    document.getElementById('progress').style.width = `${progress}%`;
}

function showEncouragement(message, isError = false) {
    const encouragement = document.getElementById('encouragement');
    encouragement.textContent = message;
    encouragement.className = 'encouragement ' + (isError ? 'error' : 'success');
}

function startQuiz() {
    currentQuestion = 0;
    score = 0;
    questionsOrder = shuffleArray([...Array(questions.length).keys()]);
    showQuestion();
    updateProgressBar();
}

function showQuestion() {
    const questionIndex = questionsOrder[currentQuestion];
    const question = questions[questionIndex];
    
    document.getElementById('question-text').textContent = question.question;
    
    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';
    
    const shuffledOptions = shuffleArray([...question.options]);
    
    shuffledOptions.forEach(option => {
        const button = document.createElement('button');
        button.className = 'option-button';
        
        const colorCircle = document.createElement('div');
        colorCircle.className = 'color-circle';
        colorCircle.style.backgroundColor = option.color;
        
        const text = document.createElement('span');
        text.textContent = option.text;
        
        button.appendChild(colorCircle);
        button.appendChild(text);
        button.onclick = () => checkAnswer(option.text, question);
        optionsContainer.appendChild(button);
    });
    
    document.getElementById('question-container').classList.remove('hidden');
    document.getElementById('result-container').classList.add('hidden');
    document.getElementById('encouragement').textContent = '';
}

function checkAnswer(selected, question) {
    const buttons = document.querySelectorAll('.option-button');
    buttons.forEach(button => {
        button.disabled = true;
        if (button.querySelector('span').textContent === question.correct) {
            button.classList.add('correct');
        } else if (button.querySelector('span').textContent === selected && selected !== question.correct) {
            button.classList.add('incorrect');
        }
    });

    if (selected === question.correct) {
        score++;
        showEncouragement(question.encouragement);
    } else {
        showEncouragement(question.error, true);
    }

    setTimeout(() => {
        currentQuestion++;
        if (currentQuestion < questions.length) {
            showQuestion();
            updateProgressBar();
        } else {
            showResult();
        }
    }, 2000);
}

function showResult() {
    document.getElementById('question-container').classList.add('hidden');
    document.getElementById('result-container').classList.remove('hidden');
    
    const percentage = (score / questions.length) * 100;
    let message = `Tu as obtenu ${score} sur ${questions.length} (${percentage}%) !<br><br>`;
    
    if (percentage === 100) {
        message += "🌟 EXTRAORDINAIRE ! Tu es un véritable expert des couleurs ! Tu connais toutes les couleurs du monde ! 🌟";
    } else if (percentage >= 80) {
        message += "🎨 EXCELLENT ! Tu connais très bien tes couleurs ! Continue comme ça ! 🎨";
    } else if (percentage >= 60) {
        message += "👍 BIEN JOUÉ ! Tu as de bonnes connaissances sur les couleurs. Encore un peu de pratique et tu seras un expert ! 👍";
    } else {
        message += "💪 COURAGE ! Continue d'apprendre et de découvrir les couleurs. Tu peux refaire le quiz pour t'améliorer ! 💪";
    }
    
    document.getElementById('result-text').innerHTML = message;
}

function restartQuiz() {
    startQuiz();
}

// Démarrer le quiz au chargement de la page
window.onload = startQuiz;
</script>
@endsection 