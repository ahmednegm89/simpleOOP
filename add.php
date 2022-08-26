<?php
session_start();
include "includes/header.php";
if (!isset($_SESSION['name'])) {
    header("location:index.php");
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-5 offset-lg-3">
            <form action="handlers/handeladd.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="price" placeholder="price" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" name="desc" placeholder="description" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" rows="6" name="img" placeholder="img"></input>
                </div>
                <div class="form-group text-center ">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['imgerr'])) {
                echo $_SESSION['imgerr'];
                unset($_SESSION['imgerr']);
            }
            ?>
        </div>
    </div>
</div>



<?php
include "includes/footer.php";
