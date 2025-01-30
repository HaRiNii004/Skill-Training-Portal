<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'roll',
        'course_id',
        'total_classes',
        'attended_classes',
        'attendance_percentage',
        'attendance',
        'task_marks',
        'date',
        
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_roll', 'roll');
    }


}
