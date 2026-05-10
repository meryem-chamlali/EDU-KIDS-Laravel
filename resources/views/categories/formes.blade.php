@extends('layouts.app')

@section('content')
<div class="shapes-world">
    <div class="background-pattern">
        <div class="pattern-shape circle"></div>
        <div class="pattern-shape square"></div>
        <div class="pattern-shape triangle"></div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('prescolaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Préscolaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Formes Géométriques</h1>
        <div class="title-decoration">
            <span>⭕</span>
            <span>⬜</span>
            <span>△</span>
            <span>⬡</span>
        </div>
        <a href="{{ route('formes.quiz') }}" class="quiz-button">
            Faire le Quiz des Formes 📐
        </a>
    </div>

    <div class="shapes-container">
        <!-- Formes de Base -->
        <div class="shape-category basic-theme">
            <div class="category-header">
                <h2>Formes de Base</h2>
                <div class="category-icon">📐</div>
            </div>
            <div class="shapes-grid">
                <div class="shape-card">
                    <div class="shape-display circle"></div>
                    <h3>Cercle</h3>
                    <p>Rond comme une balle</p>
                    <button class="sound-button" onclick="playSound('cercle')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display square"></div>
                    <h3>Carré</h3>
                    <p>4 côtés égaux</p>
                    <button class="sound-button" onclick="playSound('carre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display triangle"></div>
                    <h3>Triangle</h3>
                    <p>3 côtés et 3 angles</p>
                    <button class="sound-button" onclick="playSound('triangle')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Formes à 4 côtés -->
        <div class="shape-category rectangle-theme">
            <div class="category-header">
                <h2>Formes à 4 côtés</h2>
                <div class="category-icon">📏</div>
            </div>
            <div class="shapes-grid">
                <div class="shape-card">
                    <div class="shape-display rectangle"></div>
                    <h3>Rectangle</h3>
                    <p>Plus long que large</p>
                    <button class="sound-button" onclick="playSound('rectangle')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display diamond"></div>
                    <h3>Losange</h3>
                    <p>Carré sur la pointe</p>
                    <button class="sound-button" onclick="playSound('losange')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display parallelogramme"></div>
                    <h3>Parallélogramme</h3>
                    <p>Côtés parallèles</p>
                    <button class="sound-button" onclick="playSound('parallelogramme')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display trapezoid"></div>
                    <h3>Trapèze</h3>
                    <p>Deux côtés parallèles</p>
                    <button class="sound-button" onclick="playSound('trapeze')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Formes à plusieurs côtés -->
        <div class="shape-category special-theme">
            <div class="category-header">
                <h2>Formes à plusieurs côtés</h2>
                <div class="category-icon">⭐</div>
            </div>
            <div class="shapes-grid">
                <div class="shape-card">
                    <div class="shape-display pentagon"></div>
                    <h3>Pentagone</h3>
                    <p>5 côtés</p>
                    <button class="sound-button" onclick="playSound('pentagone')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display hexagon"></div>
                    <h3>Hexagone</h3>
                    <p>6 côtés</p>
                    <button class="sound-button" onclick="playSound('hexagone')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <div class="shape-display octagon"></div>
                    <h3>Octogone</h3>
                    <p>8 côtés</p>
                    <button class="sound-button" onclick="playSound('octogone')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Formes courbes -->
        <div class="shape-category curve-theme">
            <div class="category-header">
                <h2>Formes courbes</h2>
                <div class="category-icon">⭕</div>
            </div>
            <div class="shapes-grid">
                <div class="shape-card">
                    <div class="shape-display ellipse"></div>
                    <h3>Ellipse</h3>
                    <p>Cercle allongé</p>
                    <button class="sound-button" onclick="playSound('ellipse')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Légumes -->
        <div class="shape-category vegetables-theme">
            <div class="category-header">
                <h2>Les Légumes</h2>
                <div class="category-icon">🥬</div>
            </div>
            <div class="shapes-grid">
                <div class="shape-card">
                    <img src="/images/legumes/carrote.PNG" alt="Carotte" class="vegetable-image">
                    <h3>Carotte</h3>
                    <button class="sound-button" onclick="playSound('carotte')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/ognion.PNG" alt="Oignon" class="vegetable-image">
                    <h3>Oignon</h3>
                    <button class="sound-button" onclick="playSound('oignon')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/brocoli.PNG" alt="Brocoli" class="vegetable-image">
                    <h3>Brocoli</h3>
                    <button class="sound-button" onclick="playSound('brocoli')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/pomme de terre.PNG" alt="Pomme de terre" class="vegetable-image">
                    <h3>Pomme de terre</h3>
                    <button class="sound-button" onclick="playSound('pomme de terre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/Salade.PNG" alt="Salade" class="vegetable-image">
                    <h3>Salade</h3>
                    <button class="sound-button" onclick="playSound('salade')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/tomate.PNG" alt="Tomate" class="vegetable-image">
                    <h3>Tomate</h3>
                    <button class="sound-button" onclick="playSound('tomate')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/concombre.PNG" alt="Concombre" class="vegetable-image">
                    <h3>Concombre</h3>
                    <button class="sound-button" onclick="playSound('concombre')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/epinards.PNG" alt="Épinards" class="vegetable-image">
                    <h3>Épinards</h3>
                    <button class="sound-button" onclick="playSound('epinards')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/aubergine.PNG" alt="Aubergine" class="vegetable-image">
                    <h3>Aubergine</h3>
                    <button class="sound-button" onclick="playSound('aubergine')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/courgette.PNG" alt="Courgette" class="vegetable-image">
                    <h3>Courgette</h3>
                    <button class="sound-button" onclick="playSound('courgette')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/poivron.PNG" alt="Poivron" class="vegetable-image">
                    <h3>Poivron</h3>
                    <button class="sound-button" onclick="playSound('poivron')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/ail.PNG" alt="Ail" class="vegetable-image">
                    <h3>Ail</h3>
                    <button class="sound-button" onclick="playSound('ail')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="shape-card">
                    <img src="/images/legumes/chou fleur.PNG" alt="Chou-fleur" class="vegetable-image">
                    <h3>Chou-fleur</h3>
                    <button class="sound-button" onclick="playSound('chou fleur')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.shapes-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #E1F5FE, #F3E5F5, #E8F5E9);
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

.pattern-shape {
    position: absolute;
    opacity: 0.1;
    animation: float-pattern 20s infinite linear;
}

.pattern-shape.circle {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: #FF69B4;
    top: 10%;
    left: 10%;
}

.pattern-shape.square {
    width: 150px;
    height: 150px;
    background: #4CAF50;
    top: 60%;
    right: 15%;
    transform: rotate(45deg);
}

.pattern-shape.triangle {
    width: 0;
    height: 0;
    border-left: 100px solid transparent;
    border-right: 100px solid transparent;
    border-bottom: 173px solid #2196F3;
    bottom: 10%;
    left: 30%;
}

@keyframes float-pattern {
    0% { transform: rotate(0deg) translate(20px) rotate(0deg); }
    100% { transform: rotate(360deg) translate(20px) rotate(-360deg); }
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
    background: linear-gradient(45deg, #FF6B6B, #4CAF50, #2196F3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
}

.title-decoration {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 1rem;
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
    50% { transform: translateY(-15px); }
}

.quiz-button {
    display: inline-block;
    background: linear-gradient(45deg, #4CAF50, #81C784);
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.quiz-button:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #81C784, #4CAF50);
    color: white;
    text-decoration: none;
}

.shapes-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.shape-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.shape-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.basic-theme {
    background: linear-gradient(135deg, rgba(255, 87, 34, 0.1), rgba(33, 150, 243, 0.1));
}

.rectangle-theme {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(156, 39, 176, 0.1));
}

.special-theme {
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(233, 30, 99, 0.1));
}

.vegetables-theme {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(139, 195, 74, 0.1));
}

.category-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-bottom: 2rem;
}

.category-header h2 {
    color: #2C3E50;
    font-size: 2rem;
    margin: 0;
}

.category-icon {
    font-size: 2rem;
    animation: wiggle 3s infinite;
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-10deg); }
    75% { transform: rotate(10deg); }
}

.shapes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1.5rem;
}

.shape-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.shape-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.shape-display {
    width: 100px;
    height: 100px;
    margin: 0 auto 1rem;
    transition: all 0.3s ease;
}

.shape-card:hover .shape-display {
    transform: scale(1.1) rotate(360deg);
}

/* Formes spécifiques */
.circle {
    border-radius: 50%;
    background: #FF5722;
}

.square {
    background: #2196F3;
}

.triangle {
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-bottom: 87px solid #4CAF50;
    background: transparent;
}

.rectangle {
    background: #9C27B0;
    height: 60px;
}

.oval {
    background: #FF9800;
    border-radius: 50%;
    height: 60px;
}

.star {
    background: #FFC107;
    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
}

.heart {
    background: #E91E63;
    position: relative;
    transform: rotate(-45deg);
}

.heart::before,
.heart::after {
    content: '';
    width: 100px;
    height: 100px;
    background: #E91E63;
    border-radius: 50%;
    position: absolute;
}

.heart::before {
    top: -50px;
    left: 0;
}

.heart::after {
    top: 0;
    left: 50px;
}

.diamond {
    background: #673AB7;
    transform: rotate(45deg);
}

.shape-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.shape-card p {
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
}

.sound-button:hover {
    background: linear-gradient(45deg, #FF8787, #FF6B6B);
    transform: scale(1.05);
}

.vegetable-image {
    width: 100px;
    height: 100px;
    object-fit: contain;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .shapes-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .title-decoration span {
        font-size: 2rem;
    }

    .category-header h2 {
        font-size: 1.5rem;
    }
}
</style>

<script>
function playSound(formes) {
    console.log('Tentative de lecture du son pour:', formes);
    const audioPath = `/audios/formes/${formes}.mp3`;
    console.log('Chemin du fichier audio:', audioPath);
    
    const audio = new Audio(audioPath);
    
    // Vérifier si le fichier existe
    fetch(audioPath)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Fichier non trouvé: ${audioPath}`);
            }
            console.log('Fichier audio trouvé, tentative de lecture...');
            return audio.play();
        })
        .then(() => {
            console.log('Lecture du son réussie');
        })
        .catch(error => {
            console.error('Erreur détaillée:', error);
            alert(`Erreur lors de la lecture du son: ${error.message}\nVérifiez que le fichier existe dans public/audios/formes/`);
        });
}
</script>
@endsection 