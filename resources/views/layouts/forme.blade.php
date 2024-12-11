<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Entités')</title>

    <!-- Liens externes -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles personnalisés -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }

        /* Header */
        header {
            background-color: #000;
            padding: 1rem 0;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        header nav a:hover {
            background-color: #fff;
            color: #000;
            border-radius: 0.5rem;
        }

        header nav .nav-item {
            padding: 0 0.5rem;
        }

        /* Contenu principal */
        main {
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Header avec le menu -->
    <header>
        <nav class="container d-flex justify-content-center">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('localites.index') }}">Nos Localités</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('visiteurs.index')}}">Nos Touristes</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{  }}">Faire une Demande</a></li> --}}
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
