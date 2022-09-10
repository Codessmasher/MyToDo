<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:dashboard.php");
} 
session_write_close();//help to hide the warning message of session_start double use

include "../../connection.php";
$mid = $_GET['mid'];
$delt = "DELETE FROM `todo` WHERE mid=$mid";
$querydlt = mysqli_query($conn, $delt) or die("Failed to delete");
include "dashboard.php";
?>

<div class="container">
<div class="alertBox row">
    <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-6 text-center m-auto" role="alert">
        <strong>Deleted Successfully</strong>
        <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </span>
</div>
</div>
