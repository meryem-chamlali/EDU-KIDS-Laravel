@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">🎯 Connexion</h2>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fs-5">📧 Adresse Email</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fs-5">🔑 Mot de passe</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    🌟 Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                🚀 Se connecter
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                    🤔 Mot de passe oublié ?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0">Pas encore de compte ? 
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            ✨ S'inscrire
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

.form-check-input:checked {
    background-color: #4CAF50;
    border-color: #4CAF50;
}
</style>
@endsection 