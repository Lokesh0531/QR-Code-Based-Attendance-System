<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "qr_ats");
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$id = $_GET['id'];
$section = $_GET['section'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Based Attendance System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .right{
            margin-top: 2rem;
            float: left;
        }
        .left{
            width: auto;
        }
    </style>
</head>
<body>
    <main>
        <section class="left">
            <div class="logo">
                <img src="../resources/img/Attendance System.png" alt="">
                <h2>Attendance System</h2>
            </div>
        </section>
        <section class="right">
            <form action="#" method="post" id="form">
                <div class="input_area">
                    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $_GET['name'];?>" required>
                </div>
                <div class="input_area">
                    <input type="email" placeholder="Enter Email" name="email" value="<?php echo $_GET['email'];?>" required>
                </div>
                <div class="input_area">
                    <input type="text" placeholder="Enter Roll Number" name="roll_no" value="<?php echo $_GET['roll_no'];?>" required>
                </div>
                <div class="input_area">
                    <select name="section" id="section" required>
                        <option value="<?php echo $section;?>" selected><?php echo $section;?></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <input type="submit" value="Save Changes" class="button_submit" name="update">
            </form>
        </section>
    </main>
</body>
</html>

<?php

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $roll_no = $_POST['roll_no'];
    $section = $_POST['section'];

    $query = "update student set name='$name',email='$email',roll_no='$roll_no',section='$section' where id='$id'";
    $result = mysqli_query($con,$query);

    if($result){
        header("location:student.php");
    }
}

?>