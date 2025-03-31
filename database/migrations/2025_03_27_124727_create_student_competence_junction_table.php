<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_competence_junction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('competence_id');
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreign('competence_id')->references('id')->on('competences')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_competence_junction');
    }
};
