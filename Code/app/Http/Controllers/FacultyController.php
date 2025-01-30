<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\student;

class FacultyController extends Controller
{
    /**
     * Filter students by course and display attendance form.
     */
    public function filterByCourse(Request $request)
    {
        $course_id = $request->input('course_id');
        $students = Student::where('course_id', $course_id)->get();

        return view('faculty.attendance', compact('students', 'course_id'));
    }

    /**
     * Store attendance and task marks for a student.
     */
    public function storeAttendance(Request $request)
    {
        // Validate the request
        $request->validate([
            'attendance' => 'required|array',  // Attendance data for each student
            'task_marks' => 'required|array', // Task marks for each student
        ]);

        foreach ($request->attendance as $studentId => $attendanceStatus) {
            $student = Student::findOrFail($studentId);

            // Find or create an attendance record for the student
            $attendance = Attendance::firstOrNew(
                [
                    'roll' => $student->roll,
                    'course_id' => $student->course_id,
                ],
                [
                    'student_name' => $student->student_name,
                    'attended_classes' => 0,
                    'total_classes' => 0,
                    'task_marks' => 0,
                    'attendance' => $attendanceStatus ? 1 : 0, // Boolean or integer value
                    'date' => now(),
                ]
            );

            // Increment total classes
            $attendance->total_classes += 1;

            // If the student is present, increment attended classes
            if ($attendanceStatus) {
                $attendance->attended_classes += 1;
            }

            // Update cumulative task marks
            if (isset($request->task_marks[$studentId])) {
                $attendance->task_marks += $request->task_marks[$studentId];
            }

            // Calculate the attendance percentage
            $attendance->attendance_percentage = $attendance->total_classes > 0
                ? ($attendance->attended_classes / $attendance->total_classes) * 100
                : 0;

            // Save the attendance record
            $attendance->save();
        }

        return redirect()->route('faculty.attendance')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Update attendance and task marks for students.
     */
    public function updateAttendance(Request $request)
    {
        foreach ($request->students as $studentId => $attendanceStatus) {
            $attendance = Attendance::where('student_id', $studentId)->first();

            // If the student is present, increment attended classes
            if ($attendanceStatus) {
                $attendance->attended_classes += 1;
            }

            // Update cumulative task marks
            if (isset($request->task_marks[$studentId])) {
                $attendance->task_marks += $request->task_marks[$studentId];
            }

            // Calculate the attendance percentage
            $attendance->attendance_percentage = $attendance->total_classes > 0
                ? ($attendance->attended_classes / $attendance->total_classes) * 100
                : 0;

            // Save the attendance record
            $attendance->save();
        }

        return redirect()->route('faculty.attendance')->with('success', 'Attendance updated successfully.');
    }

    public function showCoursesData(Request $request)
    {
        $course_id = $request->input('course_id');
    
        // Fetch students for the specific course
        $students = Student::where('course_id', $course_id)
            ->with([ 'attendance' , 'course']) // Load attendance and course relationships
            ->get();
    
        return view('faculty.allotedcourses', compact('students', 'course_id'));
    }
}

