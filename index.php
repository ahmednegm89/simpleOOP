<?php
session_start();
require_once "classes/Product.php";
require_once "classes/helpers/Str.php";
include "includes/header.php";

use helpers\Str;

$prod = new Product;
$products = $prod->getAll();

?>

<div class="container lol my-5 ">
    <div class="row">
        <?php
        if (!empty($products)) {
            foreach ($products as $product) { ?>
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <img src="images/<?php echo $product['img'] ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <a href="item.php?id=<?php echo $product['id'] ?>" class="card-title cardname"><?php echo $product['name'] ?></a>
                            <h6 class="card-title" href=""> <?php echo  "$" . $product['price']  ?> </h6>
                            <p class="card-text"><?php echo Str::limit($product['description'])  ?></p>
                            <h6>Added: <strong><?php echo $product['created_at'] ?></strong> </h6>
                            <?php
                            if (isset($_SESSION['name'])) { ?>
                                <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-success">edit</a>
                                <a href="handlers/handeldelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">delete</a>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
        <?php }
        } else {
            echo "<div class='container text-center' ><h1>No products here</h1></div>";
        } ?>


    </div>
</div>






<?php
include "includes/footer.php";
