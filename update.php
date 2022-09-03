<?php
if (isset($_GET['id'])) {
    include "connection.php";
    $username = $_GET['username'];
    $passd = $_GET['pass'];
    $id=$res['id'];
    $update = "UPDATE `signup` SET `username`=$username,`pass`=$passd WHERE id=$id";
    $updtQuery=mysqli_query($conn, $update);
    if($updtQuery){
            echo "hello";
    }else{
     die(mysqli_error($conn));
    }

}
?>