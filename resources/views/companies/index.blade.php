<x-app-layout>
    <h1 class="text-2xl font-bold">Companies</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
    <ul>
        @foreach ($companies as $company)
            <li><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>