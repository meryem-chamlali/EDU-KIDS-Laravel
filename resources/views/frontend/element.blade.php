@extends('layouts.frontend')

@section('title', $element->nom)

@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('categorie.show', $element->categorie_id) }}" class="text-decoration-none">
                    {{ $element->categorie->nom }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ $element->nom }}</li>
        </ol>
    </nav>

    <div class="card mb-4 border-0 shadow">
        <div class="card-header py-3" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white;">
            <h1 class="h3 mb-0">{{ $element->nom }}</h1>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    @if($element->media->where('type', 'image')->first())
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/'.$element->media->where('type', 'image')->first()->chemin) }}" 
                                 class="img-fluid rounded shadow-sm" alt="{{ $element->nom }}">
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <h3 class="h4 mb-3" style="color: #6a11cb;">Description</h3>
                        <div class="p-3 bg-light rounded">
                            <p class="mb-0">{{ $element->description }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    @if($element->media->where('type', 'audio')->isNotEmpty())
                        <div class="mb-4">
                            <h3 class="h4 mb-3" style="color: #6a11cb;">Audio</h3>
                            @foreach($element->media->where('type', 'audio') as $audio)
                                <div class="card mb-3 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $audio->titre ?? 'Ecouter' }}</h5>
                                        <audio controls class="w-100">
                                            <source src="{{ asset('storage/'.$audio->chemin) }}" type="audio/mpeg">
                                            Votre navigateur ne supporte pas l'élément audio.
                                        </audio>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    @if($element->media->where('type', 'video')->isNotEmpty())
                        <div class="mb-4">
                            <h3 class="h4 mb-3" style="color: #6a11cb;">Vidéo</h3>
                            @foreach($element->media->where('type', 'video') as $video)
                                <div class="card mb-3 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $video->titre ?? 'Regarder' }}</h5>
                                        <div class="ratio ratio-16x9">
                                            <video controls>
                                                <source src="{{ asset('storage/'.$video->chemin) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas l'élément vidéo.
                                            </video>
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
@endsection