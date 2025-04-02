<header class="w-full h-11 px-4 py-2 bg-white flex justify-between items-center">
    <!-- left: logo -->
    <div class="flex items-center">
        <img src="{{ asset('/icons/bomarke.png') }}" alt="Yrgo logotyp" class="h-4 w-auto" />
    </div>

    <!-- right: menu -->
    <div class="relative">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">
                    <img src="{{ asset('/icons/account_circle.svg') }}" alt="Profil" class="w-6 h-6" />
                </a>
            @else
                <button id="dropdownToggle" class="w-6 h-6" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('/icons/account_circle.svg') }}" alt="Användarmeny" class="w-6 h-6" />
                </button>

                <!-- Dropdownmenu -->
                <ul id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white border rounded shadow hidden z-50">
                    <li>
                        <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">Logga in</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">Registrera</a>
                        </li>
                    @endif
                </ul>
            @endauth
        @endif
    </div>
</header>
