<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image_url',
        'city',
        'contact_name',
        'website_url',
        'description',
        'attendance',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'company_competence_junction');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
