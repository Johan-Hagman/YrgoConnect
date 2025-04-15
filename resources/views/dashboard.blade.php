<x-public-layout>
    
    <x-hero-section />

    <x-event-info />

 

    @if(auth()->user()->role->name === 'Företag')
    <x-student-cards-section />
@elseif(auth()->user()->role->name === 'Student')
    <x-company-cards-section />
@endif

</x-public-layout>
