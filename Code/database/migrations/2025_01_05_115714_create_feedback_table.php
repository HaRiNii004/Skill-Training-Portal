<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->string('student_name');
        $table->string('roll');
        $table->string('email');
        $table->string('skilltype');
        $table->string('course_id'); // Keep only one course_id
        $table->string('course_name');
        $table->text('feedback');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
