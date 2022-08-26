<?php
session_start();
require_once "../classes/Product.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // GET DATA
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $img = $_FILES['img'];
    $img_name = $img['name'];
    $img_type = $img['type'];
    $img_tmp_name = $img['tmp_name'];
    $img_error = $img['error'];
    $img_size = $img['size'];
    $img_size_kb = $img_size / (1024);
    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $img_new_name = uniqid() . uniqid()  . "." . $img_ex;
    $price = $_POST['price'];
    //vaildation
    $vaild = true;
    $error = "";
    if ($img_error != 0 or !in_array($img_ex, ['png',  'jpg',  'jpeg']) or $img_size_kb > 3072) {
        $vaild = false;
        $imgerrs = "<h1>something went wrong about photo</h1>";
        $_SESSION['imgerr'] = $imgerrs;
    }
    if (empty($name) or empty($price) or empty($desc)) {
        $error = "<h1>please fill all fields</h1>";
        $vaild = false;
    }
    if (strlen($name) >= 90) {
        $error = "<h1>long name</h1>";
        $vaild = false;
    }
    if ($vaild === true) {
        $prod = new Product;
        $prod->create([
            'name' => $name,
            'description' => $desc,
            'img' => "lol.jpg",
            'price' => $price,
            "img" => $img_new_name
        ]);
        move_uploaded_file($img_tmp_name, "../images/$img_new_name");
        header("location:../index.php");
    } else {
        $_SESSION['error'] = $error;
        header("location:../add.php");
    }
} else {
    header("Location:../add.php");
}
