<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            margin: 0;
            height: 100%;
            overflow: hidden;
        }

        .full-height {
            height: 100vh;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .content {
            text-align: center;
            z-index: 2;
            position: relative;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: transparent;
            border: 2px solid #fff;
            border-radius: 5px;
            text-transform: uppercase;
            text-decoration: none;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease;
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: scale(1.05);
        }

        .button:active {
            transform: scale(0.95);
        }

        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
</head>
<body>
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('videos/background-video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="overlay"></div>

    <div class="flex-center full-height">
        <div class="content">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('home') }}" class="button">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>