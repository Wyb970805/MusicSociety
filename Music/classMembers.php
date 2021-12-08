<?php
session_start();
$f = isset($_GET['f']) ? $_GET['f'] : '';
$fp = isset($_GET['fp']) ? $_GET['fp'] : '';
$o = isset($_GET['o']) ? $_GET['o'] : 'DESC';
$o = ($o == 'DESC') ? 'ASC' : 'DESC';
$img = $o . '.png';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'Admin-header.php'; ?>
    <div class="mx-auto text-center" style="width:500px;">
        <h1><b>Class Members</b></h1>
    </div>
    <h3><b><em>Singing Class </em></b></h3>
    <p>Filter: <a href="classMembers.php">All Members </a>
        | <a href="classMembers.php?f=F">Female </a>
        | <a href="classMembers.php?f=M">Male </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th><a href="classMembers.php?<?php echo"fp=$fp&f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Student ID</th>
                <th>Gender</th>
                <th>Program</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $sql = "select * from memberslist m, joinclass j, class c where m.StudentID = j.StudentID AND j.Class_ID = c.Class_ID AND c.Class_ID = 1 AND Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Name']}</td>
                          <td>{$row['StudentID']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Program']}</td>
                          <td>{$row['Email']}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else if ($fp == 0) {
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
    </table>
    <br>
    <h3><b><em>Keyboard Class</em></b></h3>
    <p>Filter: <a href="classMembers.php">All Members </a>
        | <a href="classMembers.php?f=F">Female </a>
        | <a href="classMembers.php?f=M">Male </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th><a href="classMembers.php?<?php echo"fp=$fp&f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Student ID</th>
                <th>Gender</th>
                <th>Program</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $sql = "select * from memberslist m, joinclass j, class c where m.StudentID = j.StudentID AND j.Class_ID = c.Class_ID AND c.Class_ID = 4 AND Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Name']}</td>
                          <td>{$row['StudentID']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Program']}</td>
                          <td>{$row['Email']}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else if ($fp == 0) {
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
    </table>
    <br>
    <h3><b><em>Guitar Class</em></b></h3>
    <p>Filter: <a href="classMembers.php">All Members </a>
        | <a href="classMembers.php?f=F">Female </a>
        | <a href="classMembers.php?f=M">Male </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Class Day</th>
                <th><a href="classMembers.php?<?php echo"fp=$fp&f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Student ID</th>
                <th>Gender</th>
                <th>Program</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $sql = "select * from memberslist m, joinclass j, class c where m.StudentID = j.StudentID AND j.Class_ID = c.Class_ID AND c.Class_ID = 5 AND c.Class_ID = 6 AND Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Class_Date']}</td>
                          <td>{$row['Name']}</td>
                          <td>{$row['StudentID']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Program']}</td>
                          <td>{$row['Email']}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else if ($fp == 0) {
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
    </table>
    <br>
    <h3><b><em>Ukulele Class</em></b></h3>
    <p>Filter: <a href="classMembers.php">All Members </a>
        | <a href="classMembers.php?f=F">Female </a>
        | <a href="classMembers.php?f=M">Male </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Class Day</th>
                <th><a href="classMembers.php?<?php echo"fp=$fp&f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Student ID</th>
                <th>Gender</th>
                <th>Program</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $sql = "select * from memberslist m, joinclass j, class c where m.StudentID = j.StudentID AND j.Class_ID = c.Class_ID AND (c.Class_ID = 2 OR c.Class_ID = 3) AND Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Class_Date']}</td>
                          <td>{$row['Name']}</td>
                          <td>{$row['StudentID']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Program']}</td>
                          <td>{$row['Email']}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else if ($fp == 0) {
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
    </table>
</body>
<?php include 'Admin-footer.php'; ?>
</html>

