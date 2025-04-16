<x-public-layout>
    
    <x-hero-section />

    <x-event-info />

    <livewire:dashboard-cards :role="auth()->user()->role->name" />

</x-public-layout>
