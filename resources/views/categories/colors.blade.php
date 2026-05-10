@extends('layouts.app')

@section('content')
<div class="colors-world">
    <div class="background-pattern">
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('prescolaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Préscolaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Couleurs</h1>
        <div class="title-decoration">
            <span style="color: #FF0000">●</span>
            <span style="color: #00FF00">●</span>
            <span style="color: #0000FF">●</span>
            <span style="color: #FFFF00">●</span>
        </div>
        <a href="{{ route('colors.quiz') }}" class="quiz-button">
            Faire le Quiz des Couleurs 🎨
        </a>
    </div>

    <div class="colors-container">
        <!-- Couleurs Primaires -->
        <div class="color-category primary-theme">
            <div class="category-header">
                <h2>Couleurs Primaires</h2>
                <div class="category-icon">🎨</div>
            </div>
            <div class="colors-grid">
                <div class="color-card" style="--color: #FF0000">
                    <div class="color-sample"></div>
                    <h3>Rouge</h3>
                    <p>Comme une fraise</p>
                    <button class="sound-button" onclick="playSound('rouge')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #0000FF">
                    <div class="color-sample"></div>
                    <h3>Bleu</h3>
                    <p>Comme le ciel</p>
                    <button class="sound-button" onclick="playSound('bleu')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #FFFF00">
                    <div class="color-sample"></div>
                    <h3>Jaune</h3>
                    <p>Comme le soleil</p>
                    <button class="sound-button" onclick="playSound('jaune')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Couleurs Secondaires -->
        <div class="color-category secondary-theme">
            <div class="category-header">
                <h2>Couleurs Secondaires</h2>
                <div class="category-icon">🌈</div>
            </div>
            <div class="colors-grid">
                <div class="color-card" style="--color: #00FF00">
                    <div class="color-sample"></div>
                    <h3>Vert</h3>
                    <p>Comme l'herbe</p>
                    <button class="sound-button" onclick="playSound('vert')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Autres Couleurs -->
        <div class="color-category other-theme">
            <div class="category-header">
                <h2>Autres Couleurs</h2>
                <div class="category-icon">🎯</div>
            </div>
            <div class="colors-grid">
                <div class="color-card" style="--color: #FFFFFF; border: 2px solid #CCCCCC">
                    <div class="color-sample"></div>
                    <h3>Blanc</h3>
                    <p>Comme la neige</p>
                    <button class="sound-button" onclick="playSound('blanc')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #000000">
                    <div class="color-sample"></div>
                    <h3>Noir</h3>
                    <p>Comme la nuit</p>
                    <button class="sound-button" onclick="playSound('noir')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #A52A2A">
                    <div class="color-sample"></div>
                    <h3>Marron</h3>
                    <p>Comme le chocolat</p>
                    <button class="sound-button" onclick="playSound('marron')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #808080">
                    <div class="color-sample"></div>
                    <h3>Gris</h3>
                    <p>Comme les nuages</p>
                    <button class="sound-button" onclick="playSound('gris')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #FFC0CB">
                    <div class="color-sample"></div>
                    <h3>Rose</h3>
                    <p>Comme les fleurs</p>
                    <button class="sound-button" onclick="playSound('rose')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #40E0D0">
                    <div class="color-sample"></div>
                    <h3>Turquoise</h3>
                    <p>Comme la mer</p>
                    <button class="sound-button" onclick="playSound('turquoise')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #FFD700">
                    <div class="color-sample"></div>
                    <h3>Doré</h3>
                    <p>Comme le soleil</p>
                    <button class="sound-button" onclick="playSound('dore')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="color-card" style="--color: #C0C0C0">
                    <div class="color-sample"></div>
                    <h3>Argenté</h3>
                    <p>Comme la lune</p>
                    <button class="sound-button" onclick="playSound('argente')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.colors-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F0, #E5F0FF, #F0FFE5);
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
    background: linear-gradient(45deg, #4CAF50, #81C784);
}

.pattern-circle:nth-child(3) {
    width: 250px;
    height: 250px;
    bottom: 10%;
    left: 30%;
    background: linear-gradient(45deg, #2196F3, #64B5F6);
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

.colors-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.color-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.color-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.primary-theme {
    background: linear-gradient(135deg, rgba(255, 0, 0, 0.1), rgba(0, 0, 255, 0.1));
}

.secondary-theme {
    background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 0, 255, 0.1));
}

.other-theme {
    background: linear-gradient(135deg, rgba(128, 128, 128, 0.1), rgba(255, 192, 203, 0.1));
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

.colors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1.5rem;
}

.color-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.color-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.color-sample {
    width: 100px;
    height: 100px;
    background-color: var(--color);
    border-radius: 50%;
    margin: 0 auto 1rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.color-card:hover .color-sample {
    transform: scale(1.1);
}

.color-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.color-card p {
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

@media (max-width: 768px) {
    .colors-container {
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
function playSound(color) {
    console.log('Tentative de lecture du son pour:', color);
    const audioPath = `/audios/colors/${color}.mp3`;
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
            alert(`Erreur lors de la lecture du son: ${error.message}\nVérifiez que le fichier existe dans public/audios/colors/`);
        });
}
</script>
@endsection 