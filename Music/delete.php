<?php
session_start();
$studentid = $_REQUEST['studentid'];
include 'conn.php';
$sql = "select * from memberslist where StudentID='{$studentid}'";
$r = mysqli_query($link, $sql);
$row = mysqli_fetch_array($r);
extract($row);
$c = 'v';
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
                background-image: url("image/bg.jpg");
                background-size: cover;
            }
            #v{
                visibility: visible;
            }
            #w{
                visibility: hidden;
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
        <div class="mx-auto text-center" style="width:600px;">
            <h1><b>Delete Member</b></h1>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $sql = "delete from memberslist where StudentID='{$studentid}'";
            mysqli_query($link, $sql);
            if (mysqli_affected_rows($link) > 0) {
                echo "<div class='container alert alert-success' role='alert' style='width:800px;'>
                     <h4 class='alert-heading'>Success!</h4>
                     <p>Member $Name has been deleted.</p><hr>
                     <strong class='mb-0'>[ <a href='Admin-memberslist.php' class='alert-link'>Back to Members List</a> ]  [ <a href='logout.php' class='alert-link'>Log out</a> ]</strong></div>";
                $c = 'w';
            }
        }
        ?>
        <form id="<?php echo $c ?>" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><br>
            <div class="container mx-auto alert text-white bg-dark" role="alert" style="width: 600px;">
                <h6><em>Are you sure you want to delete the following member?</em></h6><br>
                <div class="row"><label class="col-sm-4">Student ID</label>
                    <div class="col"><?php echo $StudentID ?><input name="studentid" type="hidden" class="form-control" value="<?php echo $StudentID ?>"></div>
                </div>
                <div class="row"><label class="col-sm-4">Name</label>
                    <div class="col"><?php echo $Name ?></div>
                </div>
                <div class="row"><label class="col-sm-4">TARUC Email</label>
                    <div class="col"><?php echo $Email ?></div>
                </div>
                <div class="row"><label class="col-sm-4">IC No.</label>
                    <div class="col"><?php echo $ICNo ?></div>
                </div>
                <div class="row"><label class="col-sm-4">Gender</label>
                    <div class="col">
                        <?php
                        if ($Gender == 'M') {
                            echo "Male";
                        } else if ($Gender == 'F') {
                            echo "Female";
                        }
                        ?>
                    </div>
                </div>
                <div class="row"><label class="col-sm-4">Phone No.</label>
                    <div class="col"><?php echo $Phone ?></div>
                </div>
                <div class="row"><label class="col-sm-4">Program</label>
                    <div class="col"><?php echo $Program ?></div>
                </div>
                <div class="row">
                    <label class="col-sm-4">User Type</label>
                    <div class="col">
                        <?php
                        if ($row['user_level'] == 1) {
                            echo "Admin";
                        } else if ($row['user_level'] == 0) {
                            echo "Member";
                        }
                        ?>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-2"><input name="submit" type="submit" class="btn btn-outline-light" value=" Yes "></div>
                    <div class="col-2"><input name="reset" type="reset" class="btn btn-outline-light" value="Cancel" onclick="location = 'Admin-memberslist.php'"></div>
                </div>
            </div>
        </form>
    </body>
    <?php include 'Admin-footer.php'; ?>
</html>
