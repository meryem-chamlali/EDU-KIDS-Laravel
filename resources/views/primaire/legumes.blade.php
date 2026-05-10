@extends('layouts.app')

@section('content')
<div class="vegetables-world">
    <div class="background-pattern">
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
        <div class="pattern-star"></div>
        <div class="pattern-star"></div>
        <div class="pattern-star"></div>
    </div>

    <div class="floating-decorations">
        <div class="floating-vegetable">🥕</div>
        <div class="floating-vegetable">🥬</div>
        <div class="floating-vegetable">🥦</div>
        <div class="floating-vegetable">🍅</div>
        <div class="floating-vegetable">🥒</div>
        <div class="floating-vegetable">🌽</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Primaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Légumes</h1>
        <div class="title-decoration">
            <span>🥕</span>
            <span>🥬</span>
            <span>🥦</span>
            <span>🍅</span>
        </div>
        <a href="{{ route('primaire.legumes.quiz') }}" class="quiz-button">
            <div class="quiz-button-content">
                <div class="quiz-icon">🎮</div>
                <div class="quiz-text">
                    <span class="quiz-title-text">Faire le Quiz</span>
                    <span class="quiz-subtitle">Teste tes connaissances sur les légumes !</span>
                </div>
                <div class="quiz-arrow">→</div>
            </div>
        </a>
    </div>

    <div class="vegetables-container">
        <!-- Légumes Racines -->
        <div class="vegetable-category root-theme">
            <div class="category-header">
                <h2>Légumes Racines</h2>
                <div class="category-icon">
                    <img src="/images/legumes/carrote.PNG" alt="Carotte" class="header-icon">
                </div>
            </div>
            <div class="vegetables-grid">
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/carrote.png" alt="Carotte" class="vegetable-img">
                    </div>
                    <h3>La Carotte</h3>
                    <p>Orange et croquante</p>
                    <button class="sound-button" onclick="playSound('carotte')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/pomme de terre.png" alt="Pomme de terre" class="vegetable-img">
                    </div>
                    <h3>La Pomme de terre</h3>
                    <p>Ronde et farineuse</p>
                    <button class="sound-button" onclick="playSound('pomme-de-terre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/ognion.png" alt="Oignon" class="vegetable-img">
                    </div>
                    <h3>L'Oignon</h3>
                    <p>Rond et parfumé</p>
                    <button class="sound-button" onclick="playSound('oignon')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/ail.png" alt="Ail" class="vegetable-img">
                    </div>
                    <h3>L'Ail</h3>
                    <p>Blanc et parfumé</p>
                    <button class="sound-button" onclick="playSound('ail')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Légumes Verts -->
        <div class="vegetable-category green-theme">
            <div class="category-header">
                <h2>Légumes Verts</h2>
                <div class="category-icon">
                    <img src="/images/legumes/brocoli.PNG" alt="Brocoli" class="header-icon">
                </div>
            </div>
            <div class="vegetables-grid">
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/salade.png" alt="Salade" class="vegetable-img">
                    </div>
                    <h3>La Salade</h3>
                    <p>Fraîche et croquante</p>
                    <button class="sound-button" onclick="playSound('salade')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/brocoli.png" alt="Brocoli" class="vegetable-img">
                    </div>
                    <h3>Le Brocoli</h3>
                    <p>Vert et nutritif</p>
                    <button class="sound-button" onclick="playSound('brocoli')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/concombre.png" alt="Concombre" class="vegetable-img">
                    </div>
                    <h3>Le Concombre</h3>
                    <p>Long et rafraîchissant</p>
                    <button class="sound-button" onclick="playSound('concombre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/epinards.png" alt="Épinards" class="vegetable-img">
                    </div>
                    <h3>Les Épinards</h3>
                    <p>Verts et tendres</p>
                    <button class="sound-button" onclick="playSound('epinards')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Légumes du Soleil -->
        <div class="vegetable-category sun-theme">
            <div class="category-header">
                <h2>Légumes du Soleil</h2>
                <div class="category-icon">
                    <img src="/images/legumes/tomate.PNG" alt="Tomate" class="header-icon">
                </div>
            </div>
            <div class="vegetables-grid">
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/tomate.png" alt="Tomate" class="vegetable-img">
                    </div>
                    <h3>La Tomate</h3>
                    <p>Rouge et juteuse</p>
                    <button class="sound-button" onclick="playSound('tomate')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/courgette.png" alt="Courgette" class="vegetable-img">
                    </div>
                    <h3>La Courgette</h3>
                    <p>Verte et tendre</p>
                    <button class="sound-button" onclick="playSound('courgette')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/poivron.png" alt="Poivron" class="vegetable-img">
                    </div>
                    <h3>Le Poivron</h3>
                    <p>Coloré et croquant</p>
                    <button class="sound-button" onclick="playSound('poivron')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/chou fleur.png" alt="Chou-fleur" class="vegetable-img">
                    </div>
                    <h3>Le Chou-fleur</h3>
                    <p>Blanc et délicat</p>
                    <button class="sound-button" onclick="playSound('chou-fleur')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="vegetable-card">
                    <div class="vegetable-image">
                        <img src="/images/legumes/aubergine.png" alt="Aubergine" class="vegetable-img">
                    </div>
                    <h3>L'Aubergine</h3>
                    <p>Violette et tendre</p>
                    <button class="sound-button" onclick="playSound('aubergine')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.vegetables-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5E5, #E0F7FA, #F0F4C3);
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
    background: rgba(255, 255, 255, 0.2);
    animation: float-pattern 20s infinite linear;
}

.pattern-circle:nth-child(1) {
    width: 300px;
    height: 300px;
    top: 10%;
    left: 10%;
    background: linear-gradient(45deg, rgba(255, 182, 193, 0.2), rgba(255, 218, 185, 0.2));
}

.pattern-circle:nth-child(2) {
    width: 200px;
    height: 200px;
    top: 60%;
    right: 15%;
    background: linear-gradient(45deg, rgba(176, 224, 230, 0.2), rgba(240, 248, 255, 0.2));
}

.pattern-circle:nth-child(3) {
    width: 250px;
    height: 250px;
    bottom: 10%;
    left: 30%;
    background: linear-gradient(45deg, rgba(255, 228, 225, 0.2), rgba(255, 240, 245, 0.2));
}

.pattern-star {
    position: absolute;
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-bottom: 100px solid rgba(255, 255, 255, 0.1);
    animation: twinkle 3s infinite;
}

.pattern-star:nth-child(4) { top: 20%; right: 25%; animation-delay: 0s; }
.pattern-star:nth-child(5) { top: 40%; left: 20%; animation-delay: -1s; }
.pattern-star:nth-child(6) { bottom: 30%; right: 40%; animation-delay: -2s; }

@keyframes float-pattern {
    0% { transform: rotate(0deg) translate(20px) rotate(0deg); }
    100% { transform: rotate(360deg) translate(20px) rotate(-360deg); }
}

@keyframes twinkle {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.3; }
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

.floating-vegetable {
    position: absolute;
    font-size: 2rem;
    animation: float 15s infinite linear;
    opacity: 0.3;
}

.floating-vegetable:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-vegetable:nth-child(2) { top: 20%; right: 20%; animation-delay: -3s; }
.floating-vegetable:nth-child(3) { bottom: 30%; left: 30%; animation-delay: -6s; }
.floating-vegetable:nth-child(4) { bottom: 10%; right: 10%; animation-delay: -9s; }
.floating-vegetable:nth-child(5) { top: 50%; left: 50%; animation-delay: -12s; }
.floating-vegetable:nth-child(6) { top: 40%; right: 40%; animation-delay: -15s; }

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
    background: linear-gradient(45deg, #66BB6A, #4CAF50);
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
    background: linear-gradient(45deg, #4CAF50, #66BB6A);
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
    background: linear-gradient(45deg, #2E7D32, #66BB6A, #43A047);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    animation: rainbow 3s infinite;
}

@keyframes rainbow {
    0% { color: #2E7D32; }
    33% { color: #388E3C; }
    66% { color: #43A047; }
    100% { color: #2E7D32; }
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

.vegetables-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.vegetable-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.vegetable-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.root-theme {
    background: linear-gradient(135deg, #FFAB91, #FFE0B2);
}

.green-theme {
    background: linear-gradient(135deg, #A5D6A7, #C8E6C9);
}

.sun-theme {
    background: linear-gradient(135deg, #FFCC80, #FFE0B2);
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
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    border-radius: 50%;
    padding: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: 2px solid rgba(255, 255, 255, 0.5);
    animation: float 3s infinite ease-in-out;
}

.header-icon {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.category-icon:hover .header-icon {
    transform: scale(1.1) rotate(10deg);
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.vegetables-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.vegetable-card {
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

.vegetable-card:hover {
    transform: scale(1.05) translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.vegetable-image {
    background: white;
    border-radius: 15px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 200px;
}

.vegetable-img {
    width: 180px;
    height: 180px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.vegetable-card:hover .vegetable-img {
    transform: scale(1.1);
}

.vegetable-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.vegetable-card p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.sound-button {
    background: linear-gradient(45deg, #66BB6A, #4CAF50);
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
    background: linear-gradient(45deg, #4CAF50, #66BB6A);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.quiz-button {
    display: inline-block;
    background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
    color: white;
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
    position: relative;
    overflow: hidden;
    margin-top: 20px;
}

.quiz-button:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
    text-decoration: none;
    color: white;
}

.quiz-button:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        rgba(255, 255, 255, 0.2),
        rgba(255, 255, 255, 0.5),
        rgba(255, 255, 255, 0.2)
    );
    animation: shine 3s infinite;
}

.quiz-button-content {
    display: flex;
    align-items: center;
    gap: 15px;
    position: relative;
    z-index: 1;
}

.quiz-icon {
    font-size: 2rem;
    animation: bounce 2s infinite;
}

.quiz-text {
    text-align: left;
    display: flex;
    flex-direction: column;
}

.quiz-title-text {
    font-size: 1.4rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.quiz-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
}

.quiz-arrow {
    font-size: 1.5rem;
    margin-left: auto;
    animation: slideRight 1.5s infinite;
}

@keyframes shine {
    0% { left: -100%; }
    20% { left: 100%; }
    100% { left: 100%; }
}

@keyframes slideRight {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(5px); }
}

@media (max-width: 768px) {
    .vegetables-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .title-decoration span {
        font-size: 2rem;
    }

    .floating-vegetable {
        font-size: 1.5rem;
    }

    .pattern-circle {
        width: 150px;
        height: 150px;
    }

    .pattern-star {
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-bottom: 50px solid rgba(255, 255, 255, 0.1);
    }

    .quiz-button {
        padding: 12px 20px;
    }

    .quiz-title-text {
        font-size: 1.2rem;
    }

    .quiz-subtitle {
        font-size: 0.8rem;
    }

    .quiz-icon {
        font-size: 1.5rem;
    }
}
</style>

<script>
function playSound(vegetable) {
    const audio = new Audio(`/audios/legumes/${vegetable}.mp3`);
    audio.play().catch(error => {
        console.log('Erreur lors de la lecture du son:', error);
    });
}
</script>
@endsection 