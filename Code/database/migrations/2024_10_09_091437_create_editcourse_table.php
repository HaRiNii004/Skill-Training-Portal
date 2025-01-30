<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        if (!Schema::hasTable('editcourses')) {
            Schema::create('editcourses', function (Blueprint $table) {
                $table->id();
                $table->string('course_id');   
                $table->string('course_name');
                $table->string('skilltype');  
                $table->string('faculty_handler');  
                $table->string('faculty_id');
                $table->string('department');
                $table->string('syllabus');
                $table->string('venue');
                $table->timestamps();
            });
        }
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editcourses');
    }
};
