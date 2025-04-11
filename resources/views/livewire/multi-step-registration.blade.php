<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="px-4 py-6 flex flex-col items-center gap-6 lg:px-20 lg:py-20">
        @csrf

        {{-- Step 1: User --}}
        @if($step === 1)
        <div class=" p-6 bg-blue rounded-2xl flex flex-col gap-10 items-center lg:items-start lg:max-w-[1512px] lg:px-20 lg:py-20 lg:gap-20">
    
            <div class="flex flex-col items-start gap-6 text-center lg:text-left lg:max-w-[892px]">
                <h1 class="text-white text-3xl font-normal font-sans leading-9 lg:text-6xl lg:leading-[72px]">
                    Ta chansen att hitta <br/>din perfekta LIA-matchning!
                </h1>
                <p class="text-white text-xl font-normal font-sans leading-7">
                    Registrera din profil för att se vem som kommer på eventet den 23 april.
                </p>
            </div>
    
<!-- Mobilversion -->
<img 
    src="{{ asset('icons/Bar-Step-1-mobile.svg') }}" 
    alt="Progress bar showing step 1 out of 4" 
    class="w-80 block lg:hidden" 
/>

<!-- Desktopversion -->
<img 
    src="{{ asset('icons/Bar-Step-1.svg') }}" 
    alt="Progress bar showing step 1 out of 4" 
    class="hidden lg:block lg:w-[863px]" 
/>


            <div class="w-full flex flex-col gap-6 lg:w-[872px]">
                <!-- Role selection -->
                <div class="flex flex-col gap-2">
                    <div class="inline-flex items-center gap-2">
                        <label class="text-white text-base font-extrabold font-sans">Jag är:</label>
                        <span class="text-red text-base font-extrabold">*</span>
                    </div>
    
                    <div class="inline-flex justify-center items-center gap-8 lg:justify-start">
                        <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                            <span class="text-white text-base font-medium">Företag</span>
                            <input type="radio" wire:model="role" name="role" value="company" class="form-radio text-red border-white">
                        </label>
                    
                        <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                            <span class="text-white text-base font-medium">Student</span>
                            <input type="radio" wire:model="role" name="role" value="student" class="form-radio text-red border-white">
                        </label>
                    </div>
                    
                    @error('role') <span class="text-sm text-red">{{ $message }}</span> @enderror
                </div>
    
                <!-- Email input -->
                <div class="flex flex-col gap-2 lg:w-[872px]">
                    <div class="inline-flex items-center gap-2">
                        <label class="text-white text-base font-extrabold font-sans">E-postadress</label>
                        <span class="text-red text-base font-extrabold">*</span>
                    </div>
                    <input type="email" wire:model.lazy="email" placeholder="exempel@mail.com" required
                           class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                    @error('email') <span class="text-sm text-red">{{ $message }}</span> @enderror
                </div>
    
                <!-- Password input -->
                <div class="flex flex-col gap-2 lg:w-[872px]">
                    <div class="inline-flex items-center gap-2">
                        <label class="text-white text-base font-extrabold font-sans">Lösenord</label>
                        <span class="text-red text-base font-extrabold">*</span>
                    </div>
                    <input type="password" wire:model.lazy="password" placeholder="********" required
                           class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                    @error('password') <span class="text-sm text-red">{{ $message }}</span> @enderror
                </div>
    
                <!-- Confirm Password input -->
                <div class="flex flex-col gap-2 lg:w-[872px]">
                    <label class="text-white text-base font-extrabold font-sans">Bekräfta lösenord</label>
                    <input type="password" wire:model.lazy="password_confirmation" placeholder="********"
                           class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                </div>
    
                <!-- Next button -->
                <div class="w-full flex justify-end lg:justify-end lg:items-end lg:gap-64">
                    <button 
                        type="button" 
                        wire:click="registerUser" 
                        class="px-4 py-4 rounded-[40px] outline outline-1 outline-white inline-flex justify-center items-center gap-2.5"
                    >
                        <span class="text-white text-base font-medium font-sans">Nästa</span>
                        <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Pil" class="w-6 h-6">
                    </button>
                </div>
            </div>
        </div>
    @endif
    

        {{-- Step 2: Company // Student --}}
        @if($step === 2 && $role === 'company')
        <div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
    
            <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
                Ta chansen att träffa branschens nyaste stjärnor!
            </h1>
    
          <div class="flex flex-col items-start gap-6 lg:max-w-[892px] w-full">
            <!-- Mobilversion -->
            <img 
                src="{{ asset('icons/Bar-Step-2-mobile.svg') }}" 
                alt="Progress bar showing step 2 out of 4" 
                class="w-80 block lg:hidden" 
            />
        
            <!-- Desktopversion -->
            <img 
                src="{{ asset('icons/Bar-Step-2.svg') }}" 
                alt="Progress bar showing step 2 out of 4" 
                class="hidden lg:block lg:w-[863px]" 
            />
        </div>
        
    
            <!-- Företagsnamn -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Företagsnamn <span class="text-red">*</span>
            </label>
            <input type="text" wire:model="company_name" placeholder="Företaget AB" required
                   class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-4">
            @error('company_name') <span class="text-sm text-red">{{ $message }}</span> @enderror
    
           <!-- Företagets Logga -->
<label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
    Företagets Logga
</label>

<label for="image-upload"
       class="w-44 h-48 p-2 bg-white rounded-lg flex flex-col justify-center items-center gap-2 cursor-pointer mb-2">
    <img src="{{ asset('icons/image-company.svg') }}" alt="Lägg till bild" class="w-12 h-12" />
    <input id="image-upload" type="file" wire:model="image" accept="image/*" class="hidden">
</label>

<div wire:loading wire:target="image" class="text-white text-sm italic mb-2">Laddar upp...</div>
@error('image') <span class="text-sm text-red">{{ $message }}</span> @enderror

            <!-- Ort -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Ort
            </label>
            <input type="text" wire:model="city"
                   class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-4">
    
            <!-- Kontaktperson -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Kontaktperson <span class="text-red">*</span>
            </label>
            <input type="text" wire:model="contact_name" placeholder="Förnamn Efternamn" required
                   class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-4">
            @error('contact_name') <span class="text-sm text-red">{{ $message }}</span> @enderror
    
            <!-- Webbsida -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Länk till företagets webbsida
            </label>
            <input type="url" wire:model="website_url" placeholder="https://www.yrgo.se/"
                   class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-6">
            @error('website_url') <span class="text-sm text-red">{{ $message }}</span> @enderror
    
            <!-- Navigeringsknappar -->
            <div class="w-full flex justify-between items-end">
                <button type="button" wire:click="previousStep"
                        class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Tillbaka" class="w-6 h-6 ">
                    <span class="text-white text-base font-medium font-sans leading-none">Tillbaka</span>
                </button>
    
                <button type="button" wire:click="nextStep"
                        class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
                    <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa pil" class="w-6 h-6 ">
                </button>
            </div>
    
        </div>
    @endif
    

    @if($step === 2 && $role === 'student')
    <div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">

        <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
            Ta chansen att hitta din framtida LIA-plats!
        </h1>

        <div class="flex flex-col items-start gap-6 lg:max-w-[892px] w-full">
            <!-- Mobilversion -->
            <img 
                src="{{ asset('icons/Bar-Step-2-mobile.svg') }}" 
                alt="Progress bar showing step 2 out of 4" 
                class="w-80 block lg:hidden" 
            />
        
            <!-- Desktopversion -->
            <img 
                src="{{ asset('icons/Bar-Step-2.svg') }}" 
                alt="Progress bar showing step 2 out of 4" 
                class="hidden lg:block lg:w-[863px]" 
            />
        </div>
        

        <!-- Namn -->
        <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
            För- och efternamn <span class="text-red">*</span>
        </label>
        <input type="text" wire:model="name" required placeholder="Exempel Exempel"
               class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-4">

    <!-- Utbildning -->
<label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
    Utbildning <span class="text-red">*</span>
</label>
<div class="flex flex-col justify-start items-center gap-8 mb-2 lg flex-row">
    <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
        <span class="text-white text-base font-medium">Webbutvecklare</span>
        <input type="radio" wire:model="class" value="Webbutvecklare" class="form-radio text-red border-white">
    </label>

    <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
        <span class="text-white text-base font-medium">Digital Designer</span>
        <input type="radio" wire:model="class" value="Digital Designer" class="form-radio text-red border-white">
    </label>
</div>
@error('class') <span class="text-sm text-red">{{ $message }}</span> @enderror


        <!-- Bild på dig -->
        <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
            Bild på dig
        </label>
        <label for="student-image-upload"
               class="w-44 h-48 p-2 bg-white rounded-lg flex flex-col justify-center items-center gap-2 cursor-pointer mb-2">
            <img src="{{ asset('icons/image-company.svg') }}" alt="Lägg till bild" class="w-12 h-12" />
            <input id="student-image-upload" type="file" wire:model="image" accept="image/*" class="hidden">
        </label>
        <div wire:loading wire:target="image" class="text-white text-sm italic mb-2">Laddar upp...</div>
        @error('image') <span class="text-sm text-red">{{ $message }}</span> @enderror

        <!-- Portfolio -->
        <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
            Länk till portfolio eller github <span class="text-red">*</span>
        </label>
        <input type="url" wire:model="website_url" required placeholder="www.portfolio.se"
               class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-6">
        @error('website_url') <span class="text-sm text-red">{{ $message }}</span> @enderror

        <!-- Navigeringsknappar -->
        <div class="w-full flex justify-between items-end">
            <button type="button" wire:click="previousStep"
                    class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Tillbaka" class="w-6 h-6">
                <span class="text-white text-base font-medium font-sans leading-none">Tillbaka</span>
            </button>

            <button type="button" wire:click="nextStep"
                    class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
                <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa pil" class="w-6 h-6">
            </button>
        </div>

    </div>
@endif


        {{-- Step 3: Company // Student --}}
        @if($step === 3 && $role === 'company')
        <div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
            
            <h1 class="text-white text-3xl font-normal leading-9 font-sans mb-4 lg:text-6xl lg:leading-[72px]">
                Ta chansen att träffa branschens nyaste stjärnor!
            </h1>
    
            <div class="flex flex-col items-start gap-6 lg:max-w-[892px] w-full">
                <!-- Mobilversion -->
                <img 
                    src="{{ asset('icons/Bar-Step-3-mobile.svg') }}" 
                    alt="Progress bar showing step 3 out of 4" 
                    class="w-80 block lg:hidden" 
                />
            
                <!-- Desktopversion -->
                <img 
                    src="{{ asset('icons/Bar-Step-3.svg') }}" 
                    alt="Progress bar showing step 3 out of 4" 
                    class="hidden lg:block lg:w-[863px]" 
                />
            </div>
            
    
            <!-- Roll -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Vilken roll söker ni? <span class="text-red">*</span>
            </label>
            <div class="flex flex-wrap gap-2 mb-4">
                <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                    <span class="text-white text-base font-medium">Webbutvecklare</span>
                    <input type="checkbox" wire:model="class" value="Webbutvecklare" class="form-checkbox text-rose-600 border-white">
                </label>
                <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                    <span class="text-white text-base font-medium">Digital Designer</span>
                    <input type="checkbox" wire:model="class" value="Digital Designer" class="form-checkbox text-rose-600 border-white">
                </label>
            </div>
            @error('class') <span class="text-sm text-red">{{ $message }}</span> @enderror
    
            <!-- Kompetenser -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Vilka kompetenser söker ni?
            </label>
            <span class="text-white text-sm font-normal mb-2">Välj så många alternativ du vill.</span>
    
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach(['Backend', 'Frontend', 'Fullstack', 'Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'] as $competence)
                    <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                        <span class="text-white text-base font-medium">{{ $competence }}</span>
                        <input type="checkbox" wire:model="competences" value="{{ $competence }}" class="form-checkbox text-rose-600 border-white">
                    </label>
                @endforeach
            </div>
    
            <!-- Hisspitch -->
            <div x-data="{ count: 0 }" class="w-full">
                <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                    Är det något mer du vill berätta om ert företag?
                </label>
            
                <textarea 
                    wire:model="description"
                    maxlength="240"
                    x-on:input="count = $event.target.value.length"
                    placeholder="Här kan du skriva en hisspitch eller berätta om era förmåner, sammanhållning etc."
                    class="w-full h-28 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium resize-none mb-1">
                </textarea>
            
                <span 
                    class="text-sm font-normal mb-4" 
                    :class="count > 240 ? 'text-red' : 'text-white'">
                    <span x-text="count"></span>/240 tecken
                </span>
            
                @error('description') 
                    <span class="text-sm text-red">{{ $message }}</span> 
                @enderror
            </div>
            
    
            <!-- Event -->
            <label class="text-white text-base font-extrabold font-sans leading-snug inline-flex items-center gap-2">
                <input type="checkbox" wire:model="event_attendance" class="form-checkbox text-red border-white"> Jag vill anmäla mig till eventet
            </label>
    
            <!-- Terms -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-6 inline-flex items-center gap-2">
                <input type="checkbox" wire:model="accept_terms" required class="form-checkbox text-red border-white">
                Jag accepterar YRGOs användarvillkor <span class="text-red">*</span>
            </label>
            @error('accept_terms') <span class="text-sm text-red">{{ $message }}</span> @enderror
    
            <!-- Navigeringsknappar -->
            <div class="w-full flex justify-between items-end">
                <button type="button" wire:click="previousStep"
                    class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Tillbaka" class="w-6 h-6">
                    <span class="text-white text-base font-medium font-sans leading-none">Tillbaka</span>
                </button>
    
                <button type="button" wire:click="nextStep"
                    class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
                    <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa" class="w-6 h-6">
                </button>
            </div>
        </div>
    @endif    

        @if($step === 3 && $role === 'student')
        <div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
        
            <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
                Ta chansen att hitta din framtida LIA-plats!
            </h1>
        
             <!-- Mobilversion -->
             <img 
             src="{{ asset('icons/Bar-Step-3-mobile.svg') }}" 
             alt="Progress bar showing step 2 out of 4" 
             class="w-80 block lg:hidden" 
         />
 
         <!-- Desktopversion -->
         <img 
             src="{{ asset('icons/Bar-Step-3.svg') }}" 
             alt="Progress bar showing step 2 out of 4" 
             class="hidden lg:block lg:w-[863px]" 
         />
        
            <!-- Kompetensval -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mt-4 mb-1">
                Jag är intresserad av LIA inom <span class="text-red">*</span>
            </label>
            <span class="text-white text-sm font-normal mb-2">Välj så många alternativ du vill</span>
        
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($availableCompetences as $competence)
                    <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                        <span class="text-white text-base font-medium">{{ $competence }}</span>
                        <input type="checkbox" wire:model="competences" value="{{ $competence }}" class="form-checkbox text-rose-600 border-white">
                    </label>
                @endforeach
            </div>
        
    <!-- Hisspitch -->
<div x-data="{ count: 0 }" class="w-full">
    <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
        Här kan du skriva en hisspitch om dig själv:
    </label>

    <textarea 
        wire:model="description"
        x-on:input="count = $event.target.value.length"
        maxlength="240"
        placeholder="Här kan du skriva en hisspitch och berätta lite mer om dig själv."
        class="w-full h-28 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium resize-none mb-1">
    </textarea>

    <span 
        class="text-sm font-normal mb-2"
        :class="count > 240 ? 'text-red' : 'text-white'">
        <span x-text="count"></span>/240 tecken
    </span>

    @error('description') 
        <span class="text-sm text-red">{{ $message }}</span> 
    @enderror
</div>


        
            <!-- LinkedIn -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Länk till LinkedIn-profil
            </label>
            <input type="url" wire:model="linkedin_url"
                   class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium mb-4">
            @error('linkedin_url') <span class="text-sm text-red">{{ $message }}</span> @enderror
        
            <!-- CV -->
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-1">
                Ladda upp CV <span class="text-red">*</span>
            </label>
            <input type="file" wire:model="cv" accept="application/pdf" class="mb-2">
            <div wire:loading wire:target="cv" class="text-white text-sm italic mb-2">Laddar upp...</div>
            @error('cv') <span class="text-sm text-red">{{ $message }}</span> @enderror
        >
            <label class="text-white text-base font-extrabold font-sans leading-snug mb-6 inline-flex items-center gap-2">
                <input type="checkbox" wire:model="accept_terms" required
                       class="form-checkbox text-red border-white"> Jag accepterar YRGOs användarvillkor <span class="text-rose-600">*</span>
            </label>
            @error('accept_terms') <span class="text-sm text-red">{{ $message }}</span> @enderror
        
            <!-- Navigeringsknappar -->
            <div class="w-full flex justify-between items-end">
                <button type="button" wire:click="previousStep"
                        class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Tillbaka" class="w-6 h-6">
                    <span class="text-white text-base font-medium font-sans leading-none">Tillbaka</span>
                </button>
        
                <button type="button" wire:click="nextStep"
                        class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
                    <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa" class="w-6 h-6">
                </button>
            </div>
        
        </div>
        @endif
        

        {{-- Step 4: Review --}}
        @if($step === 4)
        <div class="w-full bg-blue p-6 rounded-2xl flex flex-col justify-start items-center gap-10 lg:px-[240px] lg:py-20">
            <h1 class="text-white text-3xl font-normal font-sans leading-9 lg:text-6xl lg:font-light lg:leading-[90px]">
                Nästan klar! <br />Ser allt bra ut?
            </h1>
    
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
    
            @if($role === 'company')
                @if($image && method_exists($image, 'temporaryUrl'))
                    <div class="w-44 h-48 p-2 bg-white rounded-lg flex flex-col justify-center items-center gap-2">
                        <img src="{{ $image->temporaryUrl() }}" alt="Logo preview" class="max-h-40 object-contain" />
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
    @endif
    

      {{-- Step 5: Confirmation! --}}
      @if($step === 5)
      <div class="flex flex-col justify-start items-center gap-2.5">
        <div class="w-full bg-rose-600 rounded-2xl flex flex-col justify-start items-center gap-10 px-4 py-6
                    lg:px-[240px] lg:py-20">
      
              
              <img src="{{ asset('icons/registration_gif.gif') }}" alt="Registrering klar" 
                   class="w-56 h-56 lg:w-80 lg:h-80" />
      
              <div class="w-full max-w-[892px] flex flex-col justify-start items-start gap-6">
                  <h1 class="w-full max-w-[900px] text-white text-3xl font-normal font-sans leading-9 
                             lg:text-6xl lg:font-light lg:leading-[90px]">
                      Registreringen lyckades!
                  </h1>
      
                  <p class="self-stretch text-white text-xl font-normal font-sans leading-7">
                      Stort lycka till med att hitta dina nya kollegor.
                  </p>
              </div>
      
              <div class="self-stretch inline-flex justify-start items-center gap-64">
                  <a href="{{ route('dashboard') }}"
                     class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white flex justify-center items-center gap-2.5">
                      <span class="text-white text-base font-medium font-sans leading-none">
                          @if($role === 'student')
                              Se alla företag
                          @else
                              Se alla studenter
                          @endif
                      </span>
                      <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Pil" class="w-6 h-6">
                  </a>
              </div>
          </div>
      </div>
      @endif      
    </form>
</div>
