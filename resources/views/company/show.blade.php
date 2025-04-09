<x-app-layout>
    <h1 class="text-2xl font-bold">{{ $company->name }}</h1>
    <a href="{{ route('company.edit', $company) }}" class="btn btn-secondary">Edit</a>
</x-app-layout>