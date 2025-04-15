<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyCard extends Component
{
    public function __construct(
        public ?string $imageUrl = null,
        public string $name = '',
        public string $city = '',
        public array $classes = [],
        public ?string $websiteUrl = null,
        public ?string $description = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.company-card');
    }
}
