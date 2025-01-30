<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditcourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});



    

    Route::get('/editcourse', [EditcourseController::class, 'edit'])->name('admin.editcourse');
    Route::post('/editcourse', [EditcourseController::class, 'insert'])->name('admin.editcourse.insert');
    Route::get('/editcourse/filter', [EditcourseController::class, 'filterByDepartment'])->name('filter.department');
    Route::get('/editcourse/{course}/edit', [EditcourseController::class, 'editlink'])->name('admin.editlink');
    Route::put('/editcourse/{course}/update', [EditcourseController::class, 'update'])->name('admin.editlink.update');
    Route::delete('/editcourse/{course}/delete', [EditcourseController::class, 'delete'])->name('admin.editlink.delete');
    Route::get('/viewcourse', [StudentController::class, 'showCourseData'])->name('admin.viewcourse');
    Route::get('/admin/feedback', [FeedbackController::class, 'showFeedbackData'])->name('admin.feedback');

    Route::get('/availablecourses', [EditcourseController::class, 'show'])->name('student.availablecourses');
    Route::get('student/register', [StudentController::class, 'register'])->name('student.register');
    Route::post('student/register', [StudentController::class, 'store'])->name('student.register.store');
    Route::get('student/feedback', [FeedbackController::class, 'fb'])->name('student.feedback');
    Route::post('student/feedback', [FeedbackController::class, 'fbsubmit'])->name('student.feedback.submit');

    Route::get('/faculty/attendance', [StudentController::class, 'showAttendanceForm'])->name('faculty.attendance');
    Route::get('/faculty/attendance/filter', [FacultyController::class, 'filterByCourse'])->name('filter.course');
    Route::post('/faculty/attendance', [FacultyController::class, 'storeAttendance'])->name('store.attendance');
    Route::post('/faculty/attendance/update', [FacultyController::class, 'updateAttendance'])->name('update.attendance');
    Route::get('/faculty/allotedcourses', [FacultyController::class, 'showCoursesData'])->name('faculty.allotedcourses');

    




