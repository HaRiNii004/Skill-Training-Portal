

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Skill training portal</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="{{ asset('assets/css/admin/googlefonts.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/popup.css') }}">
</head>
<body>
            <div class="modal-content">
                <h2>Edit Course</h2>
                <form id="editCourseForm" method="post" action="{{route('admin.editlink.update' , ['course' => $course])}} ">
                @csrf
                @method('put')
                <label for="editCourseId">Course Id</label>
                <input type="text" name="course_id" value="{{$course->course_id}}"  >

                <label for="editCourseName">Name of the Course</label>
                <input type="text"  name="course_name" value="{{$course->course_name}}" >

                <label for="editskilltype">Skill Type</label>
                <input type="text"  name="skilltype" value="{{$course->skilltype}}" >

                <label for="editDepartment">Department</label>
                <input type="text"  name="department" value="{{$course->department}}" >

                <label for="editFacultyHandler">Faculty Handler</label>
                <input type="text" name="faculty_handler" value="{{$course->faculty_handler}}" >
                    
                <label for="editFacultyId">Faculty ID</label>
                <input type="text"  name="faculty_id" value="{{$course->faculty_id}}" >

                <label for="editVenue">Venue</label>
                <input type="text"  name="venue" value="{{$course->venue}}" >
                    
                <div class="modal-buttons">
                    <button type="button" id="cancelEditBtn" class="cancel-btn">Cancel</button>
                    <button type="submit" id="saveEditBtn" class="save-btn">Update</button>
                </div>
                </form>
            
    </div>
    <script src="{{ asset('assets/js/admin/scripts.js') }}"></script>


    
</body>

</html>  

