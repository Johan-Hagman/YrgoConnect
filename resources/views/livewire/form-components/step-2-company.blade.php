<div class="bg-blue p-6 rounded-2xl flex flex-col justify-start gap-6 items-start lg:items-start lg:max-w-[1512px] lg:px-[240px] lg:py-20">
    
    <h1 class="text-white text-3xl font-normal leading-9 font-sans lg:text-6xl lg:leading-[72px]">
        Ta chansen att träffa branschens nyaste stjärnor!
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
    <div class="w-full flex justify-end items-end">
        <button type="button" wire:click="nextStep"
            class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
            <span class="text-white text-base font-medium font-sans leading-none">Nästa</span>
            <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Nästa pil" class="w-6 h-6">
        </button>
    </div>
    

</div>