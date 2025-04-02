<x-app-layout>
    <h1 class="text-2xl font-bold">Create Company</h1>
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Company Name" required>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-app-layout>