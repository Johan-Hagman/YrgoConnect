<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrera företag!') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('companies.store') }}">
                    @csrf
                    
                    <div>
                        <x-input-label for="name" :value="__('Företagsnamn')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus placeholder="Företag AB" />
                    </div>

                    <div>
                        <x-input-label for="image_url" :value="__('Bild')" />
                        <x-text-input id="image_url" class="block mt-1 w-full" type="text" name="image_url" autofocus />
                    </div>
                    
                    <div>
                        <x-input-label for="city" :value="__('Ort')" />
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" autofocus placeholder="Göteborg" />
                    </div>

                    <div>
                        <x-input-label for="contact_name" :value="__('Kontaktperson')" />
                        <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" autofocus placeholder="Förnamn Efternamn"/>
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="website_url" :value="__('Länk till företagets webbsida')" />
                        <x-text-input id="website_url" class="block mt-1 w-full" type="url" name="website_url" placeholder="www.yrgo.se"/>
                    </div>
                    
                    <div>
                        <x-input-label for="class" :value="__('Vilken roll söker ni?')" />
                        <input type="checkbox" name="class" value="Webbutvecklare" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Webbutvecklare</span>

                        <input type="checkbox" name="class" value="Digital Designer" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Digital Designer</span>
                    </div>

                    <div>
                        <x-input-label for="competences" :value="__('Vilka kompetenser söker ni?')" />

                        <span>Välj så många alternativ ni vill</span>

                        <input type="checkbox" name="competences" value="Backend" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Backend</span>

                        <input type="checkbox" name="competences" value="Frontend" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Frontend</span>

                        <input type="checkbox" name="competences" value="Fullstack" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Fullstack</span>

                        <input type="checkbox" name="competences" value="Motion" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Motion</span>

                        <input type="checkbox" name="competences" value="UX/UI" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">UX/UI</span>

                        <input type="checkbox" name="competences" value="3D" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">3D</span>

                        <input type="checkbox" name="competences" value="Webflow/Framer" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Webflow/Framer</span>

                        <input type="checkbox" name="competences" value="Branding" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Branding</span>

                        <input type="checkbox" name="competences" value="Content Creation" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Content Creation</span>

                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Är det något mer du vill berätta om ert företag?')" />
                        <textarea name="description" id="description" cols="60" rows="5" maxlength="240">Här kan du skriva en hisspitch eller berätta om era förmåner, sammanhållning etc.</textarea>
                        <span>0/240 tecken</span>
                    </div>

                    <div>
                        <input type="checkbox" name="attendance" value="true" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2">Jag vill anmäla mig till eventet</span>
                    </div>

                    <div>
                        <input type="radio" name="terms" value="terms" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" required>
                        <span class="ml-2">Jag accepterar YRGOs användarvillkor</span>
                    </div>
                    
                    <div class="mt-4">
                        <x-primary-button>
                            {{ __('Registrera') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
