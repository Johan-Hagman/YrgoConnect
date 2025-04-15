<div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
        
    <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
        Ta chansen att hitta din framtida LIA-plats!
    </h1>
    <div class="flex flex-col items-center gap-6 lg:max-w-[892px] w-full">

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

    </div>

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