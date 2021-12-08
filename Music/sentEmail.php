<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html>
    <?php include 'header.php'; ?>
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
    include 'conn.php';
    if (isset($_POST['submit'])) {
        $Email = $_POST['email'];
        $subject = "Forgot Music Society Member Password";
        $message = "You may change your password. 
                Clink on this link : http://localhost/Music/changePSW.php";
        $message = wordwrap($message,70);
        $headers = "From: tongcl-wm18@student.tarc.edu.my";
        $e = array();

        //check email
        $sql2 = "select * from memberslist where Email = '{$Email}'";
        $r2 = mysqli_query($link, $sql2);
        if (mysqli_num_rows($r2) < 1) {
            $e[] = "<b>Email</b> given do not exist. Try another.";
        } else if (empty($_POST['email'])) {
            $e[] = "Please enter your <b>TARUC Email</b>.";
        } else if (!preg_match("/^\w\w\w\w{1,}+(-wm)\d{2}@(student.tarc.edu.my)$/", $Email)) {
            $e[] = "Wrong <b>TARUC Email format</b>.";
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
            if (mail($Email, $subject, $message, $headers)) {
                $_SESSION['email'] = $Email;
                $_SESSION['msg'] = "<div class='container alert alert-warning alert-dismissible' style='width:500px;'>
                <h4>You need to verify your email address! Sign into your email account and click on the verification link we just emailed you at</h4>
            <h6><em>" . $_SESSION['email'] . "</em></h6>
                <h6><a href='https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin'>Gmail Login</a></h6>
            <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
                header("location: sentEmail.php");
        } else {
                echo "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                       <p>Failed to send email. Please try again later</p>
                       <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
            }
        }
    }
    ?>
    <form id="<?php echo $c ?>" action="sentEmail.php" method="post"><br>
        <div class="mx-auto text-center">
            <h1><b>Send Email</b></h1>
        </div><br>
        <div class="container mx-auto" role="alert" style="width: 500px;">
            <h3 class="font-weight-bold">Please Enter Your</h3>
            <div class="form-group row"><label class="col-sm-4 col-form-label">TARUC Email</label>
                <div class="col"><input name="email" class="form-control" type="email" placeholder="Exp. abcd-wm19@student.tarc.edu.my"></div>
            </div><br>
            <input name="submit" type="submit" class="container btn btn-dark btn-lg btn-block"value="Send Email">
        </div>
    </form>

</body><br>
<?php include 'footer.php'; ?>
</html>
