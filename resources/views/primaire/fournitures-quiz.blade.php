@extends('layouts.app')

@section('content')
<div class="quiz-world">
    <div class="navigation-bar">
        <a href="{{ route('primaire.fournitures') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Fournitures</span>
        </a>
    </div>

    <div class="quiz-container">
        <div class="score-display">
            Score: <span id="current-score">0</span>/<span id="total-questions">6</span>
        </div>

        <div id="question-container">
            <h2 id="question-text">Chargement de la question...</h2>
            <div class="options-container" id="options-container">
                <!-- Les options seront injectées ici par JavaScript -->
            </div>
        </div>

        <div id="feedback-container" class="hidden">
            <div id="correct-feedback" class="feedback-message success hidden">
                <h3>🎉 Bravo !</h3>
                <p id="success-message"></p>
            </div>
            <div id="incorrect-feedback" class="feedback-message error hidden">
                <h3>😮 Pas tout à fait...</h3>
                <p id="error-message"></p>
                <p id="correct-answer"></p>
            </div>
        </div>

        <div class="button-container">
            <button id="next-button" class="action-button" disabled>Question Suivante →</button>
            <button id="restart-button" class="action-button hidden">Recommencer le Quiz 🔄</button>
        </div>
    </div>
</div>

<style>
.quiz-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F1, #E5F2FF);
    padding: 2rem;
    font-family: 'Comic Sans MS', cursive, sans-serif;
}

.navigation-bar {
    margin-bottom: 2rem;
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
    transform: translateX(-5px);
    background: linear-gradient(45deg, #FF8E8E, #FF6B6B);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    color: white;
    text-decoration: none;
}

.quiz-container {
    max-width: 800px;
    margin: 0 auto;
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.score-display {
    text-align: center;
    font-size: 1.5rem;
    margin-bottom: 2rem;
    color: #2196F3;
    font-weight: bold;
}

#question-container {
    margin-bottom: 2rem;
}

#question-text {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 1.5rem;
    text-align: center;
}

.options-container {
    display: grid;
    gap: 1rem;
    margin-bottom: 2rem;
}

.option-button {
    padding: 1rem;
    border: 2px solid #E0E0E0;
    border-radius: 10px;
    background: white;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.option-button img {
    width: 50px;
    height: 50px;
    object-fit: contain;
}

.option-button:hover {
    background: #F5F5F5;
    transform: translateY(-2px);
}

.option-button.correct {
    background: #4CAF50;
    color: white;
    border-color: #4CAF50;
}

.option-button.incorrect {
    background: #FF5252;
    color: white;
    border-color: #FF5252;
}

.feedback-message {
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 1.5rem;
    text-align: center;
}

.feedback-message.success {
    background: #E8F5E9;
    color: #2E7D32;
}

.feedback-message.error {
    background: #FFEBEE;
    color: #C62828;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.action-button {
    padding: 1rem 2rem;
    border: none;
    border-radius: 50px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

#next-button {
    background: linear-gradient(45deg, #2196F3, #4CAF50);
    color: white;
}

#next-button:hover:not(:disabled) {
    transform: translateX(5px);
    box-shadow: 0 6px 20px rgba(33,150,243,0.3);
}

#next-button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

#restart-button {
    background: linear-gradient(45deg, #FF9800, #FF5722);
    color: white;
}

#restart-button:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(255,152,0,0.3);
}

.hidden {
    display: none;
}

@media (max-width: 768px) {
    .quiz-container {
        padding: 1rem;
    }

    #question-text {
        font-size: 1.5rem;
    }

    .option-button {
        font-size: 1rem;
    }

    .option-button img {
        width: 40px;
        height: 40px;
    }
}
</style>

<script>
const questions = [
    {
        question: "Quelle fourniture utilise-t-on pour écrire avec de l'encre ?",
        options: [
            { text: "Le Stylo", image: "/images/fournitures/stylofr.PNG" },
            { text: "Le Crayon", image: "/images/fournitures/crayonfr.PNG" },
            { text: "Le Feutre", image: "/images/fournitures/feutrefr.PNG" },
            { text: "Le Marqueur", image: "/images/fournitures/marqueur.PNG" }
        ],
        correctAnswer: "Le Stylo",
        successMessage: "Bravo ! Le stylo nous permet d'écrire avec de l'encre.",
        explanation: "Le stylo est l'outil idéal pour écrire proprement et de façon permanente."
    },
    {
        question: "Quelle fourniture utilise-t-on pour effacer les erreurs ?",
        options: [
            { text: "La Gomme", image: "/images/fournitures/gommeFr.PNG" },
            { text: "La Règle", image: "/images/fournitures/règlefr.PNG" },
            { text: "Les Ciseaux", image: "/images/fournitures/ciseauxfr.PNG" },
            { text: "La Colle", image: "/images/fournitures/colle.PNG" }
        ],
        correctAnswer: "La Gomme",
        successMessage: "Excellent ! La gomme nous permet d'effacer les erreurs au crayon.",
        explanation: "La gomme est très utile pour corriger nos erreurs et recommencer."
    },
    {
        question: "Dans quoi range-t-on ses affaires scolaires ?",
        options: [
            { text: "Le Cartable", image: "/images/fournitures/cartable fr.PNG" },
            { text: "Le Cahier", image: "/images/fournitures/cahierfr.PNG" },
            { text: "La Trousse", image: "/images/fournitures/trousseFr.PNG" },
            { text: "Le Livre", image: "/images/fournitures/livre fr.PNG" }
        ],
        correctAnswer: "Le Cartable",
        successMessage: "Super ! Le cartable nous permet de transporter toutes nos affaires.",
        explanation: "Le cartable est comme une petite maison pour nos fournitures scolaires."
    },
    {
        question: "Quelle fourniture utilise-t-on pour tracer des lignes droites ?",
        options: [
            { text: "La Règle", image: "/images/fournitures/règlefr.PNG" },
            { text: "Le Crayon", image: "/images/fournitures/crayonfr.PNG" },
            { text: "Les Ciseaux", image: "/images/fournitures/ciseauxfr.PNG" },
            { text: "Le Feutre", image: "/images/fournitures/feutrefr.PNG" }
        ],
        correctAnswer: "La Règle",
        successMessage: "Parfait ! La règle nous aide à tracer des lignes bien droites.",
        explanation: "La règle est indispensable en géométrie pour faire des tracés précis."
    },
    {
        question: "Où range-t-on ses stylos et ses crayons ?",
        options: [
            { text: "La Trousse", image: "/images/fournitures/trousseFr.PNG" },
            { text: "Le Cartable", image: "/images/fournitures/cartable fr.PNG" },
            { text: "Le Cahier", image: "/images/fournitures/cahierfr.PNG" },
            { text: "Le Livre", image: "/images/fournitures/livre fr.PNG" }
        ],
        correctAnswer: "La Trousse",
        successMessage: "Bravo ! La trousse est parfaite pour ranger nos stylos et nos crayons.",
        explanation: "La trousse nous permet de garder nos petites fournitures bien organisées."
    },
    {
        question: "Quelle fourniture utilise-t-on pour découper du papier ?",
        options: [
            { text: "Les Ciseaux", image: "/images/fournitures/ciseauxfr.PNG" },
            { text: "La Colle", image: "/images/fournitures/colle.PNG" },
            { text: "Le Taille-crayon", image: "/images/fournitures/tailleur crayon fr.PNG" },
            { text: "La Règle", image: "/images/fournitures/règlefr.PNG" }
        ],
        correctAnswer: "Les Ciseaux",
        successMessage: "Excellent ! Les ciseaux nous permettent de découper proprement.",
        explanation: "Les ciseaux sont essentiels pour les travaux manuels et le découpage."
    }
];

let currentQuestionIndex = 0;
let score = 0;
let hasAnswered = false;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function displayQuestion() {
    const question = questions[currentQuestionIndex];
    document.getElementById('question-text').textContent = question.question;
    
    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';
    
    const shuffledOptions = shuffleArray([...question.options]);
    shuffledOptions.forEach(option => {
        const button = document.createElement('button');
        button.className = 'option-button';
        
        const img = document.createElement('img');
        img.src = option.image;
        img.alt = option.text;
        
        const text = document.createElement('span');
        text.textContent = option.text;
        
        button.appendChild(img);
        button.appendChild(text);
        button.onclick = () => selectAnswer(option.text);
        optionsContainer.appendChild(button);
    });
    
    document.getElementById('feedback-container').classList.add('hidden');
    document.getElementById('correct-feedback').classList.add('hidden');
    document.getElementById('incorrect-feedback').classList.add('hidden');
    document.getElementById('next-button').disabled = true;
    hasAnswered = false;
}

function selectAnswer(selectedOption) {
    if (hasAnswered) return;
    
    hasAnswered = true;
    const question = questions[currentQuestionIndex];
    const isCorrect = selectedOption === question.correctAnswer;
    
    const options = document.querySelectorAll('.option-button');
    options.forEach(button => {
        const buttonText = button.querySelector('span').textContent;
        if (buttonText === question.correctAnswer) {
            button.classList.add('correct');
        } else if (buttonText === selectedOption && !isCorrect) {
            button.classList.add('incorrect');
        }
        button.disabled = true;
    });
    
    document.getElementById('feedback-container').classList.remove('hidden');
    if (isCorrect) {
        score++;
        document.getElementById('current-score').textContent = score;
        document.getElementById('correct-feedback').classList.remove('hidden');
        document.getElementById('success-message').textContent = question.successMessage;
    } else {
        document.getElementById('incorrect-feedback').classList.remove('hidden');
        document.getElementById('error-message').textContent = "Ne t'inquiète pas, on apprend en faisant des erreurs !";
        document.getElementById('correct-answer').textContent = `La bonne réponse était : ${question.correctAnswer}`;
    }
    
    document.getElementById('next-button').disabled = false;
    
    if (currentQuestionIndex === questions.length - 1) {
        document.getElementById('next-button').classList.add('hidden');
        document.getElementById('restart-button').classList.remove('hidden');
    }
}

function nextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        displayQuestion();
    }
}

function restartQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    document.getElementById('current-score').textContent = score;
    document.getElementById('next-button').classList.remove('hidden');
    document.getElementById('restart-button').classList.add('hidden');
    displayQuestion();
}

document.getElementById('next-button').onclick = nextQuestion;
document.getElementById('restart-button').onclick = restartQuiz;

// Démarrer le quiz
displayQuestion();
</script>
@endsection 