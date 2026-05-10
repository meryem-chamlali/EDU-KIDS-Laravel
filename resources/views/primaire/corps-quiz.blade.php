@extends('layouts.app')

@section('content')
<div class="quiz-world">
    <div class="navigation-bar">
        <a href="{{ route('primaire.corps') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Corps Humain</span>
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
</style>

<script>
const questions = [
    {
        question: "Quelle partie du corps nous permet de voir ?",
        options: ["Les Yeux", "Les Oreilles", "Le Nez", "La Bouche"],
        correctAnswer: "Les Yeux",
        successMessage: "Les yeux sont nos organes de la vue, ils nous permettent de percevoir le monde qui nous entoure !",
        explanation: "Les yeux sont des organes sensoriels essentiels qui nous permettent de voir les couleurs, les formes et les mouvements."
    },
    {
        question: "Avec quelle partie du corps pouvons-nous entendre ?",
        options: ["Les Oreilles", "Les Yeux", "Les Mains", "Le Nez"],
        correctAnswer: "Les Oreilles",
        successMessage: "Excellent ! Les oreilles nous permettent d'entendre les sons et de maintenir notre équilibre.",
        explanation: "Les oreilles sont nos organes de l'audition, elles captent les sons et les transforment en signaux que notre cerveau peut comprendre."
    },
    {
        question: "Quelle partie du corps utilisons-nous pour marcher ?",
        options: ["Les Pieds", "Les Mains", "Les Bras", "Le Dos"],
        correctAnswer: "Les Pieds",
        successMessage: "Parfait ! Les pieds nous permettent de nous déplacer et de garder l'équilibre.",
        explanation: "Les pieds sont essentiels pour la marche, la course et l'équilibre. Ils supportent tout le poids de notre corps."
    },
    {
        question: "Quelle partie du corps nous permet d'attraper des objets ?",
        options: ["Les Mains", "Les Pieds", "Les Yeux", "Les Oreilles"],
        correctAnswer: "Les Mains",
        successMessage: "Super ! Les mains sont parfaites pour attraper et manipuler des objets.",
        explanation: "Les mains sont des outils incroyables qui nous permettent de tenir, toucher et manipuler des objets avec précision."
    },
    {
        question: "Quelle partie du corps protège notre cerveau ?",
        options: ["Le Torse", "Les Bras", "Le Dos", "Les Sourcils"],
        correctAnswer: "Le Torse",
        successMessage: "Bravo ! Le torse protège nos organes vitaux, y compris le cœur et les poumons.",
        explanation: "Le torse est comme une armure naturelle qui protège nos organes internes les plus importants."
    },
    {
        question: "Que font les sourcils sur notre visage ?",
        options: ["Ils expriment nos émotions", "Ils nous font entendre", "Ils nous font voir", "Ils nous font sentir"],
        correctAnswer: "Ils expriment nos émotions",
        successMessage: "Excellent ! Les sourcils nous aident à exprimer nos émotions comme la surprise ou la colère.",
        explanation: "Les sourcils jouent un rôle important dans l'expression de nos émotions et protègent aussi nos yeux de la sueur."
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
        button.textContent = option;
        button.onclick = () => selectAnswer(option);
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
        if (button.textContent === question.correctAnswer) {
            button.classList.add('correct');
        } else if (button.textContent === selectedOption && !isCorrect) {
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