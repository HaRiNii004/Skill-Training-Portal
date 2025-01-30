<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function register(){
        return view('student.register');
    }

    public function store(Request $request){
        $data = $request->validate([
            'student_name' => 'required',
            'roll' => 'required',
            'email' => [
            'required',
            'email',
            Rule::unique('students')->where(function ($query) use ($request) {
                return $query->where('course_id', $request->course_id);
            }),
        ],
            'department' => 'required',
            'course_name' => 'required',
            'course_id' => 'required',
            'skill_type' => 'required',
        ], [
            
            'email.unique' => 'Already registered for this course.',
        ]);

        $newstudent = student::create($data);
        return redirect(route('student.register'));
    }

    public function showAttendanceForm(){
    
        $students = Student::all();
        return view('faculty.attendance', compact('students'));
    
    }

    public function show(){
        $courses = editcourse::all();
        return view('student.availablecourses' , ['courses' => $courses]);
    }

    public function showCourseData(Request $request)
{
    $course_id = $request->course_id;

    // Fetch students for the specific course
    $students = Student::where('course_id', $course_id)
        ->with([ 'attendance' , 'course']) // Load attendance and course relationships
        ->get();

    return view('admin.viewcourse', compact('students', 'course_id'));
}

}
