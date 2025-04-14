<x-app-layout>
    <h1 class="text-2xl font-bold">Companies</h1>
    <ul>
        @foreach ($companies as $company)
            <li><a href="{{ route('company.show', $company) }}">{{ $company->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>