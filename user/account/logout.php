<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} else {
    include "../../connection.php";
    session_unset();
    session_destroy();
    echo "<script>window.location.assign('../dashboard/dashboard.php');</script>";
}
