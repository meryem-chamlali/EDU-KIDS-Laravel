@extends('layouts.app')

@section('content')
<div class="animal-world">
    <div class="clouds">
        <div class="cloud" style="--delay: 0s">☁️</div>
        <div class="cloud" style="--delay: 5s">☁️</div>
        <div class="cloud" style="--delay: 10s">☁️</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Le Monde des Animaux</h1>
        <div class="title-decoration">
            <span>🦁</span>
            <span>🐘</span>
            <span>🐎</span>
            <span>🐕</span>
        </div>
        <a href="{{ route('primaire.animaux.quiz') }}" class="quiz-button">
            Faire le Quiz des Animaux 🦁
        </a>
    </div>

    <div class="animals-container">
        <div class="animals-grid">
            <!-- Animaux domestiques -->
            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/chien.jpg" alt="Chien" class="animal-image">
                </div>
                <h3>Le Chien</h3>
                <p>Le meilleur ami de l'homme</p>
                <button class="sound-button" onclick="playSound('chien')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/chat.jpg" alt="Chat" class="animal-image">
                </div>
                <h3>Le Chat</h3>
                <p>Un compagnon indépendant</p>
                <button class="sound-button" onclick="playSound('chat')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/oiseau.jpg" alt="Oiseau" class="animal-image">
                </div>
                <h3>L'Oiseau</h3>
                <p>Il chante joliment</p>
                <button class="sound-button" onclick="playSound('oiseau')">
                    🔊 Écouter
                </button>
            </div>

            <!-- Animaux de la ferme -->
            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/vache.jpg" alt="Vache" class="animal-image">
                </div>
                <h3>La Vache</h3>
                <p>Elle nous donne du lait</p>
                <button class="sound-button" onclick="playSound('vache')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/cheval.jpg" alt="Cheval" class="animal-image">
                </div>
                <h3>Le Cheval</h3>
                <p>Un animal rapide et fort</p>
                <button class="sound-button" onclick="playSound('cheval')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/canard.jpg" alt="Canard" class="animal-image">
                </div>
                <h3>Le Canard</h3>
                <p>Il nage dans la mare</p>
                <button class="sound-button" onclick="playSound('canard')">
                    🔊 Écouter
                </button>
            </div>

            <!-- Animaux sauvages -->
            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/lion.jpg" alt="Lion" class="animal-image">
                </div>
                <h3>Le Lion</h3>
                <p>Le roi de la jungle</p>
                <button class="sound-button" onclick="playSound('lion')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/elephant.jpg" alt="Éléphant" class="animal-image">
                </div>
                <h3>L'Éléphant</h3>
                <p>Le plus grand mammifère terrestre</p>
                <button class="sound-button" onclick="playSound('elephant')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/singe.jpg" alt="Singe" class="animal-image">
                </div>
                <h3>Le Singe</h3>
                <p>Un animal très intelligent</p>
                <button class="sound-button" onclick="playSound('singe')">
                    🔊 Écouter
                </button>
            </div>

            <div class="animal-card">
                <div class="image-container">
                    <img src="/images/animaux/dauphin.jpg" alt="Dauphin" class="animal-image">
                </div>
                <h3>Le Dauphin</h3>
                <p>Un mammifère marin joueur</p>
                <button class="sound-button" onclick="playSound('dauphin')">
                    🔊 Écouter
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.animal-world {
    min-height: 100vh;
    background: linear-gradient(180deg, #87CEEB, #E0F7FA);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.clouds {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.cloud {
    position: absolute;
    font-size: 4rem;
    animation: float-cloud 30s linear infinite;
    opacity: 0.7;
    animation-delay: var(--delay);
}

@keyframes float-cloud {
    from { transform: translateX(-100px); }
    to { transform: translateX(calc(100vw + 100px)); }
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
}

.page-title h1 {
    font-size: 3.5rem;
    color: #2C3E50;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.title-decoration {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 1.5rem;
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

.animals-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.animals-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
}

.animal-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.animal-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.image-container {
    width: 100%;
    height: 200px;
    margin-bottom: 1.5rem;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
}

.animal-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.animal-card:hover .animal-image {
    transform: scale(1.1);
}

.animal-card h3 {
    color: #2C3E50;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.animal-card p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
}

.sound-button {
    background: linear-gradient(45deg, #FF6B6B, #FF8787);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.sound-button:hover {
    background: linear-gradient(45deg, #FF8787, #FF6B6B);
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .page-title h1 {
        font-size: 2.5rem;
    }

    .animals-container {
        padding: 1rem;
    }

    .animals-grid {
        grid-template-columns: 1fr;
    }

    .image-container {
        height: 180px;
    }
}
</style>

<script>
function playSound(animal) {
    const audio = new Audio(`/audios/animaux/${animal}.mp3`);
    audio.play().catch(error => {
        console.error('Erreur lors de la lecture du son:', error);
        alert('Le son n\'est pas disponible pour cet animal.');
    });
}
</script>
@endsection 