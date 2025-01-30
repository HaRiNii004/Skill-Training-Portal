
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Skill training portal</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/student/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/student/register.css') }}">
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
                <a href="/sign/login.html">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Main</span>
                </a>
            </li>
            <li>
            <a href="{{ route('student.availablecourses') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">Available course</span>
                </a>
            </li>
            <li>
            <a href="{{ route('student.register') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">Register course</span>
                </a>
            </li>
           
            <li>
            <a href="{{ route('student.feedback') }}">
                <i class='bx bx-user-voice'></i>
                <span class="nav-item">Feedback</span>
                </a>
            </li>

            <li>
                <a href="/sign/signin.html">
                <i class='bx bx-log-out' ></i>
                <span class="nav-item">logout</span>
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
        <h2 style="padding: 1rem; margin-top: 20px;">Available courses</h2>
        <div class="course-table">
            <table>
                    <tr>
                        <th>COURSE ID</th>
                        <th>COURSE NAME</th>
                        <th>SKILL TYPE</th>
                        <th>DEPARTMENT</th>
                        <th>FACULTY HANDLER</th>
                        <th>FACULTY ID</th>
                        <th>SYLLABUS</th>
                        <th>VENUE</th>
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
                        </tr>
                    @endforeach        
            </table>
        </div>
        
    </div>

        
        
</div>
<script src="script.js"></script>


    <script>
        let btn=document.querySelector('#btn');
        let sidebar=document.querySelector('.sidebar');

        btn.onclick=function(){
            sidebar.classList.toggle('active');
        }

    </script>
</body>

</html>