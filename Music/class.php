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
    <?php
    $classType = $_REQUEST['Class_Type'];
    ?>
    <div class="container">
        <div class="text-center">
            <h1><b>Welcome To Our</b></h1><br>
            <h3><b><em><?php echo $classType ?> Class</em></b></h3>
        </div><br>
        <img src="image/<?php echo strtolower($classType) ?>class.jpg" class="container img-fluid w-80" alt="<?php echo strtolower($classType) ?>"><br><br>
        <p>Lesson Duration: 1 hour per week<br>
            Fee: RM 100 /semester<br><br>

            <?php
            $sql = "select class_level from class where Class_type='$classType'";
            $r = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($r)) {

                echo"<td>{$row['class_level']}</td>";
            }
            ?>
            <br>Faster join our class. There are limited places for the class.
            <br><br>The schedule is set out below.</p>            
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
                $sql1 = "select * from class where Class_type='$classType'";
                $r1 = mysqli_query($link, $sql1);
                while ($class = mysqli_fetch_array($r1)) {
                    $classID = $class['Class_ID'];
                    echo "<tr>
                          <td>{$class['Class_Date']}</td>
                          <td>{$class['Class_StartTime']}-{$class['Class_EndTime']}</td>
                          <td>{$class['Class_Venue']}</td>
                          <td>{$class['Class_size']}</td>";
                    if (isset($_SESSION['member']) || isset($_SESSION['admin'])) {
                        $sql2 = "SELECT * FROM `joinclass` WHERE StudentID='{$studentid}' AND Class_ID=$classID";
                        $r2 = mysqli_query($link, $sql2);
                        if (mysqli_num_rows($r2) == 1) {
                            echo "<td><button onclick=\"location.href='cancelClass.php?classID={$class['Class_ID']}'\" type='button' class='btn btn-success btn-lg' >Joined</button></td>";
                        } else {
                            echo "<td><button onclick=\"location.href='confirmClass.php?classID={$class['Class_ID']}'\" type='button' class='btn btn-info btn-lg'>Join</button></td>";
                        }
                    } else{
                        echo "<td><button onclick=\"location.href='Login.php'\" type='button' class='btn btn-info btn-lg'>Join</button></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body><br>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>
