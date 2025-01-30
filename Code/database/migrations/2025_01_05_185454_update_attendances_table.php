<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Add new columns
            $table->integer('total_classes')->default(0)->after('course_id');
            $table->integer('attended_classes')->default(0)->after('total_classes');
            $table->decimal('attendance_percentage', 5, 2)->default(0.00)->after('attended_classes');

            // Remove columns if needed (uncomment to use)
            // $table->dropColumn('column_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Drop added columns
            $table->dropColumn('total_classes');
            $table->dropColumn('attended_classes');
            $table->dropColumn('attendance_percentage');
        });
    }
}
