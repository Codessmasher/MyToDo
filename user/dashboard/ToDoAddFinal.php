 <?php
 
 include "dashboard.php";
 if (isset($_POST['add'])) {
        $id = $_SESSION['id'];
        $messege_id = $_POST['mid'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        if (!empty($message) and !empty($title)) {

            $insert = "INSERT INTO `todo`(`id`,`mid`,`message`,`title`) VALUES ('$id','$messege_id','$message','$title')";
            $query = mysqli_query($conn, $insert);

    ?>
            <div class="container">
                <div class="alertBox row">
                    <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-6 text-center m-auto" role="alert">
                        <strong>Added Successfully</strong>
                        <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </span>
                </div>
            </div>
        <?php


        } else {
        ?>
            <div class="container">
                <div class="alertBox row">
                    <span class="alert alert-warning alert-dismissible fade show alertBox col-md-3 col-6 text-center m-auto" role="alert">
                        <strong>Empty notes can't be added</strong>
                        <button type="button" class="btn-close m-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </span>
                </div>
            </div>
    <?php

        }
    }
