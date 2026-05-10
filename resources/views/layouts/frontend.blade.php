<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Monde Magique - @yield('title')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #fff6f9;
            font-family: 'Fredoka', cursive;
        }

        .navbar {
            background: linear-gradient(to right, #fcb0d9, #a18cd1);
            border-bottom: 4px solid #ffe4ec;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.8rem;
        }

        footer {
            background-color: #a18cd1;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .category-img-container {
            height: 180px;
            background-color: #ffeef2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            background-color: #f78fb3;
            border-color: #f78fb3;
        }

        .btn-primary:hover {
            background-color: #f5578e;
            border-color: #f5578e;
        }
    </style>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            🌈 Mon Monde Magique
        </a>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<footer class="text-white py-3 text-center">
    © {{ date('Y') }} Mon Monde Magique - Apprendre en s'amusant 🎉
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
