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