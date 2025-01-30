<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'roll',
        'email',
        'department',
        'course_name',
        'course_id',
        'skill_type'
    ];

    public function attendance()
    {
        return $this->hasOne(Attendance::class, 'roll', 'roll');
    }

    // If there is a Course model related to students
    public function course()
    {
        return $this->belongsTo(EditCourse::class, 'course_id', 'course_id');
    }


}



