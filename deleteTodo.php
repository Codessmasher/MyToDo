    <?php
    include "connection.php";
    $mid = $_GET['mid'];
    $delt = "DELETE FROM `todo` WHERE mid=$mid";
    $querydlt = mysqli_query($conn, $delt) or die("Failed to delete");
    header("location:userdata.php");

    ?>