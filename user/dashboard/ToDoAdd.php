<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:dashboard.php');
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
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <title>Schedule Your Tasks</title>
    </head>
    <?php
    include "../../connection.php";

    $random_id = rand(time(), 100000000);

   

    ?>


    <div class="container col-md-6 mt-md-0 mt-5">
        <form class="signup col-11 m-auto " action="ToDoAddFinal.php" method="POST">
            <input type="text" class="form-control mt-5" id="id" name="id" value="<?php echo  $_SESSION['id']; ?>" hidden>
            <input type="text" name="mid" hidden value="<?php echo $random_id ?>">
            <input type="text" name="title" placeholder="Type Title here..." class="outline-none rounded p-2 w-100">
            <textarea class="form-control mt-5 w-md-100" name="message" placeholder="Type Your Notes ..."></textarea>
            <input type="submit" class="btn mt-4 btn-warning mb-3 mb-md-0" name="add" value="ADD">
        </form>
    </div>

<?php
};
?>