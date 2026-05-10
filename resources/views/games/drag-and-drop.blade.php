@extends('layouts.app')

@section('content')
<div class="game-background">
    <div class="floating-items">
        <div class="star" style="top: 15%; left: 10%;">⭐</div>
        <div class="star" style="top: 25%; right: 15%;">⭐</div>
        <div class="star" style="bottom: 20%; left: 20%;">⭐</div>
        <div class="cloud" style="top: 10%; right: 25%;">☁️</div>
        <div class="cloud" style="bottom: 30%; left: 15%;">☁️</div>
        <div class="balloon" style="top: 40%; right: 10%;">🎈</div>
        <div class="balloon" style="bottom: 25%; right: 30%;">🎈</div>
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
                        🎮 Glisser et Déposer les Formes 🎯
                    </h1>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="shapes-container p-3" id="shapes-source">
                                <h3 class="text-center mb-3" style="color: #4CAF50;">Formes à déplacer</h3>
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <img src="{{ asset('images/shapes/Carre.PNG') }}" class="draggable-shape" draggable="true" data-shape="carre" alt="Carré">
                                    <img src="{{ asset('images/shapes/Cercle.PNG') }}" class="draggable-shape" draggable="true" data-shape="cercle" alt="Cercle">
                                    <img src="{{ asset('images/shapes/Triangle.PNG') }}" class="draggable-shape" draggable="true" data-shape="triangle" alt="Triangle">
                                    <img src="{{ asset('images/shapes/rectangle.PNG') }}" class="draggable-shape" draggable="true" data-shape="rectangle" alt="Rectangle">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="targets-container p-3">
                                <h3 class="text-center mb-3" style="color: #6C63FF;">Zones cibles</h3>
                                <div class="d-flex flex-column gap-3">
                                    <div class="drop-target" data-shape="carre">Déposez le carré ici</div>
                                    <div class="drop-target" data-shape="cercle">Déposez le cercle ici</div>
                                    <div class="drop-target" data-shape="triangle">Déposez le triangle ici</div>
                                    <div class="drop-target" data-shape="rectangle">Déposez le rectangle ici</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button id="reset-game" class="btn btn-warning btn-lg">
                            🔄 Recommencer
                        </button>
                        <div id="success-message" class="mt-3 d-none alert alert-success">
                            🎉 Bravo ! Tu as réussi à placer toutes les formes correctement !
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .game-background {
        min-height: 100vh;
        background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 50%, #80deea 100%);
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

    .star {
        animation-delay: 0s !important;
    }

    .cloud {
        animation-delay: 2s !important;
    }

    .balloon {
        animation-delay: 4s !important;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .back-button {
        background-color: #6C63FF;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .back-button:hover {
        background-color: #5A52E0;
        transform: translateX(-5px);
        box-shadow: 0 6px 8px rgba(0,0,0,0.15);
    }

    .game-container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        backdrop-filter: blur(5px);
    }

    .shapes-container, .targets-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .draggable-shape {
        width: 100px;
        height: 100px;
        cursor: grab;
        transition: transform 0.2s;
    }

    .draggable-shape:hover {
        transform: scale(1.1);
    }

    .draggable-shape:active {
        cursor: grabbing;
    }

    .drop-target {
        height: 120px;
        border: 3px dashed #6C63FF;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #666;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .drop-target.drag-over {
        background: #e8f5e9;
        border-style: solid;
        transform: scale(1.02);
    }

    .drop-target.correct {
        border-color: #4CAF50;
        background: #e8f5e9;
        color: #4CAF50;
    }

    #reset-game {
        transition: transform 0.2s;
    }

    #reset-game:hover {
        transform: scale(1.05);
    }

    .success-animation {
        animation: success-bounce 0.5s ease;
    }

    @keyframes success-bounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const draggables = document.querySelectorAll('.draggable-shape');
    const dropTargets = document.querySelectorAll('.drop-target');
    const resetButton = document.getElementById('reset-game');
    const successMessage = document.getElementById('success-message');
    let correctPlacements = 0;

    // Son de succès
    const successSound = new Audio('/audio/correct.mp3');
    const errorSound = new Audio('/audio/incorrect.mp3');

    function handleDragStart(e) {
        e.target.classList.add('dragging');
        e.dataTransfer.setData('text/plain', e.target.dataset.shape);
        e.dataTransfer.effectAllowed = 'move';
    }

    function handleDragEnd(e) {
        e.target.classList.remove('dragging');
    }

    function handleDragOver(e) {
        e.preventDefault();
        e.currentTarget.classList.add('drag-over');
    }

    function handleDragLeave(e) {
        e.currentTarget.classList.remove('drag-over');
    }

    function handleDrop(e) {
        e.preventDefault();
        const dropTarget = e.currentTarget;
        dropTarget.classList.remove('drag-over');
        
        const draggedShape = e.dataTransfer.getData('text/plain');
        const targetShape = dropTarget.dataset.shape;

        if (draggedShape === targetShape) {
            const shape = document.querySelector(`[data-shape="${draggedShape}"]`);
            dropTarget.innerHTML = '';
            dropTarget.appendChild(shape.cloneNode(true));
            shape.style.visibility = 'hidden';
            dropTarget.classList.add('correct');
            successSound.play();
            correctPlacements++;

            if (correctPlacements === dropTargets.length) {
                successMessage.classList.remove('d-none');
                successMessage.classList.add('success-animation');
            }
        } else {
            errorSound.play();
            dropTarget.classList.add('shake');
            setTimeout(() => dropTarget.classList.remove('shake'), 500);
        }
    }

    function resetGame() {
        dropTargets.forEach(target => {
            target.innerHTML = `Déposez le ${target.dataset.shape} ici`;
            target.classList.remove('correct');
        });

        draggables.forEach(shape => {
            shape.style.visibility = 'visible';
        });

        correctPlacements = 0;
        successMessage.classList.add('d-none');
    }

    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', handleDragStart);
        draggable.addEventListener('dragend', handleDragEnd);
    });

    dropTargets.forEach(target => {
        target.addEventListener('dragover', handleDragOver);
        target.addEventListener('dragleave', handleDragLeave);
        target.addEventListener('drop', handleDrop);
    });

    resetButton.addEventListener('click', resetGame);
});
</script>
@endsection 