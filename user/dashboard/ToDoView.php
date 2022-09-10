<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:dashboard.php");
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

    $myid = $_SESSION['id'];

    $selectmsgs = "SELECT `mid`, `message`, `title` FROM `todo` WHERE id=$myid";
    $query = mysqli_query($conn, $selectmsgs);
    if ($count = mysqli_num_rows($query) > 0) {
        while ($res = mysqli_fetch_assoc($query)) {
    ?>
            <form action="ToDoUpdateData.php?mid=<?php $res['mid']; ?>" method="GET">
                <div class="container col-md-6 mt-5 mt-md-0">
                    <div class="signup m-auto ">
                        <!-- title field here -->
                        <div class="input-group mb-3">
                            <input type="text" id="titl<?php echo $res['mid']; ?>" onmouseout="setattrtitl()" name="title" class="form-control" disabled value="<?php echo $res['title']; ?>">

                            <br>
                            <!-- message field here  -->
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" id="msg<?php echo $res['mid']; ?>" onmouseout="setattrmsg()" name="message" disabled><?php echo $res['message']; ?></textarea>

                        </div>


                        <!-- icons edit and delete -->

                        <div class="input-group mb-3 items_between">

                            <i id="<?php echo $res['mid']; ?>" class="i">
                                <img src="../../images/icons/edit.png" class="i_btn edit " id="edit">
                            </i>

                            <a href="ToDoDelete.php?mid=<?php echo $res['mid']; ?>" id="delete">
                                <img src="../../images/icons/delete.png" class="i_btn delete ">
                            </a>

                        </div>

                        <!-- icons edit and delete ended-->


                        <div>
                            <input type="text" name="mid" class="form-control" hidden value="<?php echo $res['mid']; ?>">
                            <!-- submit button if any edit is done on created todo  -->
                            <input type="submit" class="btn mt-4 btn-warning submit d_none" id="u<?php echo $res['mid']; ?>" name="submit" value="SUBMIT">

                        </div>
                    </div>

                </div>
            </form>
            <hr>

            <div class="todos">
            </div>


        <?php
        };
    } else {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="text-warning">No Schedule As of Now</h3>
                </div>
            </div>
        </div>
    <?php

    };


    ?>

    <!-- this script will remove the disabled attribute on click on edit icon as well as toggle submit btn visibility-->
    <script>
        var edit = document.querySelectorAll('.i');
        var submit = document.querySelectorAll(".submit");
        var submitid = 0;
        var editid;
        var ssid;
        edit.forEach(i => {
            i.addEventListener("click",
                () => {
                    editid = i.getAttribute("id");
                    let submituniqbtn = $(`#u${editid}`);

                    let sid = "u" + editid;


                    if (sid == submituniqbtn.attr("id")) {
                        submituniqbtn.toggle("d_none");
                        ssid = sid.slice(1);
                        $(`#titl${ssid}`).removeAttr("disabled");
                        $(`#msg${ssid}`).removeAttr("disabled");

                    }
                })
        })
    </script>

<?php
};

?>