<?php
session_start();
include 'conn.php';
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
            /* Make the image fully responsive */
            .carousel-inner img {
                width: 90%;
                height: 70%;
            }
            .center{
                display:block;
                margin-left:auto;
                margin-right:auto;
                width:50%;
            }
            body  {
                background-image: url("image/leaf.jpg");
                background-size: cover;
            } 
            #c {
                text-align: center;
                font-size: 300%;
            }
        </style>
    </head>
    <body>
        <header>
            <!-- navbar and logo -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow p-3 mb-5 rounded">
                <?php
                if (isset($_SESSION['admin'])) {
                    echo "<a class='navbar-brand' href='Home.php'>";
                } else {
                    echo "<a class='navbar-brand' href='index.php'>";
                }
                ?>
                <img src="image/logo.jpg" width="200" height="50" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php
                        if (isset($_SESSION['member'])) {
                            echo '<a class="nav-link" href="edit.php" style="color: blueviolet;">' . $_SESSION['member'] . '</a>';
                        }
                        if (isset($_SESSION['admin'])) {
                            echo '<a class="nav-link" href="edit.php" style="color: blueviolet;">' . $_SESSION['admin'] . '</a>';
                            echo "<a class='nav-item nav-link' href='Home.php'>Home</a>";
                            echo "<a class='nav-link' href='Admin-memberslist.php'>Members</a>
                             <a class='nav-link' href='classMembers.php'>Classes Members</a>";
                        }
                        if (!isset($_SESSION['admin'])) {
                            echo "<a class='nav-item nav-link' href='index.php'>Home</a>";
                        }
                        echo "<a class='nav-link' href='events.php'>Events</a>
                        <a class='nav-link' href='allclasses.php'>Music Classes</a>
                        <a class='nav-link' href='contact.php'>Contact Us</a>";

                        if (!isset($_SESSION['member']) && !isset($_SESSION['admin'])) {
                            echo "<a class='nav-link' href='Login.php'>Log in</a>";
                        }
                        if (isset($_SESSION['member'])) {
                            echo "<a class='nav-link' href='Members.php'>Members</a>";
                        }
                        if (isset($_SESSION['member']) || isset($_SESSION['admin'])) {
                            echo '<a class="nav-link" href="search.php">Search</a>';
                            echo '<a href="logout.php" class="nav-link">Log Out</a>';
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
        <div class="text-center">
            <h1><b>== Our Events ==</b></h1><br>
        </div>
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/musicFesta1.jpg" alt="MusicFesta1" class="d-block w-100" width="100" height="400">
                </div>
                <div class="carousel-item">
                    <img src="image/musicFesta2.jpg" alt="MusicFesta2" class="d-block w-100" width="100" height="400">
                </div>
                <div class="carousel-item">
                    <img src="image/musicFesta3.jpg" alt="MusicFesta3" class="d-block w-100" width="100" height="400">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div><br>
        <div class="container">
            <h3><em>Noah x Music Fiesta 2019 is coming!</em></h3>
            <p>Noah Music Festa is the largest music concert with various fascinating neon lights in TARUC where the audiences can experience
                their best visual and auditory senses!<br><br>
                Don't forget to bring your partner to our upcoming Music Festa event and create a wonderful memory with us.<br>
                For those who are waiting for the right one, Music Festa offers this chance for you!!!<br><br>
                Time and venue will be inform later. All members can register to join our events first because there are limited places.
            </p>
        </div>
        <?php
        if (isset($_SESSION['admin']) || isset($_SESSION['member'])) {
            if (isset($_SESSION['admin'])) {
                $studentid = $_SESSION['admin'];
            } else if (isset($_SESSION['member'])) {
                $studentid = $_SESSION['member'];
            }
            $sql2 = "SELECT * FROM `joinEvent` WHERE StudentID='{$studentid}'";
            $r2 = mysqli_query($link, $sql2);
            if (mysqli_num_rows($r2) == 1) {
                echo "<div class='container col' style='width:500px;'><button onclick=\"location.href='cancelEvent.php'\" type='button' class='container btn btn-info btn-lg'>Joined</button></div>";
            } else {
                echo "<div class='container col' style='width:500px;'><button onclick=\"location.href='confirmEvent.php'\" type='button' class='container btn btn-success btn-lg' >Join</button></div>";
            }
        } else {
            echo "<div class='container' style='width:500px;'><button onclick=\"location.href='Login.php'\" type='button' class='container btn btn-success btn-lg' >Join</button></div>";
        }
        if (isset($_SESSION['admin'])) {
            echo "<br><div class='container col' style='width:500px;'><button onclick=\"location.href='eventMembers.php'\" type='button' class='container btn btn-info btn-lg' >Participants List</button></div>";
        }
        ?>
    </body><br>
    <?php
    if (isset($_SESSION['admin'])) {
        include 'Admin-footer.php';
    } else {
        include 'footer.php';
    }
    ?>
</html>
