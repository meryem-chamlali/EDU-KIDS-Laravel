@extends('layouts.app')

@section('content')
<div class="quiz-world">
    <div class="quiz-background">
        <div class="shape shape-1">🔷</div>
        <div class="shape shape-2">🔶</div>
        <div class="shape shape-3">🔵</div>
        <div class="shape shape-4">🔺</div>
        <div class="shape shape-5">🔸</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('categories.shapes') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour aux Formes</span>
        </a>
    </div>

    <div class="quiz-container">
        <div class="quiz-header">
            <h1>Quiz des Formes Géométriques</h1>
            <p class="quiz-description">Teste tes connaissances sur les formes !</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                <span class="score">Score: <span id="score">0</span>/<span id="total">0</span></span>
                <span class="question-count">Question <span id="current-question">1</span>/<span id="total-questions">0</span></span>
            </div>
            <div class="progress-bar">
                <div id="progress-bar" class="progress-fill"></div>
            </div>
        </div>

        <div id="question-container" class="question-container">
            <h2 class="question-title">Quelle est cette forme ?</h2>
            <div class="shape-image-container">
                <img id="shape-image" src="" alt="Forme à deviner" class="shape-image">
            </div>
            <div class="answers-grid">
                <button class="answer-btn" onclick="checkAnswer('cercle')">Cercle</button>
                <button class="answer-btn" onclick="checkAnswer('carre')">Carré</button>
                <button class="answer-btn" onclick="checkAnswer('triangle')">Triangle</button>
                <button class="answer-btn" onclick="checkAnswer('rectangle')">Rectangle</button>
                <button class="answer-btn" onclick="checkAnswer('losange')">Losange</button>
                <button class="answer-btn" onclick="checkAnswer('trapeze')">Trapèze</button>
                <button class="answer-btn" onclick="checkAnswer('parallelogramme')">Parallélogramme</button>
                <button class="answer-btn" onclick="checkAnswer('pentagone')">Pentagone</button>
                <button class="answer-btn" onclick="checkAnswer('hexagone')">Hexagone</button>
                <button class="answer-btn" onclick="checkAnswer('octogone')">Octogone</button>
                <button class="answer-btn" onclick="checkAnswer('ellipse')">Ellipse</button>
            </div>
        </div>

        <div id="feedback" class="feedback-container hidden">
            <div id="correct-feedback" class="feedback correct hidden">
                <div class="feedback-icon">🎉</div>
                <h3>Bravo !</h3>
                <p>Tu as trouvé la bonne réponse !</p>
            </div>
            <div id="incorrect-feedback" class="feedback incorrect hidden">
                <div class="feedback-icon">😕</div>
                <h3>Essaie encore !</h3>
                <p>Ce n'est pas la bonne réponse.</p>
            </div>
        </div>

        <button id="next-btn" class="next-button hidden">
            Question Suivante <span class="arrow">→</span>
        </button>
    </div>
</div>

<style>
.quiz-world {
    min-height: 100vh;
    background: linear-gradient(180deg, #E0F7FA, #B2EBF2);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.quiz-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.shape {
    position: absolute;
    font-size: 3rem;
    opacity: 0.2;
    animation: float-shape 20s linear infinite;
}

.shape-1 { top: 10%; left: 5%; animation-delay: 0s; }
.shape-2 { top: 30%; right: 10%; animation-delay: 4s; }
.shape-3 { top: 50%; left: 15%; animation-delay: 8s; }
.shape-4 { top: 70%; right: 20%; animation-delay: 12s; }
.shape-5 { top: 90%; left: 25%; animation-delay: 16s; }

@keyframes float-shape {
    0% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
    100% { transform: translateY(0) rotate(360deg); }
}

.navigation-bar {
    position: relative;
    z-index: 10;
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

.back-arrow {
    font-size: 1.5rem;
}

.quiz-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.quiz-header {
    text-align: center;
    margin-bottom: 2rem;
}

.quiz-header h1 {
    font-size: 3rem;
    color: #2C3E50;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.quiz-description {
    font-size: 1.2rem;
    color: #666;
}

.progress-container {
    margin-bottom: 2rem;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 1.2rem;
    color: #2C3E50;
}

.progress-bar {
    width: 100%;
    height: 10px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 5px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(45deg, #4CAF50, #81C784);
    transition: width 0.3s ease;
}

.question-container {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.question-title {
    text-align: center;
    font-size: 2rem;
    color: #2C3E50;
    margin-bottom: 2rem;
}

.shape-image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.shape-image {
    max-height: 200px;
    object-fit: contain;
}

.answers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
}

.answer-btn {
    background: linear-gradient(45deg, #FF6B6B, #FF8787);
    color: white;
    border: none;
    padding: 15px 25px;
    border-radius: 15px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.answer-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.answer-btn.correct {
    background: linear-gradient(45deg, #4CAF50, #81C784);
}

.answer-btn.incorrect {
    background: linear-gradient(45deg, #FF5252, #FF7676);
}

.answer-btn.disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.feedback-container {
    margin-bottom: 2rem;
}

.feedback {
    text-align: center;
    padding: 2rem;
    border-radius: 20px;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.feedback-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.feedback h3 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.feedback p {
    font-size: 1.2rem;
    color: #666;
}

.feedback.correct h3 {
    color: #4CAF50;
}

.feedback.incorrect h3 {
    color: #FF5252;
}

.next-button {
    display: block;
    width: 100%;
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    border: none;
    padding: 15px 25px;
    border-radius: 15px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.next-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.next-button .arrow {
    margin-left: 10px;
}

.hidden {
    display: none;
}

@media (max-width: 768px) {
    .quiz-header h1 {
        font-size: 2rem;
    }

    .answers-grid {
        grid-template-columns: 1fr;
    }

    .shape-image {
        max-height: 150px;
    }
}
</style>

<script>
let currentQuestion = 0;
let score = 0;
const shapes = @json($shapes);
const totalQuestions = shapes.length;
let usedShapes = [];
let currentShape = null;

document.getElementById('total').textContent = totalQuestions;
document.getElementById('total-questions').textContent = totalQuestions;

function getRandomShape() {
    let availableShapes = shapes.filter(shape => !usedShapes.includes(shape.name));
    if (availableShapes.length === 0) {
        usedShapes = [];
        availableShapes = shapes;
    }
    const randomIndex = Math.floor(Math.random() * availableShapes.length);
    const selectedShape = availableShapes[randomIndex];
    usedShapes.push(selectedShape.name);
    currentShape = selectedShape;
    return selectedShape;
}

function showQuestion() {
    const shape = getRandomShape();
    document.getElementById('shape-image').src = `/images/shapes/${shape.image}`;
    document.getElementById('current-question').textContent = currentQuestion + 1;
    document.getElementById('progress-bar').style.width = `${((currentQuestion) / totalQuestions) * 100}%`;
    
    document.querySelectorAll('.answer-btn').forEach(btn => {
        btn.classList.remove('correct', 'incorrect', 'disabled');
        btn.disabled = false;
    });
    
    document.getElementById('feedback').classList.add('hidden');
    document.getElementById('next-btn').classList.add('hidden');
}

function checkAnswer(selectedAnswer) {
    const buttons = document.querySelectorAll('.answer-btn');
    const feedback = document.getElementById('feedback');
    
    buttons.forEach(btn => {
        btn.disabled = true;
        btn.classList.add('disabled');
    });
    
    if (selectedAnswer === currentShape.name) {
        score++;
        document.getElementById('score').textContent = score;
        document.getElementById('correct-feedback').classList.remove('hidden');
        document.getElementById('incorrect-feedback').classList.add('hidden');
        playCorrectSound();
    } else {
        document.getElementById('correct-feedback').classList.add('hidden');
        document.getElementById('incorrect-feedback').classList.remove('hidden');
        playIncorrectSound();
    }
    
    feedback.classList.remove('hidden');
    document.getElementById('next-btn').classList.remove('hidden');
}

function playCorrectSound() {
    const audio = new Audio('/audio/correct.mp3');
    audio.play().catch(error => console.error('Erreur audio:', error));
}

function playIncorrectSound() {
    const audio = new Audio('/audio/incorrect.mp3');
    audio.play().catch(error => console.error('Erreur audio:', error));
}

document.getElementById('next-btn').addEventListener('click', () => {
    currentQuestion++;
    if (currentQuestion < totalQuestions) {
        showQuestion();
    } else {
        alert(`Quiz terminé ! Ton score est de ${score}/${totalQuestions}`);
        currentQuestion = 0;
        score = 0;
        usedShapes = [];
        document.getElementById('score').textContent = '0';
        showQuestion();
    }
});

showQuestion();
</script>
@endsection 