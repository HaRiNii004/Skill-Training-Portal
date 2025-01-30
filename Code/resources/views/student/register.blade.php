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
<h2 style="padding: 1rem; margin-top: 20px;">Register for a course</h2>
        <div id="box1" class="form-container">
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
                @endif
            </div>
            <form method="post" action="{{route('student.register.store')}}">
            @csrf 
            @method('post')    
            <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="student_name" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="roll-number">Roll Number:</label>
                    <input type="text" id="roll-number" name="roll" placeholder="Enter your roll number">
                </div>

                <div class="form-group">
                    <label for="email">Mail ID:</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" placeholder="Enter your department">
                </div>

                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" placeholder="Enter your course name">
                </div>

                <div class="form-group">
                    <label for="course_id">Course ID:</label>
                    <input type="text" id="course_id" name="course_id" placeholder="Enter your course id">
                </div>

                <div class="form-group">
                    <label for="skill_type">Skill Type:</label>
                    <input type="text" id="skill_type" name="skill_type" placeholder="Day Skill / Night Skill">
                </div>
                
                <div class="form-group"> 
                    <input type="submit" value="Register"/>
                </div>
            </form>
        </div>
    </body>
</html>
        