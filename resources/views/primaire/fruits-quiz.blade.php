@extends('layouts.app')

@section('content')
<div class="quiz-container">
    <div class="quiz-background">
        <div class="floating-fruit">🍎</div>
        <div class="floating-fruit">🍌</div>
        <div class="floating-fruit">🍊</div>
        <div class="floating-fruit">🍓</div>
        <div class="floating-fruit">🍇</div>
    </div>

    <a href="{{ route('primaire.fruits') }}" class="back-button">
        <span class="back-arrow">←</span>
        <span class="back-text">Retour aux Fruits</span>
    </a>

    <div class="quiz-content">
        <h1>Quiz des Fruits</h1>
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
                <a href="{{ route('primaire.fruits') }}" class="return-button">Retourner aux Fruits</a>
            </div>
        </div>
    </div>
</div>

<style>
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F0, #FFF0E5, #F5FFE5);
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

.floating-fruit {
    position: absolute;
    font-size: 3rem;
    animation: float 20s infinite linear;
    opacity: 0.2;
}

.floating-fruit:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-fruit:nth-child(2) { top: 30%; right: 20%; animation-delay: -4s; }
.floating-fruit:nth-child(3) { bottom: 20%; left: 30%; animation-delay: -8s; }
.floating-fruit:nth-child(4) { bottom: 30%; right: 10%; animation-delay: -12s; }
.floating-fruit:nth-child(5) { top: 50%; left: 50%; animation-delay: -16s; }

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -50px) rotate(120deg); }
    66% { transform: translate(-30px, 50px) rotate(240deg); }
    100% { transform: translate(0, 0) rotate(360deg); }
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
        question: "Je suis rouge et j'ai des petites graines sur ma peau. Qui suis-je ?",
        options: ["La Fraise", "La Pomme", "L'Orange", "La Pêche"],
        correct: "La Fraise",
        encouragement: "Bravo ! Les fraises sont délicieuses et pleines de vitamines ! 🍓",
        error: "Ce n'est pas grave ! La fraise est reconnaissable à sa couleur rouge et ses petites graines."
    },
    {
        question: "Je suis jaune et courbée. Qui suis-je ?",
        options: ["L'Orange", "La Banane", "La Poire", "Le Kiwi"],
        correct: "La Banane",
        encouragement: "Super ! La banane est excellente pour l'énergie ! 🍌",
        error: "Essaie encore ! La banane est le fruit préféré des singes !"
    },
    {
        question: "Je suis orange et ronde. Qui suis-je ?",
        options: ["La Pomme", "La Pêche", "L'Orange", "L'Ananas"],
        correct: "L'Orange",
        encouragement: "Excellent ! L'orange est pleine de vitamine C ! 🍊",
        error: "Ce n'est pas ça ! L'orange est un agrume très juteux."
    },
    {
        question: "Je pousse en grappe et je suis violet ou vert. Qui suis-je ?",
        options: ["Les Cerises", "Le Raisin", "Les Fraises", "Le Kiwi"],
        correct: "Le Raisin",
        encouragement: "Parfait ! Le raisin est délicieux en grappe ! 🍇",
        error: "Pas tout à fait ! Le raisin pousse en grappe sur la vigne."
    },
    {
        question: "Je suis rouge ou verte et très croquante. Qui suis-je ?",
        options: ["La Pomme", "La Pêche", "La Poire", "L'Orange"],
        correct: "La Pomme",
        encouragement: "Bravo ! Une pomme par jour éloigne le médecin ! 🍎",
        error: "Réessaie ! La pomme est le fruit préféré de Blanche-Neige !"
    },
    {
        question: "Je suis verte à l'extérieur et marron avec des petites graines noires à l'intérieur. Qui suis-je ?",
        options: ["La Poire", "Le Kiwi", "La Pastèque", "L'Ananas"],
        correct: "Le Kiwi",
        encouragement: "Super ! Le kiwi est plein de vitamines ! 🥝",
        error: "Ce n'est pas ça ! Le kiwi est petit et poilu à l'extérieur."
    },
    {
        question: "Je suis jaune avec une couronne de feuilles. Qui suis-je ?",
        options: ["La Banane", "La Poire", "L'Ananas", "L'Orange"],
        correct: "L'Ananas",
        encouragement: "Excellent ! L'ananas est le roi des fruits tropicaux ! 🍍",
        error: "Pas exactement ! L'ananas porte une jolie couronne de feuilles."
    },
    {
        question: "Je suis douce et veloutée, avec un gros noyau au centre. Qui suis-je ?",
        options: ["La Pêche", "La Pomme", "La Poire", "L'Orange"],
        correct: "La Pêche",
        encouragement: "Parfait ! La pêche est douce comme du velours ! 🍑",
        error: "Essaie encore ! La pêche a une peau douce et veloutée."
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
        button.textContent = option;
        button.onclick = () => checkAnswer(option, question);
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
        if (button.textContent === question.correct) {
            button.classList.add('correct');
        } else if (button.textContent === selected && selected !== question.correct) {
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
        message += "🌟 EXTRAORDINAIRE ! Tu es un véritable expert des fruits ! Tu connais tous leurs secrets ! 🌟";
    } else if (percentage >= 80) {
        message += "🎉 EXCELLENT ! Tu connais très bien tes fruits ! Continue comme ça ! 🎉";
    } else if (percentage >= 60) {
        message += "👍 BIEN JOUÉ ! Tu as de bonnes connaissances sur les fruits. Encore un peu de pratique et tu seras un expert ! 👍";
    } else {
        message += "💪 COURAGE ! Continue d'apprendre et de découvrir les fruits. Tu peux refaire le quiz pour t'améliorer ! 💪";
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