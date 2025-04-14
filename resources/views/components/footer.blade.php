<footer class="w-full bg-grey-10 px-4 py-10 flex flex-col items-center gap-10 
                lg:px-10 lg:py-0 lg:h-36 lg:flex-row lg:justify-between lg:items-center lg:mx-auto">
    
    <!-- Logotyp -->
    <div class="flex items-center justify-center lg:justify-start">
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
            <img src="{{ asset('/icons/bomarke.png') }}" alt="Yrgo logotyp" class="h-4 w-auto lg:h-6" />
        </a>
    </div>

    <!-- Länkar -->
    <div class="flex flex-col items-center gap-5 lg:flex-col lg:items-end lg:justify-between lg:h-16">
        <!-- Översta raden med länkar -->
        <div class="flex flex-col items-center gap-6 lg:flex-row lg:items-center lg:gap-6">
            <a href="https://www.yrgo.se/program/digital-designer/" class="text-black text-base font-medium font-sans underline leading-snug">
                Läs mer om Webbutvecklare
            </a>
            <a href="https://www.yrgo.se/program/webbutvecklare/" class="text-black text-base font-medium font-sans underline leading-snug">
                Läs mer om Digital Design
            </a>
            <a href="https://www.yrgo.se/" class="text-black text-base font-medium font-sans underline leading-snug">
                Yrgos hemsida
            </a>
        </div>
        <!-- Undre raden med användarvillkor -->
        <div class="flex items-center lg:justify-end">
            <a href="{{ route('terms') }}" class="text-black text-base font-medium font-sans underline leading-snug">
                Användarvillkor
            </a>
        </div>
    </div>
</footer>
