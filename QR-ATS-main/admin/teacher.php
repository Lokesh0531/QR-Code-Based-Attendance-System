<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$con = mysqli_connect("localhost", "root", "", "qr_ats");

$query = "select * from teacher";
$result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main>
        <?php $title = 'Teachers';
        include "../componets/header.php" ?>
        <?php include "../componets/sidebar.php" ?>
        <div class="container">
        <a href="add_teacher.php" class="add">Add Teacher</a>
            <?php

            if (mysqli_num_rows($result) <= 0) {
                echo "<h3 style='margin-top: 20px; color: red;'>No One Teacher Register yet!</h3>";
            } else {
                echo '
                <table>
                    <tr>
                        <th>SR No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo
                        "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["subject"] . "</td>
                    <td><a href='edit_teacher.php?id=$row[id]&name=$row[name]&email=$row[email]&subject=$row[subject]' class='edit'><img src='../resources/icons/Edit.svg'></a>
                        <a href='delete_teacher.php?id=$row[id]' class='delete' onclick='return wantDelete()'><img src='../resources/icons/Delete.svg' onclick='return wantDelete()'></a></td>
                </tr>";
                }
            }
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