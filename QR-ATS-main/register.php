<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Based Attendance System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .right{
            margin-top: -2rem;
        }
    </style>
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
            <form action="backend/student_data.php" method="post" id="form" onsubmit="return validateForm()">
                <div class="input_area">
                    <input type="text" placeholder="Enter Name" name="name" required>
                </div>
                <div class="input_area">
                    <input type="email" placeholder="Enter Email" name="email" required>
                </div>
                <div class="input_area">
                    <input type="text" placeholder="Enter Roll Number" name="roll_no" required>
                </div>
                <div class="input_area">
                    <select name="section" id="section" required>
                        <option value="" disabled selected>Select Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Set Password" name="password" id="pass" required>
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Comfirm Password" id="cpass" required>
                </div>
                <button class="button_submit" name="register">Register</button>
                <div class="msg">Have an Account? <a href="index.php">Login here</a></div>
            </form>
        </section>
    </main>
    <script>
        function validateForm()
        {
            pass = document.getElementById("pass").value;
            cpass = document.getElementById("cpass").value;

            if(pass==cpass){
                return true;
            }else{
                alert("Enter Password and Confirm Password must be same");
                return false;
            }
        }
    </script>
</body>
</html>