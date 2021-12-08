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
    $classID = $_REQUEST['classID'];
    $sql4 = "select Class_Type from class where Class_ID=$classID";
    $row = mysqli_query($link, $sql4);
    $r1 = mysqli_fetch_array($row);
    extract($r1);
    $classType = $r1['Class_Type'];
    ?>
    <div class="text-center">
        <h1><b><?php echo $classType ?> Class</b></h1>
    </div><br>
    <?php
    if (isset($_POST['submit'])) {
        $sql2 = "DELETE FROM `joinclass` WHERE StudentID='{$studentid}' AND Class_ID=$classID";
        mysqli_query($link, $sql2);
        header("location: class.php?Class_Type=$classType");
    }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Day</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Limited Student</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from class where Class_ID='{$classID}'";
            $r = mysqli_query($link, $sql);
            while ($class = mysqli_fetch_array($r)) {
                echo "<tr>
                          <td>{$class['Class_Date']}</td>
                          <td>{$class['Class_StartTime']}-{$class['Class_EndTime']}</td>
                          <td>{$class['Class_Venue']}</td>
                          <td>{$class['Class_size']}</td>  
                          </tr>";
            }
            ?>
        </tbody>
    </table>
    <form method="post">
        <div class="container mx-auto alert text-white bg-dark" role="alert" style="width: 500px;">
            <div class="text-center">
                <h4><em><b>Are you sure want to 'Cancel' the class?</b></em></h4>
            </div><br>
            <div class="row justify-content-end container">
                <div class="col-2"><input name="submit" type="submit" class="btn btn-success" value=" Yes "></div>
                <div class="col-2"><a href="class.php" class="btn btn-success">&nbsp;No&nbsp;</a></div>
            </div>
        </div> 
    </form>
</body><br><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
