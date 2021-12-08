<?php
include 'conn.php';
session_start();
$c = 'v';
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    if (isset($_SESSION['admin'])) {
        include 'Admin-header.php';
        $_SESSION['msg'] = "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                <strong>You must <a href='logout.php' class='alert-link' style='color: black;'>Log out</a> first!!</strong>
            <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
        $c = 'w';
    } else {
        include 'header.php';
    }
    ?>
    <div class = "mx-auto text-center" style = "width:500px;">
        <h1><b> Log in </b></h1>
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
    if (isset($_POST['submit'])) {
        $studentid = e(strtoupper($_POST['studentid']));
        $password = e($_POST['password']);
        $p = '/^\d{2}[A-Z]{2}[D]\d{5}$/';
        $e = array();

        if (empty($_POST['studentid'])) {
            $e[] = "Please enter your <b>Student ID</b>.";
        } else if (!preg_match($p, $studentid)) {
            $e[] = "Wrong <b>Student ID format</b>.";
        }
        if (empty($_POST['password'])) {
            $e[] = "Please enter your <b>Password</b>.";
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
            $password = md5($password);
            $sql = "select * from memberslist where StudentID ='{$studentid}' and Password = '{$password}'";
            $r = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($r);
            if (mysqli_num_rows($r) == 1) {
                extract($row);
                if ($row['user_level'] == 1) { //admin
                    $_SESSION['admin'] = $studentid;
                    $_SESSION['success'] = "<div class='container alert alert-success' role='alert' style='width:500px;'>
                     <h2 class='alert-heading'>Welcome back!!</h2><hr>
                     <h5>Admin <em>$Name</em></h5>
                     <h6 class='mb-0'><a href='register.php' class='alert-link'>Add Member</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='Admin-memberslist.php' class='alert-link'>Members List</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='edit.php' class='alert-link'>Edit Your Information</a>
                     <br><a href='logout.php' class='alert-link' style='color: red;'>Log out</a></h6></div>";
                    header("location: Home.php");
                } else {  //member
                    $_SESSION['member'] = $studentid;
                    $_SESSION['success'] = "<div class='container alert alert-success mx-auto' role='alert' style='width:500px;'>
                     <h2 class='alert-heading'>Welcome!!</h2><hr>
                     <h5>Member <em>$Name</em></h5>
                     <h6 class='mb-0'><a href='edit.php' class='alert-link'>Edit Your Information</a>&nbsp;&nbsp;&nbsp;<a href='logout.php' class='alert-link' style='color: red;'>Log out</a></h6></div>";
                    header("location: index.php");
                }
            } else {
                echo "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>"
                . "<strong>Wrong Student ID OR Password.<br>Please try again.</strong>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button></div>";
            }
        }
    }

    function e($val) {
        global $link;
        return mysqli_real_escape_string($link, trim($val));
    }
    ?>
    <form id="<?php echo $c ?>" action="Login.php" method="post"><br>
        <div class="container alert alert-light mx-auto" role="alert" style="width: 500px;">
            <h3 class="font-weight-bold">Please Enter Your Information</h3>
            <div class="form-group">
                <input name="studentid" placeholder="Student ID" maxlength="10">
            </div>
            <div class="form-group">
                <input name="password" type="password" placeholder="Password"><br>
                <a href="sentEmail.php"><small>Forgot password?</small></a>
            </div>
            <input name="submit" type="submit" class="btn btn-dark btn-lg btn-block" value="Login">
            <small>Not yet a member?<a href="register.php"> Register</a></small>
        </div>
    </form>
</body><br><br><br><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
