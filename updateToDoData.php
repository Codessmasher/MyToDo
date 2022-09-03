<!-- update todo data -->
<?php
include "connection.php";
if (isset($_GET['submit'])) {
    $mid = $_GET['mid'];
    $title = $_GET['title'];
    $message = $_GET['message'];
    $edit = "UPDATE `todo` SET title='" . $title . "' ,message='" . $message . "' WHERE mid=$mid";
    $updtQuery = mysqli_query($conn, $edit);
    header("location:userdata.php");

}
?>