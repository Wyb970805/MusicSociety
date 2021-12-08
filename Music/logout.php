<?php

session_start();

if (isset($_SESSION['member']) || isset($_SESSION['admin'])) {
    $_SESSION = array();

    session_destroy();
}
header("location: Login.php");
?>