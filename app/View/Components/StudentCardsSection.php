<?php

namespace App\View\Components;

use App\Models\Student;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentCardsSection extends Component
{
    public function render(): View|Closure|string
    {
        $students = Student::with('classModel')->latest()->paginate(9);

        return view('components.student-cards-section', [
            'students' => $students,
        ]);
    }
}
