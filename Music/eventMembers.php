<?php
session_start();
$f = isset($_GET['f']) ? $_GET['f'] : '';
$o = isset($_GET['o']) ? $_GET['o'] : 'DESC';
$o = ($o == 'DESC') ? 'ASC' : 'DESC';
$img = $o . '.png';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'Admin-header.php'; ?>
    <div class="mx-auto text-center" style="width:500px;">
        <h1><b>Noah x Music Festa 2019 Event Participants List</b></h1>
    </div>
    <p>Filter: <a href="eventMembers.php">All Members </a>
        | <a href="eventMembers.php?f=F">Female </a>
        | <a href="eventMembers.php?f=M">Male </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th><a href="classMembers.php?<?php echo"f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Student ID</th>
                <th>IC NO.</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $sql = "select * from memberslist m, joinevent j where m.StudentID = j.StudentID AND Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Name']}</td>
                          <td>{$row['StudentID']}</td>
                          <td>{$row['ICNo']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Phone']}</td>
                          <td>{$row['Email']}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else{
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
</table>
</body><br><br><br><br>
<?php include 'Admin-footer.php'; ?>
</html>