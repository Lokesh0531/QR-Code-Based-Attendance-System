<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Based Attendance System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../resources/img/Attendance System.png" type="image/x-icon">
</head>
<body>
    <main>
        <section class="left">
            <div class="logo">
                <h2>Attendance System</h2>
            </div>
            <img src="../resources/img/img1.jpg" alt="">
        </section>
        <section class="right">
            <form id="form" method="post" action="#">
                <h2>Login as Admin</h2>
                <div class="input_area">
                    <input type="email" placeholder="Enter Email" name="email" required>
                    <img src="../resources/img/mail.png" alt="">
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Enter Password" name="pass" required>
                    <img src="../resources/img/padlock.png" alt="">
                </div>
                <input type="submit" value="Login" name="login" class="button_submit">
            </form>
        </section>
    </main>
</body>
</html>

<?php

if(isset($_POST["login"]))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con = mysqli_connect("localhost", "root", "", "qr_ats");
    $query = "select * from admin where email='$email' and pass='$pass'";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) <= 0){
        echo "<script>
            alert('Enter Valid Credencial')
        </script>";
    }
    else{
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        header("location:dashboard.php");
    }
}
?>