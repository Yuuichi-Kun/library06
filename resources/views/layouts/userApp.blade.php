<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FutureSight') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
     <link rel="stylesheet" href="{{ asset('css/special-nav.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .profile-section {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            border: 1px solid #e1e1e1;
            overflow: hidden;
        }

        .profile-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .section-header {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.25rem;
            border-bottom: none;
        }

        .avatar-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            padding: 2rem;
        }

        .current-avatar {
            width: 150px !important;
            height: 150px !important;
            border-radius: 50%;
            border: 4px solid #00b4db;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .current-avatar:hover {
            border-color: #0083b0;
            transform: scale(1.05);
        }

        .back-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            font-weight: 500;
            transition: opacity 0.2s;
            text-decoration: none;
        }

        .back-button:hover {
            opacity: 0.9;
            color: white;
        }

        .profile-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .nav-profile {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid white;
            object-fit: cover;
        }

        .btn-custom {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #0083b0 0%, #006687 100%);
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .navbar {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            padding: 1rem 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-menu {
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            border: none;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 10px;
            margin: 0.25rem;
            padding: 0.75rem 1.25rem;
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: opacity 0.2s;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            opacity: 0.9;
        }

        main {
            min-height: calc(100vh - 70px);
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            padding: 3rem 0;
        }

        .upload-controls {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e1e1e1;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #00b4db;
            box-shadow: 0 0 0 3px rgba(0,180,219,0.1);
        }

        /* Add smooth scrolling to the page */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-primary text-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="{{ route('home') }}">
            <box-icon name='chevron-left'></box-icon><h3>Get back to Dashboard</h3>
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="d-flex align-items-center">
                                @if(Auth::user()->avatar)
                                    <img class="rounded-circle me-2" src="/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; object-fit:cover;">
                                @else
                                    <img class="rounded-circle me-2" src="{{ asset('/img/default_profile.png') }}" style="width:40px; height:40px; object-fit:cover;">
                                @endif
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


        <!-- Main Content -->
        <main style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);">
            <div>
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
