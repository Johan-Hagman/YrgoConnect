@if($companies->count())
<div class="py-6 flex flex-col justify-start items-center">
    <!-- Titel -->
    <div class="w-full max-w-md px-4 mb-6 lg:px-20 lg:max-w-[910px]">
        <h2 class="text-neutral-900 text-center text-3xl font-normal leading-9 lg:text-6xl lg:leading-[72px]">
            Ta en titt på företagen som kommer på eventet:
        </h2>
    </div>

    <div class="w-96 p-4 flex flex-col justify-start items-start gap-4 lg:px-20 lg:w-full lg:w-full lg:gap-12">
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

    <!-- Grid med företagskort -->
    <div class="w-full flex flex-col items-center gap-6">
        <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-20">
            <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
            @foreach ($companies as $index => $company)
                <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto
                            {{ $index >= 5 ? 'hidden lg:inline-flex' : '' }}">
                    <x-company-card 
                        :image-url="$company->image_url"
                        :name="$company->name"
                        :city="$company->city ?? ''"
                        :classes="$company->classes->pluck('name')->toArray()"
                        :website-url="$company->website_url"
                        :description="$company->description ?? ''"
                    />
                </div>
            @endforeach
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="self-stretch px-6 pb-10 inline-flex justify-between items-center lg:px-0 lg:justify-between">
            @if ($companies->onFirstPage())
                <span class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5 opacity-50 cursor-not-allowed">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </span>
            @else
                <a href="{{ $companies->previousPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
                    <img src="/icons/Arrow-Left-Blue.svg" alt="Föregående" class="w-6 h-6">
                    <span class="text-sky-950 text-base font-medium">Föregående</span>
                </a>
            @endif
        
            @if ($companies->hasMorePages())
                <a href="{{ $companies->nextPageUrl() }}" class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex items-center gap-2.5">
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


