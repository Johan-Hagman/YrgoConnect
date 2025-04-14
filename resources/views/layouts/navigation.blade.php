<header class="w-full bg-white px-4 py-2 flex justify-center">
    <div class="w-full max-w-[1512px] flex justify-between items-center lg:px-8 lg:py-6">
        <!-- Vänster: Logotyp -->
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
            <img src="{{ asset('/icons/Yrgo.svg') }}" alt="Yrgo logotyp" class="h-3 lg:h-6 w-auto" />
        </a>

        <!-- Höger: Ikoner + Dropdown -->
        <div class="flex items-center gap-6">
            @auth
                <div class="flex items-center gap-6">
                    <!-- Hem -->
                    <div class="flex flex-col items-center gap-2">
                        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}" class="flex flex-col items-center gap-2">
                            <img src="{{ asset('/icons/proicons_home.svg') }}" alt="Startsida" class="w-6 h-6" />
                            <span class="hidden lg:block font-medium text-base leading-none">Hem</span>
                        </a>
                    </div>
                    

                    <!-- Favoriter -->
                    <div class="flex flex-col items-center gap-2">
                        <img src="{{ asset('/icons/heart-icon.svg') }}" alt="Favoriter" class="w-6 h-6" />
                        <span class="hidden lg:block font-medium text-base leading-none">Favoriter</span>
                    </div>
                </div>
            @endauth

            <!-- Dropdown-knappen -->
            <div class="relative flex flex-col items-center gap-2" x-data="{ open: false }">
                <button @click="open = !open" class="w-6 h-6" aria-haspopup="true" :aria-expanded="open.toString()">
                    <img src="{{ asset('/icons/account_circle.svg') }}" alt="Användarmeny" class="w-6 h-6" />
                </button>
                <span class="hidden lg:block font-medium text-base leading-none">Profil</span>

                <!-- Dropdownmeny -->
                <ul
                    x-show="open"
                    x-cloak
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded shadow z-50"
                >
                    @auth
                        @php
                            $user = auth()->user();
                            $profileRoute = $user->student ? route('student.show') : ($user->company ? route('company.show') : '#');
                        @endphp
                        <li><a href="{{ $profileRoute }}" class="block px-4 py-2 hover:bg-gray-100">Min profil</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Inställningar</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logga ut</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">Logga in</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">Registrera</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>

