<footer>
    <nav class="navbar navbar-light bg-light">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">Feedback</a>
            </li>
            <?php
            if (isset($_SESSION['member'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='edit.php'>Edit Profile</a>
            </li>";
                echo "<li class='nav-item'>
                <a class='nav-link' href='logout.php' style='color: red;'>Log out</a>
            </li>";
            }
            ?>
        </ul>
    </nav>
</footer>
