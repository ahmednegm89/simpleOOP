<?php
session_start();
require_once "classes/Product.php";
include "includes/header.php";

$prod = new Product;
$products = $prod->getOne($_GET['id']);

?>

<div class="container my-5 ">
    <div class="row">
        <?php
        if (!empty($products)) { ?>
            <div class="col-lg-6">
                <img src="images/<?php echo $products['img'] ?>" class="img-fluid" style="width: 550px;">
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card-body">
                    <h5> <?php echo $products['name'] ?> </h5>
                    <h6> <?php echo  "$" . $products['price']  ?> </h6>
                    <p><?php echo $products['description']  ?></p>
                    <h6>Added: <strong><?php echo $products['created_at'] ?></strong> </h6>
                    <div class="mt-5">
                        <a href="index.php" class="btn btn-primary">back to products</a>
                        <!-- <form action="item.php?id=<?php echo $products['id'] ?>" method="post">
                            <input type="submit" value="Add to cart" name="cart" class="btn btn-success mt-3">
                        </form> -->
                        <?php
                        if (isset($_SESSION['name'])) { ?>
                            <a href="edit.php?id=<?php echo $products['id'] ?>" class="btn btn-success">edit</a>
                            <a href="handlers/handeldelete.php?id=<?php echo $products['id'] ?>" class="btn btn-danger">delete</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        <?php } else {
            echo "<div class='container text-center' ><h1>ERR</h1></div>";
        }
        ?>
    </div>
</div>


<?php
include "includes/footer.php";
