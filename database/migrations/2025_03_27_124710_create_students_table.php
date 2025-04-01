<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('image_url')->nullable();
            $table->string('website_url')->nullable();
            $table->text('description')->nullable();
            $table->string('cv_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('class_id')->references('id')->on('classes')->nullOnDelete();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
