<?php
    include '../includes/main/validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Item Box</title>
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

    <!-- Modal -->
    <div class="container-fluid loanItemBox">
        <form action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="itemBoxLoan" class="col-form-label">Box Number</label>
                    <select class="form-control" name="itemBoxLoan" id="itemBoxLoan">
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtSerialNumber" class="col-form-label">Serial Number</label>
                    <input type="text" name="txtLabel" class="form-control" id="txtLabel" readonly>
                </div>
                <div class="form-group">
                    <label for="txtSerialNumber" class="col-form-label">Name</label>
                    <input type="text" name="txtLabel" class="form-control" id="txtLabel" readonly>
                </div>
                <div class="form-group">
                    <label for="txtSerialNumber" class="col-form-label">Asset</label>
                    <input type="text" name="txtLabel" class="form-control" id="txtLabel" readonly>
                </div>
                <div class="form-group">
                    <label for="txtSerialNumber" class="col-form-label">Model</label>
                    <input type="text" name="txtLabel" class="form-control" id="txtLabel" readonly>
                </div>
                <div class="form-group">
                    <label for="txtSerialNumber" class="col-form-label">ISMP Status</label>
                    <input type="text" name="txtLabel" class="form-control" id="txtLabel" readonly>
                </div>
                <div class="form-group">
                    <label for="txtLocationItemBox" class="col-form-label">Location To Loan</label>
                    <textarea class="form-control" name="txtLocationItemBox" id="txtLocationItemBox" required></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="button" class="btn btn-light" onclick="location.replace('box_items.php');">Cancel</button>
                <button type="submit" id="btnSaveItemBoxLoan" name="btnSaveItemBoxLoan" class="btn btn-dark">Save</button>
            </div>
        </form>
    </div>

    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/includes/main/scripts.php';
    ?>
</body>
</html>