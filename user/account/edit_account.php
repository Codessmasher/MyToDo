<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.assign('../dashboard/dashboard.php');</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/common.css">
        <link rel="stylesheet" href="../../css/index.css">
        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
        <title>Schedule Your Tasks</title>
    </head>

    <?php
    include "../../connection.php";

    $name = $_SESSION['username'];
    $myid = $_SESSION['id'];

    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $spassd=password_hash($pass,PASSWORD_DEFAULT);
        $update = "UPDATE `signup` SET username='" . $username . "' ,pass= '" . $spassd . "' WHERE id=$myid";
        $updtQuery = mysqli_query($conn, $update);
        if ($updtQuery) {
            $name = $_SESSION['username'] = $username;
            header("location:../dashboard/dashboard.php");
        } 
    }


    ?>

    <!-- html code -->

    <div class="container col-md-6 mt-md-0 mt-5">
        <form class="signup col-6 m-auto " onsubmit="invalid()" action="../account/edit_account.php" method="POST">
            <input type="text" class="form-control mt-5" id="id" name="id" value="<?php echo  $myid; ?>" hidden>
            <input type="text" class="form-control mt-5" id="username" name="username" value="<?php echo $name; ?>">
            <input type="password" class="form-control mt-5" id="pass" name="pass" placeholder="Edit Your Password">
            <input type="submit" class="btn mt-4 btn-warning" id="edit" name="edit" value="EDIT">
        </form>
    </div>
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../../js/index.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php

};

?>