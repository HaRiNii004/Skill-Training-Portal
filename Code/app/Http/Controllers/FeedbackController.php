<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;

class FeedbackController extends Controller
{
    public function fb(){
        return view('student.feedback');
    }

    public function fbsubmit(request $request){
        $data = $request->validate([
            'student_name' => 'required',
            'roll' => 'required',
            'email' => 'required',
            'skilltype' => 'required',
            'course_id' => 'required',
            'course_name' => 'required', 
            'feedback' => 'nullable',
        ]);

        $newfeedback = feedback::create($data);

        return redirect(route('student.availablecourses'));
    }

    public function showFeedbackData(Request $request)
    {
        $courseId = $request->input('course_id'); // Get the course_id from the query string

        // Fetch feedbacks with or without filtering
        $feedbacks = Feedback::when($courseId, function ($query, $courseId) {
            return $query->where('course_id', $courseId);
        })->get();

        return view('admin.feedback', compact('feedbacks', 'courseId'));
    }
}
