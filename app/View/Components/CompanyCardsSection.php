<?php

namespace App\View\Components;

use App\Models\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyCardsSection extends Component
{
    public function render(): View|Closure|string
    {
        $companies = Company::with('classes')->latest()->paginate(9);
        return view('components.company-cards-section', compact('companies'));
    }
}
