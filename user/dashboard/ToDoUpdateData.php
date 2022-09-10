<!-- update todo data -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:dashboard.php");
} 
include "../../connection.php";
if (isset($_GET['submit'])) {
    $mid = $_GET['mid'];
    $title = $_GET['title'];
    $message = $_GET['message'];
    $edit = "UPDATE `todo` SET title='" . $title . "' ,message='" . $message . "' WHERE mid=$mid";
    $updtQuery = mysqli_query($conn, $edit);
    include "dashboard.php";
}
?>     
<div class="container">
<div class="alertBox row">
    <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-6 text-center m-auto" role="alert">
        <strong>Updated ToDo Details</strong>
        <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </span>
</div>
</div>