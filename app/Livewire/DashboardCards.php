<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use App\Models\Student;

class DashboardCards extends Component
{
    use WithPagination;

    public $role;
    public $selectedClass = null;
    public $selectedCompetence = null;

    protected $queryString = ['selectedClass', 'selectedCompetence'];

    public function updatingSelectedClass()
    {
        $this->resetPage();
    }
    public function updatingSelectedCompetence()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->role === 'Företag') {
            $items = Student::with(['classModel', 'competences'])
                ->when($this->selectedClass, fn($q) => $q->whereHas('classModel', fn($q) => $q->where('name', $this->selectedClass)))
                ->when($this->selectedCompetence, fn($q) => $q->whereHas('competences', fn($q) => $q->where('name', $this->selectedCompetence)))
                ->latest()->paginate(9);
        } else {
            $items = Company::with(['classes', 'role', 'user'])
                ->when($this->selectedClass, fn($q) => $q->whereHas('classes', fn($q) => $q->where('name', $this->selectedClass)))
                ->when($this->selectedCompetence, fn($q) => $q->whereHas('skills', fn($q) => $q->where('name', $this->selectedCompetence)))
                ->latest()->paginate(9);
        }

        return view('livewire.dashboard-cards', ['items' => $items]);
    }

    public $competences = [];

    public function mount()
    {
        $this->competences = \App\Models\Competence::pluck('name')->toArray();
    }
}
