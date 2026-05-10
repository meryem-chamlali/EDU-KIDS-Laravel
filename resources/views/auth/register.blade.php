@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">✨ Inscription</h2>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fs-5">👤 Nom</label>
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fs-5">📧 Adresse Email</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fs-5">🔑 Mot de passe</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fs-5">🔄 Confirmer le mot de passe</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" 
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                🚀 S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0">Déjà inscrit ? 
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            🎯 Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 20px;
    background: linear-gradient(145deg, #ffffff, #f0f0f0);
}

.card-header {
    border-radius: 20px 20px 0 0;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e0e0e0;
    padding: 12px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
}

.btn-primary {
    border-radius: 10px;
    padding: 12px;
    font-size: 1.1rem;
    background-color: #4CAF50;
    border-color: #4CAF50;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
    transform: translateY(-2px);
}

.btn-link {
    color: #4CAF50;
}

.btn-link:hover {
    color: #45a049;
}

.card-footer {
    border-radius: 0 0 20px 20px;
    border-top: none;
}
</style>
@endsection 