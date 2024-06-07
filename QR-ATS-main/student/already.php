<?php
session_start();
if (!isset($_SESSION["student_name"])) {
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
    .msg{
      color: red;
    }
  </style>
</head>

<body>
  <main>
    <?php $title = 'Attendace System';
    $username = $_SESSION['student_name'];
    include "../componets/header.php" ?>
    <div class="container">
      <h1 class="msg">Already Attendance Registered! 🤦‍♂️</h1>
    </div>
  </main>
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
  </script>
</body>

</html>