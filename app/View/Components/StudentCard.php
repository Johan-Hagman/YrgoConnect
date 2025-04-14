<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $initials, public $name, public $title, public $link, public $description)
    {
        $this->initials = $initials;
        $this->name = $name;
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-card');
    }
}
