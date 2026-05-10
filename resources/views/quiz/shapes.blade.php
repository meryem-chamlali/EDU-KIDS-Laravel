@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-bold text-center mb-8 text-indigo-600">Quiz des Formes</h1>
        
        <!-- Score -->
        <div class="text-center mb-8">
            <p class="text-2xl font-semibold">Score: <span id="score">0</span></p>
        </div>

        <!-- Question -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div id="question-container" class="text-center">
                <h2 class="text-2xl font-bold mb-6">Quelle est cette forme ?</h2>
                <div id="shape-display" class="w-48 h-48 mx-auto mb-8"></div>
                <div class="grid grid-cols-2 gap-4">
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('cercle')">Cercle</button>
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('carre')">Carré</button>
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('triangle')">Triangle</button>
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('rectangle')">Rectangle</button>
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('ovale')">Ovale</button>
                    <button class="answer-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-bold py-3 px-6 rounded-lg transition-all duration-300" onclick="checkAnswer('losange')">Losange</button>
                </div>
            </div>
        </div>

        <!-- Résultats -->
        <div id="results" class="hidden bg-white rounded-lg shadow-lg p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Quiz terminé !</h2>
            <p class="text-xl mb-6">Votre score final : <span id="final-score">0</span></p>
            <button onclick="restartQuiz()" class="bg-indigo-600 text-white font-bold py-3 px-8 rounded-full hover:bg-indigo-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                Recommencer
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
let score = 0;
let currentShape = '';
const shapes = [
    { name: 'cercle', display: () => '<div class="w-32 h-32 bg-blue-500 rounded-full mx-auto"></div>' },
    { name: 'carre', display: () => '<div class="w-32 h-32 bg-red-500 mx-auto"></div>' },
    { name: 'triangle', display: () => '<div class="w-0 h-0 border-l-[64px] border-r-[64px] border-b-[128px] border-l-transparent border-r-transparent border-b-green-500 mx-auto"></div>' },
    { name: 'rectangle', display: () => '<div class="w-40 h-32 bg-yellow-500 mx-auto"></div>' },
    { name: 'ovale', display: () => '<div class="w-40 h-32 bg-purple-500 rounded-full mx-auto"></div>' },
    { name: 'losange', display: () => '<div class="w-32 h-32 bg-pink-500 transform rotate-45 mx-auto"></div>' }
];

function getRandomShape() {
    return shapes[Math.floor(Math.random() * shapes.length)];
}

function displayShape() {
    currentShape = getRandomShape();
    document.getElementById('shape-display').innerHTML = currentShape.display();
}

function checkAnswer(answer) {
    const correct = answer === currentShape.name;
    const audio = new Audio(`/audio/${correct ? 'correct' : 'incorrect'}.mp3`);
    audio.play();

    if (correct) {
        score += 10;
        document.getElementById('score').textContent = score;
    }

    // Animation des boutons
    const buttons = document.querySelectorAll('.answer-btn');
    buttons.forEach(btn => {
        btn.classList.add('opacity-50');
        btn.disabled = true;
    });

    setTimeout(() => {
        buttons.forEach(btn => {
            btn.classList.remove('opacity-50');
            btn.disabled = false;
        });
        if (score < 60) {
            displayShape();
        } else {
            showResults();
        }
    }, 1000);
}

function showResults() {
    document.getElementById('question-container').classList.add('hidden');
    document.getElementById('results').classList.remove('hidden');
    document.getElementById('final-score').textContent = score;
}

function restartQuiz() {
    score = 0;
    document.getElementById('score').textContent = '0';
    document.getElementById('results').classList.add('hidden');
    document.getElementById('question-container').classList.remove('hidden');
    displayShape();
}

// Initialiser le quiz
displayShape();
</script>
@endpush
@endsection 