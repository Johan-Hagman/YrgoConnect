@if($companies->count())
<div class="py-6 flex flex-col justify-start items-center">
    <!-- Titel -->
    <div class="w-full max-w-md px-4 mb-6 lg:px-20 lg:max-w-[910px]">
        <h2 class="text-neutral-900 text-3xl font-normal leading-9 lg:text-6xl lg:leading-[72px]">
            Ta en titt på företagen som kommer på eventet:
        </h2>
    </div>

    <!-- Filter (kan aktiveras senare) -->
    <div class="w-full max-w-md px-4 mb-8 lg:px-20">
        <h3 class="text-neutral-900 text-2xl font-bold leading-loose lg:text-3xl lg:font-medium lg:leading-10">Filtrera</h3>
        <div class="h-0.5 bg-neutral-900 my-2"></div>

        <div class="flex flex-col gap-4 lg:flex-row lg:gap-8">
            <button class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex justify-between items-center">
                <span class="text-sky-950 text-base font-medium">Utbildning</span>
                <div class="w-6 h-6 bg-sky-950"></div>
            </button>
            <button class="p-4 rounded-[40px] outline outline-1 outline-sky-950 flex justify-between items-center">
                <span class="text-sky-950 text-base font-medium">Söker kompetenser inom</span>
                <div class="w-6 h-6 bg-sky-950"></div>
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


