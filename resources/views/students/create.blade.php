<x-app-layout>
    <h1 class="text-2xl font-bold">Create Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Student Name" required>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-app-layout>