@extends('layouts.app')

@section('content')
<div class="fruits-world">
    <div class="background-pattern">
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
    </div>

    <div class="floating-decorations">
        <div class="floating-fruit">
            <img src="/images/fruits/pomme-rouge.png" alt="Pomme" class="floating-img">
        </div>
        <div class="floating-fruit">
            <img src="/images/fruits/banane.png" alt="Banane" class="floating-img">
        </div>
        <div class="floating-fruit">
            <img src="/images/fruits/orange.png" alt="Orange" class="floating-img">
        </div>
        <div class="floating-fruit">
            <img src="/images/fruits/raisin.png" alt="Raisin" class="floating-img">
        </div>
        <div class="floating-fruit">
            <img src="/images/fruits/fraise.png" alt="Fraise" class="floating-img">
        </div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Primaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Fruits</h1>
        <div class="title-decoration">
            <span>🍎</span>
            <span>🍌</span>
            <span>🍊</span>
            <span>🍓</span>
        </div>
        <a href="{{ route('primaire.fruits.quiz') }}" class="quiz-button">
            Faire le Quiz des Fruits 🎮
        </a>
    </div>

    <div class="fruits-container">
        <!-- Fruits Sucrés -->
        <div class="fruit-category sweet-theme">
            <div class="category-header">
                <h2>Fruits Sucrés</h2>
                <img src="/images/fruits/fraises.png" alt="Fraise" class="category-icon">
            </div>
            <div class="fruits-grid">
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/fraises.png" alt="Fraise" class="fruit-img">
                    </div>
                    <h3>La Fraise</h3>
                    <p>Sucrée et parfumée</p>
                    <button class="sound-button" onclick="playSound('fraise')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/cerises.png" alt="Cerise" class="fruit-img">
                    </div>
                    <h3>La Cerise</h3>
                    <p>Petite et juteuse</p>
                    <button class="sound-button" onclick="playSound('cerise')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/raisin.png" alt="Raisin" class="fruit-img">
                    </div>
                    <h3>Le Raisin</h3>
                    <p>Grappes sucrées</p>
                    <button class="sound-button" onclick="playSound('raisin')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/banane.png" alt="Banane" class="fruit-img">
                    </div>
                    <h3>La Banane</h3>
                    <p>Jaune et moelleuse</p>
                    <button class="sound-button" onclick="playSound('banane')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/kiwi.png" alt="Kiwi" class="fruit-img">
                    </div>
                    <h3>Le Kiwi</h3>
                    <p>Vert et acidulé</p>
                    <button class="sound-button" onclick="playSound('kiwi')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/ANANAS.png" alt="Ananas" class="fruit-img">
                    </div>
                    <h3>L'Ananas</h3>
                    <p>Tropical et parfumé</p>
                    <button class="sound-button" onclick="playSound('ananas')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Fruits Juteux -->
        <div class="fruit-category juicy-theme">
            <div class="category-header">
                <h2>Fruits Juteux</h2>
                <img src="/images/fruits/pomme.png" alt="Pomme" class="category-icon">
            </div>
            <div class="fruits-grid">
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/pomme.png" alt="Pomme" class="fruit-img">
                    </div>
                    <h3>La Pomme</h3>
                    <p>Croquante et juteuse</p>
                    <button class="sound-button" onclick="playSound('pomme')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/poire.png" alt="Poire" class="fruit-img">
                    </div>
                    <h3>La Poire</h3>
                    <p>Douce et juteuse</p>
                    <button class="sound-button" onclick="playSound('poire')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/peche.png" alt="Pêche" class="fruit-img">
                    </div>
                    <h3>La Pêche</h3>
                    <p>Veloutée et sucrée</p>
                    <button class="sound-button" onclick="playSound('peche')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/orange.png" alt="Orange" class="fruit-img">
                    </div>
                    <h3>L'Orange</h3>
                    <p>Ronde et vitaminée</p>
                    <button class="sound-button" onclick="playSound('orange')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="fruit-card">
                    <div class="fruit-image">
                        <img src="/images/fruits/pastèque.png" alt="Pastèque" class="fruit-img">
                    </div>
                    <h3>La Pastèque</h3>
                    <p>Fraîche et désaltérante</p>
                    <button class="sound-button" onclick="playSound('pasteque')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fruits-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F0, #FFF0E5, #F5FFE5);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.background-pattern {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
}

.pattern-circle {
    position: absolute;
    border-radius: 50%;
    opacity: 0.1;
    animation: float-pattern 20s infinite linear;
}

.pattern-circle:nth-child(1) {
    width: 300px;
    height: 300px;
    top: 10%;
    left: 10%;
    background: linear-gradient(45deg, #FF69B4, #FFB6C1);
}

.pattern-circle:nth-child(2) {
    width: 200px;
    height: 200px;
    top: 60%;
    right: 15%;
    background: linear-gradient(45deg, #FFA500, #FFD700);
}

.pattern-circle:nth-child(3) {
    width: 250px;
    height: 250px;
    bottom: 10%;
    left: 30%;
    background: linear-gradient(45deg, #32CD32, #98FB98);
}

@keyframes float-pattern {
    0% { transform: rotate(0deg) translate(20px) rotate(0deg); }
    100% { transform: rotate(360deg) translate(20px) rotate(-360deg); }
}

.floating-decorations {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    z-index: 1;
}

.floating-fruit {
    position: absolute;
    font-size: 2.5rem;
    animation: float 15s infinite linear;
    opacity: 0.2;
}

.floating-img {
    width: 50px;
    height: 50px;
    object-fit: contain;
}

.floating-fruit:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-fruit:nth-child(2) { top: 20%; right: 20%; animation-delay: -3s; }
.floating-fruit:nth-child(3) { bottom: 30%; left: 30%; animation-delay: -6s; }
.floating-fruit:nth-child(4) { bottom: 10%; right: 10%; animation-delay: -9s; }
.floating-fruit:nth-child(5) { top: 50%; left: 50%; animation-delay: -12s; }

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -50px) rotate(120deg); }
    66% { transform: translate(-30px, 50px) rotate(240deg); }
    100% { transform: translate(0, 0) rotate(360deg); }
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

.page-title {
    text-align: center;
    margin-bottom: 3rem;
    position: relative;
    z-index: 2;
}

.page-title h1 {
    font-size: 3.5rem;
    background: linear-gradient(45deg, #FF6B6B, #FF8787, #FFA07A);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.title-decoration {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.title-decoration span {
    font-size: 2.5rem;
    animation: bounce 2s infinite;
}

.title-decoration span:nth-child(2) { animation-delay: 0.2s; }
.title-decoration span:nth-child(3) { animation-delay: 0.4s; }
.title-decoration span:nth-child(4) { animation-delay: 0.6s; }

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px) scale(1.1); }
}

.fruits-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.fruit-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.fruit-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.sweet-theme {
    background: linear-gradient(135deg, #FF6B6B, #FFB4B4);
}

.juicy-theme {
    background: linear-gradient(135deg, #4CAF50, #81C784);
}

.category-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-bottom: 2rem;
}

.category-header h2 {
    color: white;
    font-size: 2rem;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}

.category-icon {
    width: 50px;
    height: 50px;
    object-fit: contain;
    animation: wiggle 3s infinite;
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg) scale(1); }
    25% { transform: rotate(-10deg) scale(1.1); }
    75% { transform: rotate(10deg) scale(1.1); }
}

.fruits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.fruit-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.fruit-card:hover {
    transform: scale(1.05) translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.fruit-image {
    background: white;
    border-radius: 15px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 200px;
}

.fruit-img {
    width: 180px;
    height: 180px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.fruit-card:hover .fruit-img {
    transform: scale(1.1);
}

.fruit-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.fruit-card p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.sound-button {
    background: linear-gradient(45deg, #FF6B6B, #FF8787);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.sound-button:hover {
    background: linear-gradient(45deg, #FF8787, #FF6B6B);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.quiz-button {
    display: inline-block;
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1.2rem;
    margin-top: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.quiz-button:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #81C784, #4CAF50);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .fruits-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .title-decoration span {
        font-size: 2rem;
    }

    .floating-img {
        width: 30px;
        height: 30px;
    }
}
</style>

<script>
function playSound(fruit) {
    const audio = new Audio(`/audios/fruits/${fruit}.mp3`);
    audio.play().catch(error => {
        console.log('Erreur lors de la lecture du son:', error);
    });
}
</script>
@endsection 