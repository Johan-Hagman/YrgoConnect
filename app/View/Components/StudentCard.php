<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentCard extends Component
{
    public function __construct(
        public string|null $imageUrl = '',
        public string|null $name = '',
        public string|null $title = '',
        public string|null $link = '',
        public string|null $description = ''
    ) {}


    public function render(): View|Closure|string
    {
        return view('components.student-card');
    }
}
