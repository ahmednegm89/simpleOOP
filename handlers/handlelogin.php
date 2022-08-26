<?php
session_start();
require_once "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // GET DATA
    $email = $_POST['email'];
    $password = $_POST['password'];
    $vaild = true;
    $error = "";
    $admin = new Admin;
    $data = $admin->attempt($email, md5($password));
    if (empty($email) or empty($password)) {
        $error = "<h1>please fill all fields</h1>";
        $vaild = false;
    }
    if (empty($data)) {
        $error = "<h1>Wrong email or password</h1>";
        $vaild = false;
    }
    if ($vaild === true) {
        $_SESSION['name'] = $data['username'];
        header("location:../index.php");
    } else {
        $_SESSION['error'] = $error;
        header("location:../login.php");
    }
} else {
    header("Location:../login.php");
}
