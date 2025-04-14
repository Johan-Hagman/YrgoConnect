<x-public-layout>
    <section class="w-full px-4 py-10 flex flex-col items-center lg:p-20">
        <div class="w-full max-w-[370px] p-6 bg-blue rounded-2xl flex flex-col justify-start items-center gap-10 lg:max-w-[1512px] lg:px-60 lg:py-20 lg:gap-20">

            <!-- Title -->
            <h1 class="w-full text-white text-3xl font-normal font-sans leading-9 lg:max-w-[900px] lg:text-6xl lg:leading-[72px]">
                Logga in
            </h1>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="w-full flex flex-col gap-6 lg:max-w-[872px] lg:gap-10">
                @csrf

                <!-- Email -->
                <div class="flex flex-col gap-2 lg:gap-2">
                    <div class="flex items-center gap-1">
                        <label for="email" class="text-white text-base font-extrabold font-sans leading-snug">E-postadress</label>
                        <span class="text-rose-600 text-base font-extrabold">*</span>
                    </div>
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="w-full h-11 p-4 bg-white rounded-lg text-base font-medium text-zinc-600 leading-none"
                        :value="old('email')"
                        required
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="text-sm text-red" />
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-1">
                        <label for="password" class="text-white text-base font-extrabold font-sans leading-snug">Lösenord</label>
                        <span class="text-rose-600 text-base font-extrabold">*</span>
                    </div>
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full h-11 p-4 bg-white rounded-lg text-base font-medium text-zinc-600 leading-none"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="text-sm text-red" />
                </div>

                <!-- Forgot password -->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-white text-base font-medium underline leading-snug">
                        Jag har glömt mitt lösenord
                    </a>
                @endif

                <!-- Login button -->
                <div class="w-full flex justify-end">
                    <button type="submit" class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white inline-flex justify-center items-center gap-2.5">
                        <span class="text-white text-base font-medium font-sans leading-none">Logga in</span>
                        <div class="w-0 h-6 relative origin-top-left -rotate-90 overflow-hidden">
                            <img src="{{ asset('icons/Arrow-Left.svg') }}" alt="Pil" class="w-6 h-6" />
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-public-layout>

