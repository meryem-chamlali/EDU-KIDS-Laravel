@extends('layouts.app')

@section('content')
<div class="body-world">
    <div class="background-pattern">
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
        <div class="pattern-circle"></div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Primaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Le Corps Humain</h1>
        <div class="title-decoration">
            <div class="title-icon">
                <img src="/images/corps-humain/torse.PNG" alt="Corps" class="title-img">
            </div>
        </div>
        <a href="{{ route('primaire.corps.quiz') }}" class="quiz-button">
            <div class="quiz-button-content">
                <div class="quiz-icon">🎮</div>
                <div class="quiz-text">
                    <span class="quiz-title-text">Faire le Quiz</span>
                    <span class="quiz-subtitle">Teste tes connaissances sur le corps humain !</span>
                </div>
                <div class="quiz-arrow">→</div>
            </div>
        </a>
    </div>

    <div class="body-container">
        <!-- Parties Principales -->
        <div class="body-category main-parts-theme">
            <div class="category-header">
                <h2>Parties Principales</h2>
                <div class="category-icon">
                    <img src="/images/corps-humain/torse.PNG" alt="Torse" class="header-icon">
                </div>
            </div>
            <div class="body-grid">
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/torse.PNG" alt="Torse" class="body-img">
                    </div>
                    <h3>Le Torse</h3>
                    <p>Le centre du corps</p>
                    <button class="sound-button" onclick="playSound('torse')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/dos.PNG" alt="Dos" class="body-img">
                    </div>
                    <h3>Le Dos</h3>
                    <p>Notre support</p>
                    <button class="sound-button" onclick="playSound('dos')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/bras.PNG" alt="Bras" class="body-img">
                    </div>
                    <h3>Les Bras</h3>
                    <p>Pour attraper et bouger</p>
                    <button class="sound-button" onclick="playSound('bras')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Extrémités -->
        <div class="body-category extremities-theme">
            <div class="category-header">
                <h2>Les Extrémités</h2>
                <div class="category-icon">
                    <img src="/images/corps-humain/mains.PNG" alt="Mains" class="header-icon">
                </div>
            </div>
            <div class="body-grid">
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/mains.PNG" alt="Mains" class="body-img">
                    </div>
                    <h3>Les Mains</h3>
                    <p>Pour toucher et tenir</p>
                    <button class="sound-button" onclick="playSound('mains')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/doigt.PNG" alt="Doigts" class="body-img">
                    </div>
                    <h3>Les Doigts</h3>
                    <p>Pour manipuler</p>
                    <button class="sound-button" onclick="playSound('doigts')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/pieds.PNG" alt="Pieds" class="body-img">
                    </div>
                    <h3>Les Pieds</h3>
                    <p>Pour marcher</p>
                    <button class="sound-button" onclick="playSound('pieds')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Visage -->
        <div class="body-category face-theme">
            <div class="category-header">
                <h2>Le Visage</h2>
                <div class="category-icon">
                    <img src="/images/corps-humain/yeux.PNG" alt="Yeux" class="header-icon">
                </div>
            </div>
            <div class="body-grid">
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/yeux.PNG" alt="Yeux" class="body-img">
                    </div>
                    <h3>Les Yeux</h3>
                    <p>Pour voir</p>
                    <button class="sound-button" onclick="playSound('yeux')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/sourcil.PNG" alt="Sourcils" class="body-img">
                    </div>
                    <h3>Les Sourcils</h3>
                    <p>Pour exprimer</p>
                    <button class="sound-button" onclick="playSound('sourcils')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="body-card">
                    <div class="body-image">
                        <img src="/images/corps-humain/oreille.PNG" alt="Oreilles" class="body-img">
                    </div>
                    <h3>Les Oreilles</h3>
                    <p>Pour entendre</p>
                    <button class="sound-button" onclick="playSound('oreilles')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.body-world {
    min-height: 100vh;
    background: linear-gradient(135deg, #FFE5F1, #E5F2FF, #F1FFE5);
    padding: 2rem;
    font-family: 'Comic Sans MS', cursive, sans-serif;
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

.navigation-bar {
    position: relative;
    z-index: 10;
    margin-bottom: 2rem;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.back-button:hover {
    transform: translateX(-5px) scale(1.02);
    background: linear-gradient(45deg, #FF8E8E, #FF6B6B);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    color: white;
    text-decoration: none;
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

.title-icon {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    animation: bounce 2s infinite;
}

.title-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
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

.quiz-button-content {
    display: flex;
    align-items: center;
    gap: 15px;
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

.body-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.body-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.body-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.main-parts-theme {
    background: linear-gradient(135deg, #FFB74D, #FFE0B2);
}

.extremities-theme {
    background: linear-gradient(135deg, #81C784, #C8E6C9);
}

.face-theme {
    background: linear-gradient(135deg, #64B5F6, #BBDEFB);
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

.body-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.body-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.body-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.body-image {
    width: 150px;
    height: 150px;
    margin: 0 auto 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.body-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.body-card:hover .body-img {
    transform: scale(1.1);
}

.body-card h3 {
    color: #333;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.body-card p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.sound-button {
    background: linear-gradient(45deg, #4CAF50, #66BB6A);
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
    background: linear-gradient(45deg, #66BB6A, #4CAF50);
    transform: scale(1.05);
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes slideRight {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(5px); }
}

@media (max-width: 768px) {
    .body-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .body-card {
        padding: 1rem;
    }

    .body-image {
        width: 120px;
        height: 120px;
    }

    .category-header h2 {
        font-size: 1.5rem;
    }
}
</style>

<script>
function playSound(bodyPart) {
    const audio = new Audio(`/audios/corps-humain/${bodyPart}.mp3`);
    audio.play().catch(error => {
        console.log('Erreur lors de la lecture du son:', error);
    });
}
</script>
@endsection 