<?php
$con = mysqli_connect("localhost", "root", "", "qr_ats");

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$password = $_POST['password'];


$query = "insert into teacher(name, email, subject, password) values('$name','$email','$subject','$password')";

if(mysqli_query($con, $query)){
    echo '
        <script>
            alert("Teacher Registration successfully")
            history.back()
        </script>
    ';
}


?>