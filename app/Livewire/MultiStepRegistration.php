<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MultiStepRegistration extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $user_id;

    // User-data
    public $email, $password, $password_confirmation, $role;

    // Company-data
    public $company_name, $image, $city, $contact_name, $website_url;
    public $class = [], $competences = [], $description;
    public $event_attendance = false, $accept_terms = false;

    protected $rules = [
        // Steg 1
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|in:student,company',

        // Steg 2-3 (om company)
        'company_name' => 'required_if:role,company|string',
        'image' => 'nullable|image|max:1024',
        'city' => 'nullable|string',
        'contact_name' => 'required_if:role,company|string',
        'website_url' => 'nullable|url',
        'class' => 'required_if:role,company|array',
        'competences' => 'nullable|array',
        'description' => 'nullable|string|max:240',
        'event_attendance' => 'boolean',
        'accept_terms' => 'accepted',
    ];

    public function registerUser()
    {
        $this->validateOnly('email');
        $this->validateOnly('password');
        $this->validateOnly('role');

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

        $imagePath = $this->image ? $this->image->store('logos', 'public') : null;

        if ($this->role === 'company') {
            Company::create([
                'user_id' => $this->user_id,
                'name' => $this->company_name,
                'image_url' => $imagePath,
                'city' => $this->city,
                'contact_name' => $this->contact_name,
                'website_url' => $this->website_url,
                'class' => json_encode($this->class),
                'competences' => json_encode($this->competences),
                'description' => $this->description,
                'attendance' => $this->event_attendance,
            ]);
        }

        $this->step = 5;
    }

    public function render()
    {
        return view('livewire.multi-step-registration');
    }
}
