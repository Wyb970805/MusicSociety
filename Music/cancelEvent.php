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
        $sql2 = "DELETE FROM `joinevent` WHERE StudentID='{$studentid}'";
        mysqli_query($link, $sql2);
        header("location: events.php");
    }
    ?>
    <form method="post">
        <div class="container mx-auto alert text-white bg-dark" role="alert" style="width: 500px;">
            <div class="text-center">
                <h4><em><b>Are you sure want to 'Cancel' to join the event?</b></em></h4>
            </div>
            <div class="row justify-content-end">
                <div class="col-2"><input name="submit" type="submit" class="btn btn-success" value=" Yes "></div>
                <div class="col-2"><a href="events.php" class="btn btn-success">&nbsp;No&nbsp;</a></div>
            </div>
        </div>
    </form>
</table>
</body><br><br><br><br><br><br><br><br><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
