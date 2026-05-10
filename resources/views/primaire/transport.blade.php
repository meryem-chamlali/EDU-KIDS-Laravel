@extends('layouts.app')

@section('content')
<div class="transport-world">
    <div class="background-pattern">
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="road"></div>
    </div>

    <div class="floating-decorations">
        <div class="floating-vehicle">✈️</div>
        <div class="floating-vehicle">🚗</div>
        <div class="floating-vehicle">🚂</div>
        <div class="floating-vehicle">⛵</div>
        <div class="floating-vehicle">🚁</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('primaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour au Primaire</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Moyens de Transport</h1>
        <div class="title-decoration">
            <span>🚗</span>
            <span>✈️</span>
            <span>🚂</span>
            <span>⛵</span>
        </div>
        <a href="{{ route('primaire.transport.quiz') }}" class="quiz-button">
            Faire le Quiz 🎯
        </a>
    </div>

    <div class="transport-container">
        <div class="transport-category all-transport-theme">
            <div class="category-header">
                <h2>Les Moyens de Transport</h2>
                <span class="category-icon">🚗✈️⛵</span>
            </div>
            <div class="transport-grid">
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/voiture.png" alt="Voiture" class="transport-img">
                    </div>
                    <h3>La Voiture</h3>
                    <p>Rapide et confortable</p>
                    <button class="sound-button" onclick="playSound('voiture')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/bus.png" alt="Bus" class="transport-img">
                    </div>
                    <h3>Le Bus</h3>
                    <p>Grand et spacieux</p>
                    <button class="sound-button" onclick="playSound('bus')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/train.png" alt="Train" class="transport-img">
                    </div>
                    <h3>Le Train</h3>
                    <p>Long et puissant</p>
                    <button class="sound-button" onclick="playSound('train')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/vélo.png" alt="Vélo" class="transport-img">
                    </div>
                    <h3>Le Vélo</h3>
                    <p>Écologique et sportif</p>
                    <button class="sound-button" onclick="playSound('velo')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/camion.png" alt="Camion" class="transport-img">
                    </div>
                    <h3>Le Camion</h3>
                    <p>Grand et puissant</p>
                    <button class="sound-button" onclick="playSound('camion')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/tram.png" alt="Tram" class="transport-img">
                    </div>
                    <h3>Le Tram</h3>
                    <p>Transport en ville</p>
                    <button class="sound-button" onclick="playSound('tram')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/taxi.png" alt="Taxi" class="transport-img">
                    </div>
                    <h3>Le Taxi</h3>
                    <p>Transport rapide en ville</p>
                    <button class="sound-button" onclick="playSound('taxi')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/a pied.png" alt="À pied" class="transport-img">
                    </div>
                    <h3>À Pied</h3>
                    <p>Marcher en ville</p>
                    <button class="sound-button" onclick="playSound('pieton')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/motor.png" alt="Moto" class="transport-img">
                    </div>
                    <h3>La Moto</h3>
                    <p>Rapide et agile</p>
                    <button class="sound-button" onclick="playSound('moto')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/avion.png" alt="Avion" class="transport-img">
                    </div>
                    <h3>L'Avion</h3>
                    <p>Vole très haut</p>
                    <button class="sound-button" onclick="playSound('avion')">
                        🔊 Écouter
                    </button>
                </div>
                <div class="transport-card">
                    <div class="transport-image">
                        <img src="/images/transport/bateau.png" alt="Bateau" class="transport-img">
                    </div>
                    <h3>Le Bateau</h3>
                    <p>Grand et majestueux</p>
                    <button class="sound-button" onclick="playSound('bateau')">
                        🔊 Écouter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.transport-world {
    min-height: 100vh;
    background: linear-gradient(180deg, #87CEEB, #E0F7FA);
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

.cloud {
    position: absolute;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50px;
    animation: float-cloud 30s infinite linear;
}

.cloud:before,
.cloud:after {
    content: '';
    position: absolute;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
}

.cloud:nth-child(1) {
    width: 200px;
    height: 60px;
    top: 20%;
    left: -200px;
    animation-delay: 0s;
}

.cloud:nth-child(2) {
    width: 160px;
    height: 50px;
    top: 40%;
    left: -160px;
    animation-delay: -10s;
}

.cloud:nth-child(3) {
    width: 180px;
    height: 55px;
    top: 60%;
    left: -180px;
    animation-delay: -20s;
}

.road {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background: #555;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
}

.road:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 6px;
    background: #fff;
    transform: translateY(-50%);
    background-image: linear-gradient(90deg, #fff 50%, transparent 50%);
    background-size: 40px 100%;
    animation: move-road 1s linear infinite;
}

@keyframes float-cloud {
    from { transform: translateX(0); left: -200px; }
    to { transform: translateX(calc(100vw + 400px)); }
}

@keyframes move-road {
    from { background-position: 0 0; }
    to { background-position: 40px 0; }
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

.floating-vehicle {
    position: absolute;
    font-size: 2rem;
    animation: float 20s infinite linear;
}

.floating-vehicle:nth-child(1) { top: 15%; left: 10%; animation-delay: 0s; }
.floating-vehicle:nth-child(2) { top: 30%; right: 15%; animation-delay: -4s; }
.floating-vehicle:nth-child(3) { bottom: 25%; left: 20%; animation-delay: -8s; }
.floating-vehicle:nth-child(4) { bottom: 15%; right: 25%; animation-delay: -12s; }
.floating-vehicle:nth-child(5) { top: 45%; left: 40%; animation-delay: -16s; }

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(10deg); }
    66% { transform: translate(-20px, 20px) rotate(-5deg); }
    100% { transform: translate(0, 0) rotate(0deg); }
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
    padding: 12px 25px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.back-button:hover {
    transform: translateX(-5px);
    background: linear-gradient(45deg, #FF8E8E, #FF6B6B);
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
    background: linear-gradient(45deg, #2196F3, #03A9F4, #00BCD4);
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

.transport-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
    position: relative;
    z-index: 2;
}

.transport-category {
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.transport-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.all-transport-theme {
    background: linear-gradient(135deg, #64B5F6, #81C784);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

.transport-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    padding: 1rem;
}

.transport-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.transport-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.transport-image {
    background: white;
    border-radius: 15px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 220px;
}

.transport-img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.transport-card:hover .transport-img {
    transform: scale(1.1);
}

.transport-card h3 {
    color: #2C3E50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.transport-card p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.sound-button {
    background: linear-gradient(45deg, #2196F3, #4CAF50);
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
    background: linear-gradient(45deg, #4CAF50, #2196F3);
    transform: scale(1.05);
}

.quiz-button {
    display: inline-block;
    margin-top: 1.5rem;
    padding: 15px 30px;
    background: linear-gradient(45deg, #FF4081, #FF80AB);
    color: white;
    border-radius: 50px;
    font-size: 1.3rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.quiz-button:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #FF80AB, #FF4081);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .transport-container {
        grid-template-columns: 1fr;
    }

    .page-title h1 {
        font-size: 2.5rem;
    }

    .title-decoration span {
        font-size: 2rem;
    }

    .floating-vehicle {
        font-size: 1.5rem;
    }

    .cloud {
        transform: scale(0.7);
    }

    .road {
        height: 40px;
    }
}
</style>

<script>
function playSound(vehicle) {
    console.log('Tentative de lecture du son pour:', vehicle);
    const audioPath = `/audios/transports/${vehicle}.mp3`;
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
            alert(`Erreur lors de la lecture du son: ${error.message}\nVérifiez que le fichier existe dans public/audios/transports/`);
        });
}
</script>
@endsection 