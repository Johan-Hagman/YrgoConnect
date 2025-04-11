<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image_url',
        'website_url',
        'description',
        'cv_url',
        'linkedin_url',
        'class_id'
    ];

    public function classModel()
    {
        return $this->belongsTo(YrgoClass::class, 'class_id');
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
