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
    <title>MUSIC SOCIETY</title>
    <style>
        body  {
            background-image: url("image/leaf.jpg");
            background-size: cover;
        }
        #v{
            visibility: visible;
        }
        #w{
            visibility: hidden;
        }
    </style>
</head>
<body>
    <header>
        <!-- navbar and logo -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow p-3 mb-5 rounded">
            <?php
            if (isset($_SESSION['admin'])) {
                echo "<a class='navbar-brand' href='Home.php'>";
            } else {
                echo "<a class='navbar-brand' href='index.php'>";
            }
            ?>
            <img src="image/logo.jpg" width="200" height="50" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php
                    if (isset($_SESSION['member'])) {
                        echo '<a class="nav-link" href="edit.php" style="color: blueviolet;">' . $_SESSION['member'] . '</a>';
                    }
                    echo "<a class='nav-item nav-link' href='index.php'>Home</a>
                        <a class='nav-link' href='events.php'>Events</a>
                        <a class='nav-link' href='allclasses.php'>Music Classes</a>              
                        <a class='nav-link' href='contact.php'>Contact Us</a>";

                    if (!isset($_SESSION['member']) && !isset($_SESSION['admin'])) {
                        echo "<a class='nav-link' href='Login.php'>Log in</a>";
                    }
                    if (isset($_SESSION['member'])) {
                        echo "<a class='nav-link' href='Members.php'>Members</a>";
                        echo "<a class='nav-link' href='search.php'>Search</a>";
                        echo '<a href="logout.php" class="nav-link">Log Out</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>