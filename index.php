<?php
    session_start();

    if (isset($_SESSION['username'])) {
        echo "<script>window.location.assign('user/dashboard/dashboard.php');</script>";
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
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <title>Schedule Your Tasks</title>
</head>

<body>


    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="text-info text-center mblf_1p5">You Haven't Created Account Yet!! </h1>
                    </div>
                    <div class="col-md-4 text-md-end text-center">
                        <button class="btn btn-warning mt-2 mt-md-0 ml-2 " value="signup">SIGNUP</button>
                        <button class="btn btn-warning mt-2 mt-md-0 ml-2 " value="login">LOGIN</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md mt-5">
                <h3 class="text-white text-center mblf_1p5">Add Your Tasks In Your Personalised Account</h3>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 text-center todoimg">
                <img src="./images/icons/bg.jpg" class="img-fluid" width="450px">
            </div>
        </div>


    </div>




    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/index.js" defer></script>
</body>

</html>

<?php

    };

?>