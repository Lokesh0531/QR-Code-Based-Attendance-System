<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['password'];
$con = mysqli_connect("localhost", "root", "", "qr_ats");
$query = "select * from teacher where email='$email' and password='$pass'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) <= 0) {
  echo "<script>
        alert('Enter Valid Credencial')
        location.href='../index.php'
    </script>";
} else {
  $_SESSION['teacher_name'] = $row['name'];
  $_SESSION['teacher_email'] = $row['email'];
  $_SESSION['subject'] = $row['subject'];
}

if (!isset($_SESSION["teacher_name"])) {
  header("location:../index.php");
}else{
  header("location:gen_qr.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    a.button_submit{
      color: tomato;
      background-color: white;
      display: block;
      text-align: center;
      padding-top: 15px;
    }
  </style>
</head>

<body>
  <main>
    <?php $title = 'Attendace System';
    $username = $_SESSION['teacher_name'];
    include "../componets/header.php" ?>
    <div id="box">
      <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
      <main>
        <button class="button_submit" id="btn1" onclick="changeQR()">Generate QR Code For Attendance</button><br>
        <a href="show_attendance.php" class="button_submit">Show Attendance</a>
        <div id="qrcode"></div>
      </main>
    </div>
  </main>
  <script src="../js/qrcode.js"></script>
  <script>
    var show = 0;
    function showBox() {
      box = document.getElementById('box');
      if (show == 0) {
        box.style.height = "100px";
        show = 1;
      } else {
        box.style.height = "0px";
        show = 0;
      }
    }

    function changeQR() {      
      var qrcode = new QRCode("qrcode", '{"subject":"<?php date_default_timezone_set("Asia/Calcutta"); echo $_SESSION['subject'];?>","date":"<?php $date=date_create(); echo date_format($date,"Y/m/d H:i:s");?>"}');
      document.getElementById("btn1").style.display='none';
    }
  </script>
</body>

</html>