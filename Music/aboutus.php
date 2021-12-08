<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
        <style>
            body, html {
                height: 100%;
                font-family: "Inconsolata", sans-serif;
            }

            .bgimg {
                background-position: center;
                background-size: cover;
                min-height: 75%;
            }

        </style>
    </head>
    <?php
    if (isset($_SESSION['admin'])) {
        $studentid = $_SESSION['admin'];
        include 'Admin-header.php';
    } else if (isset($_SESSION['member'])) {
        $studentid = $_SESSION['member'];
        include 'header.php';
    } else {
        include 'header.php';
    }
    ?>
    <img src="image/aboutus.jpg" class="d-block w-100" alt="" width="1400" height="400">

    <!-- Add a background color and large text to the whole page -->
    <div class="w3-sand w3-grayscale w3-large">

        <!-- About Container -->
        <div class="w3-container" id="about">
            <div class="w3-content" style="max-width:700px">
                <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT US</span></h5>
                <div class="mx-auto text-center" style="width:500px;">
                    <h1><b><em>When Words Fail,<br>Music Speak</em></b></h1>
                </div><br>
                <p>Our mission is to maximize the opportunities for people to create and enjoy new music.</p>
                <p>For our music events, there are a lot of interesting events. For example, we have been organized Ice Breaking session to
                    let our committees and members to know each other and we will play a lot of games around college area.</p>
                <p>In addition, we have several classes for members to join.</P>
                <img src="image/class.jpg" class="d-block w-100" alt="" width="1400" height="800">
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