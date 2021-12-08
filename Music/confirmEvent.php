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
    }
    include 'conn.php';
    ?>
    <div class="text-center">
        <h3><b>== NOAH x MUSIC FESTA 2019 ==</b></h3>
    </div><br>
    <?php
    if (isset($_POST['submit'])) {
        $sql3 = "select Joins_ID from joinevent";
        $r2 = mysqli_query($link, $sql3);
        while ($row1 = mysqli_fetch_array($r2)) {
            $joinsID = $row1['Joins_ID'] + 1;
        }
        $sql2 = "INSERT INTO `joinevent`(`Joins_ID`, `StudentID`) VALUES ({$joinsID}, '{$studentid}')";
        mysqli_query($link, $sql2);
        header("location: events.php");
    }
    ?>
    <form method="post">
        <div class="container mx-auto alert text-white bg-dark" role="alert" style="width: 500px;">
            <div class="text-center">
                <h4><em><b>Please click the 'Confirm' to join the event</b></em></h4>
            </div><br>
            <div class="row justify-content-end container">
                <div class="col-3"><input name="submit" type="submit" class="btn btn-success" value="Confirm"></div>
                <div class="col-2"><a href="events.php" class="btn btn-success" >Cancel</a></div>
            </div>
        </div>
    </form>
</body><br><br><br><br><br><br><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
