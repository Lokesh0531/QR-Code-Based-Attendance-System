<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$con = mysqli_connect("localhost", "root", "", "qr_ats");

$query = "select * from student";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
    <?php $title = 'Students'; include "../componets/header.php"  ?>
      <?php include "../componets/sidebar.php" ?>
      <a href="../register.html" class="add">Add Student</a>
        <div class="container">
                <?php

                    if(mysqli_num_rows($result) <= 0){
                        echo "<h3 style='margin-top: 20px; color: red;'>No One Student Register yet!</h3>";
                    }
                    else{
                        echo'
                        <table>
                            <tr>
                                <th>SR No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roll Number</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>';
                    $srno = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $srno++;
                        $id = $row['id'];
                        echo
                        "<tr>
                            <td>".$srno."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["roll_no"]."</td>
                            <td>".$row["section"]."</td>
                            <td><a href='edit_student.php?id=$row[id]&name=$row[name]&email=$row[email]&roll_no=$row[roll_no]&&section=$row[section]' class='edit'><img src='../resources/icons/Edit.svg'></a>
                            <a href='delete_student.php?id=$row[id]' class='delete'><img src='../resources/icons/Delete.svg' onclick='return wantDelete()'></a></td>
                        </tr>";
                    }}
                ?>
            </table>
            </div>
        </div>
    </main>
    <script>
        function wantDelete(){
            var a = confirm("Do you want to delete?");

            if(a) return true;
            else return false;
        }
    </script>
</body>
</html>