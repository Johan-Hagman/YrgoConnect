<div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">

    <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
        Ta chansen att hitta din framtida LIA-plats!
    </h1>

    <div class="flex flex-col items-center gap-6 lg:max-w-[892px] w-full">
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
<div class="flex flex-col justify-start items-center gap-8 mb-2 lg:flex-row">
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
    <div class="w-full flex justify-end items-end">
        <button type="button" wire:click="nextStep"
            class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
            <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
            <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa pil" class="w-6 h-6">
        </button>
    </div>

</div>