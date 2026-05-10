@extends('layouts.app')

@section('content')
<div class="game-background">
    <div class="floating-items">
        <div class="magic-wand" style="top: 10%; left: 15%;">✨</div>
        <div class="magic-wand" style="bottom: 15%; right: 10%;">✨</div>
        <div class="unicorn" style="top: 20%; right: 20%;">🦄</div>
        <div class="heart" style="bottom: 30%; left: 25%;">💖</div>
        <div class="heart" style="top: 25%; left: 35%;">💝</div>
        <div class="star" style="bottom: 20%; right: 30%;">⭐</div>
        <div class="castle" style="top: 40%; right: 15%;">🏰</div>
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
                    <h1 class="text-center mb-4" style="color: #9B59B6; font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
                        🧩 Puzzle Magique 🎨
                    </h1>
                    <div class="game-stats text-center mb-4">
                        <div class="stat-box d-inline-block mx-3">
                            Mouvements: <span id="moves">0</span>
                        </div>
                        <div class="stat-box d-inline-block mx-3">
                            Temps: <span id="timer">00:00</span>
                        </div>
                    </div>
                    <div class="puzzle-area">
                        <div class="puzzle-board" id="puzzleBoard">
                            <!-- Les pièces seront générées dynamiquement -->
                        </div>
                        <div class="preview">
                            <img id="previewImage" src="" alt="Image à reconstituer">
                        </div>
                    </div>
                    <div class="controls text-center mt-4">
                        <button class="btn btn-warning btn-lg mx-2" id="restartBtn">
                            🔄 Recommencer
                        </button>
                        <button class="btn btn-success btn-lg mx-2" id="nextBtn">
                            ⏭️ Image Suivante
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
        background: linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 50%, #A5D6A7 100%);
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

    .magic-wand {
        font-size: 2.5rem !important;
        animation-delay: 0s !important;
    }

    .unicorn {
        font-size: 3rem !important;
        animation-delay: 1s !important;
    }

    .heart {
        font-size: 2rem !important;
        animation-delay: 2s !important;
    }

    .star {
        font-size: 2.5rem !important;
        animation-delay: 3s !important;
    }

    .castle {
        font-size: 3.5rem !important;
        animation-delay: 4s !important;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .back-button {
        background-color: #9B59B6;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .back-button:hover {
        background-color: #8E44AD;
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

    .puzzle-area {
        display: flex;
        gap: 2rem;
        margin: 2rem 0;
        flex-wrap: wrap;
        justify-content: center;
    }

    .puzzle-board {
        flex: 0 0 400px;
        aspect-ratio: 1;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(3, 1fr);
        gap: 2px;
        padding: 2px;
        position: relative;
    }

    .puzzle-piece {
        width: 100%;
        height: 100%;
        border: 2px solid #ddd;
        border-radius: 8px;
        cursor: move;
        background-size: 300% 300%;
        transition: transform 0.2s;
    }

    .puzzle-piece:hover {
        transform: scale(1.02);
    }

    .puzzle-piece.dragging {
        opacity: 0.5;
    }

    .piece-slot {
        background: #f5f6fa;
        border-radius: 8px;
        border: 2px dashed #ddd;
    }

    .piece-slot.hover {
        background: #dfe6e9;
        border-color: #74b9ff;
    }

    .preview {
        flex: 0 0 300px;
        aspect-ratio: 1;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .preview img {
        width: 100%;
        height: 100%;
        object-fit: contain;
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

    @media (max-width: 768px) {
        .puzzle-area {
            flex-direction: column;
            align-items: center;
        }

        .preview {
            order: -1;
            margin-bottom: 2rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const images = [
        '/images/shapes/Carre.PNG',
        '/images/shapes/Cercle.PNG',
        '/images/shapes/Triangle.PNG',
        '/images/shapes/rectangle.PNG',
        '/images/shapes/Parallelogramme.PNG',
        '/images/shapes/losange.PNG',
        '/images/shapes/Pentagone.PNG',
        '/images/shapes/Hexagone.PNG'
    ];

    let currentImage = 0;
    let moves = 0;
    let timer = 0;
    let timerInterval;

    function updateStats() {
        document.getElementById('moves').textContent = moves;
    }

    function updateTimer() {
        const minutes = Math.floor(timer / 60);
        const seconds = timer % 60;
        document.getElementById('timer').textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

    function startTimer() {
        clearInterval(timerInterval);
        timer = 0;
        updateTimer();
        timerInterval = setInterval(() => {
            timer++;
            updateTimer();
        }, 1000);
    }

    function createPieces() {
        const board = document.getElementById('puzzleBoard');
        board.innerHTML = '';
        const pieces = [];

        // Vérifier si l'image existe
        const img = new Image();
        img.onload = function() {
            console.log('Image chargée avec succès:', images[currentImage]);
            // Créer 9 pièces
            for (let i = 0; i < 9; i++) {
                const piece = document.createElement('div');
                piece.className = 'puzzle-piece';
                piece.draggable = true;
                const imageUrl = images[currentImage];
                console.log('Création de la pièce avec l\'image:', imageUrl);
                
                // Créer un élément img à l'intérieur de la pièce
                const imgElement = document.createElement('img');
                imgElement.src = imageUrl;
                imgElement.style.width = '100%';
                imgElement.style.height = '100%';
                imgElement.style.objectFit = 'cover';
                imgElement.style.position = 'absolute';
                imgElement.style.top = '0';
                imgElement.style.left = '0';
                
                // Calculer la position de l'image
                const row = Math.floor(i / 3);
                const col = i % 3;
                imgElement.style.clipPath = `polygon(${col * 33.33}% ${row * 33.33}%, ${(col + 1) * 33.33}% ${row * 33.33}%, ${(col + 1) * 33.33}% ${(row + 1) * 33.33}%, ${col * 33.33}% ${(row + 1) * 33.33}%)`;
                
                piece.appendChild(imgElement);
                piece.dataset.position = i;
                piece.id = `piece-${i}`;
                
                piece.addEventListener('dragstart', handleDragStart);
                piece.addEventListener('dragend', handleDragEnd);
                pieces.push(piece);
            }

            // Mélanger les pièces
            shuffleArray(pieces);

            // Créer les emplacements et y placer les pièces
            for (let i = 0; i < 9; i++) {
                const slot = document.createElement('div');
                slot.className = 'piece-slot';
                slot.dataset.position = i;
                slot.id = `slot-${i}`;
                
                slot.addEventListener('dragover', handleDragOver);
                slot.addEventListener('dragleave', handleDragLeave);
                slot.addEventListener('drop', handleDrop);
                
                slot.appendChild(pieces[i]);
                board.appendChild(slot);
            }
        };
        img.onerror = function() {
            console.error('Erreur de chargement de l\'image:', images[currentImage]);
            alert('L\'image n\'a pas pu être chargée. Veuillez réessayer.');
            nextImage();
        };
        console.log('Tentative de chargement de l\'image:', images[currentImage]);
        img.src = images[currentImage];
    }

    function handleDragStart(e) {
        this.classList.add('dragging');
        e.dataTransfer.setData('text/plain', this.id);
    }

    function handleDragEnd() {
        this.classList.remove('dragging');
    }

    function handleDragOver(e) {
        e.preventDefault();
        this.classList.add('hover');
    }

    function handleDragLeave() {
        this.classList.remove('hover');
    }

    function handleDrop(e) {
        e.preventDefault();
        this.classList.remove('hover');
        
        const draggedId = e.dataTransfer.getData('text/plain');
        const draggedPiece = document.getElementById(draggedId);
        const dropPiece = this.children[0];
        
        if (draggedPiece && dropPiece) {
            const draggedParent = draggedPiece.parentNode;
            this.appendChild(draggedPiece);
            draggedParent.appendChild(dropPiece);
            moves++;
            updateStats();
            checkWin();
        }
    }

    function checkWin() {
        const slots = document.querySelectorAll('.piece-slot');
        let isWin = true;

        slots.forEach(slot => {
            const piece = slot.children[0];
            if (piece.dataset.position !== slot.dataset.position) {
                isWin = false;
            }
        });

        if (isWin) {
            clearInterval(timerInterval);
            celebrateWin();
        }
    }

    function celebrateWin() {
        const celebration = document.getElementById('celebration');
        celebration.style.display = 'block';
        setTimeout(() => {
            celebration.style.display = 'none';
            if (confirm('Félicitations ! Tu as réussi ! 🎉\nVeux-tu passer à l\'image suivante ?')) {
                nextImage();
            }
        }, 2000);
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function initializeGame() {
        moves = 0;
        updateStats();
        console.log('Initialisation du jeu avec l\'image:', images[currentImage]);
        document.getElementById('previewImage').src = images[currentImage];
        createPieces();
        startTimer();
    }

    function nextImage() {
        currentImage = (currentImage + 1) % images.length;
        initializeGame();
    }

    document.getElementById('restartBtn').addEventListener('click', initializeGame);
    document.getElementById('nextBtn').addEventListener('click', nextImage);

    // Démarrer le jeu
    initializeGame();
});
</script>
@endsection 