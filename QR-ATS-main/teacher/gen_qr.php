<?php
session_start();

if (!isset($_SESSION["teacher_name"])) {
    header("location:../index.php");
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