<?php
session_start();
include "includes/header.php";
require_once "classes/Product.php";
if (!isset($_SESSION['name'])) {
    header("location:index.php");
}

$prod = new Product;
$product = $prod->getOne($_GET['id']);
?>

<div class="container my-5">
    <div class="editpageimg text-center">
        <img src="images/<?php echo $product['img'] ?>" alt="">
    </div>
    <div class="row">
        <div class="editform">
            <form action="handlers/handeledit.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name" required value="<?php echo $product['name'] ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="price" placeholder="price" required value="<?php echo $product['price'] ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" name="desc" placeholder="description" required><?php echo $product['description'] ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                <div class="form-group text-center ">
                    <input type="submit" class="btn btn-primary" value="update">
                </div>
            </form>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</div>



<?php
include "includes/footer.php";
