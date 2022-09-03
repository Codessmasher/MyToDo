<?php
include "connection.php";
session_start();

$myid=$_SESSION['id'];
$random_id=rand(time(),100000000);

if (isset($_POST['add'])) {
    $id = $GLOBALS['myid'];
    $messege_id = $_POST['mid'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    if (!empty($title) and !empty($message)) {

            $insert = "INSERT INTO `todo`(`id`,`mid`,`message`,`title`) VALUES ('$id','$messege_id','$message','$title')";
            $query = mysqli_query($conn, $insert);
            echo "<script>alert('Added Notes Successful')</script>";
            header('location: userdata.php');
    }
}


?>


<div class="container col-6">
    <form class="signup col-6 m-auto " action="ToDo.php" method="POST">
    <input type="text" class="form-control mt-5" id="id" name="id" value="<?php echo  $myid; ?>" hidden>
        <input type="text" name="mid" hidden value="<?php echo $random_id?>">
        <input type="text" name="title" placeholder="Type Title here...">
        <textarea class="form-control mt-5" name="message" placeholder="Type Your Notes ..."></textarea>
       <input type="submit" class="btn mt-4 btn-warning" name="add" value="ADD">
    </form>
</div>