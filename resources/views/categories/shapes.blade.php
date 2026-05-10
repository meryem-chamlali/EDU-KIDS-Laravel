@extends('layouts.app')

@section('content')
<div class="shapes-world">
    <div class="shapes-background">
        <div class="shape shape-1">🔷</div>
        <div class="shape shape-2">🔶</div>
        <div class="shape shape-3">🔵</div>
        <div class="shape shape-4">🔺</div>
        <div class="shape shape-5">🔸</div>
    </div>

    <div class="navigation-bar">
        <a href="{{ route('prescolaire') }}" class="back-button">
            <span class="back-arrow">←</span>
            <span class="back-text">Retour</span>
        </a>
    </div>

    <div class="page-title">
        <h1>Les Formes Géométriques</h1>
        <div class="title-decoration">
            <span>🔷</span>
            <span>🔶</span>
            <span>🔵</span>
            <span>🔺</span>
        </div>
        <a href="{{ route('categories.shapes.quiz') }}" class="quiz-button">
            Faire le Quiz des Formes 🎯
        </a>
    </div>

    <div class="shapes-container">
        <div class="shapes-grid">
            @foreach($shapes as $shape)
            <div class="shape-card">
                <div class="image-container">
                    <img src="/images/shapes/{{ $shape['image'] }}" alt="{{ $shape['name'] }}" class="shape-image">
                </div>
                <h3>{{ ucfirst($shape['name']) }}</h3>
                <button class="sound-button" onclick="playShapeSound('{{ $shape['name'] }}')">
                    🔊 Écouter
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.shapes-world {
    min-height: 100vh;
    background: linear-gradient(180deg, #E0F7FA, #B2EBF2);
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.shapes-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.shape {
    position: absolute;
    font-size: 3rem;
    opacity: 0.2;
    animation: float-shape 20s linear infinite;
}

.shape-1 { top: 10%; left: 5%; animation-delay: 0s; }
.shape-2 { top: 30%; right: 10%; animation-delay: 4s; }
.shape-3 { top: 50%; left: 15%; animation-delay: 8s; }
.shape-4 { top: 70%; right: 20%; animation-delay: 12s; }
.shape-5 { top: 90%; left: 25%; animation-delay: 16s; }

@keyframes float-shape {
    0% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
    100% { transform: translateY(0) rotate(360deg); }
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

.shapes-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.shapes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
}

.shape-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.shape-card:hover {
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

.shape-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: all 0.5s ease;
}

.shape-card:hover .shape-image {
    transform: scale(1.1);
}

.shape-card h3 {
    color: #2C3E50;
    font-size: 1.5rem;
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

    .shapes-container {
        padding: 1rem;
    }

    .shapes-grid {
        grid-template-columns: 1fr;
    }

    .image-container {
        height: 180px;
    }
}
</style>

<script>
function playShapeSound(shapeName) {
    const audio = new Audio(`/audios/formes/${shapeName}.mp3`);
    audio.play().catch(error => {
        console.error('Erreur lors de la lecture du son:', error);
        alert('Le son n\'est pas disponible pour cette forme.');
    });
}
</script>
@endsection 