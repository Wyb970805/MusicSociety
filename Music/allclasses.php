<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if (isset($_SESSION['admin'])) {
        $studentid = $_SESSION['admin'];
        include 'Admin-header.php';
    } else if (isset($_SESSION['member'])) {
        $studentid = $_SESSION['member'];
        include 'header.php';
    } else {
        include 'header.php';
    }
    include 'conn.php';
    ?>
    <div class="container text-center">
        <h1><b>Welcome To Join Our Music Classes</b></h1><br>
    </div><br>
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
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
