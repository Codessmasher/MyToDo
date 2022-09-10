<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location:../dashboard/dashboard.php");
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
        <link rel="stylesheet" href="../.././css/common.css">
        <link rel="stylesheet" href="../.././css/index.css">
        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="../.././images/favicon.ico">
        <title>Login</title>
    </head>

    <body>
        <div class="container col-md-6 col-9">
            <div class="row">
                <form class=" col-md-6 m-auto login" method="POST">
                    <input type="text" class="form-control mt-5" id="inputUsername" name="username" placeholder="Username">
                    <input type="password" class="form-control mt-5" id="pass" name="pass" placeholder="Password">
                    <button class="btn mt-4 btn-warning" name="login">LOGIN</button>
                    <div class="mt-4"><a href="./signup.php">Don't Have An Account?</a></div>
                </form>
            </div>



        </div>

        </div>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../js/index.js" defer></script>
    </body>

    </html>


    <?php

    include "../../connection.php";
    if (isset($_POST['login'])) {
        $login=false;
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if (!empty($username) and !empty($pass)) {
            //to prevent from mysqli injection  
            $username = stripcslashes($username);
            $pass = stripcslashes($pass);
            $username = mysqli_real_escape_string($conn, $username);
            $pass = mysqli_real_escape_string($conn, $pass);


            $search = "SELECT * FROM signup WHERE username='$username' ";
            $result = mysqli_query($conn, $search);
            if (mysqli_num_rows($result) == 0) {
    ?>
                <div class="container mt-5">
                    <div class="alertBox row">
                        <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-8 text-center m-auto" role="alert">
                            <img src="../../images/icons/danger.png" width="30px" class="img-fluid"> <strong>No Account Exist</strong>
                            <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </span>
                    </div>
                </div>
                <?php
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                     
                    if (password_verify($pass, $row['pass'])) {
                        $login=true;
                        session_start();
                            $_SESSION['username'] = $username; //using session
                            $_SESSION['id'] = $row['id']; //using session
                            header("location: ../dashboard/dashboard.php");
                    }
                }
                if($login==false){ ?>
                    <div class="container mt-5">
                        <div class="alertBox row">
                            <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-8 text-center m-auto" role="alert">
                                <img src="../../images/icons/danger.png" width="30px" class="img-fluid"> <strong>Wrong Password</strong>
                                <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                            </span>
                        </div>
                    </div>
    <?php
                }
            }
        } else {
            ?>
            <div class="container mt-5">
                <div class="alertBox row">
                    <span class="alert text-danger bg-warning alert-dismissible fade show alertBox col-md-3 col-8 text-center m-auto" role="alert">
                        <img src="../../images/icons/danger.png" width="30px" class="img-fluid"> <strong>Empty info</strong>
                        <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </span>
                </div>
            </div>
<?php
        };
    };
};
?>