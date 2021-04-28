<?php
    include '../includes/main/validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/includes/main/styles.php';
    ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="box_items.php">
            <img src="../img/qrv_logo.png" width="80" height="50" alt="Main_logo" loading="lazy"
                class="d-inline-block align-top logo">
            <h1 class="text title d-inline-block">QRV Inventory System</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./box_items.php">Box Items <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cabinet_items.php">Cabinet Items</a>
                </li>
                <?php
                    include $_SERVER['DOCUMENT_ROOT'].'/includes/main/nav_items_menu.php';
                ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid edit_profile">
        <form>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtPasswordUser">Password</label>
                <input type="password" class="form-control" id="txtPasswordUser" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="txtConfirmPasswordUser">Confirm Password</label>
                    <input type="password" class="form-control" id="txtConfirmPasswordUser" required>
                </div>
            </div>
        </form>
        <div class="form-group d-flex justify-content-center">
            <button type="button" id="btnCancelUser" onclick="location.replace('box_items.php');" name="btnCancelUser" class="btn btn-secondary">Cancel</button>
            <div class="mgTop"></div>
            <button type="button" id="btnSaveUser" name="btnSaveUser" class="btn btn-primary">Save</button>
        </div>
    </div>
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/includes/main/scripts.php';
    ?>
</body>
</html>