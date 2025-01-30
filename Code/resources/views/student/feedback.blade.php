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
    <link rel="stylesheet" href="{{ asset('assets/css/student/feedback.css') }}">
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
                <a href="/register/feedback.html">
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
        </div class="feed">
            <h1 style="margin: 20px;">FEEDBACK FORM</h1>
            <form method = "post" action ="{{route('student.feedback.submit')}}">
            @csrf 
            @method('post')
            <div class="feedback-form" >
                <label for="student_name">NAME</label>
                <input type="text" name="student_name" placeholder="name">
    
                <label for="roll">ROLL NUMBER</label>
                <input type="text"  name="roll" placeholder="Roll Number">
    
                <label for="email">MAIL -ID</label>
                <input type="email" placeholder="mail-id" name="email">
    
                <label for="skilltype">SKILL TYPE</label>
                <input type="text"  name="skilltype" placeholder="Skill type">
    
                <label for="course_id">COURSE ID</label>
                <input type="text" name="course_id" placeholder="course-id">
    
                <label for="course_name">COURSE NAME</label>
                <input type="text" name="course_name" placeholder="course name">

                <label for="feedback">FEEDBACK</label>
                <textarea name="feedback" placeholder="feedback" rows="4"></textarea>
    
                <input type="submit" value = "Submit Feedback">
            </div>
</form>
        </div>
        
    </div>

        
        
</div>

  
</body>
<script src="script.js"></script>


    <script>
        let btn=document.querySelector('#btn');
        let sidebar=document.querySelector('.sidebar');

        btn.onclick=function(){
            sidebar.classList.toggle('active');
        }

    </script>
</html>