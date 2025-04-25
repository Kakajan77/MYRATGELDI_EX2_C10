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
</head>
<body class="bg-dark text-light" data-bs-theme="dark">
<div class="container-xl px-0">
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark-800 py-3 px-4 border-bottom border-dark">
        <div class="container-xl">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi-mortarboard-fill fs-3 text-primary me-2"></i>
                <span class="h4 mb-0">Freelance</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">

                    <li class="nav-item">
                        <a class="nav-link btn btn-dark hover-glow mx-1 py-2" href="{{route('jobs.index')}}"
                           data-aos="fade-up"
                           data-aos-delay="100">
                            <i class="bi bi-person-badge-fill me-2"></i>Jobs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-dark hover-glow mx-1 py-2" href="{{route('contracts.index')}}"
                           data-aos="fade-up"
                           data-aos-delay="100">
                            <i class="bi bi-person-badge-fill me-2"></i>Contracts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark hover-glow mx-1 py-2" href="{{route('users.index')}}"
                           data-aos="fade-up"
                           data-aos-delay="100">
                            <i class="bi bi-journal-bookmark-fill me-2"></i>Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark hover-glow mx-1 py-2" href="{{route('proposals.index')}}"
                           data-aos="fade-up"
                           data-aos-delay="100">
                            <i class="bi bi-journal-bookmark-fill me-2"></i>Proposals
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark hover-glow mx-1 py-2" href="{{route('reviews.index')}}"
                           data-aos="fade-up"
                           data-aos-delay="100">
                            <i class="bi bi-journal-bookmark-fill me-2"></i>Reviews
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="page-enter-active">
        <div class="container-xl py-4 mt-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
