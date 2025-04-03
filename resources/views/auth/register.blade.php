<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Role Selection -->
        <div>
            <x-input-label :value="__('Register as')" />

            <div class="mt-2 flex space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="Student" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" required>
                    <span class="ml-2">Student</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="Företag" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" required>
                    <span class="ml-2">Företag</span>
                </label>
            </div>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
