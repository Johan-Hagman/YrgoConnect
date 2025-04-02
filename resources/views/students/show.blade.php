<x-app-layout>
    <h1 class="text-2xl font-bold">{{ $student->name }}</h1>
    <a href="{{ route('students.edit', $student) }}" class="btn btn-secondary">Edit</a>
</x-app-layout>
