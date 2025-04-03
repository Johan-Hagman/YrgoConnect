<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function classModel()
    {
        return $this->belongsTo(YrgoClass::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_competence_junction');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_competence_junction');
    }
}
