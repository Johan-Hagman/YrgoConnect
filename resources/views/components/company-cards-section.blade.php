@if($companies->count())
<div class="py-6 flex flex-col justify-start items-center">
    <!-- Titel -->
    <div class="w-full max-w-md px-4 mb-6 lg:px-20 lg:max-w-[910px]">
        <h2 class="text-neutral-900 text-3xl font-normal leading-9 lg:text-6xl lg:leading-[72px]">
            Ta en titt på företagen som kommer på eventet:
        </h2>
    </div>

    <!-- Filter (kan aktiveras senare) -->
   <!-- Filter -->
   <div class="w-96 p-4 flex flex-col justify-start items-start gap-4">
    <div class="self-stretch flex flex-col justify-start items-start gap-2">
        <div class="self-stretch justify-start text-neutral-900 text-2xl font-bold leading-loose">Filtrera</div>
        <div class="self-stretch h-0 outline outline-1 outline-offset-[-0.50px] outline-neutral-900"></div>
    </div>
    <div class="flex flex-col justify-center items-start gap-4">
        <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex justify-center items-center gap-2.5">
            <div class="justify-start text-sky-950 text-base font-medium">Utbildning</div>
            <img src="/icons/Arrow-Down-Blue.svg" alt="arrow down" class="w-6 h-6">
        </button>
        <button class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-sky-950 inline-flex justify-center items-center gap-2.5">
            <div class="justify-start text-sky-950 text-base font-medium">Söker Kompetenser inom</div>
            <img src="/icons/Arrow-Down-Blue.svg" alt="arrow down" class="w-6 h-6">
        </button>
    </div>
</div>

    <!-- Grid med företagskort -->
    <div class="w-full flex flex-col items-center gap-6">
        <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-20">
            @foreach ($companies as $company)
                <x-company-card 
                    :image-url="$company->image_url"
                    :name="$company->name"
                    :city="$company->city ?? ''"
                    :classes="$company->classes->pluck('name')->toArray()"
                    :website-url="$company->website_url"
                    :description="$company->description ?? ''"
                />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center w-full max-w-4xl px-6 pt-4">
            {{ $companies->links() }}
        </div>
    </div>
</div>
@endif


