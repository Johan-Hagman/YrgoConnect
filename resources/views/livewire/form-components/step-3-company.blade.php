<div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
            
    <h1 class="text-white text-3xl font-normal leading-9 font-sans mb-4 lg:text-6xl lg:leading-[72px]">
        Ta chansen att träffa branschens nyaste stjärnor!
    </h1>

    <div class="flex flex-col items-center gap-6 lg:max-w-[892px] w-full">
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
            <input type="checkbox" wire:model="class" value="Webbutvecklare" class="form-checkbox text-red border-white">
        </label>
        <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
            <span class="text-white text-base font-medium">Digital Designer</span>
            <input type="checkbox" wire:model="class" value="Digital Designer" class="form-checkbox text-red border-white">
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
                <input type="checkbox" wire:model="competences" value="{{ $competence }}" class="form-checkbox text-red border-white">
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