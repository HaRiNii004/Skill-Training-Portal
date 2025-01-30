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
        Schema::table('editcourses', function (Blueprint $table) {
            $table->string('department')->nullable()->after('course_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('editcourses', function (Blueprint $table) {
            $table->dropColumn('department');
        });
    }
};
