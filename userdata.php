<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>My Info</title>
</head>

<body>
    <div class="container">
        <div class="home ">
            <div class="user_info">
                <button class="btn bg-primary btn-primary m-auto block" id="logout" onclick="logout()">Logout</button>
            </div>

        </div>

    </div>

    <div class="User_dashboard">
        <div class="list-group col-8 m-auto">
            <a href="#" class="list-group-item list-group-item-action" id="user_name">
                <?php

include "connection.php";
                //  $username=$_GET['username']; without using session fetching from url
                //  echo $username;
                //  $username=$_GET['username']; 
                //using session
                session_start();
                if ($_SESSION == true) {
                    echo $_SESSION['username'];
                } else {
                    session_destroy();
                }

                ?>
            </a>
            <a href="#" class="list-group-item list-group-item-action  " id='user_info'>My Info</a>
            <a href="#" class="list-group-item list-group-item-action  " id='ToDo'>Add ToDo</a>
            <a href="#" class="list-group-item list-group-item-action " id='View_ToDo'>View My Schedules</a>
        </div>
    </div>

<div id="main_content">


</div>





<script>
    $(document).ready(()=>{

        $("#user_info").click(()=>{
            $("#main_content").load("user_info.php");
        });
        $("#ToDo").click(()=>{
            $("#main_content").load("ToDo.php");
        });
        $("#View_ToDo").click(()=>{
            $("#main_content").load("View_ToDo.php");
        });
    })
</script>
    <script src="app.js" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>