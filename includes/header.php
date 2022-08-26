<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>shop</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <div class="container ">
            <a class="navbar-brand" href="index.php">shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if (isset($_SESSION['name'])) { ?>
                    <ul class="navbar-nav">
                        <a class="nav-item nav-link" href="add.php">Add new product</a>
                    </ul>
                <?php }
                ?>
                <div class="rightnav">
                    <?php
                    if (!isset($_SESSION['name'])) { ?>
                        <ul class="navbar-nav">
                            <a class="nav-item nav-link" href="login.php">Login</a>
                        </ul>
                    <?php }
                    ?>
                    <?php
                    if (isset($_SESSION['name'])) { ?>
                        <ul class="navbar-nav mx-auto">
                            <a class="nav-item nav-link" href=""><?php echo $_SESSION['name'] ?></a>
                        </ul>
                    <?php }
                    ?>
                    <?php
                    if (isset($_SESSION['name'])) { ?>
                        <ul class="navbar-nav mx-auto">
                            <a class="nav-item nav-link" href="handlers/handlelogout.php">Logout</a>
                        </ul>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </nav>