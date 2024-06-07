<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Based Attendance System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="resources/img/Attendance System.png" type="image/x-icon">
</head>
<body>
    <main>
        <section class="left">
            <div class="logo">
                 
                <h2>Attendance System</h2>
            </div>
            <img src="resources/img/img1.jpg" alt="">
        </section>
        <section class="right">
            <form id="form" method="post">
                <h2>Select Your Role</h2>
                <input type="radio" name="role" id="teacher_radio" onchange="checkRadio()" value="teacher" required>
                <label for="teacher_radio">Teacher</label>

                <input type="radio" name="role" id="student_radio" onchange="checkRadio()" value="student" required>
                <label for="student_radio">Student</label>

                <div class="input_area">
                    <input type="email" placeholder="Enter Email" name="email" required>
                    <img src="resources/img/mail.png" alt="">
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <img src="resources/img/padlock.png" alt="">
                </div>
                <button class="button_submit">Login</button>
                <div class="msg">New Student? <a href="register.php">Register here</a></div>
            </form>
        </section>
    </main>
    <script>

        function checkRadio(){

            let form = document.getElementById("form");


            if(document.getElementById("teacher_radio").checked){
                form.setAttribute("action", "teacher/index.php");
            }

            if(document.getElementById("student_radio").checked){
                form.setAttribute("action", "student/index.php");
            }
        }
    </script>
</body>
</html>