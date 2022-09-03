<style>
        <?php include "index.css"; ?>
</style>
<?php
include "connection.php";
session_start();
$name = $_SESSION['username'];
$pass = $_SESSION['pass'];
$myid = $_SESSION['id'];

if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $passd = $_POST['pass'];
        $update = "UPDATE `signup` SET username='" . $username . "' ,pass= '" . $passd . "' WHERE id=$myid";
        $updtQuery = mysqli_query($conn, $update);
        if ($updtQuery) {
                $name = $_SESSION['username'] = $username;
                $pass = $_SESSION['pass'] = $passd;
                header(("location:userdata.php"));
        } else {
                die(mysqli_error($conn));
        }
}


?>

<!-- html code -->

<div class="container col-6">
        <form class="signup col-6 m-auto " onsubmit="invalid()" action="user_info.php" method="POST">
                <input type="text" class="form-control mt-5" id="id" name="id" value="<?php echo  $myid; ?>" hidden>
                <input type="text" class="form-control mt-5" id="inputUsername" name="username" value="<?php echo $name; ?>">
                <input type="text" class="form-control mt-5" id="pass" name="pass" value="<?php echo $pass; ?>">
                <input type="submit" class="btn mt-4 btn-warning" id="edit" name="edit" value="EDIT">
        </form>
</div>