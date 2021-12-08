<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
    if (isset($_SESSION['admin'])) {
        include 'Admin-header.php';
    } else if (isset($_SESSION['member'])) {
        include 'header.php';
        $_SESSION['msg'] = "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                <strong>You must <a href='logout.php' class='alert-link' style='color: black;'>Log out</a> first!!</strong>
            <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
        $c = 'w';
    } else {
        include 'header.php';
    }
    ?>
    <div class="mx-auto text-center" style="width:500px;">
        <h1><b> Register </b></h1>
    </div>
    <div>
        <?php if (isset($_SESSION['msg'])) :
            ?>
            <div>
                <h3>
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
    <?php
    $studentid = "";
    $email = "";
    $e = array();
    include 'conn.php';
    if (isset($_POST['submit'])) {
        $studentid = e(strtoupper($_POST['studentid']));
        $name = mysqli_real_escape_string($link, ucwords($_POST['name']));
        $ic = $_POST['ic'];
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = "";
        }
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $program = mysqli_real_escape_string($link, strtoupper($_POST['program']));
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password_1']);
        $conpassword = mysqli_real_escape_string($link, $_POST['password_2']);
        $userlevel = mysqli_real_escape_string($link, $_POST['userlevel']);

        //check student id
        $p_sid = '/^\d{2}[A-Z]{2}[D]\d{5}$/';
        $sql1 = "select * from memberslist where StudentID = '{$studentid}'";
        $r1 = mysqli_query($link, $sql1);
        if (mysqli_num_rows($r1) > 0) {
            $e[] = "<b>Student ID</b> given already exist. Try another.";
        } else if (empty($_POST['studentid'])) {
            $e[] = "Please enter your <b>Student ID</b>.";
        } else if (!preg_match($p_sid, $studentid)) {
            $e[] = "Wrong <b>Student ID format</b>.";
        }
        //check email
        $sql2 = "select * from memberslist where Email = '{$email}'";
        $r2 = mysqli_query($link, $sql2);
        if (mysqli_num_rows($r2) > 0) {
            $e[] = "<b>Email</b> given already exist. Try another.";
        } else if (empty($_POST['email'])) {
            $e[] = "Please enter your <b>TARUC Email</b>.";
        } else if (!preg_match("/^\w\w\w\w{1,}+(-wm)\d{2}@(student.tarc.edu.my)$/", $email)) {
            $e[] = "Wrong <b>TARUC Email format</b>.";
        }
        //check gender
        if (empty($_POST['gender'])) {
            $e[] = "Please select a <b>Gender</b>.";
        }
        //check program
        if (!preg_match("/^[A-Z]{3}$/", $program)) {
            $e[] = "Please enter your <b>Program</b> by using short form.";
        } else if (empty($_POST['program'])) {
            $e[] = "Please enter your <b>Program</b>.";
        }
        //check name
        if (!preg_match("/^[A-Za-z ]*$/", $name)) {
            $e[] = "Please enter your <b>Name</b> with <b>letters</b> and <b>space only</b>.";
        } else if (empty($_POST['name'])) {
            $e[] = "Please enter your <b>Name</b>.";
        }
        //check ic
        if (empty($_POST['ic'])) {
            $e[] = "Please enter your <b>IC No</b>.";
        } else if (!preg_match("/^(\d{6})-(\d{2})-(\d{4})$/", $ic)) {
            $e[] = "Wrong <b>IC format</b>.";
        }
        //check phone
        if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {
            $e[] = "Please enter your <b>Phone No</b> with <b>only digits</b> and start with <b>01</b>.";
        } else if (empty($_POST['phone'])) {
            $e[] = "Please enter your <b>Phone No</b>.";
        }
        //check password
        if (empty($_POST['password_1'])) {
            $e[] = "Please enter your <b>Password</b>.";
        }
        if (empty($_POST['password_2'])) {
            $e[] = "Please enter your <b>Confirm password</b>.";
        } else if ($conpassword != $password) {
            $e[] = "<b>Confirm password</b> and <b>Password</b> do not match.";
        }
        //check user type
        if ($_POST['userlevel'] == "empty") {
            $e[] = "Please select <b>User Type</b>.";
        }

        if (count($e) > 0) {
            echo "<div class='container alert alert-danger alert-dismissible' style='width:800px;'>
                      <h4><strong>Error!</strong></h4>";
            echo "<ul>";
            foreach ($e as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times</button></div>";
        } else {
            //send email
            $subject = "Music Society Member Registration";
            $message = "  Activate Your Email !!
                You may clink on this link : http://localhost/Music/activate.php";
            $headers = "From: tongcl-wm18@student.tarc.edu.my";
            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['name'] = $name;
                $_SESSION['studentid'] = $studentid;
                $_SESSION['ic'] = $ic;
                $_SESSION['gender'] = $gender;
                $_SESSION['phone'] = $phone;
                $_SESSION['program'] = $program;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $conpassword;
                $_SESSION['userlevel'] = $userlevel;
                $_SESSION['msg'] = "<div class='container alert alert-warning alert-dismissible' style='width:500px;'>
                        <h4>You need to verify your email address! Sign into your TARUC email account and click on the verification link we just emailed you at</h4>
                        <h6><em>" . $_SESSION['email'] . "</em>
                        <em><a href='https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin'>Gmail Login</a></em></h6>
                        <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
                $c = 'w';
                header("location: register.php");
            } else {
                echo "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                       <p>Failed to send email. Please try again later</p>
                       <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
            }

            /* if (isset($_POST['userlevel'])) {
              $encrypt = md5($password); //encrypt password
              $userlevel = e($_POST['userlevel']);
              $sql = "insert into memberslist(Name, StudentID, ICNo, Gender, Phone, Program, Email, Password, user_level)
              values('{$name}', '{$studentid}', '{$ic}', '{$gender}', '{$phone}', '{$program}', '{$email}', '{$encrypt}', '{$userlevel}')";
              mysqli_query($link, $sql);
              echo "<div class='container alert alert-success' role='alert' style='width:800px;'>
              <h4 class='alert-heading'>Success!</h4>";
              if ($userlevel == 1) {  //admin
              $_SESSION['admin'] = $studentid;
              $_SESSION['success'] = "<p>Admin <b>$name</b> has been inserted. You are now logged in</p><hr>
              <strong class='mb-0'>[ <a href='Admin-memberslist.php' class='alert-link'>Members List</a> ]&nbsp;&nbsp;&nbsp;&nbsp;[ <a href='logout.php' class='alert-link' style='color: red;'>Log out</a> ]</strong></div>";
              header("location: Home.php");
              } else {  //member
              $_SESSION['member'] = $studentid;
              $_SESSION['success'] = "<p>Student <b>$name</b> has been inserted. You are now logged in</p><hr>
              <strong class='mb-0'>[ <a href='Members.php' class='alert-link'>Members List</a> ]&nbsp;&nbsp;&nbsp;&nbsp;[ <a href='edit.php' class='alert-link'>Edit Your Personal Information</a> ]&nbsp;&nbsp;&nbsp;&nbsp;[ <a href='logout.php' class='alert-link' style='color: red;'>Log out</a> ]</strong></div>";
              header("location: index.php");
              } */
        }
    }

    function e($val) {
        global $link;
        return mysqli_real_escape_string($link, trim($val));
    }
    ?>

    <form id="<?php echo $c ?>" action="register.php" method="post"><br>
        <div class="container mx-auto" role="alert" style="width: 500px;">
            <h3 class="font-weight-bold">Please Enter Your Information</h3><br>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Student ID</label>
                <div class="col"><input name="studentid" class="form-control" maxlength="10"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Name</label>
                <div class="col"><input name="name" class="form-control" maxlength="30"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">TARUC Email</label>
                <div class="col"><input name="email" class="form-control" type="email" placeholder="Exp. abcd-wm19@student.tarc.edu.my"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Password</label>
                <div class="col"><input name="password_1" class="form-control" type="password"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Confirm password</label>
                <div class="col"><input name="password_2" class="form-control" type="password"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">IC No.</label>
                <div class="col"><input name="ic" class="form-control" placeholder="xxxxxx-xx-xxxx" maxlength="14"></div>
            </div>
            <div class="form-group row"><legend class="col-form-label col-sm-4 pt-0">Gender</legend>
                <div class="col-2">
                    <input name="gender" type="radio" value="M"> 
                    <label>Male</label>
                </div>
                <div class="col">
                    <input name="gender" type="radio" value="F"> 
                    <label>Female</label>
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Phone No.</label>
                <div class="col"><input name="phone" class="form-control" type="tel" maxlength="11"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Program</label>
                <div class="col"><input name="program" class="form-control" placeholder="Exp. DIT" maxlength="3"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">User Type</label>
                <div class="col">
                    <select name="userlevel" class="custom-select">
                        <option value="empty">Select One</option>
                        <option value="0">Member</option>
                    </select>
                </div>
            </div><br>
            <input name="submit" type="submit" class="container btn btn-dark btn-lg btn-block"value="Register">
            <?php
            if (!isset($_SESSION['admin']) && !isset($_SESSION['member'])) {
                echo "<small>Already a member?  <a href='Login.php'>Log in</a></small>";
            }
            ?>
        </div>
    </form>
</body><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>

