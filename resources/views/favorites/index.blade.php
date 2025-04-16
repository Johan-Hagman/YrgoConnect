{{-- resources/views/favorites/index.blade.php --}}
<x-app-layout>
    <div class="py-6 flex flex-col justify-start items-center lg:px-20 lg:items-start lg:gap-10">
        <!-- Titel -->
        <div class="w-full max-w-md px-4 mb-6 lg:max-w-[910px]">
            <h2 class="text-neutral-900 text-3xl text-center font-normal leading-9 lg:text-6xl lg:leading-[72px] lg:text-left">
                Mina favoriter
            </h2>
        </div>

        <!-- Kortlista -->
        <div class="w-full flex flex-col items-center gap-6">
            @if(auth()->user()->role->name === 'Företag' && $studentFavorites->count() > 0)
                <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-0 w-full">
                    <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
                        @foreach($studentFavorites as $index => $student)
                            <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto">
                                <x-student-card 
                                    :image-url="$student->image_url"
                                    :name="$student->name"
                                    :classes="$student->classModel?->name"
                                    :website-url="$student->website_url"
                                    :description="$student->description"
                                    :cvUrl="$student->cv_url"
                                    :linkedinUrl="$student->linkedin_url"
                                    :email="$student->email"
                                    :skills="$student->competences?->pluck('name')->toArray() ?? []"
                                    :student="$student"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif(auth()->user()->role->name === 'Företag')
                <p class="text-gray-500 p-4">Du har inga favoritmarkerade studenter ännu.</p>
            @endif

            @if(auth()->user()->role->name === 'Student' && $companyFavorites->count() > 0)
                <div class="flex flex-wrap justify-center gap-6 px-4 lg:px-0 w-full">
                    <div class="py-6 flex flex-col justify-start items-start lg:grid lg:grid-cols-3 lg:gap-6 lg:w-full">
                        @foreach($companyFavorites as $index => $company)
                            <div class="w-96 p-4 inline-flex justify-center items-center gap-2.5 lg:w-auto">
                                <x-company-card 
                                    :image-url="$company->image_url"
                                    :name="$company->name"
                                    :city="$company->city ?? ''"
                                    :classes="$company->classes?->pluck('name')->toArray() ?? []"
                                    :website-url="$company->website_url"
                                    :description="$company->description ?? ''"
                                    :contact-person="$company->contact_name"
                                    :email="$company->user?->email"
                                    :skills="$company->competences?->pluck('name')->toArray() ?? []"
                                    :company="$company"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif(auth()->user()->role->name === 'Student')
                <p class="text-gray-500 p-4">Du har inga favoritmarkerade företag ännu.</p>
            @endif
        </div>
    </div>
</x-app-layout>