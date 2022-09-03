<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Login Into Your Account</title>
</head>

<body>
        <div class="container col-6">
                <form class=" col-6 m-auto login" method="GET">
                        <input type="text" class="form-control mt-5" id="inputUsername" name="username" placeholder="Username">
                        <input type="password" class="form-control mt-5" id="pass" name="pass" placeholder="Password">
                        <button class="btn mt-4 btn-warning" name="login">LOGIN</button>
                        <div class="mt-4"><a href="signup.php">Don't Have An Account?</a></div>
                </form>




        </div>

        </div>
        <script src="app.js" defer></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php
include "connection.php";
if (isset($_GET['login'])) {
        
        $username = $_GET['username'];
        $pass = $_GET['pass'];
        if (!empty($username) and !empty($pass)) {
                //to prevent from mysqli injection  
                $username = stripcslashes($username);
                $pass = stripcslashes($pass);
                $username = mysqli_real_escape_string($conn, $username);
                $pass = mysqli_real_escape_string($conn, $pass);

                $search = "SELECT * FROM signup WHERE username='$username' and pass='$pass' ";
                $result = mysqli_query($conn, $search);
                $row = mysqli_fetch_assoc($result);
                $id=$row['id'];
                $count = mysqli_num_rows($result);
                if ($count == 1) {
                        echo "<script>alert('Login Successful')</script>";
                        session_start();
                        $_SESSION['username'] = $username; //using session
                        $_SESSION['pass'] = $pass; //using session
                        $_SESSION['id'] = $id; //using session
                        header("location: userdata.php");
                        //     header("location: userdata.php?username=$username");//without using session sending variables to url
                } else {
                        echo "<script>confirm('You don't have an acoount')</script>";
                        header("location: signup.php");
                }
        } else {
                echo "<script>alert('No input')</script>";
        }
}



?>