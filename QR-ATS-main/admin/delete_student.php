<?php

session_start();
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$id = $_GET['id'];

$con = mysqli_connect("localhost", "root", "", "qr_ats");

$query = "delete from student where id='$id'";
$result = mysqli_query($con,$query);

if($result){
    echo "<script>
        history.back()
    </script>";
}

?>