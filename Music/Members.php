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
    <?php include 'header.php'; ?>
    <div class="mx-auto text-center" style="width:500px;">
        <h1><b>Members List</b></h1>
    </div>
    <p>Filter: <a href="Members.php">All Members </a>
        | <a href="Members.php?f=F">Female </a>
        | <a href="Members.php?f=M">Male </a>
        | <a href="Members.php?fp=1">Admin </a>
        | <a href="Members.php?fp=0">Member </a>
    </p>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th><a href="Members.php?<?php echo"fp=$fp&f=$f&o=$o" ?>">Name<img src="image/<?php echo $img ?>"></a></th>
                <th>Gender</th>
                <th>Program</th>
                <th>Email</th>
                <th>Position</th>
            </tr>
        </thead>
        <?php
        include 'conn.php';
        $g = array('F' => 'Female', 'M' => 'Male');
        $u = array( 1 => 'Admin', 0 => 'Member');
        $sql = "select * from memberslist where user_level like '{$fp}%' and Gender like '{$f}%' order by Name $o";
        $r = mysqli_query($link, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr><td>". ($i+1) ."</td> 
                          <td>{$row['Name']}</td>
                          <td>{$g[$row['Gender']]}</td>
                          <td>{$row['Program']}</td>
                          <td>{$row['Email']}</td>
                          <td>{$u[$row['user_level']]}</td>
                          </tr></tbody>";
            $i++;
        }
        if ($f == 'F') {
            echo "<strong>Total: " . $i . " females.</strong>";
        } else if ($f == 'M') {
            echo "<strong>Total: " . $i . " males.</strong>";
        }else if ($fp == 1) {
            echo "<strong>Total: " . $i . " admins.</strong>";
        } else if ($fp == 0) {
            echo "<strong>Total: " . $i . " members.</strong>";
        }
        mysqli_close($link);
        ?>
    </table>
</body>
<?php include 'footer.php'; ?>
</html>
