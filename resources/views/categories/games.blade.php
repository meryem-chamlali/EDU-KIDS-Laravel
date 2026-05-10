@extends('layouts.app')

@section('content')
<style>
    .games-container {
        padding: 2rem;
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        min-height: 100vh;
    }

    .back-button {
        background-color: #FF6B6B;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        color: white;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 2rem;
    }

    .back-button:hover {
        background-color: #FF5252;
        transform: translateX(-5px);
        box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        color: white;
    }

    .games-title {
        text-align: center;
        font-size: 3rem;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 2rem;
        animation: bounce 1s ease infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .game-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .game-card:hover {
        transform: translateY(-10px);
    }

    .game-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: rotate(45deg);
        transition: 0.6s;
        pointer-events: none;
    }

    .game-card:hover::before {
        left: 100%;
    }

    .game-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .game-title {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .game-description {
        color: #666;
        font-size: 1rem;
        line-height: 1.5;
    }

    .play-button {
        background: #FF4757;
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 50px;
        font-size: 1.1rem;
        margin-top: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .play-button:hover {
        background: #ff6b81;
        transform: scale(1.05);
        color: white;
    }

    .floating {
        position: absolute;
        pointer-events: none;
    }

    .star {
        font-size: 2rem;
        color: #FFD700;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(20deg); }
    }
</style>

<div class="games-container">
    <div class="text-start">
        <a href="{{ route('prescolaire') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Retour au Préscolaire
        </a>
    </div>
    
    <!-- Éléments décoratifs flottants -->
    <div class="floating star" style="top: 10%; left: 5%">⭐</div>
    <div class="floating star" style="top: 20%; right: 10%">⭐</div>
    <div class="floating star" style="bottom: 15%; left: 15%">⭐</div>
    <div class="floating star" style="bottom: 30%; right: 5%">⭐</div>

    <h1 class="games-title">🎮 Jeux Éducatifs</h1>

    <div class="games-grid">
        <!-- Memory Game -->
        <div class="game-card">
            <div class="game-icon">🎴</div>
            <h2 class="game-title">Memory</h2>
            <p class="game-description">Teste ta mémoire en trouvant les paires de cartes identiques !</p>
            <a href="{{ route('games.memory') }}" class="play-button">JOUER</a>
        </div>

        <!-- Puzzle Game -->
        <div class="game-card">
            <div class="game-icon">🧩</div>
            <h2 class="game-title">Puzzle</h2>
            <p class="game-description">Reconstitue de jolies images en plaçant les pièces au bon endroit.</p>
            <a href="{{ route('games.puzzle') }}" class="play-button">JOUER</a>
        </div>

        <!-- Drag and Drop Game -->
        <div class="game-card">
            <div class="game-icon">🎯</div>
            <h2 class="game-title">Glisser-Déposer</h2>
            <p class="game-description">Place les objets au bon endroit pour gagner des points !</p>
            <a href="{{ route('games.drag-and-drop') }}" class="play-button">JOUER</a>
        </div>
    </div>
</div>
@endsection 