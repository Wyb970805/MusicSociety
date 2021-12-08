<?php
session_start();

if (!$_SESSION['admin']) {
    $_SESSION['msg'] = "<div class='container alert alert-danger alert-dismissible' style='width:500px;'>
                <strong>You must log in first</strong>
            <button type='button' class='close' data-dismiss='alert'>&times</button></div>";
    header("location: Login.php");
}
?>
<!doctype html>
<html lang="en">
    <?php include 'Admin-header.php'; ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/music-background.jpg" class="d-block w-100" alt="" width="1400" height="400">
            </div>
            <div class="carousel-item">
                <img src="image/pic.jpg" class="d-block w-100" alt="society day 2019" width="1400" height="400">
            </div>
            <div class="carousel-item">
                <img src="image/singing.jpg" class="d-block w-100" alt="" width="1400" height="400">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
    <?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    echo "<div class='container text-center' role='alert'><h1><strong>" . date('d-F-Y h:i:s A') . "</strong></h1></div>";
    ?>
    <div>
        <?php if (isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
    <br>
    <div class="alert bg-dark" role="alert">
        <div class="text-center text-white"><h2><em><b>~*`~*`~*` New Event `*~`*~`*~</b></em></h2></div><br>
        <div class="card mx-auto">
            <img src="image/musicFesta1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h3 class="card-title">Noah x Music Fiesta 2019</h3>
                <p class="card-text">
                <table>
                    <tr>
                        <th scope="row">TIME </th><td>: 5.00PM - 10.30PM</td>
                    </tr>
                    <tr>
                        <th scope="row">DATE </th><td>: 2/10/19</td>
                    </tr>
                    <tr>
                        <th scope="row">LOCATION </th><td>: College Hall</td>
                    </tr>
                    <tr>
                        <th scope="row">FEE </th><td>: RM 35</td>
                    </tr>
                </table></p>
                <a href="events.php" class="btn btn-success">More info</a>
            </div>
        </div>
    </div>
    <br>
    <div class="alert bg-dark" role="alert">
        <h2 class="text-white">LIMITED slot left for our music classes!!</h2><br>
        <div class="row">
            <div class="card mx-auto col" style="width: 40rem;"><br>
                <img src="image/singing.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Singing Class</h5>
                    <p class="card-text">Lesson Duration:<br>1 hour per week<br>Fee: RM 100<br>
                        <br>Students will learn vocal techniques and develop the confidence to explore their own singing style</p>
                    <a href="class.php?Class_Type=Singing" class="btn btn-success">More info</a>
                </div>
            </div>
            <div class="card mx-auto col" style="width: 40rem;"><br>
                <img src="image/keyboard.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Keyboard Class</h5>
                    <p class="card-text">Lesson Duration:<br>1 hour per week<br>Fee: RM 100<br>
                        <br>Let your finger dance across the keyboard, and your soul with the music</p>
                    <a href="class.php?Class_Type=Keyboard" class="btn btn-success">More info</a>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="card mx-auto col" style="width: 40rem;"><br>
                <img src="image/guitar.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Guitar Class</h5>
                    <p class="card-text">Lesson Duration:<br>1 hour per week<br>Fee: RM 100<br>
                        <br>Students will learn the skills, practice methods and confidence to achieve proficiency in the various styles of music the guitar is able to perform</p>
                    <a href="class.php?Class_Type=Guitar" class="btn btn-success">More info</a>
                </div>
            </div>
            <div class="card mx-auto col" style="width: 40rem;"><br>
                <img src="image/ukulele.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Ukulele Class</h5>
                    <p class="card-text">Lesson Duration:<br>1 hour per week<br>Fee: RM 100<br>
                    <ul>
                        <li>Beginner class</li>
                    </ul>
                    </p>
                    <a href="class.php?Class_Type=Ukulele" class="btn btn-success">More info</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'Admin-footer.php'; ?>
</html>