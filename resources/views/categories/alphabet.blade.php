@extends('layouts.frontend')

@section('content')
<div class="alphabet-container">
    <div class="floating-elements">
        <div class="floating-element">📚</div>
        <div class="floating-element">✏️</div>
        <div class="floating-element">📝</div>
        <div class="floating-element">🎨</div>
        <div class="floating-element">🌈</div>
        <div class="floating-element">⭐</div>
        <div class="floating-element">🎯</div>
        <div class="floating-element">🎪</div>
        <div class="floating-element">🦋</div>
        <div class="floating-element">🌺</div>
        <div class="floating-element">🍎</div>
        <div class="floating-element">🎵</div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="page-header">
            <h1 class="page-title">L'Alphabet Magique</h1>
            <p class="page-subtitle">Découvre les lettres en t'amusant ! ✨</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($letters as $letter)
                <div class="letter-card">
                    <div class="card-content">
                        <div class="letter-image">
                            @if(isset($letter['image']) && file_exists(public_path($letter['image'])))
                                <img src="{{ asset($letter['image']) }}" 
                                     alt="Lettre {{ $letter['letter'] ?? '' }}" 
                                     class="w-full h-full object-contain">
                            @else
                                <div class="placeholder-letter">
                                    <span class="letter-text">{{ $letter['letter'] ?? '' }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="letter-info">
                            <h2 class="letter-value">{{ $letter['letter'] ?? '' }}</h2>
                            <p class="letter-word">{{ $letter['mot'] ?? $letter['word'] ?? 'Exemple' }}</p>
                            <button onclick="playLetterSound('{{ $letter['letter'] ?? '' }}')" 
                                    class="listen-button">
                                <span class="button-icon">🔊</span>
                                <span class="button-text">Écouter</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="quiz-section">
            <a href="{{ route('alphabet.quiz') }}" class="quiz-button">
                <div class="quiz-button-content">
                    <span class="quiz-icon">🎯</span>
                    <div class="quiz-text">
                        <h3>Quiz de l'Alphabet</h3>
                        <p>Teste tes connaissances en t'amusant !</p>
                    </div>
                    <span class="arrow-icon">→</span>
                </div>
            </a>
        </div>

        <div class="text-center mt-8">
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

    function playLetterSound(letter) {
        const card = event.currentTarget;
        card.classList.add('pulse-animation');
        
        let audioFileName;
        if (letter === 'A') {
            audioFileName = 'Afr.mp3';
        } else if (letter === 'B') {
            audioFileName = 'BFR.mp3';
        } else if (letter === 'C') {
            audioFileName = 'C.mp3';
        } else if (letter === 'D') {
            audioFileName = 'DFR.mp3';
        } else if (letter === 'E') {
            audioFileName = 'EFR.mp3';
        } else if (letter === 'F') {
            audioFileName = 'FFR.mp3';
        } else if (letter === 'R') {
            audioFileName = 'R.mp3';
        } else {
            audioFileName = `${letter} FR.mp3`;
        }
        
        const audio = new Audio(`/audios/alphabet/${audioFileName}`);
        audio.play().catch(error => {
            console.error('Erreur lors de la lecture du son:', error);
            alert('Le son n\'est pas disponible pour cette lettre.');
        });
        
        setTimeout(() => {
            card.classList.remove('pulse-animation');
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.letter-card');
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
    .alphabet-container {
        background: #F0F8FF;
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        background-image: 
            radial-gradient(circle at 50% 50%, #FFC0CB 1px, transparent 1px),
            radial-gradient(circle at 0% 0%, #87CEEB 1px, transparent 1px),
            radial-gradient(circle at 100% 100%, #98FB98 1px, transparent 1px);
        background-size: 50px 50px;
        background-position: 0 0;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% { background-position: 0 0; }
        100% { background-position: 50px 50px; }
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
        opacity: 0.3;
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
        color: #FF69B4;
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

    .letter-card {
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

    .letter-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 
            0 15px 30px rgba(0,0,0,0.15),
            0 0 0 5px #FFB6C1,
            0 0 0 10px #FFF,
            0 0 0 15px #87CEEB;
    }

    .letter-image {
        height: 150px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .placeholder-letter {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F0F8FF;
        border-radius: 15px;
    }

    .letter-text {
        font-family: 'Comic Sans MS', cursive;
        font-size: 5rem;
        color: #FF69B4;
        text-shadow: 2px 2px 0 #FFB6C1;
    }

    .letter-value {
        font-family: 'Comic Sans MS', cursive;
        font-size: 3.5rem;
        color: #FF69B4;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 0 #FFB6C1;
        text-align: center;
    }

    .letter-word {
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.5rem;
        color: #4A90E2;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 0 #87CEEB;
        text-align: center;
    }

    .listen-button {
        background: linear-gradient(135deg, #FF69B4, #87CEEB);
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
        box-shadow: 0 4px 0 #FF69B4;
    }

    .listen-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 0 #FF69B4;
    }

    .listen-button:active {
        transform: translateY(2px);
        box-shadow: 0 2px 0 #FF69B4;
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
        
        .letter-value {
            font-size: 2.5rem;
        }
        
        .letter-word {
            font-size: 1.2rem;
        }

        .letter-text {
            font-size: 4rem;
        }
    }

    .quiz-section {
        margin: 3rem auto;
        max-width: 600px;
        padding: 0 1rem;
    }

    .quiz-button {
        display: block;
        background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
        border-radius: 20px;
        padding: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        transform-origin: center;
        animation: float 3s infinite ease-in-out;
    }

    .quiz-button:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .quiz-button-content {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .quiz-icon {
        font-size: 3rem;
        background: white;
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .quiz-text {
        flex: 1;
    }

    .quiz-text h3 {
        color: white;
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.8rem;
        margin: 0 0 0.5rem 0;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
    }

    .quiz-text p {
        color: rgba(255,255,255,0.9);
        font-family: 'Comic Sans MS', cursive;
        font-size: 1.1rem;
        margin: 0;
    }

    .arrow-icon {
        font-size: 2rem;
        color: white;
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    .quiz-button:hover .arrow-icon {
        transform: translateX(10px);
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @media (max-width: 768px) {
        .quiz-button-content {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .quiz-text h3 {
            font-size: 1.5rem;
        }

        .quiz-text p {
            font-size: 1rem;
        }

        .arrow-icon {
            display: none;
        }
    }
</style>
@endpush
@endsection 