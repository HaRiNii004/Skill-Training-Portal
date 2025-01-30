
<!DOCTYPE html>
<html lang="en">
<head>
<title>Skill training portal</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/faculty/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/faculty/register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/faculty/faculty.css') }}">
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
            <a href="{{ route('faculty.attendance') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">Attendance Entry</span>
                </a>
            </li>
            <li>
                <a href="{{ route('faculty.allotedcourses') }}">
                <i class='bx bxl-youtube' id="register-icon"></i>
                <span class="nav-item">View Student Data</span>
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

        <h2 style="padding: 1rem; margin-top: 20px;">MANAGE COURSES</h2>
           
        <form method="get" action="{{ route('faculty.allotedcourses') }}">
        @csrf
        <div class="task-attendance-form">
            <div class="form-group">
                <label for="course-id">Course ID</label>
                <input type="text" id="course-id" name="course_id" placeholder="ENTER COURSE ID">
            </div>
            <button type="submit" class="enter-btn">ENTER</button>
        </div>
        </form>

        <div class="attendance-table">
    <table>
        <thead>
            <tr>
                <th>COURSE NAME</th>
                <th>STUDENT NAME</th>
                <th>ROLL NUMBER</th>
                <th>MAIL ID</th>
                <th>ATTENDANCE PERCENTAGE</th>
                <th>TOTAL CLASSES</th>
                <th>ATTENDED CLASSES</th>
                <th>MARKS SECURED</th>
                <th>FACULTY HANDLER</th>
            </tr>
        </thead>
        <tbody>
    @if(isset($students) && $students->isNotEmpty())
        @foreach($students as $student)
            <tr>
                <td>{{ $student->course->course_name ?? 'N/A' }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->attendance->attendance_percentage ?? '0.00' }}%</td>
                <td>{{ $student->attendance->total_classes ?? 'N/A' }}</td>
                <td>{{ $student->attendance->attended_classes ?? 'N/A' }}</td>
                <td>{{ $student->attendance->task_marks ?? 'N/A' }}</td>
                <td>{{ $student->course->faculty_handler ?? 'N/A' }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7">No data found for Course ID: {{ $course_id ?? 'N/A' }}</td>
        </tr>
    @endif
</tbody>

    </table>
</div>


<script src="scripts.js"></script>


    <script>
        let b=document.querySelector('#btn');
        let sidebar=document.querySelector('.sidebar');

        b.onclick=function(){
            sidebar.classList.toggle('active');
        }


    </script>
</body>

</html>