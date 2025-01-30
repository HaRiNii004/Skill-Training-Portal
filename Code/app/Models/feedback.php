<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'roll',
        'email',
        'skilltype',
        'course_id',
        'course_name',
        'feedback',
    ];
    
}
