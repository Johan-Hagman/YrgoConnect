@if($students->count())
<div class="py-6 flex flex-col justify-start items-center lg:px-20 lg:items-start lg:gap-10">
    <!-- Titel -->
    <div class="w-96 p-4 inline-flex justify-center items-center gap-2 lg:w-full lg:pt-20 lg:pb-10 lg:px-0">
        <div class="flex-1 justify-start text-neutral-900 text-3xl font-normal leading-9 lg:max-w-[910px] lg:text-6xl lg:leading-[72px]">
            Ta en titt på studenterna som kommer på eventet:
        </div>
    </div>

    <!-- Filter -->
    <div class="w-96 p-4 flex flex-col justify-start items-start gap-4 lg:px-0 lg:w-full lg:w-full lg:gap-12">
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
    <div class="pb-10 flex flex-col justify-start items-center gap-6 lg:pb-20 lg:w-full">
        <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
            @foreach ($students as $student)
                <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto">
                    <x-student-card 
                        :image-url="$student->image_url"
                        :name="$student->name"
                        :title="$student->classModel?->name"
                        :link="$student->website_url"
                        :description="$student->description"
                    />
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="self-stretch px-6 pb-10 inline-flex justify-between items-center lg:px-0 lg:justify-between">
            <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 flex justify-center items-center gap-2.5">
                <img src="/icons/Arrow-Left-Blue.svg" alt="arrow left" class="w-6 h-6">
                <div class="text-sky-950 text-base font-medium">Föregående</div>
            </button>
            <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 flex justify-center items-center gap-2.5">
                <div class="text-sky-950 text-base font-medium">Nästa sida</div>
                <img src="/icons/Arrow-Right-Blue.svg" alt="arrow right" class="w-6 h-6">
            </button>
        </div>
    </div>
</div>
@endif
