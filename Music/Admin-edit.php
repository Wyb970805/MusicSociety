<?php
session_start();
$studentid = $_REQUEST['studentid'];
include 'conn.php';
$sql = "select * from memberslist where StudentID='{$studentid}'";
$r = mysqli_query($link, $sql);
$row = mysqli_fetch_array($r);
extract($row);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>MUSIC SOCIETY</title>
        <style>
            body  {
                background-image: url("image/music-background.jpg");
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <header>
            <!-- navbar and logo -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow p-3 mb-5 rounded">
                <a class="navbar-brand" href="Home.php">
                    <img src="image/logo.jpg" width="200" height="50" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="edit.php" style="color: blueviolet;"><?php echo $_SESSION['admin'] ?></a>
                        <a class="nav-item nav-link" href="Home.php">Home</a>
                        <a class="nav-link" href="events.php">Events</a>
                        <a class='nav-link' href="classMembers.php">Music Classes</a>
                        <a class="nav-link" href="Admin-memberslist.php">Members</a>
                        <a class="nav-link" href="contact.php">Contact Us</a>
                        <a class="nav-link" href="search.php">Search</a>
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="mx-auto text-center">
            <h1><b>Edit Member</b></h1>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $Name = $_POST['name'];
            if (isset($_POST['gender'])) {
                $Gender = $_POST['gender'];
            } else {
                $Gender = "";
            }
            $Program = $_POST['program'];
            $ICNo = $_POST['ic'];
            $Phone = $_POST['phone'];
            $Email = $_POST['email'];
            $Userlevel = $_POST['userlevel'];
            $e = array();

            if (empty($_POST['gender'])) {
                $e[] = "Please select a <b>Gender</b>.";
            }
            //check program
            if (!preg_match("/^[A-Z]{3}$/", $Program)) {
                $e[] = "Please enter your <b>Program</b> by using short form.";
            } else if (empty($_POST['program'])) {
                $e[] = "Please enter your <b>Program</b>.";
            }
            //check name
            if (!preg_match("/^[A-Za-z ]*$/", $Name)) {
                $e[] = "Please enter your <b>Name</b> with <b>letters</b> and <b>space only</b>.";
            } else if (empty($_POST['name'])) {
                $e[] = "Please enter your <b>Name</b>.";
            }
            //check ic
            if (!preg_match("/^(\d{6})-(\d{2})-(\d{4})$/", $ICNo)) {
                $e[] = "Wrong <b>IC format</b>.";
            } else if (empty($_POST['ic'])) {
                $e[] = "Please enter your <b>IC No</b>.";
            }
            //check phone
            if (!preg_match("/^01[0-9]{8,9}$/", $Phone)) {
                $e[] = "Please enter your <b>Phone No</b> with <b>only digits</b> and start with <b>01</b>.";
            } else if (empty($_POST['phone'])) {
                $e[] = "Please enter your <b>Phone No</b>.";
            }
            //check email
            $sql2 = "select * from memberslist where Email = '{$Email}'";
            $r2 = mysqli_query($link, $sql2);
            if (mysqli_num_rows($r2) > 0 && $Email != $Email) {
                $e[] = "<b>Email</b> given already exist. Try another.";
            } else if (empty($_POST['email'])) {
                $e[] = "Please enter your <b>TARUC Email</b>.";
            } else if (!preg_match("/^\w\w\w\w{1,}+(-wm)\d{2}@(student.tarc.edu.my)$/", $Email)) {
                $e[] = "Wrong <b>TARUC Email format</b>.";
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
                if (isset($_POST['userlevel'])) {
                    $sql = "update memberslist set Name='{$Name}', ICNo='{$ICNo}', Gender='{$Gender}', Phone='{$Phone}', Program='{$Program}', Email='{$Email}', user_level='{$Userlevel}' where StudentID='{$studentid}'";
                } 
                $r = mysqli_query($link, $sql);
                if (mysqli_affected_rows($link) > 0) {
                    echo "<div class='container alert alert-success' role='alert' style='width:800px;'>
                     <h4 class='alert-heading'>Success!</h4>
                     <p>Information of <b>$Name</b> has been updated.</p><hr>
                     <strong class='mb-0'>[ <a href='Admin-memberslist.php' class='alert-link'>Back to Members List</a> ]  [ <a href='logout.php' class='alert-link' style='color: red;'>Log out</a> ]</strong></div>";
                }
            }
            mysqli_close($link);
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><br>
            <div class="container mx-auto alert bg-light" role="alert" style="width: 600px;">
                <div class="form-group row"><label class="col-sm-4 col-form-label">Student ID</label>
                    <div class="col"><?php echo $StudentID ?><input name="studentid" type="hidden" class="form-control" value="<?php echo $StudentID ?>"></div>
                </div>
                <div class="form-group row"><label class="col-sm-4 col-form-label">Name</label>
                    <div class="col"><input name="name" class="form-control" value="<?php echo $Name ?>"></div>
                </div>
                <div class="form-group row"><label class="col-sm-4 col-form-label">TARUC Email</label>
                    <div class="col"><input name="email" class="form-control" type="email"  value="<?php echo $Email ?>" placeholder="Exp. abcd-wm19@student.tarc.edu.my"></div>
                </div>
                <div class="form-group row"><label class="col-sm-4 col-form-label">IC No.</label>
                    <div class="col"><input name="ic" class="form-control" placeholder="xxxxxx-xx-xxxx" value="<?php echo $ICNo ?>" maxlength="14"></div>
                </div>
                <div class="form-group row"><legend class="col-form-label col-sm-4 pt-0">Gender</legend>
                    <div class="col-2">
                        <input name="gender" type="radio" value="M" <?php if ($Gender == 'M') echo'checked' ?>> 
                        <label>Male</label>
                    </div>
                    <div class="col">
                        <input name="gender" type="radio" value="F" <?php if ($Gender == 'F') echo'checked' ?>> 
                        <label>Female</label>
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-4 col-form-label">Phone No.</label>
                    <div class="col"><input name="phone" class="form-control" value="<?php echo $Phone ?>" type="tel" maxlength="11"></div>
                </div>
                <div class="form-group row"><label class="col-sm-4 col-form-label">Program</label>
                    <div class="col"><input name="program" class="form-control" value="<?php echo $Program ?>" placeholder="Exp. DIT" maxlength="3"></div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">User Type</label>
                    <div class="col">
                        <select name="userlevel" class="custom-select">
                            <option value="empty">Select One</option>
                            <option value="1" <?php if ($row['user_level'] == 1) echo'selected' ?> >Admin</option>
                            <option value="0" <?php if ($row['user_level'] == 0) echo'selected' ?> >Member</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-2"><input name="submit" type="submit" class="btn btn-success"value="Update"></div>
                    <div class="col-2"><input name="reset" type="reset" class="btn btn-success" value="Cancel" onclick="location = 'Admin-memberslist.php'"></div>
                </div>
            </div>
        </form>
    </body><br>
    <?php include 'Admin-footer.php'; ?>
</html>
