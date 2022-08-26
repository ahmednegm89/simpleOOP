<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
    die();
}
session_destroy();
header("location:../index.php");
