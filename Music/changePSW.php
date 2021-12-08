<?php
session_start();
include 'conn.php';
$Email = $_SESSION['email'];
$sql = "select * from memberslist where Email='{$Email}'";
$r = mysqli_query($link, $sql);
$row = mysqli_fetch_array($r);
extract($row);
?>
<!DOCTYPE html>
<html>
    <?php include 'header.php'; ?>
    <div class="mx-auto text-center" style="width:500px;">
        <h1><b>Change Password</b></h1>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $New = $_POST['password_new'];
        $Conpassword = $_POST['password_2'];
        $e = array();
        //check password
        $EncryptNew = md5($New);
        $Encrypt = md5($Conpassword);
        if (empty($_POST['password_new'])) {
            $e[] = "Please <b>enter new password</b>.";
        }

        if (empty($_POST['password_2'])) {
            $e[] = "Please <b>re-enter your password</b> to confirm.";
        } else if (!empty($_POST['password_new']) && $Encrypt != $EncryptNew) {
            $e[] = "<b>Confirm password</b> and <b>New Password</b> do not match.";
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
            $sql = "update memberslist set Password='{$Encrypt}' where Email='{$Email}'";
            $r = mysqli_query($link, $sql);
            if (mysqli_affected_rows($link) > 0) {
                echo "<div class='container alert alert-success' role='alert' style='width: 500px;'>
                     <h4 class='alert-heading'>Success!</h4>";
                if ($row['user_level'] == 1) {
                    echo "<p>Admin <b>$Name</b> has been updated. You may <a href='Login.php'>Log in </a>now!</p></div>";
                } else {
                    echo "<p>Member <b>$Name</b> has been updated. You may <a href='Login.php'>Log in </a>now!</p></div>";
                }
            }
        }
    }
    mysqli_close($link);
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><br>
        <div class="container mx-auto alert bg-light" role="alert" style="width: 500px;">
            <div class="form-group row"><label class="col-sm-4 col-form-label">Student ID</label>
                <div class="col"><?php echo $StudentID ?><input name="studentid" type="hidden" class="form-control" value="<?php echo $StudentID ?>"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Name</label>
                <div class="col"><?php echo $Name ?><input name="name" class="form-control" type="hidden" value="<?php echo $Name ?>"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">TARUC Email</label>
                <div class="col"><?php echo $Email ?><input name="email" class="form-control" type="hidden"  value="<?php echo $Email ?>"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">New Password</label>
                <div class="col"><input name="password_new" class="form-control" type="password"></div>
            </div>
            <div class="form-group row"><label class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col"><input name="password_2" class="form-control" type="password">
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-2"><input name="submit" type="submit" class="btn btn-success"value="Update"></div>
                <div class = "col-2"><input name = "reset" type = "reset" class = "btn btn-success" value = "Cancel"></div>               
            </div>
        </div>
    </form>
</body>
<?php
include 'footer.php';
?>
</html>
