
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
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <span>Skill training portal</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>     
        <ul>
            <li>
            <a href="{{ route('admin.editcourse') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">Edit Courses</span>
                </a>
            </li>
            <li>
            <a href="{{ route('admin.viewcourse') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">View Courses</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.feedback') }}">
                <i class='bx bx-user-voice' id="register-icon"></i>
                <span class="nav-item">View Feedback</span>
                </a>
            </li>
            <li>
                <a href="signin.html">
                <i class='bx bx-log-out' ></i>
                <span class="nav-item">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container"></div>
        <div id="topbar">
            <a href="#" class="user-link">
                <i class='bx bx-user-circle'></i>
                <span class="top">HARINI S</span>
            </a>
        </div>
        <h2 style="padding: 1rem; margin-top: 20px;">EDIT COURSES</h2>
        <form method="get" action="{{ route('filter.department') }}">
        @csrf
        <div class="task-attendance-form">
            
            <div class="form-group">
                <label for="skill-type">Department:</label>
                    <select id="skill-type" name="department">
                        <option value="AIDS">AIDS</option>
                        <option value="AIML">AIML</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="EI">EI</option>
                        <option value="EI">FT</option>
                        <option value="IT">IT</option>
                        <option value="EI">Mech</option>
                    </select>
            </div>
            <button type="submit" class="enter-btn">Filter</button>
        </div>
        </form>
        
        <div class="attendance-table">
            <div class = "table-wrapper">
            <table id="courseTable">
                    <tr>
                        <th>COURSE ID</th>
                        <th>COURSE NAME</th>
                        <th>SKILL TYPE</th>
                        <th>DEPARTMENT</th>
                        <th>FACULTY HANDLER</th>
                        <th>FACULTY ID</th>
                        <th>SYLLABUS</th>
                        <th>VENUE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_id }}</td>
                            <td>{{ $course->course_name}}</td>
                            <td>{{ $course->skilltype}}</td>
                            <td>{{ $course->department}}</td>
                            <td>{{ $course->faculty_handler}}</td>
                            <td>{{ $course->faculty_id}}</td>
                            <td><a href="{{ asset($course->syllabus) }}" target="_blank">View Syllabus</a></td> 
                            <td>{{ $course->venue}}</td>
                            <td>
                                <a href="{{ route('admin.editlink', ['course' => $course->id] )}}">Edit</a>
                            </td>                       
                            <td> <form method="post" action ="{{route('admin.editlink.delete' , ['course' => $course])}}" >
                                @csrf
                                @method('delete')
                                <input type="submit" class="delete-btn" value="Delete">
                                </form></td>
                        </tr>
                    @endforeach
            </table>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="button-wrapper">
            <button id="openModal">Insert</button>
        </div>
    
        <!-- The Modal -->
        <div id="courseModal" class="modal">
        <!-- Modal content -->
            <div class="modal-content">
                <h2>Insert Course</h2>
                <div>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <form method="post" action="{{route('admin.editcourse.insert')}}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    
                    <label for="courseName">Name of the Course</label>
                    <input type="text" id="courseName" name="course_name" placeholder="Enter the course name">
                
                    <label for="courseId">Course ID</label>
                    <input type="text" id="courseId" name="course_id" placeholder="Enter the course ID">

                    <label for="skilltype">Skill Type</label>
                    <input type="text" id="skilltype" name="skilltype" placeholder="Enter the skilltype">
                
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" placeholder="Enter the department">
                
                    <label for="facultyHandler">Faculty Handler</label>
                    <input type="text" id="facultyHandler" name="faculty_handler" placeholder="Name of the faculty handler">
                
                    <label for="facultyId">Faculty ID</label>
                    <input type="text" id="facultyId" name="faculty_id" placeholder="Enter the faculty ID">

                    <label for="venue">Venue</label>
                    <input type="text" id="venue" name="venue" placeholder="Enter the Venue">

                    <label for="syllabus">Syllabus</label>
                    <input type="file" id="syllabus" name="syllabus" accept="application/pdf">
                
                    <div class="modals-buttons">
                        <button type="button" id="cancelBtn" class="cancel-btn">Cancel</button>
                        <button type="submit" id="insertBtn" class="insert-btn">Insert</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>



<script src="{{ asset('assets/js/admin/scripts.js') }}"></script>
    
</body>

</html>