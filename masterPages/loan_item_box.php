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
        <form class="form-loan-itemBox" action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="itemBoxLoan" class="col-form-label">Item Box</label>
                    <select class="form-control" name="itemBoxLoan" id="itemBoxLoan" required>
                        <option value="-1">Select an option</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtIdBoxLoan" class="col-form-label">Box Number</label>
                    <input type="text" name="txtIdBoxLoan" class="form-control" id="txtIdBoxLoan" readonly required >
                </div>
                <div class="form-group">
                    <label for="txtSerialNumberLoanIB" class="col-form-label">Serial Number</label>
                    <input type="text" name="txtSerialNumberLoanIB" class="form-control" id="txtSerialNumberLoanIB" readonly required>
                </div>
                <div class="form-group">
                    <label for="txtNameLoanIB" class="col-form-label">Name</label>
                    <input type="text" name="txtNameLoanIB" class="form-control" id="txtNameLoanIB" readonly required >
                </div>
                <div class="form-group">
                    <label for="txtAssetLoanIB" class="col-form-label">Asset</label>
                    <input type="text" name="txtAssetLoanIB" class="form-control" id="txtAssetLoanIB" readonly required >
                </div>
                <div class="form-group">
                    <label for="txtModelLoanIB" class="col-form-label">Model</label>
                    <input type="text" name="txtModelLoanIB" class="form-control" id="txtModelLoanIB" readonly required >
                </div>
                <div class="form-group">
                    <label for="txtLocationItemBox" class="col-form-label">Location To Loan</label>
                    <textarea class="form-control" name="txtLocationItemBox" id="txtLocationItemBox" required autocomplete="off"></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="button" class="btn btn-light" onclick="location.replace('box_items.php');">Cancel</button>
                <button type="button" id="btnSaveItemBoxLoan" name="btnSaveItemBoxLoan" class="btn btn-dark">Save</button>
            </div>
        </form>
    </div>

    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/includes/main/scripts.php';
    ?>
</body>
</html>