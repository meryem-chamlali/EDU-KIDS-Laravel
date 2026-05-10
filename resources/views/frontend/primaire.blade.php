@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hero-section text-center py-5 mb-5">
        <h1 class="display-4 mb-3">📚 Primaire</h1>
        <p class="lead">Explore et apprends de nouvelles choses passionnantes !</p>
    </div>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="category-card" style="background: {{ $category['color'] }}">
                    <div class="category-icon">
                        {{ $category['icon'] }}
                    </div>
                    <h3 class="category-title">{{ $category['name'] }}</h3>
                    <p class="category-description">{{ $category['description'] }}</p>
                    <a href="{{ $category['route'] }}" class="category-button">
                        <span class="button-text">Explorer</span>
                        <span class="button-icon">→</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
            ← Retour à l'accueil
        </a>
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(135deg, #2ecc71, #3498db);
    color: white;
    border-radius: 15px;
    padding: 3rem !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.category-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    color: white;
    transition: all 0.3s ease;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0,0,0,0.1), rgba(255,255,255,0.1));
    pointer-events: none;
}

.category-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
}

.category-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
}

.category-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.category-description {
    margin-bottom: 1.5rem;
    font-size: 1rem;
    opacity: 0.9;
    line-height: 1.5;
}

.category-button {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    text-decoration: none;
    padding: 0.75rem 2rem;
    border-radius: 25px;
    font-weight: bold;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.category-button:hover {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    transform: translateX(5px);
}

.button-icon {
    transition: transform 0.3s ease;
}

.category-button:hover .button-icon {
    transform: translateX(5px);
}

.btn-primary {
    background: linear-gradient(135deg, #2ecc71, #3498db);
    border: none;
    padding: 1rem 2rem;
    font-weight: bold;
    border-radius: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .category-card {
        min-height: 250px;
    }
}

/* Animation des cartes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.category-card {
    animation: fadeInUp 0.6s ease backwards;
}

@media (prefers-reduced-motion: reduce) {
    .category-card {
        animation: none;
    }
}

/* Délai d'animation pour chaque carte */
.col-md-6:nth-child(1) .category-card { animation-delay: 0.1s; }
.col-md-6:nth-child(2) .category-card { animation-delay: 0.2s; }
.col-md-6:nth-child(3) .category-card { animation-delay: 0.3s; }
.col-md-6:nth-child(4) .category-card { animation-delay: 0.4s; }
.col-md-6:nth-child(5) .category-card { animation-delay: 0.5s; }
.col-md-6:nth-child(6) .category-card { animation-delay: 0.6s; }
.col-md-6:nth-child(7) .category-card { animation-delay: 0.7s; }
.col-md-6:nth-child(8) .category-card { animation-delay: 0.8s; }
</style>
@endsection 