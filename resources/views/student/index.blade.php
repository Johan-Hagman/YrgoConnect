<x-app-layout>
    <h1 class="text-2xl font-bold">Students</h1>
    <ul>
        @foreach ($students as $student)
            <li><a href="{{ route('student.show', $student) }}">{{ $student->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>