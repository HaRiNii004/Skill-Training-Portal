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
                <a href="/faculty/dashboard.html">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Dashboard</span>
                </a>
            </li>
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
                <a href="fsignin.html">
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
        <h2 style="padding: 1rem; margin-top: 20px;">DAILY TASK AND ATTENDANCE MANAGEMENT</h2>
        <form method="get" action="{{ route('filter.course') }}">
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
            <form method="post" action="{{ route('store.attendance') }}">
                @csrf
                <table class="table mt-4">
                    <tr>
                        <th>STUDENT NAME</th>
                        <th>ROLL NUMBER</th>
                        <th>MAIL</th>
                        <th>COURSE ID</th>
                        <th>DAILY ATTENDANCE</th>
                        <th>DAILY TASK MARKS</th>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->student_name }}</td>
                            <td>{{ $student->roll }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course_id }}</td>
                            <td>
                                <input type="hidden" name="attendance[{{ $student->id }}]" value="0">
                                <input type="checkbox" name="attendance[{{ $student->id }}]" value="1">
                            </td>
                            <td>
                                <input type="number" name="task_marks[{{ $student->id }}]}" min="0" max="10" placeholder="Enter Task Marks">
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function() {
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>