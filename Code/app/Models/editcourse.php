<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editcourse extends Model
{
    use HasFactory;
    protected $table = 'editcourses';
    protected $fillable = [
        'course_id',   
        'course_name', 
        'skilltype',
        'department',  
        'faculty_handler', 
        'faculty_id', 
        'venue',
        'syllabus',       
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id', 'course_id');
    }
}
