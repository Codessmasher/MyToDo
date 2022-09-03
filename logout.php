<?php
session_start();
include "connection.php";
session_unset();
session_destroy();
echo "<script>alert('Logout Successfully');</script>";
header("location: login.php");



?>