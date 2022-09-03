<style>
    <?php include "index.css"; ?>
</style>

<?php
include "connection.php";
session_start();
$myid = $_SESSION['id'];

$selectmsgs = "SELECT `mid`, `message`, `title` FROM `todo` WHERE id=$myid";
$query = mysqli_query($conn, $selectmsgs);
if ($count = mysqli_num_rows($query) > 0) {
    while ($res = mysqli_fetch_assoc($query)) {
?>
        <form action="updateToDoData.php?mid=<?php $res['mid']; ?>" method="GET">
            <div class="container col-6">
                <div class="signup m-auto ">

                    <div class="input-group mb-3">
                        <input type="text" id="inpt<?php $res['mid']; ?>" name="title" class="form-control" value="<?php echo $res['title']; ?>">

                        <br>
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" id="_text<?php $res['mid']; ?>" name="message"><?php echo $res['message']; ?></textarea>

                    </div>


                    <!-- icons edit and delete -->

                    <div class="input-group mb-3">

                        <i id="<?php echo $res['mid']; ?>" class="i" value="">
                            <img src="./icons/edit.svg" class="icons edit" id="edit" name="edit">
                        </i>

                        <a href="deleteTodo.php?mid=<?php echo $res['mid']; ?>" id="delete">
                            <img src="./icons/delete.svg" class="icons delete">
                        </a>

                    </div>

                    <!-- icons edit and delete ended-->


                    <div>
                        <input type="text" name="mid" class="form-control" hidden value="<?php echo $res['mid']; ?>">
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
};


?>


<script>
            var edit = document.querySelectorAll('.i');
            var submit = document.querySelectorAll(".submit");
            var submitid = 0;
            var editid;
            edit.forEach(i => {
                i.addEventListener("click", () => {

                    editid = i.getAttribute("id");
                    
                    var submituniqbtn = document.getElementById(`u${editid}`);
                    editid="u"+editid;
                    if (editid == submituniqbtn.getAttribute("id")) {
                        submituniqbtn.classList.toggle("d_none")
                    }
                })
            })
        </script>