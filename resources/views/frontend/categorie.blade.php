@extends('layouts.frontend')

@section('title', $categorie->nom)

@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active">{{ $categorie->nom }}</li>
        </ol>
    </nav>

    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold" style="color: #6a11cb;">{{ $categorie->nom }}</h1>
        <p class="lead">{{ $categorie->description }}</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($elements as $element)
            <div class="col">
                <div class="card h-100">
                    <div class="category-img-container">
                        @if($element->media->where('type', 'image')->first())
                            <img src="{{ asset('storage/'.$element->media->where('type', 'image')->first()->chemin) }}" 
                                 class="img-fluid" alt="{{ $element->nom }}">
                        @else
                            <i class="fas fa-image fa-4x text-secondary"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fs-4 text-center">{{ $element->nom }}</h5>
                        <p class="card-text">{{ Str::limit($element->description, 100) }}</p>
                        <div class="text-center">
                            <a href="{{ route('element.show', $element->id) }}" class="btn btn-primary rounded-pill px-4">
                                Découvrir <i class="fas fa-eye ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i> Aucun élément n'est disponible dans cette catégorie pour le moment.
                </div>
            </div>
        @endforelse
    </div>
@endsection