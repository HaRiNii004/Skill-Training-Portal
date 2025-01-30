<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\editcourse;

class EditcourseController extends Controller
{
    public function edit(){
        $courses = editcourse::all();
        return view('admin.editcourse' , ['courses' => $courses]);
    }

    public function insert(Request $request)
    {
 
    $data = $request->validate([
        'course_name' => 'required',
        'course_id' => 'required',
        'skilltype' => 'required',
        'department' => 'required',
        'faculty_handler' => 'required',
        'faculty_id' => 'required',
        'syllabus' => 'required|file|mimes:pdf|max:2048', 
        'venue' => 'required',
    ]);

    if ($request->hasFile('syllabus')) {
        $file = $request->file('syllabus');
        $filename = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('assets/pdf'), $filename);

        $data['syllabus'] = 'assets/pdf/' . $filename;
    }

    $neweditcourse = Editcourse::create($data);

    return redirect(route('admin.editcourse'))->with('success', 'Course added successfully!');
    }

    public function filterByDepartment(Request $request)
    {
        $department = $request->input('department');

        $courses = editcourse::where('department', $department)->get();
        return view('admin.editcourse', ['courses' => $courses]);
    }

    public function editlink(editcourse $course){
        return view('admin.editlink' , ['course' => $course]);
    }

    public function update(editcourse $course , Request $request){
        $data = $request->validate([
            'course_id' => 'required',
            'course_name' => 'required',
            'skilltype' => 'required',
            'department' => 'required',
            'faculty_handler' => 'required',
            'faculty_id' => 'required',
            'venue' => 'required',
        ]);

        $course->update($data);

        return redirect(route('admin.editcourse'))->with('success','Course updated successfully');
    }

    public function delete(editcourse $course){
        $course->delete();

        return redirect(route('admin.editcourse'))->with('delete', 'Course deleted successfully');
    }

    public function show(){
        $courses = Editcourse::all();
        return view('student.availablecourses' , ['courses' => $courses]);
    }
}
