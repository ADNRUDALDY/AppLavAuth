<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Tourriste</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body, html {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            height: 100%;
        }

        header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 25px 20px;
            background: #070f18;
            color: white;
        }

        header .user-info {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        header .user-info a {
            color: white;
            text-decoration: none;
        }

        header .user-info a i {
            font-size: 24px;
        }

        .carousel-container {
            position: relative;
            width: 100%;
            height: 100vh; /* Fullscreen height */
            overflow: hidden;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-images img {
            flex-shrink: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            margin-right: 10px; /* Space between images */
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 100;
            transition: 0.3s ease;
        }

        .carousel-button:hover {
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-button.left {
            left: 10px;
        }

        .carousel-button.right {
            right: 10px;
        }

        .carousel-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .carousel-overlay a {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.5rem;
            background: #9b9191;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .carousel-overlay a:hover {
            background: #646463;
            color: black;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #070f18;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="user-info">
            <span>Bienvenue, {{ Auth::user()->name }}</span>
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-person-circle"></i>
            </a>
        </div>
    </header>

    <main>
        <div class="carousel-container">
            <div class="carousel-images">
                <img src="/images/image7.jpg" alt="Image 7">
                <img src="/images/image6.jpg" alt="Image 6">
                <img src="/images/image2.jpg" alt="Image 2">
                <img src="/images/image5.jpg" alt="Image 5">
                <img src="/images/image4.jpg" alt="Image 4">
                <img src="/images/image3.jpg" alt="Image 3">
                <img src="/images/image1.jpg" alt="Image 1">
            </div>
            <button class="carousel-button left">&lt;</button>
            <button class="carousel-button right">&gt;</button>
            <div class="carousel-overlay">
                <a href="{{ route('localites.index') }}">Voir</a>
            </div>
        </div>
    </main>

    <footer>
        Nous joindre Tel : 00221 77 558 87 97 | Email : nrudaldy@gmail.com
    </footer>

    <script>
        // JavaScript pour gérer le carrousel
        const imagesContainer = document.querySelector('.carousel-images');
        const totalImages = document.querySelectorAll('.carousel-images img').length;
        let currentIndex = 0;

        function showImage(index) {
            const offset = index * (imagesContainer.offsetWidth + 10); // Include margin-right
            imagesContainer.style.transform = `translateX(-${offset}px)`;
        }

        document.querySelector('.carousel-button.left').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            showImage(currentIndex);
        });

        document.querySelector('.carousel-button.right').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        });

        // Auto défilement toutes les 10 secondes
        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        }, 10000);
    </script>
</body>
</html>
