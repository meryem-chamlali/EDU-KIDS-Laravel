@extends('layouts.frontend')

@section('content')
<div class="numbers-container">
    <div class="floating-elements">
        <div class="floating-element">🎈</div>
        <div class="floating-element">🌟</div>
        <div class="floating-element">🦊</div>
        <div class="floating-element">🐰</div>
        <div class="floating-element">🦁</div>
        <div class="floating-element">🐼</div>
        <div class="floating-element">🐘</div>
        <div class="floating-element">🦒</div>
        <div class="floating-element">🦋</div>
        <div class="floating-element">🌈</div>
        <div class="floating-element">⭐</div>
        <div class="floating-element">🎨</div>
        <div class="floating-element">🎭</div>
        <div class="floating-element">🎪</div>
        <div class="floating-element">🎯</div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="page-header">
            <h1 class="page-title">Les Nombres Magiques</h1>
            <p class="page-subtitle">Découvre les nombres en t'amusant ! 🎈</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($numbers as $number)
                <div class="number-card">
                    <div class="card-content">
                        <div class="number-image">
                            @if(file_exists(public_path($number['image'])))
                                <img src="{{ asset($number['image']) }}" 
                                     alt="Nombre {{ $number['number'] }}" 
                                     class="w-full h-full object-contain">
                            @else
                                <div class="placeholder-number">
                                    <span class="number-emoji">{{ $number['number'] }}️⃣</span>
                                </div>
                            @endif
                        </div>
                        <div class="number-info">
                            <h2 class="number-value">{{ $number['number'] }}</h2>
                            <p class="number-word">{{ $number['word'] }}</p>
                            <button onclick="playNumberSound({{ $number['number'] }})" 
                                    class="listen-button">
                                <span class="button-icon">🔊</span>
                                <span class="button-text">Écouter</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('numbers.quiz') }}" class="quiz-button mx-4">
                <span class="button-icon">🎯</span>
                <span class="button-text">Jouer au Quiz</span>
            </a>
            <a href="{{ route('prescolaire') }}" class="back-button mx-4">
                <span class="button-icon">←</span>
                <span class="button-text">Retour au Préscolaire</span>
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function playAudio(audioUrl) {
        const audio = new Audio(audioUrl);
        audio.play().catch(error => {
            console.error('Erreur lors de la lecture audio:', error);
        });
    }

    function playNumberSound(number) {
        // Animation de la carte
        const card = event.currentTarget;
        card.classList.add('pulse-animation');
        
        // Mapper les nombres aux noms de fichiers audio
        const audioFiles = {
            '1': 'UNfr.mp3',
            '2': 'deux.mp3',
            '3': 'TROISFR.mp3',
            '4': 'QUATREfr.mp3',
            '5': 'cinq.mp3',
            '6': 'sixfr.mp3',
            '7': 'septfr.mp3',
            '8': 'huit.mp3',
            '9': 'neuffr.mp3',
            '10': 'dix.mp3',
            '11': 'onzefr.mp3',
            '12': 'douz.mp3',
            '13': 'treizefr.mp3',
            '14': 'QUATORZEFR.mp3',
            '15': 'QUINZFR.mp3',
            '16': 'SEIZEFR.mp3',
            '17': 'dix-sept.mp3',
            '18': 'dix-huit.mp3',
            '19': 'dix-neuf.mp3',
            '20': 'veigntfr.mp3'
        };
        
        const audioFileName = audioFiles[number];
        if (audioFileName) {
            const audio = new Audio(`/audios/chiffres/${audioFileName}`);
            audio.play().catch(error => {
                console.error('Erreur lors de la lecture du son:', error);
                alert('Le son n\'est pas disponible pour ce nombre.');
            });
        } else {
            alert('Le son n\'est pas disponible pour ce nombre.');
        }
        
        // Retirer l'animation après 1 seconde
        setTimeout(() => {
            card.classList.remove('pulse-animation');
        }, 1000);
    }

    // Animation d'apparition des cartes
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.number-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
@endpush

@push('styles')
<style>
    .numbers-container {
        background: #FFF5E6;
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        background-image: 
            radial-gradient(#FFB6C1 2px, transparent 2px),
            radial-gradient(#87CEEB 2px, transparent 2px);
        background-size: 40px 40px;
        background-position: 0 0, 20px 20px;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% { background-position: 0 0, 20px 20px; }
        100% { background-position: 40px 40px, 60px 60px; }
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    .floating-element {
        position: absolute;
        font-size: 2rem;
        animation: float 15s infinite linear;
        opacity: 0.4;
    }

    .floating-element:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
    .floating-element:nth-child(2) { top: 20%; right: 10%; animation-delay: 2s; }
    .floating-element:nth-child(3) { top: 40%; left: 15%; animation-delay: 4s; }
    .floating-element:nth-child(4) { top: 60%; right: 20%; animation-delay: 6s; }
    .floating-element:nth-child(5) { top: 80%; left: 25%; animation-delay: 8s; }
    .floating-element:nth-child(6) { top: 30%; left: 30%; animation-delay: 10s; }
    .floating-element:nth-child(7) { top: 50%; right: 35%; animation-delay: 12s; }
    .floating-element:nth-child(8) { top: 70%; left: 40%; animation-delay: 14s; }
    .floating-element:nth-child(9) { top: 90%; right: 45%; animation-delay: 16s; }
    .floating-element:nth-child(10) { top: 15%; left: 50%; animation-delay: 18s; }
    .floating-element:nth-child(11) { top: 25%; left: 60%; animation-delay: 20s; }
    .floating-element:nth-child(12) { top: 35%; right: 55%; animation-delay: 22s; }
    .floating-element:nth-child(13) { top: 45%; left: 70%; animation-delay: 24s; }
    .floating-element:nth-child(14) { top: 55%; right: 65%; animation-delay: 26s; }
    .floating-element:nth-child(15) { top: 65%; left: 80%; animation-delay: 28s; }

    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(20px, 20px) rotate(180deg); }
        100% { transform: translate(0, 0) rotate(360deg); }
    }

    .page-header {
        position: relative;
        margin-bottom: 3rem;
        z-index: 1;
    }

    .page-title {
        font-family: 'Comic Sans MS', cursive;
        font-size: 3.5rem;
        color: #FF6B6B;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 
            3px 3px 0 #FFF,
            -3px 3px 0 #FFF,
            3px -3px 0 #FFF,
            -3px -3px 0 #FFF;
        animation: bounce 2s infinite;
    }

    .page-subtitle {
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.5rem;
        color: #4A90E2;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 0 #FFF;
    }

    .number-card {
        background: white;
        border-radius: 25px;
        padding: 1.5rem;
        box-shadow: 
            0 10px 20px rgba(0,0,0,0.1),
            0 0 0 5px #FFB6C1,
            0 0 0 10px #FFF,
            0 0 0 15px #87CEEB;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
        cursor: pointer;
        overflow: hidden;
    }

    .number-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 
            0 15px 30px rgba(0,0,0,0.15),
            0 0 0 5px #FFB6C1,
            0 0 0 10px #FFF,
            0 0 0 15px #87CEEB;
    }

    .number-value {
        font-family: 'Comic Sans MS', cursive;
        font-size: 3.5rem;
        color: #FF6B6B;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 0 #FFB6C1;
    }

    .number-word {
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.5rem;
        color: #4A90E2;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 0 #87CEEB;
    }

    .listen-button {
        background: linear-gradient(135deg, #FF6B6B, #FFB6C1);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        box-shadow: 0 4px 0 #FF6B6B;
    }

    .listen-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 0 #FF6B6B;
    }

    .listen-button:active {
        transform: translateY(2px);
        box-shadow: 0 2px 0 #FF6B6B;
    }

    .back-button {
        background: linear-gradient(135deg, #4A90E2, #87CEEB);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 1rem 2rem;
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        box-shadow: 0 4px 0 #4A90E2;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 0 #4A90E2;
    }

    .back-button:active {
        transform: translateY(2px);
        box-shadow: 0 2px 0 #4A90E2;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .pulse-animation {
        animation: pulse 0.5s ease-in-out;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
        }
        
        .number-value {
            font-size: 2.5rem;
        }
        
        .number-word {
            font-size: 1.2rem;
        }
    }

    .quiz-button {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #FFB347 0%, #FFCC33 100%);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 179, 71, 0.4);
    }

    .quiz-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 179, 71, 0.6);
    }

    .quiz-button .button-icon {
        margin-right: 0.5rem;
        font-size: 1.4rem;
    }

    .quiz-button:active {
        transform: translateY(1px);
        box-shadow: 0 2px 10px rgba(255, 179, 71, 0.4);
    }
</style>
@endpush
@endsection 