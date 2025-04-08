<header class="w-full h-[43px] px-4 py-2 bg-white flex justify-between items-center lg:h-[96px] lg:px-8" x-data="{ open: false }">
    <!-- Vänster: Logotyp -->
    <div class="flex items-center">
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
            <img src="{{ asset('/icons/bomarke.png') }}" alt="Yrgo logotyp" class="h-3.5 w-auto lg:h-6 w-auto" />
        </a>
    </div>

    <!-- Höger: Ikoner + Dropdown -->
    <div class="flex items-center gap-4 lg:gap-6">
        @auth
        <div class="flex items-center gap-4 lg:gap-6">
            <!-- Startsida -->
            <div class="flex flex-col items-center lg:w-16">
                <img src="{{ asset('/icons/proicons_home.svg') }}" alt="Startsida"
                     class="w-[24px] h-[24px] relative top-[1px]" />
                <span class="hidden lg:block text-grey-50 text-body font-medium leading-none mt-[6px]">Hem</span>
            </div>

            <!-- Favoriter -->
            <div class="flex flex-col items-center lg:w-16">
                <img src="{{ asset('/icons/heart-icon.svg') }}" alt="Favoriter"
                     class="w-[24px] h-[24px] relative top-[1px]" />
                <span class="hidden lg:block text-grey-50 text-body font-medium leading-none mt-[6px]">Favoriter</span>
            </div>
        </div>
        @endauth

        <!-- Profil + Dropdown -->
        <div class="relative flex flex-col items-center lg:w-16" x-data="{ open: false }">
            <button @click="open = !open" class="w-[24px] h-[24px]" aria-haspopup="true" :aria-expanded="open.toString()">
                <img src="{{ asset('/icons/account_circle.svg') }}" alt="Användarmeny"
                     class="w-[24px] h-[24px] align-middle relative top-[1px]" />
            </button>
            <span class="hidden lg:block text-grey-50 text-body font-medium leading-none mt-[6px]">Profil</span>

            <!-- Dropdownmeny -->
            <ul
            x-show="open"
            x-cloak
            @click.outside="open = false"
            x-transition
            class="absolute right-0 top-full mt-2 w-44 bg-white border border-grey-20 rounded shadow z-50"
        >
        
                @auth
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-grey-10">Inställningar</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-grey-10">Logga ut</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-grey-10">Logga in</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-grey-10">Registrera</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</header>



