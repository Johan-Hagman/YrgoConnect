<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YrgoConnect</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <header class="site-header">
        <div class="logo">
            <img src="{{ asset('/icons/bomarke.png') }}" alt="YrgoConnect logotyp" />
        </div>
    
        <div class="header-icons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <div class="dropdown">
                        <button id="dropdownToggle" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('/icons/account_circle.svg') }}" alt="Användarmeny" class="dropdown-icon" />
                        </button>
    
                        <ul id="dropdownMenu" class="dropdown-menu hidden">
                            <li><a href="{{ route('login') }}">Logga in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Registrera</a></li>
                            @endif
                        </ul>
                    </div>
                @endauth
            @endif
        </div>
    </header>
    
    

    @if (Route::has('login'))
        <div></div>
    @endif
</body>
@include('components.footer')
</html>

