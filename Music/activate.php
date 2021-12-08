<?php

session_start();
include 'conn.php';

$sname = $_SESSION['name'];
$sid = $_SESSION['studentid'];
$sic = $_SESSION['ic'];
$sgender = $_SESSION['gender'];
$sphone = $_SESSION['phone'];
$sprogram = $_SESSION['program'];
$sconpassword = $_SESSION['password'];
$suserlevel = $_SESSION['userlevel'];
$semail = $_SESSION['email'];

$encrypt = md5($sconpassword); //encrypt password
$sql = "insert into memberslist(Name, StudentID, ICNo, Gender, Phone, Program, Email, Password, user_level)
                    values('{$sname}', '{$sid}', '{$sic}', '{$sgender}', '{$sphone}', '{$sprogram}', '{$semail}', '{$encrypt}', '{$suserlevel}')";
mysqli_query($link, $sql);
$query = "UPDATE memberslist SET status=1 WHERE Email='{$email}'";
$result = mysqli_query($link, $query);
if (!empty($result)) {
    $_SESSION['msg'] = "<div class='container alert alert-success' role='alert' style='width:500px;'>
            <h4 class='alert-heading'>Success!</h4>
            <h6>Student <b>$sname</b> has been inserted. You may login now.</h6>";
    header('location: Login.php');
} else {
    $_SESSION['msg'] = "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                       <h6>Problem in account activation. Please try again</h6>
                       <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
    header('location: register.php');
}
?>

