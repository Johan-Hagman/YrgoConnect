@if($students->count())
<div class="py-6 flex flex-col justify-start items-center lg:px-20 lg:items-start lg:gap-10">
    <!-- Titel -->
    <div class="w-96 p-4 inline-flex justify-center items-center gap-2 lg:w-full lg:pt-20 lg:pb-10 lg:px-0">
        <div class="flex-1 justify-start text-neutral-900 text-3xl font-normal leading-9 lg:max-w-[910px] lg:text-6xl lg:leading-[72px]">
            Ta en titt på studenterna som kommer på eventet:
        </div>
    </div>

    <!-- Filter -->
    <div class="w-96 p-4 flex flex-col justify-start items-start gap-4 lg:px-0 lg:w-full lg:gap-12">
        <div class="self-stretch flex flex-col justify-start items-start gap-2">
            <div class="self-stretch justify-start text-neutral-900 text-2xl font-bold leading-loose lg:text-3xl lg:font-medium lg:leading-10">Filtrera</div>
            <div class="self-stretch h-0 outline outline-1 outline-offset-[-0.50px] outline-neutral-900"></div>
        </div>
        <div class="flex flex-col justify-center items-start gap-4 lg:flex-row lg:items-center lg:gap-8">
            <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex justify-center items-center gap-2.5">
                <div class="justify-start text-sky-950 text-base font-medium leading-none">Utbildning</div>
                <img src="/icons/Arrow-Down-Blue.svg" alt="arrow down" class="w-6 h-6">
            </button>
            <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex justify-center items-center gap-2.5">
                <div class="justify-start text-sky-950 text-base font-medium leading-none">Söker Kompetenser inom</div>
                <img src="/icons/Arrow-Down-Blue.svg" alt="arrow down" class="w-6 h-6">
            </button>
        </div>
    </div>

    <!-- Grid med studentkort -->
    <div class="w-full flex flex-col items-center gap-6">
        <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-20">
            <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
                @foreach ($students as $index => $student)
                    <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto
                                {{ $index >= 5 ? 'hidden lg:inline-flex' : '' }}">
                        <x-student-card 
                            :image-url="$student->image_url"
                            :name="$student->name"
                            :classes="$student->classModel?->name"
                            :website-url="$student->website_url"
                            :description="$student->description"
                            :cv-url="$student->cv_url"
                            :linkedin-url="$student->linkedin_url"
                            :email="$student->email"
                            :skills="$student->skills?->pluck('name')->toArray() ?? []"

                        />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="self-stretch px-6 pb-10 inline-flex justify-between items-center lg:px-20 lg:justify-between">
            @if ($students->onFirstPage())
                <span class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5 opacity-50 cursor-not-allowed">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </span>
            @else
                <a href="{{ $students->previousPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </a>
            @endif

            @if ($students->hasMorePages())
                <a href="{{ $students->nextPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
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
@endif

