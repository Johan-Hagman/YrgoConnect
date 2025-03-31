<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classModel()
    {
        return $this->belongsTo(YrgoClass::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'student_competence_junction');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
