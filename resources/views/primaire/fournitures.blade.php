@extends('layouts.app')

@section('content')
<div class="supplies-world">
    <div class="background-pattern">
        <div class="pattern-item pencil">✏️</div>
        <div class="pattern-item ruler">📏</div>
        <div class="pattern-item book">📚</div>
        <div class="pattern-item backpack">🎒</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Primaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Fournitures Scolaires</h1>
        <div class="title-decoration">
            <span>✏️</span>
            <span>📚</span>
            <span>🎒</span>
            <span>📏</span>
        </div>
        <div class="quiz-button-container">
            <a href="{{ route('primaire.fournitures.quiz') }}" class="quiz-button">
                <span class="quiz-icon">🎯</span>
                Commencer le Quiz
                <span class="quiz-icon">✨</span>
            </a>
        </div>
    </div>

    <div class="supplies-container">
        <!-- Matériel d'écriture -->
        <div class="supplies-category writing-theme">
            <div class="category-header">
                <h2>Pour Écrire</h2>
                <span class="category-icon">✏️</span>
            </div>
            <div class="supplies-grid">
                <div class="supply-card">
                    <img src="/images/fournitures/crayonfr.PNG" alt="Crayon" class="supply-image">
                    <h3>Le Crayon</h3>
                    <button class="sound-button" onclick="playSound('crayon')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/stylofr.PNG" alt="Stylo" class="supply-image">
                    <h3>Le Stylo</h3>
                    <button class="sound-button" onclick="playSound('stylo')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/marqueur.PNG" alt="Marqueur" class="supply-image">
                    <h3>Le Marqueur</h3>
                    <button class="sound-button" onclick="playSound('marqueur')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/feutrefr.PNG" alt="Feutre" class="supply-image">
                    <h3>Le Feutre</h3>
                    <button class="sound-button" onclick="playSound('feutre')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Matériel de Base -->
        <div class="supplies-category basic-theme">
            <div class="category-header">
                <h2>Matériel de Base</h2>
                <span class="category-icon">📏</span>
            </div>
            <div class="supplies-grid">
                <div class="supply-card">
                    <img src="/images/fournitures/règlefr.PNG" alt="Règle" class="supply-image">
                    <h3>La Règle</h3>
                    <button class="sound-button" onclick="playSound('regle')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/gommeFr.PNG" alt="Gomme" class="supply-image">
                    <h3>La Gomme</h3>
                    <button class="sound-button" onclick="playSound('gomme')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/tailleur crayon fr.PNG" alt="Taille-crayon" class="supply-image">
                    <h3>Le Taille-crayon</h3>
                    <button class="sound-button" onclick="playSound('taille-crayon')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/colle.PNG" alt="Colle" class="supply-image">
                    <h3>La Colle</h3>
                    <button class="sound-button" onclick="playSound('colle')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Autres Fournitures -->
        <div class="supplies-category other-theme">
            <div class="category-header">
                <h2>Autres Fournitures</h2>
                <span class="category-icon">🎒</span>
            </div>
            <div class="supplies-grid">
                <div class="supply-card">
                    <img src="/images/fournitures/cahierfr.PNG" alt="Cahier" class="supply-image">
                    <h3>Le Cahier</h3>
                    <button class="sound-button" onclick="playSound('cahier')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/livre fr.PNG" alt="Livre" class="supply-image">
                    <h3>Le Livre</h3>
                    <button class="sound-button" onclick="playSound('livre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/cartable fr.PNG" alt="Cartable" class="supply-image">
                    <h3>Le Cartable</h3>
                    <button class="sound-button" onclick="playSound('cartable')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/ciseauxfr.PNG" alt="Ciseaux" class="supply-image">
                    <h3>Les Ciseaux</h3>
                    <button class="sound-button" onclick="playSound('ciseaux')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="supply-card">
                    <img src="/images/fournitures/trousseFr.PNG" alt="Trousse" class="supply-image">
                    <h3>La Trousse</h3>
                    <button class="sound-button" onclick="playSound('trousse')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.supplies-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFF9C4, #FFECB3, #FFE0B2);
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

.pattern-item {
    position: absolute;
    font-size: 3rem;
    opacity: 0.1;
    animation: float-pattern 20s infinite linear;
}

.pattern-item.pencil { top: 10%; left: 10%; animation-delay: 0s; }
.pattern-item.ruler { top: 30%; right: 20%; animation-delay: -5s; }
.pattern-item.book { bottom: 20%; left: 15%; animation-delay: -10s; }
.pattern-item.backpack { bottom: 30%; right: 15%; animation-delay: -15s; }

@keyframes float-pattern {
    0% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(120deg); }
    66% { transform: translate(-20px, 20px) rotate(240deg); }
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
    background: linear-gradient(45deg, #FF7043, #FF8A65);
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
    background: linear-gradient(45deg, #FF8A65, #FF7043);
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
    background: linear-gradient(45deg, #F57C00, #FB8C00, #FFB74D);
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

.supplies-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.supplies-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.supplies-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.writing-theme {
    background: linear-gradient(135deg, #81C784, #66BB6A);
}

.basic-theme {
    background: linear-gradient(135deg, #B3E5FC, #B2EBF2);
}

.other-theme {
    background: linear-gradient(135deg, #FFB74D, #FFA726);
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
    font-size: 2.5rem;
    animation: wiggle 3s infinite;
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg) scale(1); }
    25% { transform: rotate(-10deg) scale(1.1); }
    75% { transform: rotate(10deg) scale(1.1); }
}

.supplies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.supply-card {
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

.supply-card:hover {
    transform: scale(1.05) translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.supply-image {
    width: 120px;
    height: 120px;
    object-fit: contain;
    margin-bottom: 1rem;
    transition: transform 0.3s ease;
}

.supply-card:hover .supply-image {
    transform: scale(1.1);
}

.supply-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.supply-card p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.sound-button {
    background: linear-gradient(45deg, #FF7043, #FF8A65);
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
    background: linear-gradient(45deg, #FF8A65, #FF7043);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
    .supplies-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .title-decoration span {
        font-size: 2rem;
    }

    .pattern-item {
        font-size: 2rem;
    }

    .supply-card {
        padding: 1rem;
    }

    .supply-image {
        width: 100px;
        height: 100px;
    }
}

/* New Quiz Button Styles */
.quiz-button-container {
    margin-top: 2rem;
    text-align: center;
}

.quiz-button {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: linear-gradient(45deg, #FF4081, #FF80AB);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 1.3rem;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
}

.quiz-button:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: 0.5s;
}

.quiz-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    color: white;
    text-decoration: none;
}

.quiz-button:hover:before {
    left: 100%;
}

.quiz-icon {
    font-size: 1.5rem;
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

@media (max-width: 768px) {
    .quiz-button {
        font-size: 1.1rem;
        padding: 12px 25px;
    }
    
    .quiz-icon {
        font-size: 1.3rem;
    }
}
</style>

<script>
function playSound(item) {
    const audio = new Audio(`/audios/fournitures/${item}.mp3`);
    audio.play().catch(error => {
        console.error('Erreur lors de la lecture du son:', error);
    });
}
</script>
@endsection 