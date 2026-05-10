@extends('layouts.frontend')

@section('content')
<div class="quiz-container">
    <div class="floating-elements">
        <div class="floating-element">📚</div>
        <div class="floating-element">🎨</div>
        <div class="floating-element">🌈</div>
        <div class="floating-element">🎯</div>
        <div class="floating-element">⭐</div>
        <div class="floating-element">🦋</div>
        <div class="floating-element">🌺</div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div id="welcome-screen" class="text-center">
            <h1 class="quiz-title">Le Quiz Magique de l'Alphabet</h1>
            <p class="quiz-subtitle">Es-tu prêt à jouer avec les lettres ? 🎮</p>
            <button onclick="startQuiz()" class="start-button">
                <span class="button-text">Commencer l'aventure !</span>
                <span class="button-icon">🚀</span>
            </button>
        </div>

        <div id="quiz-content" class="hidden">
            <!-- Le quiz sera affiché ici -->
        </div>

        <div id="results-screen" class="hidden">
            <!-- Les résultats seront affichés ici -->
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('prescolaire') }}" class="back-button">
                <span class="button-icon">←</span>
                <span class="button-text">Retour au préscolaire</span>
            </a>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-center space-x-4 mt-6">
            <a href="{{ route('alphabet.index') }}" class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 transform hover:scale-105 transition-all duration-300">
                Retour à l'Alphabet
            </a>
            <button id="next-btn" class="px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transform hover:scale-105 transition-all duration-300 hidden">
                Question Suivante →
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
const allQuestions = [
    // Questions de reconnaissance de lettres
    {
        type: 'letter-recognition',
        question: 'Quelle est cette lettre ?',
        letter: 'A',
        options: ['A', 'B', 'C', 'D'],
        correct: 'A',
        feedback: 'Bravo ! C\'est la lettre A comme dans Avion ! ✈️'
    },
    {
        type: 'letter-recognition',
        question: 'Quelle est cette lettre ?',
        letter: 'B',
        options: ['P', 'B', 'D', 'R'],
        correct: 'B',
        feedback: 'Super ! C\'est la lettre B comme dans Ballon ! ⚽'
    },
    {
        type: 'letter-recognition',
        question: 'Quelle est cette lettre ?',
        letter: 'C',
        options: ['O', 'G', 'C', 'Q'],
        correct: 'C',
        feedback: 'Excellent ! C\'est la lettre C comme dans Chat ! 🐱'
    },
    // Questions de mots qui commencent par...
    {
        type: 'word-start',
        question: 'Quel animal commence par la lettre B ?',
        options: [
            { text: 'Baleine', image: '🐋' },
            { text: 'Chien', image: '🐕' },
            { text: 'Lion', image: '🦁' },
            { text: 'Chat', image: '🐱' }
        ],
        correct: 'Baleine',
        feedback: 'Super ! La Baleine commence par la lettre B ! 🐋'
    },
    {
        type: 'word-start',
        question: 'Quel fruit commence par la lettre P ?',
        options: [
            { text: 'Pomme', image: '🍎' },
            { text: 'Banane', image: '🍌' },
            { text: 'Orange', image: '🍊' },
            { text: 'Kiwi', image: '🥝' }
        ],
        correct: 'Pomme',
        feedback: 'Parfait ! Pomme commence par la lettre P ! 🍎'
    },
    // Questions de sons de lettres
    {
        type: 'letter-sound',
        question: 'Quel son fait la lettre M ?',
        options: [
            { text: 'Mmmmm', image: '🍯' },
            { text: 'Ssssss', image: '🐍' },
            { text: 'Rrrrr', image: '🦁' },
            { text: 'Fffff', image: '💨' }
        ],
        correct: 'Mmmmm',
        feedback: 'Excellent ! M fait le son Mmmmm comme dans Maman ! 👩'
    },
    {
        type: 'letter-sound',
        question: 'Quel son fait la lettre S ?',
        options: [
            { text: 'Boum', image: '💥' },
            { text: 'Ssssss', image: '🐍' },
            { text: 'Miaou', image: '🐱' },
            { text: 'Vroum', image: '🚗' }
        ],
        correct: 'Ssssss',
        feedback: 'Bravo ! S fait le son Ssssss comme dans Serpent ! 🐍'
    },
    // Questions de correspondance de lettres
    {
        type: 'letter-match',
        question: 'Trouve la même lettre que P',
        letter: 'P',
        options: ['P', 'B', 'R', 'D'],
        correct: 'P',
        feedback: 'Parfait ! Tu as trouvé la lettre P comme dans Papillon ! 🦋'
    },
    {
        type: 'letter-match',
        question: 'Trouve la même lettre que M',
        letter: 'M',
        options: ['N', 'W', 'M', 'H'],
        correct: 'M',
        feedback: 'Super ! Tu as trouvé la lettre M comme dans Maison ! 🏠'
    },
    // Questions de voyelles
    {
        type: 'vowel-recognition',
        question: 'Quelle lettre est une voyelle ?',
        options: ['E', 'T', 'R', 'D'],
        correct: 'E',
        feedback: 'Bravo ! E est une voyelle ! 🌟'
    },
    {
        type: 'vowel-recognition',
        question: 'Trouve la voyelle',
        options: ['B', 'O', 'N', 'T'],
        correct: 'O',
        feedback: 'Excellent ! O est une voyelle ! 🌟'
    },
    // Questions d'ordre alphabétique
    {
        type: 'alphabet-order',
        question: 'Quelle lettre vient après B ?',
        options: ['A', 'C', 'D', 'E'],
        correct: 'C',
        feedback: 'Super ! Après B vient C ! 📚'
    },
    {
        type: 'alphabet-order',
        question: 'Quelle lettre vient avant D ?',
        options: ['A', 'B', 'C', 'E'],
        correct: 'C',
        feedback: 'Parfait ! Avant D vient C ! 📚'
    }
];

let questions = [];
let currentQuestion = 0;
let score = 0;
let stars = 0;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function selectRandomQuestions() {
    // Mélanger toutes les questions
    const shuffledQuestions = shuffleArray([...allQuestions]);
    // Sélectionner les 4 premières questions
    return shuffledQuestions.slice(0, 4);
}

function startQuiz() {
    // Sélectionner 4 questions aléatoires au début du quiz
    questions = selectRandomQuestions();
    currentQuestion = 0;
    score = 0;
    stars = 0;
    document.getElementById('welcome-screen').classList.add('hidden');
    document.getElementById('quiz-content').classList.remove('hidden');
    showQuestion();
}

function showQuestion() {
    const question = questions[currentQuestion];
    const quizContent = document.getElementById('quiz-content');
    
    let html = `
        <div class="question-card" data-aos="zoom-in">
            <div class="progress-bar">
                <div class="progress" style="width: ${(currentQuestion / questions.length) * 100}%"></div>
            </div>
            <div class="question-number">Question ${currentQuestion + 1} sur ${questions.length}</div>
            <h2 class="question-text">${question.question}</h2>
    `;

    if (question.type === 'letter-recognition') {
        html += `
            <div class="letter-display">
                <div class="big-letter">${question.letter}</div>
            </div>
        `;
    }

    html += `<div class="options-grid">`;
    question.options.forEach((option, index) => {
        if (typeof option === 'object') {
            html += `
                <button class="option-button" onclick="checkAnswer('${option.text}')">
                    <span class="option-emoji">${option.image}</span>
                    <span class="option-text">${option.text}</span>
                </button>
            `;
        } else {
            html += `
                <button class="option-button" onclick="checkAnswer('${option}')">
                    <span class="option-text">${option}</span>
                </button>
            `;
        }
    });
    html += `</div></div>`;

    quizContent.innerHTML = html;
}

function checkAnswer(answer) {
    const question = questions[currentQuestion];
    const buttons = document.querySelectorAll('.option-button');
    buttons.forEach(button => {
        button.disabled = true;
        const buttonText = button.querySelector('.option-text').textContent;
        if (buttonText === question.correct) {
            button.classList.add('correct');
        } else if (buttonText === answer) {
            button.classList.add('incorrect');
        }
    });

    if (answer === question.correct) {
        score++;
        stars += 3;
        playSound('correct');
        showFeedback(question.feedback, true);
    } else {
        stars += 1;
        playSound('incorrect');
        showFeedback('Essaie encore ! Tu vas y arriver ! 💪', false);
    }

    setTimeout(() => {
        currentQuestion++;
        if (currentQuestion < questions.length) {
            showQuestion();
        } else {
            showResults();
        }
    }, 2000);
}

function showFeedback(message, isCorrect) {
    const feedback = document.createElement('div');
    feedback.className = `feedback ${isCorrect ? 'correct' : 'incorrect'}`;
    feedback.innerHTML = `
        <div class="feedback-content">
            <span class="feedback-icon">${isCorrect ? '🌟' : '✨'}</span>
            <p>${message}</p>
        </div>
    `;
    document.querySelector('.question-card').appendChild(feedback);
}

function showResults() {
    const quizContent = document.getElementById('quiz-content');
    quizContent.classList.add('hidden');
    const resultsScreen = document.getElementById('results-screen');
    resultsScreen.classList.remove('hidden');

    const percentage = (score / questions.length) * 100;
    const starDisplay = '⭐'.repeat(Math.floor(stars / questions.length));
    
    let message = '';
    let emoji = '';
    
    if (percentage === 100) {
        message = 'Tu es un super champion de l\'alphabet !';
        emoji = '🏆';
    } else if (percentage >= 70) {
        message = 'Bravo ! Tu connais bien ton alphabet !';
        emoji = '🌟';
    } else if (percentage >= 50) {
        message = 'Continue comme ça, tu progresses bien !';
        emoji = '👍';
    } else {
        message = 'N\'abandonne pas, tu vas y arriver !';
        emoji = '💪';
    }

    resultsScreen.innerHTML = `
        <div class="results-card">
            <div class="celebration">
                <div class="emoji-rain">🎉</div>
                <div class="big-emoji">${emoji}</div>
            </div>
            <h2 class="results-title">Quiz Terminé !</h2>
            <div class="stars-display">${starDisplay}</div>
            <p class="results-score">Tu as obtenu ${score} sur ${questions.length}</p>
            <p class="results-message">${message}</p>
            <button onclick="restartQuiz()" class="restart-button">
                <span class="button-text">Rejouer</span>
                <span class="button-icon">🔄</span>
            </button>
        </div>
    `;
}

function restartQuiz() {
    // Sélectionner de nouvelles questions aléatoires
    questions = selectRandomQuestions();
    currentQuestion = 0;
    score = 0;
    stars = 0;
    document.getElementById('results-screen').classList.add('hidden');
    document.getElementById('quiz-content').classList.remove('hidden');
    showQuestion();
}

function playSound(type) {
    const audio = new Audio(type === 'correct' ? 
        'https://assets.mixkit.co/active_storage/sfx/2018/success-1-6297.wav' : 
        'https://assets.mixkit.co/active_storage/sfx/2018/error-1-6297.wav');
    audio.play().catch(console.error);
}

document.addEventListener('DOMContentLoaded', () => {
    AOS.init(); // Pour les animations
});
</script>
@endpush

@push('styles')
<style>
.quiz-container {
    background: linear-gradient(135deg, #FFE5F4, #E3F2FD);
    min-height: 100vh;
    position: relative;
    overflow: hidden;
}

.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.floating-element {
    position: absolute;
    font-size: 2rem;
    animation: float 15s infinite linear;
    opacity: 0.3;
}

.quiz-title {
    font-family: 'Comic Sans MS', cursive;
    font-size: 3rem;
    color: #FF69B4;
    text-align: center;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 0 white;
    position: relative;
    z-index: 2;
}

.quiz-subtitle {
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.8rem;
    color: #4A90E2;
    text-align: center;
    margin-bottom: 2rem;
}

.start-button {
    background: linear-gradient(135deg, #FF69B4, #4A90E2);
    border: none;
    border-radius: 25px;
    padding: 1rem 2rem;
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.5rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    margin-top: 2rem;
}

.start-button:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.question-card {
    background: white;
    border-radius: 25px;
    padding: 2rem;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.progress-bar {
    width: 100%;
    height: 10px;
    background: #E3F2FD;
    border-radius: 5px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.progress {
    height: 100%;
    background: linear-gradient(90deg, #FF69B4, #4A90E2);
    transition: width 0.3s ease;
}

.question-number {
    font-family: 'Comic Sans MS', cursive;
    color: #90CAF9;
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.question-text {
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.8rem;
    color: #4A90E2;
    margin-bottom: 2rem;
    text-align: center;
}

.letter-display {
    text-align: center;
    margin: 2rem 0;
}

.big-letter {
    font-family: 'Comic Sans MS', cursive;
    font-size: 6rem;
    color: #FF69B4;
    text-shadow: 3px 3px 0 #FFB6C1;
    animation: bounce 2s infinite;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 2rem;
}

.option-button {
    background: #F8F9FA;
    border: 3px solid #E3F2FD;
    border-radius: 15px;
    padding: 1rem;
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.2rem;
    color: #4A90E2;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.option-button:hover {
    transform: translateY(-3px);
    border-color: #4A90E2;
    background: #E3F2FD;
}

.option-emoji {
    font-size: 2rem;
}

.option-button.correct {
    background: #A5D6A7;
    border-color: #2E7D32;
    color: #2E7D32;
}

.option-button.incorrect {
    background: #EF9A9A;
    border-color: #C62828;
    color: #C62828;
}

.feedback {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    text-align: center;
    animation: popIn 0.3s ease-out;
}

.feedback.correct {
    border: 3px solid #A5D6A7;
}

.feedback.incorrect {
    border: 3px solid #EF9A9A;
}

.feedback-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: block;
}

.results-card {
    background: white;
    border-radius: 25px;
    padding: 3rem;
    text-align: center;
    animation: scaleIn 0.5s ease-out;
    max-width: 600px;
    margin: 0 auto;
}

.celebration {
    position: relative;
    height: 100px;
    margin-bottom: 2rem;
}

.emoji-rain {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    font-size: 2rem;
    animation: rain 2s linear infinite;
}

.results-title {
    font-family: 'Comic Sans MS', cursive;
    font-size: 2.5rem;
    color: #4A90E2;
    margin-bottom: 1rem;
}

.stars-display {
    font-size: 2rem;
    margin: 1rem 0;
    animation: twinkle 1s infinite alternate;
}

.results-score {
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.8rem;
    color: #FF69B4;
    margin-bottom: 1rem;
}

.results-message {
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.5rem;
    color: #4A90E2;
    margin-bottom: 2rem;
}

.restart-button {
    background: linear-gradient(135deg, #4A90E2, #FF69B4);
    border: none;
    border-radius: 15px;
    padding: 1rem 2rem;
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.2rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.restart-button:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}

.hidden {
    display: none;
}

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(20px, 20px) rotate(180deg); }
    100% { transform: translate(0, 0) rotate(360deg); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

@keyframes popIn {
    0% { transform: translate(-50%, -50%) scale(0.8); opacity: 0; }
    100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
}

@keyframes scaleIn {
    0% { transform: scale(0.8); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}

@keyframes rain {
    0% { transform: translateY(-50px); }
    100% { transform: translateY(50px); }
}

@keyframes twinkle {
    0% { opacity: 0.5; }
    100% { opacity: 1; }
}

@media (max-width: 768px) {
    .quiz-title {
        font-size: 2rem;
    }
    
    .quiz-subtitle {
        font-size: 1.2rem;
    }
    
    .question-text {
        font-size: 1.5rem;
    }
    
    .big-letter {
        font-size: 4rem;
    }
    
    .options-grid {
        grid-template-columns: 1fr;
    }
    
    .option-button {
        font-size: 1rem;
    }
}
</style>
@endpush
@endsection 