<header class="w-full h-11 px-4 py-2 bg-white flex justify-between items-center" x-data="{ open: false }">
    <!-- Vänster: Logotyp -->
    <div class="flex items-center">
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
            <img src="{{ asset('/icons/bomarke.png') }}" alt="Yrgo logotyp" class="h-4 w-auto" />
        </a>
    </div>

 <!-- Höger: Ikoner + Dropdown -->
<div class="flex items-center gap-4">
    @auth
        <div class="flex items-center gap-4">
            <img src="{{ asset('/icons/proicons_home.svg') }}" alt="Startsida" class="w-6 h-6" />
            <img src="{{ asset('/icons/heart-icon.svg') }}" alt="Favoriter" class="w-7 h-7" />
        </div>
    @endauth

    <!-- Dropdown-knappen -->
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="w-6 h-6" aria-haspopup="true" :aria-expanded="open.toString()">
            <img src="{{ asset('/icons/account_circle.svg') }}" alt="Användarmeny" class="w-6 h-6 align-middle mt-[4px]" />
        </button>

        <!-- Dropdownmeny -->
        <ul
            x-show="open"
            x-cloak
            @click.outside="open = false"
            x-transition
            class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded shadow z-50"
        >
            @auth
                <li>
                    @php
                        $user = auth()->user();
                        $profileRoute = $user->student ? route('student.show') : ($user->company ? route('company.show') : '#');
                    @endphp
                    <a href="{{ $profileRoute }}" class="block px-4 py-2 hover:bg-gray-100">Min profil</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Inställningar</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logga ut</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">Logga in</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">Registrera</a>
                    </li>
                @endif
            @endauth
            
        </ul>
    </div>
</div>

</header>