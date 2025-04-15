{{-- resources/views/favorites/index.blade.php --}}
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">My Favorites</h1>
            
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Students</h2>
                @if($studentFavorites->count() > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($studentFavorites as $student)
                            <li class="py-4 flex items-center justify-between">
                                <div>
                                    <a href="{{ route('student.show', $student) }}" class="text-indigo-600 hover:text-indigo-900">
                                        {{ $student->name }}
                                    </a>
                                </div>
                                <livewire:favorite-button :favoritable="$student" wire:key="student-{{$student->id}}" />
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No favorite students yet.</p>
                @endif
            </div>
            
            <div>
                <h2 class="text-xl font-semibold mb-4">Companies</h2>
                @if($companyFavorites->count() > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($companyFavorites as $company)
                            <li class="py-4 flex items-center justify-between">
                                <div>
                                    <a href="{{ route('company.show', $company) }}" class="text-indigo-600 hover:text-indigo-900">
                                        {{ $company->name }}
                                    </a>
                                </div>
                                <livewire:favorite-button :favoritable="$company" wire:key="company-{{$company->id}}" />
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No favorite companies yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>