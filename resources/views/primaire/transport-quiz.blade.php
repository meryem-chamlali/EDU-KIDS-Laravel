@extends('layouts.app')

@section('content')
<div class="quiz-container">
    <div class="floating-cloud"></div>
    <div class="floating-cloud"></div>
    <div class="floating-cloud"></div>
    
    <div class="floating-vehicle">🚗</div>
    <div class="floating-vehicle">✈️</div>
    <div class="floating-vehicle">🚂</div>
    
    <div class="road"></div>

    <div class="navigation-bar">
        <a href="{{ route('primaire.transport') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Transports</span>
        </a>
    </div>

    <div class="quiz-header">
        <h1>Quiz des Transports</h1>
        <p class="quiz-description">Teste tes connaissances sur les moyens de transport !</p>
    </div>

    <div class="quiz-content">
        <div class="score-display">
            <span>Score: </span>
            <span id="score">0</span>
            <span>/10</span>
        </div>

        <div class="question-container" id="questionContainer">
            <!-- Les questions seront injectées ici par JavaScript -->
        </div>

        <button class="restart-button" onclick="restartQuiz()" style="display: none;">
            Recommencer le Quiz
        </button>
    </div>
</div>

<style>
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F1, #E5F3FF);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.floating-decoration {
    position: absolute;
    pointer-events: none;
    z-index: 1;
}

.floating-cloud {
    position: absolute;
    width: 100px;
    height: 40px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    animation: floatCloud 15s infinite linear;
}

.floating-cloud::before,
.floating-cloud::after {
    content: '';
    position: absolute;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
}

.floating-cloud::before {
    width: 50px;
    height: 50px;
    top: -20px;
    left: 15px;
}

.floating-cloud::after {
    width: 40px;
    height: 40px;
    top: -15px;
    left: 45px;
}

.floating-cloud:nth-child(1) { top: 10%; left: -100px; animation-delay: 0s; }
.floating-cloud:nth-child(2) { top: 30%; left: -100px; animation-delay: -5s; }
.floating-cloud:nth-child(3) { top: 50%; left: -100px; animation-delay: -10s; }

.floating-vehicle {
    position: absolute;
    font-size: 2.5rem;
    animation: bounce 3s infinite ease-in-out;
}

.floating-vehicle:nth-child(1) { top: 15%; right: 10%; animation-delay: 0s; }
.floating-vehicle:nth-child(2) { top: 45%; left: 5%; animation-delay: -1s; }
.floating-vehicle:nth-child(3) { bottom: 20%; right: 15%; animation-delay: -2s; }

.road {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background: #FFB6C1;
    opacity: 0.3;
}

.road::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 6px;
    background: white;
    transform: translateY(-50%);
    background-image: linear-gradient(90deg, white 50%, transparent 50%);
    background-size: 40px 100%;
    animation: moveRoad 1s linear infinite;
}

@keyframes floatCloud {
    from { transform: translateX(0); left: -100px; }
    to { transform: translateX(calc(100vw + 200px)); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes moveRoad {
    from { background-position: 0 0; }
    to { background-position: 40px 0; }
}

.quiz-content {
    position: relative;
    z-index: 2;
}

.question-container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 2rem;
    max-width: 800px;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 3px solid #FFB6C1;
}

.quiz-header h1 {
    font-size: 3rem;
    color: #FF69B4;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.quiz-description {
    font-size: 1.2rem;
    color: #666;
    background: rgba(255, 255, 255, 0.8);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    display: inline-block;
}

.score-display {
    text-align: center;
    font-size: 1.5rem;
    margin-bottom: 2rem;
    color: #2196F3;
    font-weight: bold;
}

.question {
    text-align: center;
}

.question img {
    max-width: 300px;
    height: auto;
    margin: 1rem auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.question h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 1.5rem;
}

.options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1.5rem;
}

.option-button {
    background: linear-gradient(45deg, #FFB6C1, #FFE4E1);
    border: none;
    padding: 1rem;
    border-radius: 15px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #444;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.option-button:hover {
    background: linear-gradient(45deg, #FFE4E1, #FFB6C1);
    transform: translateY(-2px) scale(1.02);
}

.option-button.correct {
    background: linear-gradient(45deg, #A5D6A7, #81C784);
    color: white;
}

.option-button.incorrect {
    background: linear-gradient(45deg, #FFAB91, #FF8A65);
    color: white;
}

.restart-button {
    background: linear-gradient(45deg, #FF69B4, #FFB6C1);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.restart-button:hover {
    background: linear-gradient(45deg, #FFB6C1, #FF69B4);
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .options {
        grid-template-columns: 1fr;
    }

    .quiz-header h1 {
        font-size: 2rem;
    }
}
</style>

<script>
const questions = [
    {
        question: "Quel moyen de transport roule sur des rails en ville ?",
        image: "/images/transport/tram.png",
        options: ["Le Tram", "La Voiture", "Le Vélo", "Le Bus"],
        correct: 0
    },
    {
        question: "Quel véhicule peut transporter beaucoup de passagers en ville ?",
        image: "/images/transport/bus.png",
        options: ["La Moto", "Le Bus", "Le Vélo", "La Voiture"],
        correct: 1
    },
    {
        question: "Quel moyen de transport est le plus écologique ?",
        image: "/images/transport/vélo.png",
        options: ["La Voiture", "Le Bus", "Le Vélo", "La Moto"],
        correct: 2
    },
    {
        question: "Quel véhicule peut voler dans le ciel ?",
        image: "/images/transport/avion.png",
        options: ["Le Bateau", "L'Avion", "Le Train", "Le Bus"],
        correct: 1
    },
    {
        question: "Quel transport utilise-t-on sur l'eau ?",
        image: "/images/transport/bateau.png",
        options: ["Le Bateau", "La Voiture", "Le Train", "Le Vélo"],
        correct: 0
    },
    {
        question: "Quel véhicule transporte des marchandises sur la route ?",
        image: "/images/transport/camion.png",
        options: ["Le Vélo", "La Voiture", "Le Camion", "Le Bus"],
        correct: 2
    },
    {
        question: "Quel moyen de transport roule sur des rails entre les villes ?",
        image: "/images/transport/train.png",
        options: ["Le Bus", "Le Train", "La Voiture", "Le Tram"],
        correct: 1
    },
    {
        question: "Comment peut-on se déplacer sans véhicule ?",
        image: "/images/transport/a pied.png",
        options: ["En Voiture", "À Moto", "À Vélo", "À Pied"],
        correct: 3
    },
    {
        question: "Quel véhicule jaune peut-on appeler pour se déplacer en ville ?",
        image: "/images/transport/taxi.png",
        options: ["Le Bus", "Le Taxi", "Le Tram", "Le Train"],
        correct: 1
    },
    {
        question: "Quel véhicule à deux roues est rapide sur la route ?",
        image: "/images/transport/motor.png",
        options: ["Le Vélo", "La Moto", "Le Bus", "La Voiture"],
        correct: 1
    }
];

let currentQuestions = [];
let currentQuestion = 0;
let score = 0;
let questionsAnswered = 0;

const encouragementMessages = [
    "🌟 Continue comme ça !",
    "💫 Tu es sur la bonne voie !",
    "🎯 Excellent choix !",
    "⭐ Bravo, tu es très fort(e) !",
    "🌈 Super réponse !"
];

const wrongAnswerMessages = [
    "😊 Pas grave, essaie encore !",
    "💪 Continue d'essayer !",
    "🌱 Tu apprendras de tes erreurs !",
    "🎈 La prochaine fois sera la bonne !",
    "🌟 Ne lâche pas, tu peux y arriver !"
];

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function displayQuestion() {
    const questionData = currentQuestions[currentQuestion];
    const container = document.getElementById('questionContainer');
    
    container.innerHTML = `
        <div class="question">
            <h2>${questionData.question}</h2>
            <img src="${questionData.image}" alt="Image transport">
            <div class="options">
                ${questionData.options.map((option, index) => `
                    <button class="option-button" onclick="checkAnswer(${index})">${option}</button>
                `).join('')}
            </div>
            <div id="feedback" class="feedback" style="display: none;"></div>
        </div>
    `;
}

function showFeedback(message, isCorrect) {
    const feedback = document.getElementById('feedback');
    feedback.textContent = message;
    feedback.className = `feedback ${isCorrect ? 'correct-feedback' : 'wrong-feedback'}`;
    feedback.style.display = 'block';
}

function checkAnswer(selectedIndex) {
    const questionData = currentQuestions[currentQuestion];
    const options = document.querySelectorAll('.option-button');
    
    options.forEach(button => button.disabled = true);
    
    if (selectedIndex === questionData.correct) {
        options[selectedIndex].classList.add('correct');
        score++;
        document.getElementById('score').textContent = score;
        showFeedback(encouragementMessages[Math.floor(Math.random() * encouragementMessages.length)], true);
    } else {
        options[selectedIndex].classList.add('incorrect');
        options[questionData.correct].classList.add('correct');
        showFeedback(wrongAnswerMessages[Math.floor(Math.random() * wrongAnswerMessages.length)], false);
    }
    
    questionsAnswered++;
    
    setTimeout(() => {
        if (questionsAnswered < currentQuestions.length) {
            currentQuestion++;
            displayQuestion();
        } else {
            showFinalScore();
        }
    }, 2000);
}

function showFinalScore() {
    const container = document.getElementById('questionContainer');
    const percentage = (score / currentQuestions.length) * 100;
    let message, emoji, color;

    if (percentage === 100) {
        message = "🎉 Parfait ! Tu es un véritable expert des transports !";
        emoji = "👑";
        color = "#4CAF50";
    } else if (percentage >= 70) {
        message = "👏 Très bien ! Tu connais bien les transports !";
        emoji = "🌟";
        color = "#2196F3";
    } else if (percentage >= 50) {
        message = "💪 Pas mal ! Continue à apprendre les transports !";
        emoji = "🌈";
        color = "#FF9800";
    } else {
        message = "🌱 Continue d'apprendre ! Tu vas y arriver !";
        emoji = "💫";
        color = "#FF5722";
    }

    container.innerHTML = `
        <div class="question">
            <h2>Quiz Terminé ! ${emoji}</h2>
            <p style="font-size: 1.4rem; margin: 1.5rem 0;">
                Tu as obtenu <span style="color: ${color}; font-weight: bold;">${score} points</span> sur ${currentQuestions.length} !
            </p>
            <div style="font-size: 1.5rem; color: ${color}; margin: 1.5rem 0;">
                ${message}
            </div>
            <div class="final-score-details">
                <p style="font-size: 1.2rem; color: #666;">
                    ${score === currentQuestions.length ? 
                        "🏆 Toutes tes réponses étaient correctes ! Fantastique !" :
                        `✨ Tu peux encore t'améliorer ! Essaie d'obtenir un meilleur score !`
                    }
                </p>
            </div>
        </div>
    `;
    document.querySelector('.restart-button').style.display = 'block';
}

function restartQuiz() {
    currentQuestions = shuffleArray([...questions]);
    currentQuestion = 0;
    score = 0;
    questionsAnswered = 0;
    document.getElementById('score').textContent = '0';
    document.querySelector('.restart-button').style.display = 'none';
    displayQuestion();
}

// Styles pour les messages de feedback
const styles = document.createElement('style');
styles.textContent = `
    .feedback {
        margin-top: 1.5rem;
        padding: 1rem;
        border-radius: 10px;
        font-size: 1.2rem;
        font-weight: bold;
        animation: fadeIn 0.5s ease-in;
    }

    .correct-feedback {
        background-color: #E8F5E9;
        color: #4CAF50;
    }

    .wrong-feedback {
        background-color: #FFF3E0;
        color: #FF9800;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(styles);

// Démarrer le quiz avec des questions mélangées
currentQuestions = shuffleArray([...questions]);
displayQuestion();
</script>
@endsection 