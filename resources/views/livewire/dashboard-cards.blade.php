@php
use Illuminate\Support\Str;
@endphp

<div x-data="{ showClass: false, showSkills: false }" class="py-6 flex flex-col justify-start items-center lg:items-start lg:px-20 lg:gap-10">
    <!-- Titel -->
    <div class="w-full max-w-md px-4 mb-6 lg:max-w-[910px]">
        <h2 class="text-neutral-900 text-3xl text-center font-normal leading-9 lg:text-6xl lg:leading-[72px] lg:text-left">
            Ta en titt på {{ $role === 'Företag' ? 'studenterna' : 'företagen' }} som kommer på eventet:
        </h2>
    </div>

   

    <!-- Filtrering -->
    <div class="w-96 p-4 flex flex-col justify-start items-start gap-4 lg:w-full lg:gap-12">
        <div class="w-full flex flex-col gap-2">
            <div class="text-neutral-900 text-2xl font-bold leading-loose lg:text-3xl lg:font-medium lg:leading-10">Filtrera</div>
            <div class="h-0 outline outline-1 outline-offset-[-0.5px] outline-neutral-900"></div>
        </div>

        <div class="flex flex-col items-start gap-4 lg:flex-row lg:items-center lg:gap-8 w-full">
            <!-- Utbildning -->
            <div class="relative">
                <button @click="showClass = !showClass"
                        class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex items-center gap-2.5">
                    <span class="text-sky-950 text-base font-medium">Utbildning</span>
                    <img src="/icons/Arrow-Down-Blue.svg" class="w-6 h-6">
                </button>
                <div x-show="showClass" @click.outside="showClass = false"
                     class="absolute z-10 mt-2 bg-white rounded-xl shadow-md w-56 p-2 space-y-2">
                    <button wire:click="$set('selectedClass', 'Webbutvecklare')" class="w-full text-left px-4 py-2 hover:bg-sky-100 rounded-lg">Webbutvecklare</button>
                    <button wire:click="$set('selectedClass', 'Digital Designer')" class="w-full text-left px-4 py-2 hover:bg-sky-100 rounded-lg">Digital Designer</button>
                    <button wire:click="$set('selectedClass', null)" class="w-full text-left px-4 py-2 text-gray-500 hover:bg-sky-100 rounded-lg">Rensa filter</button>
                </div>
            </div>

            <!-- Kompetenser -->
            <div class="relative">
                <button @click="showSkills = !showSkills"
                        class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex items-center gap-2.5">
                    <span class="text-sky-950 text-base font-medium">
                        {{ $role === 'Företag' ? 'Kompetenser inom' : 'Söker kompetenser inom' }}
                    </span>
                    <img src="/icons/Arrow-Down-Blue.svg" class="w-6 h-6">
                </button>
                <div x-show="showSkills" @click.outside="showSkills = false"
                     class="absolute z-10 mt-2 bg-white rounded-xl shadow-md w-64 p-2 space-y-2 max-h-64 overflow-auto">
                    @foreach ($competences as $competence)
                        <button wire:click="$set('selectedCompetence', '{{ $competence }}')" class="w-full text-left px-4 py-2 hover:bg-sky-100 rounded-lg">{{ $competence }}</button>
                    @endforeach
                    <button wire:click="$set('selectedCompetence', null)" class="w-full text-left px-4 py-2 text-gray-500 hover:bg-sky-100 rounded-lg">Rensa filter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Kortlista -->
    <div class="w-full flex flex-col items-center gap-6">
        <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-0 w-full">
            <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
                @foreach ($items as $index => $item)
                    <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto {{ $index >= 5 ? 'hidden lg:inline-flex' : '' }}">
                        @if ($role === 'Företag')
                            <x-student-card 
                                :image-url="$item->image_url"
                                :name="$item->name"
                                :classes="$item->classModel?->name"
                                :website-url="$item->website_url"
                                :description="$item->description"
                                :cvUrl="$item->cv_url"
                                :linkedinUrl="$item->linkedin_url"
                                :email="$item->email"
                                :skills="$item->competences?->pluck('name')->toArray() ?? []"
                                :student="$item"
                            />
                        @else
                            <x-company-card 
                                :image-url="$item->image_url"
                                :name="$item->name"
                                :city="$item->city ?? ''"
                                :classes="$item->classes?->pluck('name')->toArray() ?? []"
                                :website-url="$item->website_url"
                                :description="$item->description ?? ''"
                                :contact-person="$item->contact_name"
                                :email="$item->user?->email"
                                :roles="[$item->role?->name]"
                                :skills="$item->skills?->pluck('name')->toArray() ?? []"
                            />
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="self-stretch px-6 pb-10 inline-flex justify-between items-center lg:px-20 lg:justify-between">
            @if ($items->onFirstPage())
                <span class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5 opacity-50 cursor-not-allowed">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </span>
            @else
                <a href="{{ $items->previousPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </a>
            @endif
        
            @if ($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
                    <span class="text-sky-950 text-base font-medium">Nästa sida</span>
                    <img src="/icons/Arrow-Right-Blue.svg" alt="Nästa sida" class="w-6 h-6">
                </a>
            @else
                <span class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5 opacity-50 cursor-not-allowed">
                    <span class="text-sky-950 text-base font-medium">Nästa sida</span>
                    <img src="/icons/Arrow-Right-Blue.svg" alt="Nästa sida" class="w-6 h-6">
                </span>
            @endif
        </div>
        
        
    </div>
</div>




