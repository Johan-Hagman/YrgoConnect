<x-public-layout>
    <div class="w-full max-w-[1512px] mx-auto px-4 py-10 flex justify-center lg:h-[1407px] lg:p-20 lg:inline-flex lg:flex-col lg:justify-start lg:items-center lg:gap-2.5">
        <div class="w-96 p-6 bg-blue rounded-2xl flex flex-col justify-start items-center gap-6 lg:w-[600px] lg:p-10">
           

            <div class="w-full h-80 flex flex-col justify-start items-start gap-2.5 lg:self-stretch lg:h-[520px]">
                <div class="w-full h-full bg-white rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $student->image_url ?: 'default_image.jpg') }}" 
                         alt="Bild på studenten {{ $student->name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <div class="w-full flex flex-col justify-start items-start gap-4 text-white lg:self-stretch">
                <div class="w-full flex flex-col gap-2 lg:self-stretch">
                    <h1 class="text-xl font-semibold leading-7">{{ $student->name }}</h1>
                    <p class="text-base font-extrabold leading-snug">{{ $student->classModel->name }}</p>
                    <a href="{{ $student->website_url }}" target="_blank" class="underline font-medium leading-snug">Länk till portfolio eller github</a>
                </div>

                <p class="text-base font-normal leading-normal">{{ $student->description }}</p>

                @if ($student->cv_url)
                    <a href="{{ asset('storage/' . $student->cv_url) }}" target="_blank" class="underline font-medium leading-snug">Ladda ned CV</a>
                @else
                    <p class="text-base italic">Inget CV uppladdat</p>
                @endif

                @if ($student->linkedin_url)
                    <a href="{{ $student->linkedin_url }}" target="_blank" class="underline font-medium leading-snug">Länk till LinkedIn-profil</a>
                @else
                    <p class="text-base italic">Ingen LinkedIn-profil angiven</p>
                @endif

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">E-postadress:</p>
                    <p class="text-base font-normal leading-normal">{{ $student->email }}</p>
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Kompetenser:</p>
                    @if ($student->competences->isNotEmpty())
                        <ul class="flex flex-wrap gap-2">
                            @foreach ($student->competences as $competence)
                                <li class="px-4 py-2 rounded-[30px] outline outline-1 outline-white text-sm leading-none">
                                    {{ $competence->name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-base italic">Inga kompetenser listade</p>
                    @endif
                </div>
            </div>
            <div class="w-full flex justify-end">
                <a href="{{ route('student.edit') }}" 
                   role="button"
                   class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white inline-flex justify-center items-center gap-2.5">
                   <span class="justify-start text-white text-base font-medium font-sans leading-none">Ändra profil</span>
                   <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Registrera" class="w-6 h-6">
                </a>
            </div>
        </div>
    </div>

</x-public-layout>
