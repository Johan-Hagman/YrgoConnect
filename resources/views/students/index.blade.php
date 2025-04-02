<x-app-layout>
    <h1 class="text-2xl font-bold">Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    <ul>
        @foreach ($students as $student)
            <li><a href="{{ route('students.show', $student) }}">{{ $student->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>