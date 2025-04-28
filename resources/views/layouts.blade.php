<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6EE7B7;
            --primary-dark: #10B981;
            --primary-light: #A7F3D0;
            --bg-gradient: radial-gradient(ellipse at bottom, #0F172A 0%, #020617 100%);
            --card-bg: rgba(30, 41, 59, 0.4);
            --card-border: rgba(110, 231, 183, 0.15);
            --text-glow: 0 0 15px rgba(110, 231, 183, 0.7);
            --nav-link-transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --font-main: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg-gradient);
            background-attachment: fixed;
            min-height: 100vh;
            color: #E2E8F0;
            font-family: var(--font-main);
            overflow-x: hidden;
        }

        /* === Cosmic Navbar === */
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(15, 23, 42, 0.6) !important;
            border-bottom: 1px solid rgba(110, 231, 183, 0.1) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: var(--text-glow);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
        }

        .navbar-brand:hover {
            transform: translateY(-3px);
            text-shadow: 0 0 25px rgba(110, 231, 183, 0.9);
        }

        .navbar-brand i {
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 2);
            display: inline-block;
            filter: drop-shadow(var(--text-glow));
        }

        .navbar-brand:hover i {
            transform: rotate(-20deg) scale(1.3);
            animation: pulse 1.5s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        /* === Ultra Premium Nav Links === */
        .nav-link {
            position: relative;
            margin: 0 8px;
            padding: 12px 24px !important;
            border-radius: 12px;
            transition: var(--nav-link-transition);
            overflow: hidden;
            border: 1px solid transparent;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(110, 231, 183, 0.1), transparent);
            transition: 0.6s;
        }

        .nav-link:hover {
            background: rgba(110, 231, 183, 0.1);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(110, 231, 183, 0.2);
            border-color: rgba(110, 231, 183, 0.3);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link i {
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .nav-link:hover i {
            transform: scale(1.5) rotate(15deg);
            color: var(--primary-light);
            filter: drop-shadow(0 0 8px rgba(110, 231, 183, 0.8));
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
            border-radius: 3px;
            transition: width 0.4s ease;
        }

        .nav-link:hover::after {
            width: 70%;
        }

        /* === Cosmic Background Effects === */
        .cosmic-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--duration, 5s) infinite ease-in-out;
            opacity: var(--opacity, 0.8);
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }

        .shooting-star {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(90deg, rgba(255,255,255,0), var(--primary-light));
            border-radius: 50%;
            animation: shoot var(--duration, 8s) linear infinite;
            opacity: 0;
        }

        @keyframes shoot {
            0% { transform: translateX(0) translateY(0); opacity: 1; }
            70% { opacity: 1; }
            100% { transform: translateX(1000px) translateY(-300px); opacity: 0; }
        }

        /* === Interstellar Cards === */
        .card {
            background: var(--card-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            transition: all 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary), var(--primary-dark), var(--primary));
            z-index: -1;
            border-radius: 22px;
            opacity: 0;
            transition: 0.5s;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .card:hover::before {
            opacity: 0.15;
            animation: animate 3s linear infinite;
        }

        @keyframes animate {
            0% { filter: blur(5px); opacity: 0.1; }
            50% { filter: blur(10px); opacity: 0.2; }
            100% { filter: blur(5px); opacity: 0.1; }
        }

        .card-header {
            border-bottom: 1px solid rgba(110, 231, 183, 0.1);
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.5), rgba(30, 41, 59, 0.7));
            font-weight: 600;
            letter-spacing: 0.8px;
        }

        /* === Stellar Animations === */
        .page-enter-active {
            animation: cosmicFadeIn 1s cubic-bezier(0.19, 1, 0.22, 1) forwards;
        }

        @keyframes cosmicFadeIn {
            0% { opacity: 0; transform: translateY(50px) scale(0.95); filter: blur(5px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
        }

        /* === Custom Scrollbar === */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(2, 6, 23, 0.8);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), var(--primary-dark));
            border-radius: 10px;
            border: 2px solid rgba(15, 23, 42, 0.8);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--primary-light), var(--primary));
        }

        /* === Section Headers === */
        .section-header {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: var(--text-glow);
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), transparent);
            border-radius: 2px;
            animation: lineExpand 1.5s ease-out forwards;
        }

        @keyframes lineExpand {
            0% { width: 0; opacity: 0; }
            100% { width: 100%; opacity: 1; }
        }
    </style>
</head>
<body class="text-light">
<!-- Cosmic Background Animation -->
<div class="cosmic-bg" id="cosmic-bg"></div>

<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="container-fluid px-5">
            <a class="navbar-brand d-flex align-items-center" href="/" data-aos="fade-right" data-aos-delay="100">
                <i class="bi bi-rocket-takeoff-fill fs-1 me-3"></i>
                <span class="h2 mb-0">FREELANCE<span class="text-primary">X</span></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCosmic"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-stars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCosmic">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="150">
                        <a class="nav-link d-flex align-items-center" href="{{route('jobs.index')}}">
                            <i class="bi bi-gem fs-4"></i>
                            <span class="ms-2">Elite Jobs</span>
                        </a>
                    </li>


                    <li class="nav-item" data-aos="fade-down" data-aos-delay="200">
                        <a class="nav-link d-flex align-items-center" href="{{route('contracts.index')}}">
                            <i class="bi bi-file-earmark-lock2-fill fs-4"></i>
                            <span class="ms-2">VIP Contracts</span>
                        </a>
                    </li>

                    <li class="nav-item" data-aos="fade-down" data-aos-delay="250">
                        <a class="nav-link d-flex align-items-center" href="{{route('users.index')}}">
                            <i class="bi bi-people-fill fs-4"></i>
                            <span class="ms-2">Top Talent</span>
                        </a>
                    </li>

                    <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                        <a class="nav-link d-flex align-items-center" href="{{route('proposals.index')}}">
                            <i class="bi bi-send-check-fill fs-4"></i>
                            <span class="ms-2">Proposals</span>
                        </a>
                    </li>

                    <li class="nav-item" data-aos="fade-down" data-aos-delay="350">
                        <a class="nav-link d-flex align-items-center" href="{{route('reviews.index')}}">
                            <i class="bi bi-trophy-fill fs-4"></i>
                            <span class="ms-2">Reviews</span>
                        </a>
                    </li>

                    <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
                        <a class="nav-link d-flex align-items-center" href="{{route('freelancers.index')}}">
                            <i class=" bi bi-person-fill fs-4"></i>
                            <span class="ms-2">Freelancers</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-enter-active">
        <div class="container-xxl py-5 px-xxl-5">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS with cosmic settings
    AOS.init({
        duration: 1200,
        easing: 'ease-out-back',
        once: true,
        offset: 50,
        delay: 100
    });

    // Create cosmic background
    document.addEventListener('DOMContentLoaded', function() {
        const cosmicBg = document.getElementById('cosmic-bg');
        const starCount = 150;
        const shootingStarCount = 3;

        // Create stars
        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('div');
            star.classList.add('star');

            // Random properties
            const size = Math.random() * 3 + 1;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.opacity = Math.random() * 0.8 + 0.2;
            star.style.setProperty('--duration', `${Math.random() * 10 + 5}s`);
            star.style.animationDelay = `${Math.random() * 5}s`;

            cosmicBg.appendChild(star);
        }

        // Create shooting stars
        for (let i = 0; i < shootingStarCount; i++) {
            const shootingStar = document.createElement('div');
            shootingStar.classList.add('shooting-star');

            shootingStar.style.left = `${Math.random() * 20}%`;
            shootingStar.style.top = `${Math.random() * 20}%`;
            shootingStar.style.setProperty('--duration', `${Math.random() * 10 + 15}s`);
            shootingStar.style.animationDelay = `${Math.random() * 20}s`;
            shootingStar.style.width = `${Math.random() * 6 + 2}px`;
            shootingStar.style.height = `${Math.random() * 2 + 1}px`;

            cosmicBg.appendChild(shootingStar);
        }
    });
</script>
</body>
</html>
