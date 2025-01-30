
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
        <h2 style="padding: 1rem; margin-top: 20px;">VIEW FEEDBACK</h2>
        <form action="{{ route('admin.feedback') }}" method="GET">
            @csrf 
            <div class="task-attendance-form"> 
                <div class = "form-group"> 
                    <label for="course-id"> Course ID :</label>
                    <input type="text" name="course_id" id="course-id" value="{{ request('course_id') }}" placeholder="Enter Course ID">
                </div>
            <button type="submit" class="enter-btn">Filter</button>
            </div>
        </form>

        </form>
        <div class="attendance-table">
            <div class = "table-wrapper">
            <table id="courseTable">
                    <tr>
                        <th>COURSE ID</th>
                        <th>COURSE NAME</th>
                        <th>ROLL NUMBER</th>
                        <th>EMAIL</th>
                        <th>SKILL TYPE</th>
                        <th>COURSE ID</th>
                        <th>COURSE NAME</th>
                        <th>FEEDBACK</th>
                        <th>SUBMITTED AT</th>
                    </tr>
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->student_name }}</td>
                        <td>{{ $feedback->roll }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->skilltype }}</td>
                        <td>{{ $feedback->course_id }}</td>
                        <td>{{ $feedback->course_name }}</td>
                        <td>{{ $feedback->feedback }}</td>
                        <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </table>
            </div>
        </div>  
    </div>

<script src="{{ asset('assets/js/admin/scripts.js') }}"></script>
    
</body>

</html>