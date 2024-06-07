<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "qr_ats");
$subject = $_GET['sub'];
$rollno = $_GET['roll'];
$query = "SELECT * FROM attendance WHERE subject='$subject' and rollno='$rollno'";
$result = mysqli_query($con, $query);

// $row = mysqli_fetch_assoc($result);



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
    .h{
        position: absolute;
        left: 0px;
        z-index: -10;
    }
  </style>
</head>

<body>
    <?php $title = 'Attendace System';
    $username = $_SESSION['teacher_name'];
    include "../componets/header.php" ?>
    <div id="box">
      <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <table class="h">
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Date</th>
            </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>".$row["rollno"]."</td>
                    <td>".$row["s_name"]."</td>
                    <td>".$row["section"]."</td>
                    <td>".$row["subject"]."</td>
                    <td>".$row["date"]."</td>
                </tr>";
            }

        ?>
        </table>
    </div>
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
  </script>
</body>

</html>