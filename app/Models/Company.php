<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'company_competence_junction');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
