@extends('layouts.app')

@section('content')
<div class="quiz-container">
    <div class="navigation-bar">
        <a href="{{ route('primaire.animaux') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Animaux</span>
        </a>
    </div>

    <div class="score-display">
        Score: <span id="score">0</span>/<span id="totalQuestions">6</span>
    </div>

    <div class="question-container">
        <div id="questionText" class="question-text"></div>
        <div id="options" class="options-grid"></div>
    </div>

    <div id="feedback" class="feedback hidden">
        <div id="feedbackContent"></div>
        <div id="explanation" class="explanation"></div>
    </div>

    <div class="button-container">
        <button id="nextButton" class="next-button hidden">Question Suivante →</button>
        <button id="restartButton" class="restart-button hidden">Recommencer le Quiz</button>
    </div>
</div>

<style>
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #E1F5FE, #B3E5FC);
    padding: 2rem;
    font-family: 'Comic Sans MS', cursive;
}

.navigation-bar {
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
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.back-button:hover {
    transform: translateX(-5px);
    background: linear-gradient(45deg, #FF8787, #FF6B6B);
    color: white;
    text-decoration: none;
}

.score-display {
    text-align: center;
    font-size: 1.5rem;
    color: #2C3E50;
    margin-bottom: 2rem;
    padding: 1rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.question-container {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 0 auto 2rem;
}

.question-text {
    font-size: 1.5rem;
    color: #2C3E50;
    margin-bottom: 2rem;
    text-align: center;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
}

.option-button {
    background: white;
    border: 2px solid #B3E5FC;
    border-radius: 15px;
    padding: 1rem;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.option-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.option-button.correct {
    background: #81C784;
    color: white;
    border-color: #81C784;
}

.option-button.incorrect {
    background: #FF8A80;
    color: white;
    border-color: #FF8A80;
}

.feedback {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 2rem auto;
}

.feedback.correct {
    background: linear-gradient(45deg, #81C784, #A5D6A7);
    color: white;
}

.feedback.incorrect {
    background: linear-gradient(45deg, #FF8A80, #FFAB91);
    color: white;
}

.explanation {
    font-size: 1.1rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.3);
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}

.next-button, .restart-button {
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.next-button:hover, .restart-button:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #81C784, #4CAF50);
}

.hidden {
    display: none;
}

@media (max-width: 768px) {
    .quiz-container {
        padding: 1rem;
    }

    .question-text {
        font-size: 1.3rem;
    }

    .options-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
const allQuestions = [
    {
        question: "Quel animal est connu comme le meilleur ami de l'homme ?",
        options: ["Le Chien", "Le Chat", "Le Hamster", "Le Lapin"],
        correctAnswer: "Le Chien",
        successMessage: "Bravo ! Le chien est en effet le meilleur ami de l'homme !",
        explanation: "Les chiens sont fidèles, affectueux et très attachés à leurs maîtres."
    },
    {
        question: "Quel animal donne du lait ?",
        options: ["La Vache", "Le Mouton", "Le Cheval", "Le Cochon"],
        correctAnswer: "La Vache",
        successMessage: "Excellent ! La vache nous donne du bon lait !",
        explanation: "La vache produit du lait qui est utilisé pour faire aussi du fromage et du yaourt."
    },
    {
        question: "Quel est le plus grand mammifère terrestre ?",
        options: ["L'Éléphant", "La Girafe", "L'Hippopotame", "Le Rhinocéros"],
        correctAnswer: "L'Éléphant",
        successMessage: "Super ! L'éléphant est bien le plus grand !",
        explanation: "L'éléphant peut peser jusqu'à 6 tonnes et mesurer plus de 3 mètres de haut."
    },
    {
        question: "Quel animal est le roi de la jungle ?",
        options: ["Le Lion", "Le Tigre", "Le Léopard", "Le Guépard"],
        correctAnswer: "Le Lion",
        successMessage: "Parfait ! Le lion est bien le roi des animaux !",
        explanation: "Le lion est un grand félin connu pour sa crinière majestueuse et son rugissement puissant."
    },
    {
        question: "Quel animal vit dans l'eau et est très intelligent ?",
        options: ["Le Dauphin", "Le Requin", "La Baleine", "Le Poisson-clown"],
        correctAnswer: "Le Dauphin",
        successMessage: "Bravo ! Le dauphin est très intelligent !",
        explanation: "Les dauphins sont connus pour leur intelligence et leur capacité à communiquer entre eux."
    },
    {
        question: "Quel animal grimpe aux arbres et aime les bananes ?",
        options: ["Le Singe", "L'Écureuil", "Le Koala", "Le Panda"],
        correctAnswer: "Le Singe",
        successMessage: "Excellent ! Le singe adore grimper et manger des bananes !",
        explanation: "Les singes sont très agiles et utilisent leur queue pour s'accrocher aux branches."
    },
    {
        question: "Quel animal fait 'Miaou' ?",
        options: ["Le Chat", "Le Chien", "Le Lapin", "Le Hamster"],
        correctAnswer: "Le Chat",
        successMessage: "Excellent ! Le chat fait bien 'Miaou' !",
        explanation: "Le chat utilise le miaulement pour communiquer avec les humains."
    },
    {
        question: "Quel animal pond des œufs et fait 'Coin-coin' ?",
        options: ["Le Canard", "La Poule", "L'Oie", "Le Cygne"],
        correctAnswer: "Le Canard",
        successMessage: "Bravo ! Le canard fait 'Coin-coin' !",
        explanation: "Le canard est un oiseau aquatique qui aime nager dans les mares et les lacs."
    },
    {
        question: "Quel animal a un très long cou ?",
        options: ["La Girafe", "L'Éléphant", "Le Zèbre", "L'Hippopotame"],
        correctAnswer: "La Girafe",
        successMessage: "Super ! La girafe a le plus long cou !",
        explanation: "La girafe peut atteindre les feuilles les plus hautes des arbres grâce à son long cou."
    },
    {
        question: "Quel animal vole et fait du miel ?",
        options: ["L'Abeille", "La Fourmi", "Le Papillon", "La Coccinelle"],
        correctAnswer: "L'Abeille",
        successMessage: "Parfait ! L'abeille nous donne du bon miel !",
        explanation: "Les abeilles sont très importantes pour la nature car elles pollinisent les fleurs."
    },
    {
        question: "Quel animal dort la tête en bas ?",
        options: ["La Chauve-souris", "L'Oiseau", "Le Singe", "Le Koala"],
        correctAnswer: "La Chauve-souris",
        successMessage: "Bravo ! La chauve-souris dort bien la tête en bas !",
        explanation: "Les chauves-souris s'accrochent aux branches ou aux plafonds des grottes pour dormir."
    },
    {
        question: "Quel animal change de couleur ?",
        options: ["Le Caméléon", "Le Lézard", "Le Serpent", "L'Iguane"],
        correctAnswer: "Le Caméléon",
        successMessage: "Excellent ! Le caméléon peut changer de couleur !",
        explanation: "Le caméléon change de couleur pour se camoufler ou communiquer avec les autres."
    }
];

let currentQuestion = 0;
let score = 0;
let questionsAnswered = false;
let questions = [];

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function selectRandomQuestions() {
    const shuffledQuestions = shuffleArray([...allQuestions]);
    return shuffledQuestions.slice(0, 6);
}

function displayQuestion() {
    const question = questions[currentQuestion];
    document.getElementById('questionText').textContent = question.question;
    
    const optionsContainer = document.getElementById('options');
    optionsContainer.innerHTML = '';
    
    const shuffledOptions = shuffleArray([...question.options]);
    shuffledOptions.forEach(option => {
        const button = document.createElement('button');
        button.className = 'option-button';
        button.textContent = option;
        button.onclick = () => selectAnswer(option);
        optionsContainer.appendChild(button);
    });

    document.getElementById('feedback').className = 'feedback hidden';
    document.getElementById('nextButton').className = 'next-button hidden';
}

function selectAnswer(selectedOption) {
    if (questionsAnswered) return;

    const question = questions[currentQuestion];
    const feedback = document.getElementById('feedback');
    const feedbackContent = document.getElementById('feedbackContent');
    const explanation = document.getElementById('explanation');
    const options = document.querySelectorAll('.option-button');

    options.forEach(button => {
        button.disabled = true;
        if (button.textContent === question.correctAnswer) {
            button.classList.add('correct');
        } else if (button.textContent === selectedOption) {
            button.classList.add('incorrect');
        }
    });

    if (selectedOption === question.correctAnswer) {
        score++;
        document.getElementById('score').textContent = score;
        feedback.className = 'feedback correct';
        feedbackContent.textContent = question.successMessage;
    } else {
        feedback.className = 'feedback incorrect';
        feedbackContent.textContent = "Ce n'est pas la bonne réponse. Essaie encore !";
    }

    explanation.textContent = question.explanation;
    feedback.classList.remove('hidden');

    if (currentQuestion < questions.length - 1) {
        document.getElementById('nextButton').classList.remove('hidden');
    } else {
        document.getElementById('restartButton').classList.remove('hidden');
    }

    questionsAnswered = true;
}

function nextQuestion() {
    currentQuestion++;
    questionsAnswered = false;
    if (currentQuestion < questions.length) {
        displayQuestion();
    }
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    questionsAnswered = false;
    document.getElementById('score').textContent = '0';
    document.getElementById('restartButton').className = 'restart-button hidden';
    questions = selectRandomQuestions(); // Sélectionne de nouvelles questions aléatoires
    displayQuestion();
}

document.getElementById('nextButton').onclick = nextQuestion;
document.getElementById('restartButton').onclick = restartQuiz;

// Commencer le quiz avec les premières questions aléatoires
questions = selectRandomQuestions();
displayQuestion();
</script>
@endsection 