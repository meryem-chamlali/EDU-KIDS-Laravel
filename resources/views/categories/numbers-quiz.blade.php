@extends('layouts.frontend')

@section('content')
<div class="quiz-container relative min-h-screen bg-gradient-to-br from-blue-100 to-purple-100 py-8 px-4">
    <!-- Floating Elements -->
    <div class="floating-elements absolute inset-0 overflow-hidden pointer-events-none">
        @foreach(range(1, 10) as $i)
            <div class="floating-element absolute text-4xl" style="animation: float {{ rand(5, 10) }}s ease-in-out infinite; left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%;">
                {{ ['🔢', '✨', '📚', '🎯', '🎨', '🌟', '🎪', '🎡', '🎪', '🎭'][($i - 1) % 10] }}
            </div>
        @endforeach
    </div>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 text-purple-600 animate-bounce">
            Quiz des Nombres Magiques
        </h1>
        <p class="text-xl text-center mb-8 text-purple-500">
            Devine le nombre correct ! 🎯
        </p>

        <div id="quiz-content" class="space-y-8">
            <!-- Score Display -->
            <div class="text-center mb-6">
                <p class="text-2xl font-bold text-purple-600">
                    Score: <span id="score">0</span> / <span id="total">5</span>
                </p>
            </div>

            <!-- Feedback Messages -->
            <div id="feedback-message" class="hidden text-center mb-6">
                <div id="success-message" class="hidden">
                    <p class="text-3xl font-bold text-green-500 mb-4">🎉 Bravo! C'est la bonne réponse! 🌟</p>
                    <div class="celebration-animation">✨</div>
                </div>
                <div id="error-message" class="hidden">
                    <p class="text-2xl font-bold text-orange-500 mb-4">Continue d'essayer! Tu peux y arriver! 💪</p>
                    <button onclick="retryQuestion()" class="retry-button">
                        Réessayer cette question 🔄
                    </button>
                </div>
            </div>

            <!-- Question Container -->
            <div id="question-container" class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="text-center space-y-4">
                    <h2 class="text-2xl font-bold text-purple-600 mb-4">Quel est ce nombre ?</h2>
                    <div id="number-display" class="text-8xl font-bold text-center mb-4"></div>
                    <div id="options" class="grid grid-cols-2 gap-4 mt-4">
                        <!-- Options will be inserted here by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Final Score Message -->
            <div id="final-score" class="hidden text-center">
                <h2 class="text-3xl font-bold text-purple-600 mb-4">Quiz Terminé! 🎊</h2>
                <p class="text-2xl mb-4">Tu as obtenu <span id="final-score-value">0</span> sur 5!</p>
                <button onclick="restartQuiz()" class="restart-button">
                    Recommencer le Quiz 🔄
                </button>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-center space-x-4 mt-6">
                <a href="{{ route('numbers.index') }}" class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 transform hover:scale-105 transition-all duration-300">
                    Retour aux Chiffres
                </a>
                <button id="next-btn" class="px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transform hover:scale-105 transition-all duration-300 hidden">
                    Question Suivante →
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

.floating-element {
    opacity: 0.5;
    pointer-events: none;
}

.option-button {
    @apply px-6 py-3 rounded-lg text-xl font-bold transform transition-all duration-300;
}

.option-button:hover {
    @apply scale-105;
}

.correct {
    @apply bg-green-500 text-white;
}

.incorrect {
    @apply bg-red-500 text-white;
}

.disabled {
    @apply opacity-50 cursor-not-allowed;
}

.celebration-animation {
    font-size: 4rem;
    animation: celebrate 1s ease-in-out infinite;
}

@keyframes celebrate {
    0%, 100% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.2) rotate(10deg); }
}

.retry-button, .restart-button {
    background: linear-gradient(135deg, #FF6B6B, #FFB6C1);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-family: 'Comic Sans MS', cursive;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.retry-button:hover, .restart-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const allNumbers = @json($numbers);
    let numbers = [];
    let currentQuestionIndex = 0;
    let score = 0;
    const questionContainer = document.getElementById('question-container');
    const optionsContainer = document.getElementById('options');
    const scoreDisplay = document.getElementById('score');
    const nextButton = document.getElementById('next-btn');
    const numberDisplay = document.getElementById('number-display');
    const feedbackMessage = document.getElementById('feedback-message');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const finalScore = document.getElementById('final-score');
    const finalScoreValue = document.getElementById('final-score-value');

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function selectRandomQuestions() {
        // Créer une copie et mélanger tous les nombres
        const shuffledNumbers = shuffleArray([...allNumbers]);
        // Sélectionner les 5 premiers nombres
        numbers = shuffledNumbers.slice(0, 5);
    }

    function showQuestion(index) {
        feedbackMessage.classList.add('hidden');
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');
        nextButton.classList.add('hidden');
        
        const currentNumber = numbers[index];
        numberDisplay.textContent = currentNumber.word;

        // Créer les options en mélangeant avec d'autres nombres
        let options = [...allNumbers]; // Utiliser tous les nombres disponibles
        options = shuffleArray(options).slice(0, 4); // Prendre 4 options aléatoires
        if (!options.includes(currentNumber)) {
            options[0] = currentNumber; // S'assurer que la bonne réponse est incluse
            options = shuffleArray(options); // Mélanger à nouveau
        }

        optionsContainer.innerHTML = '';
        options.forEach(option => {
            const button = document.createElement('button');
            button.className = 'option-button bg-purple-100 hover:bg-purple-200 text-purple-700';
            button.textContent = option.number;
            button.onclick = () => checkAnswer(option.number, currentNumber.number);
            optionsContainer.appendChild(button);
        });
    }

    function checkAnswer(selected, correct) {
        const buttons = optionsContainer.querySelectorAll('button');
        buttons.forEach(button => {
            button.disabled = true;
            button.classList.add('disabled');
            if (parseInt(button.textContent) === correct) {
                button.classList.add('correct');
            } else if (parseInt(button.textContent) === selected && selected !== correct) {
                button.classList.add('incorrect');
            }
        });

        feedbackMessage.classList.remove('hidden');
        
        if (selected === correct) {
            score++;
            scoreDisplay.textContent = score;
            successMessage.classList.remove('hidden');
            errorMessage.classList.add('hidden');
            playCorrectSound();
        } else {
            successMessage.classList.add('hidden');
            errorMessage.classList.remove('hidden');
            playIncorrectSound();
        }

        if (currentQuestionIndex < numbers.length - 1) {
            nextButton.classList.remove('hidden');
        } else {
            finalScore.classList.remove('hidden');
            finalScoreValue.textContent = score;
        }
    }

    function retryQuestion() {
        showQuestion(currentQuestionIndex);
    }

    function restartQuiz() {
        currentQuestionIndex = 0;
        score = 0;
        scoreDisplay.textContent = score;
        finalScore.classList.add('hidden');
        selectRandomQuestions(); // Sélectionner de nouvelles questions
        showQuestion(0);
    }

    window.retryQuestion = retryQuestion;
    window.restartQuiz = restartQuiz;

    function playCorrectSound() {
        const audio = new Audio('/audio/correct.mp3');
        audio.play().catch(error => {
            console.error('Erreur lors de la lecture audio:', error);
        });
    }

    function playIncorrectSound() {
        const audio = new Audio('/audio/incorrect.mp3');
        audio.play().catch(error => {
            console.error('Erreur lors de la lecture audio:', error);
        });
    }

    nextButton.onclick = () => {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
    };

    // Démarrer le quiz avec les premières questions aléatoires
    selectRandomQuestions();
    showQuestion(0);
});
</script>
@endpush 