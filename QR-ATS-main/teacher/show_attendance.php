<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "qr_ats");
$subject = $_SESSION['subject'];
$query = "SELECT rollno, s_name,section, COUNT(rollno),subject, date FROM attendance WHERE subject='$subject' GROUP BY s_id;";
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
    a {
      text-decoration: none;
      color: black;
    }
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
                <th>No of Lecture Attend</th>
                <th>Subject</th>
                <th>Details</th>
            </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>".$row["rollno"]."</td>
                    <td>".$row["s_name"]."</td>
                    <td>".$row["section"]."</td>
                    <td>".$row["COUNT(rollno)"]."</td>
                    <td>".$row["subject"]."</td>
                    <td><a href='details.php?sub=$row[subject]&roll=$row[rollno]'>view</a></td>
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