<?php
session_start();
require_once "../classes/Product.php";

if (isset($_GET['id'])) {
    $prod = new Product;
    $product = $prod->getOne($_GET['id']);
    $image_name = $product['img'];
    unlink("../images/$image_name");
    $prod->delete($_GET['id']);
    header("Location:../index.php");
} else {
    header("Location:../index.php");
}
