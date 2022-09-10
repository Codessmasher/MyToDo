<?php
    session_start();

    if (isset($_SESSION['username'])) {
        echo "<script>window.location.assign('../dashboard/dashboard.php');</script>";
    }else{
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
    <title>SignUp</title>
</head>

<body>
    <div class="container col-md-6 col-9">
        <div class="row">
            <form class="signup col-md-6 m-auto " action="signup.php"  method="POST" onsubmit="invalid()" enctype="multipart/form-data">
                <input type="text" class="form-control mt-5" id="inputUsername" name="username" placeholder="Username">
                <input type="password" class="form-control mt-5" id="pass" name="pass" placeholder="Password">
                <input type="password" class="form-control mt-5" id="cpass" name="cpass" placeholder="Confirm Password">
                <input type="file" class="form-control mt-5" id="imge" name="imge" accept="image/png, image/gif, image/jpeg">
                <input type="submit" class="btn mt-4 btn-warning" name="submit" value="SUBMIT">

                <div class="mt-4"><a href="./login.php">Already Created Account?</a></div>
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
if (isset($_POST['submit'])) {
    include "../../connection.php";
    $img = $_FILES['imge'];
    $fname = $img['name'];
    $fpath = $img['tmp_name'];
    $ferror = $img['error'];

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $spass=password_hash($pass,PASSWORD_DEFAULT);

    if (!empty($username) and !empty($pass)) {
        if($ferror!=0){
            $df="../../images/profile_pics/default.svg";
        }else{
        $df = '../../images/profile_pics/' . $fname;
        move_uploaded_file($fpath, $df);
        }
        $insert = "INSERT INTO `signup`(`username`,`pass`,`img`) VALUES ('$username','$spass','$df')";
        $query = mysqli_query($conn, $insert) or die();
        if ($query) {
            header("Location: login.php");
        } else {
            die("error");
        }
    }
}


    };
?>