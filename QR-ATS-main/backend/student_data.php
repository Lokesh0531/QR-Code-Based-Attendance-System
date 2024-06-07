<?php
$con = mysqli_connect("localhost", "root", "", "qr_ats");

$name = $_POST['name'];
$email = $_POST['email'];
$roll_no = $_POST['roll_no'];
$section = $_POST['section'];
$password = $_POST['password'];


$query = "insert into student(name, email, roll_no, section, password) values('$name','$email','$roll_no','$section','$password')";

try{
    $result = mysqli_query($con,$query);
}
catch(mysqli_sql_exception $e){
    echo "<script>
    alert('Something went wrong!')
</script>";
}
if($result){
    echo '
        <script>
            alert("Registration successfull!")
            history.back()
        </script>
    ';
}
else{
    echo '
        <script>
            alert("Email & Combination of Roll No & Section Must Unique!")
            history.back()
        </script>
    ';
}


?>