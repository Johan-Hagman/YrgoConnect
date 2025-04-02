<x-app-layout>
    <h1 class="text-2xl font-bold">Edit Company</h1>
    <form method="POST" action="{{ route('companies.update', $company) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $company->name }}" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app-layout>