@extends('layouts.app')

@section('content')
<div class="container">
    <div class="category-header text-center py-4 mb-4">
        <h1 class="display-4">{{ $category->name }}</h1>
        @if($category->description)
            <p class="lead">{{ $category->description }}</p>
        @endif
    </div>

    <div class="row">
        @if($category->elements->isEmpty())
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Aucun élément n'est disponible dans cette catégorie pour le moment.
                </div>
            </div>
        @else
            @foreach($category->elements as $element)
                <div class="col-md-4 mb-4">
                    <div class="element-card card h-100">
                        @if($element->image)
                            <img src="{{ asset($element->image) }}" class="card-img-top element-image" alt="{{ $element->name }}">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title h5">{{ $element->name }}</h3>
                            @if($element->description)
                                <p class="card-text">{{ $element->description }}</p>
                            @endif
                            
                            <div class="audio-controls mt-3">
                                @if($element->audio_fr)
                                    <div class="mb-2">
                                        <label class="audio-label">🇫🇷 Français</label>
                                        <audio controls class="custom-audio">
                                            <source src="{{ asset($element->audio_fr) }}" type="audio/mpeg">
                                            Votre navigateur ne supporte pas l'élément audio.
                                        </audio>
                                    </div>
                                @endif
                                
                                @if($element->audio_ar)
                                    <div class="mb-2">
                                        <label class="audio-label">🇩🇿 Arabe</label>
                                        <audio controls class="custom-audio">
                                            <source src="{{ asset($element->audio_ar) }}" type="audio/mpeg">
                                            Votre navigateur ne supporte pas l'élément audio.
                                        </audio>
                                    </div>
                                @endif
                                
                                @if($element->audio_en)
                                    <div class="mb-2">
                                        <label class="audio-label">🇬🇧 Anglais</label>
                                        <audio controls class="custom-audio">
                                            <source src="{{ asset($element->audio_en) }}" type="audio/mpeg">
                                            Votre navigateur ne supporte pas l'élément audio.
                                        </audio>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg">
            ← Retour
        </a>
    </div>
</div>

<style>
.category-header {
    background: linear-gradient(135deg, #ff6b6b, #6b8bff);
    color: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
}

.element-card {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.element-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.element-image {
    height: 200px;
    object-fit: cover;
}

.audio-controls {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 10px;
}

.audio-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #333;
}

.custom-audio {
    width: 100%;
    height: 40px;
    border-radius: 20px;
}

.btn-primary {
    border-radius: 25px;
    padding: 0.75rem 2rem;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}
</style>
@endsection 