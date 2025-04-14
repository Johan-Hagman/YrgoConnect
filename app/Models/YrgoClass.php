<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YrgoClass extends Model
{
    protected $table = 'classes';

    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function competences()
    {
        return $this->hasMany(Competence::class);
    }
}
