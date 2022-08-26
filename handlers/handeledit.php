<?php
session_start();
require_once "../classes/Product.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // GET DATA
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    //vaildation
    $vaild = true;
    $error = "";
    if (empty($name) or empty($price) or empty($desc)) {
        $error = "<h1>please fill all fields</h1>";
        $vaild = false;
    }
    if ($vaild === true) {
        $prod = new Product;
        $prod->update($id, [
            'name' => $name,
            'description' => $desc,
            'price' => $price
        ]);
        header("location:../item.php?id=$id");
    } else {
        $_SESSION['error'] = $error;
        header("location:../edit.php?id=$id");
    }
} else {
    header("Location:../index.php");
}
