<x-app-layout>
    <h1 class="text-2xl font-bold">Edit Student</h1>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $student->name }}" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app-layout>