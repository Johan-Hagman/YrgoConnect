<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MultiStepRegistration extends Component
{
    public $step = 1;
    public $user_id;

    // User-data
    public $email, $password, $password_confirmation, $role;

    // Company-data
    public $company_name, $image_url, $city, $contact_name, $website_url;
    public $class = [], $competences = [], $description, $attendance, $terms;

    protected $rules = [
        // Steg 1: User
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',

        // Steg 2 & 3: Company
        'name' => 'required_if:role,company|string',
        'image_url' => 'nullable|url',
        'city' => 'nullable|string',
        'contact_name' => 'nullable|string',
        'website_url' => 'nullable|url',
        'class' => 'required_if:role,company|array',
        'competences' => 'nullable|array',
        'description' => 'nullable|string|max:240',
        'attendance' => 'boolean',
        'terms' => 'required',
    ];

    public function registerUser()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',,
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        Auth::login($user);
        $this->user_id = $user->id;
        $this->step++;
    }

    public function nextStep()
    {
        $this->validate();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $this->validate();

        if ($this->role === 'company') {
            Company::create([
                'user_id' => $this->user_id,
                'name' => $this->name,
                'image_url' => $this->image_url,
                'city' => $this->city,
                'contact_name' => $this->contact_name,
                'website_url' => $this->website_url,
                'class' => json_encode($this->class),
                'competences' => json_encode($this->competences),
                'description' => $this->description,
                'attendance' => $this->attendance,
            ]);
        }

        $this->step = 5;
    }

    public function render()
    {
        return view('livewire.multi-step-registration');
    }
}
