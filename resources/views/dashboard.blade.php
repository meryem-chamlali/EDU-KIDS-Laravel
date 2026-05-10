@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Tableau de bord</h3>
                    <a href="{{ route('home') }}" class="btn btn-light">
                        <i class="fas fa-home"></i> Retour à l'accueil
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Niveaux</h5>
                                    <p class="card-text">Gérez les niveaux d'apprentissage</p>
                                    <a href="{{ route('levels.index') }}" class="btn btn-primary">Voir les niveaux</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Catégories</h5>
                                    <p class="card-text">Gérez les catégories d'apprentissage</p>
                                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Voir les catégories</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Éléments</h5>
                                    <p class="card-text">Gérez les éléments d'apprentissage</p>
                                    <a href="{{ route('elements.index') }}" class="btn btn-primary">Voir les éléments</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Quiz</h5>
                                    <p class="card-text">Gérez les questions de quiz</p>
                                    <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Voir les quiz</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 