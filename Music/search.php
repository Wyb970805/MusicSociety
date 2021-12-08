<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Search</title>
        <style>
            form{
                margin: 10px 300px 100px;
            }
            table{
                border: 1px solid #ccc;
                width: 100%;
            }
            td{
                border: 1px solid #ccc;
            }
            #search{
                width: 50%;

            }
            p{
                font-size: 300%;
                padding: 10px;
                border: 1px solid;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
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
    }
    include 'conn.php';

    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM memberslist WHERE Name LIKE '%" . $keyword . "%'"
                . "OR StudentID LIKE '%" . $keyword . "%'"
                . "OR Gender LIKE '%" . $keyword . "%'"
                . "OR ICNo LIKE '%" . $keyword . "%'"
                . "OR Phone LIKE '%" . $keyword . "%'"
                . "OR Program LIKE '%" . $keyword . "%'"
                . "OR Email LIKE '%" . $keyword . "%'";

        $search_result = filterTable($query);
    } else {
        $query = "SELECT * FROM memberslist";
        $search_result = filterTable($query);
    }

    // function to connect and execute the query
    function filterTable($query) {
        include 'conn.php';
        $filter_Result = mysqli_query($link, $query);
        return $filter_Result;
    }
    ?>


    <form action="search.php" method="post">
        <p>Search</p><br>
        <div id="search" class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Search Members" aria-label="Search" aria-describedby="button-addon2">
            <div class="input-group-append">
                <input type="submit" class="btn btn-outline-secondary" name="search" id="button-addon2" value="     Go     ">
            </div>
        </div>
        <div><br>  
            <table class="table table-hover ">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo "<th>Student ID</th>";
                            echo "<th>IC No</th>";
                            echo "<th>Phone No</th>";
                        }
                        ?>
                        <th>Gender</th>
                        <th>Program</th>
                        <th>Email Address</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_array($search_result)): ?>
                        <tr> 
                            <td><?php echo $row['Name']; ?></td>
                            <?php
                            if (isset($_SESSION['admin'])) {
                                echo "<td>" . $row['StudentID'] . "</td>";
                                echo "<td>" . $row['ICNo'] . "</td>";
                                echo "<td>" . $row['Phone'] . "</td>";
                            }
                            ?>
                            <td><?php echo $row['Gender']; ?></td>
                            <td><?php echo $row['Program']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                        </tr>
                    </thead>
                <?php endwhile; ?>
            </table>
        </div>
    </form>


</body>
<?php
if (isset($_SESSION['admin'])) {
    include 'Admin-footer.php';
} else {
    include 'footer.php';
}
?>
</html>

