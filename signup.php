        <!DOCTYPE html>
        <html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="index.css">
                <!-- CSS only -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

                <title>Create Your Account</title>
        </head>

        <body>
                <div class="container col-6">
                        <form class="signup col-6 m-auto " onsubmit="invalid()" method="POST">
                                <input type="text" class="form-control mt-5" id="inputUsername" name="username" placeholder="Username">
                                <input type="password" class="form-control mt-5" id="pass" name="pass" placeholder="Password">
                                <input type="password" class="form-control mt-5" id="cpass" name="cpass" placeholder="Confirm Password">
                                <button class="btn mt-4 btn-warning" name="submit">SUBMIT</button>

                                <div class="mt-4"><a href="login.php">Already Created Account?</a></div>
                        </form>




                </div>

                </div>
                <script src="app.js" defer></script>
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>


        <?php
        if (isset($_POST['submit'])) {
                include "connection.php";
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                
                if (!empty($username) and !empty($pass)) {

                        $insert = "INSERT INTO `signup`(`username`, `pass`) VALUES ('$username','$pass')";
                        $query = mysqli_query($conn, $insert);
                        echo "<script>alert('Signup Successful')</script>";
                }
        }






        ?>