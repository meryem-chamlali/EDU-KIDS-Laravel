@extends('layouts.app')

@section('content')
<div class="game-background">
    <div class="floating-items">
        <div class="rainbow" style="top: 5%; left: 5%;">🌈</div>
        <div class="rainbow" style="bottom: 10%; right: 5%;">🌈</div>
        <div class="sun" style="top: 15%; right: 15%;">☀️</div>
        <div class="butterfly" style="top: 30%; left: 20%;">🦋</div>
        <div class="butterfly" style="bottom: 25%; right: 25%;">🦋</div>
        <div class="flower" style="bottom: 15%; left: 10%;">🌸</div>
        <div class="flower" style="top: 20%; right: 30%;">🌺</div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-start mb-4">
                    <a href="{{ route('games.index') }}" class="btn btn-primary back-button">
                        <i class="fas fa-arrow-left"></i> Retour aux jeux
                    </a>
                </div>
                <div class="game-container p-4">
                    <h1 class="text-center mb-4" style="color: #FF6B6B; font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
                        🎮 Jeu de Mémoire 🧩
                    </h1>
                    <div class="game-stats text-center mb-4">
                        <div class="stat-box d-inline-block mx-3">
                            Paires: <span id="pairs">0</span> / <span id="totalPairs">0</span>
                        </div>
                        <div class="stat-box d-inline-block mx-3">
                            Essais: <span id="attempts">0</span>
                        </div>
                    </div>
                    <div class="memory-grid" id="gameBoard">
                        <!-- Les cartes seront générées dynamiquement -->
                    </div>
                    <div class="controls text-center mt-4">
                        <button class="btn btn-warning btn-lg" id="restartBtn">
                            🔄 Recommencer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="celebration" id="celebration">🎉</div>
</div>

<style>
    .game-background {
        min-height: 100vh;
        background: linear-gradient(135deg, #fff1eb 0%, #ffd7d7 50%, #ffe8e8 100%);
        padding: 20px 0;
        position: relative;
        overflow: hidden;
    }

    .floating-items div {
        position: absolute;
        font-size: 2rem;
        animation: float 6s ease-in-out infinite;
        opacity: 0.8;
    }

    .rainbow {
        font-size: 3rem !important;
        animation-delay: 0s !important;
    }

    .sun {
        font-size: 4rem !important;
        animation-delay: 1s !important;
        color: #FFD700;
    }

    .butterfly {
        animation-delay: 2s !important;
    }

    .flower {
        animation-delay: 3s !important;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .back-button {
        background-color: #FF6B6B;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .back-button:hover {
        background-color: #FF5252;
        transform: translateX(-5px);
        box-shadow: 0 6px 8px rgba(0,0,0,0.15);
    }

    .game-container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        backdrop-filter: blur(5px);
    }

    .stat-box {
        background: #fff;
        padding: 10px 20px;
        border-radius: 50px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        font-size: 1.2rem;
        color: #2d3436;
    }

    .memory-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        max-width: 800px;
        margin: 0 auto;
        perspective: 1000px;
    }

    .memory-card {
        height: 120px;
        position: relative;
        cursor: pointer;
        transform-style: preserve-3d;
        transform: scale(1);
        transition: transform 0.5s;
    }

    .memory-card.flip {
        transform: rotateY(180deg);
    }

    .memory-card:active {
        transform: scale(0.97);
        transition: transform 0.2s;
    }

    .memory-card.flip.matched {
        transform: rotateY(180deg) scale(0.95);
        opacity: 0.7;
    }

    .front-face, .back-face {
        width: 100%;
        height: 100%;
        padding: 1rem;
        position: absolute;
        border-radius: 12px;
        background: #fff;
        backface-visibility: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .front-face {
        transform: rotateY(180deg);
        background: white;
    }

    .back-face {
        background: linear-gradient(45deg, #FF6B6B, #FF8787);
        color: white;
        font-size: 3rem;
    }

    .celebration {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 5rem;
        pointer-events: none;
        display: none;
        animation: celebrate 1s ease-out;
    }

    @keyframes celebrate {
        0% { transform: translate(-50%, -50%) scale(0); }
        50% { transform: translate(-50%, -50%) scale(1.2); }
        100% { transform: translate(-50%, -50%) scale(1); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gameItems = [
        { type: 'letter', content: 'A', color: '#FF6B6B' },
        { type: 'letter', content: 'B', color: '#4ECDC4' },
        { type: 'number', content: '1', color: '#FFD93D' },
        { type: 'number', content: '2', color: '#6C5CE7' },
        { type: 'color', content: '🔴', color: '#ff0000' },
        { type: 'color', content: '🔵', color: '#0000ff' },
        { type: 'shape', content: '⬜', color: '#2d3436' },
        { type: 'shape', content: '⭕', color: '#2d3436' }
    ];

    let hasFlippedCard = false;
    let lockBoard = false;
    let firstCard, secondCard;
    let pairs = 0;
    let attempts = 0;

    function createCard(item) {
        const card = document.createElement('div');
        card.className = 'memory-card';
        card.dataset.type = item.type;
        card.dataset.content = item.content;
        
        const front = document.createElement('div');
        front.className = 'front-face';
        front.style.color = item.color;
        front.textContent = item.content;

        const back = document.createElement('div');
        back.className = 'back-face';
        back.textContent = '?';

        card.appendChild(front);
        card.appendChild(back);

        card.addEventListener('click', flipCard);
        return card;
    }

    function initializeGame() {
        const gameBoard = document.getElementById('gameBoard');
        gameBoard.innerHTML = '';
        pairs = 0;
        attempts = 0;
        hasFlippedCard = false;
        lockBoard = false;
        firstCard = null;
        secondCard = null;
        updateStats();

        // Créer deux copies de chaque carte
        const cards = [...gameItems, ...gameItems];
        // Mélanger les cartes
        shuffleArray(cards);

        // Ajouter les cartes au plateau
        cards.forEach(item => {
            gameBoard.appendChild(createCard(item));
        });

        document.getElementById('totalPairs').textContent = gameItems.length;
    }

    function flipCard() {
        if (lockBoard) return;
        if (this === firstCard) return;

        this.classList.add('flip');

        if (!hasFlippedCard) {
            hasFlippedCard = true;
            firstCard = this;
            return;
        }

        secondCard = this;
        attempts++;
        updateStats();
        checkForMatch();
    }

    function checkForMatch() {
        const isMatch = firstCard.dataset.content === secondCard.dataset.content;

        if (isMatch) {
            pairs++;
            updateStats();
            disableCards();
            if (pairs === gameItems.length) {
                setTimeout(celebrateWin, 500);
            }
        } else {
            unflipCards();
        }
    }

    function disableCards() {
        firstCard.removeEventListener('click', flipCard);
        secondCard.removeEventListener('click', flipCard);
        firstCard.classList.add('matched');
        secondCard.classList.add('matched');
        resetBoard();
    }

    function unflipCards() {
        lockBoard = true;
        setTimeout(() => {
            firstCard.classList.remove('flip');
            secondCard.classList.remove('flip');
            resetBoard();
        }, 1000);
    }

    function resetBoard() {
        [hasFlippedCard, lockBoard] = [false, false];
        [firstCard, secondCard] = [null, null];
    }

    function updateStats() {
        document.getElementById('pairs').textContent = pairs;
        document.getElementById('attempts').textContent = attempts;
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function celebrateWin() {
        const celebration = document.getElementById('celebration');
        celebration.style.display = 'block';
        setTimeout(() => {
            celebration.style.display = 'none';
            const playAgain = confirm('Félicitations ! Tu as gagné ! 🎉\nVeux-tu jouer une nouvelle partie ?');
            if (playAgain) {
                initializeGame();
            }
        }, 2000);
    }

    // Gestionnaire d'événement pour le bouton Recommencer
    document.getElementById('restartBtn').addEventListener('click', function() {
        // Animation de rotation pour toutes les cartes avant de recommencer
        const cards = document.querySelectorAll('.memory-card');
        cards.forEach(card => {
            card.style.transition = 'transform 0.5s ease';
            card.style.transform = 'rotateY(180deg)';
        });

        // Attendre la fin de l'animation avant de réinitialiser
        setTimeout(() => {
            initializeGame();
        }, 500);
    });

    // Démarrer le jeu
    initializeGame();
});
</script>
@endsection 