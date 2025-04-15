<div class="w-full bg-blue p-6 rounded-2xl flex flex-col justify-start items-center gap-10 lg:px-[240px] lg:py-20">
    <h1 class="text-white text-3xl font-normal font-sans leading-9 lg:text-6xl lg:font-light lg:leading-[90px]">
        Nästan klar! <br />Ser allt bra ut?
    </h1>

    <div class="flex flex-col items-center gap-6 lg:max-w-[892px] w-full">

    <!-- Mobilversion -->
    <img 
        src="{{ asset('icons/Bar-Step-4-mobile.svg') }}" 
        alt="Progress bar showing step 4 out of 4" 
        class="w-80 block lg:hidden" 
    />

    <!-- Desktopversion -->
    <img 
        src="{{ asset('icons/Bar-Step-4.svg') }}" 
        alt="Progress bar showing step 4 out of 4" 
        class="hidden lg:block lg:w-[863px]" 
    />

    </div>

    @if($role === 'company')
    @if($image && method_exists($image, 'temporaryUrl'))
    <div class="self-stretch h-40 bg-white rounded-2xl overflow-hidden lg:w-[470px] lg:h-56 lg:rounded-2xl">
        <img src="{{ $image->temporaryUrl() }}" 
             alt="Logo preview" 
             class="w-full h-full object-cover" />
    </div>
@endif

        <div class="w-full max-w-[892px] flex flex-col justify-start items-start gap-6">
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Är det något mer du vill berätta om ert företag?</p>
                <p class="text-white text-base font-normal leading-snug">{{ $description }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Jag är:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $role }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">E-postadress:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $email }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Företagsnamn:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $company_name }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Kontaktperson:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $contact_name }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Länk till företagets hemsida:</p>
                <a href="{{ $website_url }}" target="_blank" class="text-white underline text-base font-normal leading-snug">
                    {{ $website_url }}
                </a>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Ort:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $city }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Vilken roll söker ni?</p>
                <p class="text-white text-base font-normal leading-snug">{{ implode(', ', $class) }}</p>
            </div>
            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Vilka kompetenser söker ni?</p>
                <p class="text-white text-base font-normal leading-snug">{{ implode(', ', $competences) }}</p>
            </div>
        </div>
    @elseif($role === 'student')
        <div class="w-full max-w-[892px] flex flex-col justify-start items-start gap-2.5 lg:justify-start">
            @if($image && method_exists($image, 'temporaryUrl'))
            <div class="self-stretch inline-flex flex-col justify-start items-start gap-2.5">
                <div class="w-80 h-80 flex flex-col justify-start items-start gap-2.5">
                    <div class="self-stretch h-80 bg-white rounded-2xl flex flex-col justify-center items-center gap-2.5">
                        <img src="{{ $image->temporaryUrl() }}" alt="Profile preview" class="w-full h-full object-cover rounded-xl" />
                    </div>
                </div>
            </div>
        @endif
         

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Här kan du skriva en hisspitch om dig själv:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $description }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Jag är:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $role }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Jag studerar till:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $class }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Jag söker LIA inom:</p>
                <p class="text-white text-base font-normal leading-snug">{{ implode(', ', $competences ?? []) }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">E-postadress:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $email }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">För- och efternamn:</p>
                <p class="text-white text-base font-normal leading-snug">{{ $name }}</p>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Länk till portfolio eller github:</p>
                <a href="{{ $website_url }}" target="_blank" class="text-white underline text-base font-normal leading-snug">
                    {{ $website_url }}
                </a>
            </div>

            <div>
                <p class="text-white text-base font-extrabold leading-tight mb-1">Länk till din LinkedIn-profil:</p>
                <a href="{{ $linkedin_url }}" target="_blank" class="text-white underline text-base font-normal leading-snug">
                    {{ $linkedin_url }}
                </a>
            </div>

            @if ($cv)
                <div>
                    <p class="text-white text-base font-extrabold leading-tight mb-1">Ditt CV:</p>
                    <p class="text-white text-base font-normal leading-snug">{{ $cv->getClientOriginalName() }}</p>
                </div>
            @endif
        </div>
    @endif

    <!-- Navigeringsknappar -->
    <div class="w-full flex justify-between items-end mt-10">
        <button type="button" wire:click="previousStep"
                class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
            <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Tillbaka" class="w-6 h-6">
            <span class="text-white text-base font-medium font-sans leading-none">Tillbaka</span>
        </button>

        <button type="submit"
                class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
            <span class="text-white text-base font-medium font-sans leading-none">Registrera</span>
            <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Registrera" class="w-6 h-6">
        </button>
    </div>
</div>