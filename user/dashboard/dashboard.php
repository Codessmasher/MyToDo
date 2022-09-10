<?php
session_start();

if (!isset($_SESSION['username'])) {
    session_destroy();
    
?>
  <div class="container mt-5">
        <div class="alertBox row">
            <span class="alert text-danger bg-warning alert-dismissible fade show alertBox col-md-3 col-8 text-center m-auto" role="alert">
                <img src="../../images/icons/danger.png" width="30px" class="img-fluid"> <strong>Login First</strong>
                <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </span>
        </div>
    </div>
    <?php
    header("location:../account/login.php");  
} else {

    $username = $_SESSION['username'];
    $myid = $_SESSION['id'];
    include "../../connection.php";
    $slctimg = "SELECT `img` FROM `signup` WHERE username='" . $username . "' AND id='" . $myid . "'";
    $query = mysqli_query($conn, $slctimg);
    while ($row = mysqli_fetch_array($query)) {
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

        <body>
            <div class="container ">
                <div class="row">
                    <div class="col text-center profilepic mt-3">
                        <img src="<?php echo $row['img']; ?>" class="rounded-circle" width="100px" height="100px">
                    </div>
                </div>

                <div class="row mt-5">

                    <div class="list-group col-md-4 col-7 m-auto text-center">
                        <a href="#" class="list-group-item list-group-item-action " id="user_name">
                            <!-- Showing Username -->
                            <?php
                            if ($_SESSION == true) {
                                echo $_SESSION['username'];
                            } else {
                                session_destroy();
                            }
                            ?>

                        </a>
                        <a href="#" class="list-group-item list-group-item-action" id='edit_account'>My Info</a>
                        <a href="#" class="list-group-item list-group-item-action  " id='ToDoAdd'>Add ToDo</a>
                        <a href="#" class="list-group-item list-group-item-action " id='ToDoView'>View My Schedules</a>
                    </div>
                    <div class="col-md text-center">
                        <button class="btn btn-primary float-md-end mt-5 mt-md-0" id="logout" onclick="logout()">Logout</button>
                    </div>
                </div>

                <div id="main_content" class="mt-5">


                </div>

            </div>




            
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../../js/index.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $(document).ready(() => {

                    $("#edit_account").click(() => {
                        $("#main_content").load("../account/edit_account.php");
                    });
                    $("#ToDoAdd").click(() => {
                        $("#main_content").load("./ToDoAdd.php");
                    });
                    $("#ToDoView").click(() => {
                        $("#main_content").load("./ToDoView.php");
                    });
                })
            </script>

        </body>

        </html>

<?php
    };
};

?>