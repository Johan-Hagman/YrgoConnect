
<section class="grid grid-cols-1 gap-4 px-4 sm:grid-cols-2 lg:grid-cols-3 lg:px-20">
    @foreach ($students as $student)
        <x-student-card 
            :image-url="$student->image_url"
            :name="$student->name"
            :title="$student->classModel?->name"
            :link="$student->website_url"
            :description="$student->description"
        />
    @endforeach
</section>

{{-- Pagination --}}
<div class="mt-6 px-4">
    {{ $students->links() }}
</div>
