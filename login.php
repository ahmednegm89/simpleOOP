<?php
session_start();
include "includes/header.php";
if (isset($_SESSION['name'])) {
    header("location:index.php");
}
?>

<div class="container my-5 ">
    <form method="POST" action="handlers/handlelogin.php">
        <div class="mb-3">
            <label for="name" class="form-label">email</label>
            <input type="email" class="form-control" id="name" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">password</label>
            <input type="password" class="form-control" id="email" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">login</button>
    </form>
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</div>