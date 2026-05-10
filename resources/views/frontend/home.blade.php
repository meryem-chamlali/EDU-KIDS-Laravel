@extends('layouts.app')

@section('content')
<div class="background-elements">
    <div class="floating-element balloon">🎈</div>
    <div class="floating-element star">⭐</div>
    <div class="floating-element cloud">☁️</div>
    <div class="floating-element butterfly">🦋</div>
    <div class="floating-element rainbow">🌈</div>
    <div class="floating-element sun">☀️</div>
    <div class="floating-element bird">🐦</div>
    <div class="floating-element flower">🌸</div>
    <div class="floating-element unicorn">🦄</div>
    <div class="floating-element cat">🐱</div>
    <div class="floating-element dog">🐶</div>
    <div class="floating-element heart">❤️</div>
    <div class="floating-element star2">🌟</div>
    <div class="floating-element moon">🌙</div>
</div>

<div class="container position-relative">
    <div class="hero-section text-center py-5">
        <div class="hero-mascot">🧚‍♀️</div>
        <h1 class="display-4 mb-4 rainbow-text">Bienvenue dans ton Monde Magique !</h1>
        <p class="lead magical-text">Embarque pour une aventure extraordinaire ! ✨</p>
    </div>

    <div class="row mb-5">
        <!-- Section Préscolaire -->
        <div class="col-md-6">
            <a href="{{ route('prescolaire') }}" class="text-decoration-none">
                <div class="card border-primary h-100 main-card candy-card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0">Préscolaire</h2>
                    </div>
                    <div class="card-body text-center">
                        <div class="mascot-container mb-4">
                            <span class="mascot">🎨</span>
                            <span class="mascot-friend">🐰</span>
                        </div>
                        <p class="card-text">Découvre le monde en t'amusant ! Alphabet, chiffres, couleurs et formes t'attendent.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Section Primaire -->
        <div class="col-md-6">
            <a href="{{ route('primaire') }}" class="text-decoration-none">
                <div class="card border-success h-100 main-card candy-card">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4 mb-0">Primaire</h2>
                    </div>
                    <div class="card-body text-center">
                        <div class="mascot-container mb-4">
                            <span class="mascot">📚</span>
                            <span class="mascot-friend">🦊</span>
                        </div>
                        <p class="card-text">Apprends et progresse avec des leçons adaptées à ton niveau !</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Contenu Préscolaire -->
    <div id="prescolaire" class="section-content mb-5" style="display: none;">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Niveaux Préscolaire</h3>
            </div>
            <div class="card-body">
                @if($prescolaire->isEmpty())
                    <p class="text-center">Aucun niveau préscolaire disponible pour le moment.</p>
                @else
                    <div class="row">
                        @foreach($prescolaire as $level)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 level-card">
                                    @if($level->image)
                                        <img src="{{ asset($level->image) }}" class="card-img-top" alt="{{ $level->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="h5">{{ $level->name }}</h4>
                                        <p class="card-text">{{ $level->description }}</p>
                                        <div class="categories-list">
                                            @foreach($level->categories as $category)
                                                <a href="{{ route('categorie.show', $category->id) }}" 
                                                   class="btn btn-outline-primary mb-2">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Contenu Primaire -->
    <div id="primaire" class="section-content mb-5" style="display: none;">
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Niveaux Primaire</h3>
            </div>
            <div class="card-body">
                @if($primaire->isEmpty())
                    <p class="text-center">Aucun niveau primaire disponible pour le moment.</p>
                @else
                    <div class="row">
                        @foreach($primaire as $level)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 level-card">
                                    @if($level->image)
                                        <img src="{{ asset($level->image) }}" class="card-img-top" alt="{{ $level->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="h5">{{ $level->name }}</h4>
                                        <p class="card-text">{{ $level->description }}</p>
                                        <div class="categories-list">
                                            @foreach($level->categories as $category)
                                                <a href="{{ route('categorie.show', $category->id) }}" 
                                                   class="btn btn-outline-success mb-2">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

<style>
body {
    background: linear-gradient(135deg, #FFE5F1 0%, #C7EEFF 50%, #FFF3C7 100%);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
    font-family: 'Comic Sans MS', cursive, sans-serif;
}

.background-elements {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}

.floating-element {
    position: absolute;
    font-size: 3rem;
    animation-duration: 15s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    opacity: 0.7;
    filter: drop-shadow(0 0 5px rgba(255,255,255,0.8));
}

.balloon {
    top: 10%;
    left: 5%;
    animation-name: floatUpDown;
}

.star {
    top: 15%;
    right: 10%;
    animation-name: twinkle;
}

.cloud {
    top: 25%;
    left: 15%;
    animation-name: floatLeftRight;
}

.butterfly {
    top: 35%;
    right: 20%;
    animation-name: flutter;
}

.rainbow {
    top: 5%;
    left: 30%;
    animation-name: fadeInOut;
}

.sun {
    top: 8%;
    right: 25%;
    animation-name: rotate;
}

.bird {
    top: 45%;
    left: 40%;
    animation-name: fly;
}

.flower {
    bottom: 15%;
    right: 15%;
    animation-name: sway;
}

.unicorn {
    top: 60%;
    left: 25%;
    animation-name: bounce;
    font-size: 4rem;
}

.cat {
    top: 75%;
    right: 30%;
    animation-name: wiggle;
}

.dog {
    top: 40%;
    left: 60%;
    animation-name: bounce;
}

.heart {
    top: 20%;
    left: 70%;
    animation-name: pulse;
}

.star2 {
    top: 85%;
    left: 10%;
    animation-name: twinkle;
}

.moon {
    top: 15%;
    right: 5%;
    animation-name: glow;
}

@keyframes floatUpDown {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

@keyframes twinkle {
    0%, 100% { opacity: 0.5; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

@keyframes floatLeftRight {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(20px); }
}

@keyframes flutter {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(10px, -10px) rotate(10deg); }
    50% { transform: translate(0, -20px) rotate(0deg); }
    75% { transform: translate(-10px, -10px) rotate(-10deg); }
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 0.7; }
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes fly {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(30px, -20px) scale(1.1); }
}

@keyframes sway {
    0%, 100% { transform: rotate(-5deg); }
    50% { transform: rotate(5deg); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-30px); }
}

@keyframes wiggle {
    0%, 100% { transform: rotate(-5deg); }
    50% { transform: rotate(5deg); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

@keyframes glow {
    0%, 100% { filter: brightness(1) drop-shadow(0 0 5px rgba(255,255,255,0.8)); }
    50% { filter: brightness(1.3) drop-shadow(0 0 15px rgba(255,255,255,0.9)); }
}

.hero-section {
    background: linear-gradient(135deg, rgba(255, 140, 200, 0.9), rgba(140, 180, 255, 0.9));
        color: white;
    border-radius: 25px;
    margin-bottom: 2rem;
    padding: 3rem !important;
    backdrop-filter: blur(5px);
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
    border: 3px solid rgba(255, 255, 255, 0.5);
    position: relative;
    overflow: hidden;
}

.hero-mascot {
    font-size: 5rem;
    margin-bottom: 1rem;
    animation: float 3s ease-in-out infinite;
}

.rainbow-text {
    background: linear-gradient(to right, 
        #ff0000, #ff7f00, #ffff00, #00ff00, #0000ff, #4b0082, #8f00ff);
    -webkit-background-clip: text;
    color: transparent;
    animation: rainbow 5s linear infinite;
        font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.magical-text {
    font-size: 1.5rem;
    color: #fff;
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff;
    animation: sparkle 2s infinite;
}

.candy-card {
    border-radius: 25px;
    background: linear-gradient(145deg, #ffffff, #f0f0f0);
    border: none;
    box-shadow: 
        0 10px 20px rgba(0,0,0,0.1),
        inset 0 -5px 10px rgba(255,255,255,0.5),
        inset 0 5px 10px rgba(255,255,255,0.5);
    transform-style: preserve-3d;
    transition: all 0.5s ease;
}

.candy-card:hover {
    transform: translateY(-15px) rotate(2deg);
    box-shadow: 
        0 15px 30px rgba(0,0,0,0.2),
        inset 0 -5px 10px rgba(255,255,255,0.5),
        inset 0 5px 10px rgba(255,255,255,0.5);
}

.mascot-container {
    position: relative;
    height: 100px;
}

.mascot {
    font-size: 5rem;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    transition: all 0.3s ease;
}

.mascot-friend {
    font-size: 3rem;
    position: absolute;
    right: 30%;
    bottom: -10px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.candy-card:hover .mascot {
    transform: translateX(-80%) rotate(-10deg);
}

.candy-card:hover .mascot-friend {
    opacity: 1;
    transform: translateY(0);
}

.main-card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.main-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.section-icon {
    width: 120px;
    height: 120px;
    object-fit: contain;
    margin-bottom: 1rem;
}

.level-card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease;
        border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.level-card:hover {
    transform: translateY(-5px);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.categories-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.btn-outline-primary, .btn-outline-success {
    border-radius: 20px;
    padding: 0.5rem 1rem;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.section-content {
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .col-md-6:first-child {
        margin-bottom: 2rem;
    }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sectionLinks = document.querySelectorAll('.section-link');
    const sections = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = this.getAttribute('data-section');
            
            // Masquer toutes les sections
            sections.forEach(section => {
                section.style.display = 'none';
            });
            
            // Afficher la section ciblée
            const targetElement = document.getElementById(targetSection);
            if (targetElement.style.display === 'none') {
                targetElement.style.display = 'block';
            } else {
                targetElement.style.display = 'none';
            }
        });
    });
});
</script>
@endsection

