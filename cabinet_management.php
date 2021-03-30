<?php
    include './view/cabinetView.php';
    include './controller/cabinetController.php';
    $cabinetView = new CabinetView();

    if(isset($_POST['btnSaveCabinet']))
    {
        $cabientController = new CabinetController();
        $cabientController->addCabinet($_POST['txtId'], $_POST['txtCabinetNumber']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Management</title>
    <?php
        include './styles.php';
    ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="./img/qrv_logo.png" width="80" height="50" alt="Main_logo" loading="lazy"
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
                    <a class="nav-link" href="./index.php">Box Items <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cabinet_items.php">Cabinet Items</a>
                </li>
                <?php
                    include './nav_items_menu.php';
                ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <button id="btnAddNewCabinet" type="button" class="btn btn-success btnNew">+ Add New</button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="itemTable" class="table table-stripped table-bordered table-condensed display table-hover"
                        style="width: 100%;">
                        <?php
                            $cabinetView->showCabinets();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para el CRUD -->
        <div class="modal fade" id="modalAddCabinet" tabindex="1" role="dialog" aria-labelledby="modalAddNewCabinet"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddNewCabinet"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="itemLabel" class="col-form-label">ID Cabinet</label>
                                <?php
                                    $cabinetView->showNextCabinet();
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="txtSerialNumber" class="col-form-label">Cabinet Number</label>
                                <input type="text" name="txtCabinetNumber" class="form-control" id="txtLabel">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <button
                                type="submit"
                                id="btnSaveCabinet"
                                name="btnSaveCabinet"
                                class="btn btn-dark">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    <?php
        include './scripts.php';
    ?>
</body>
</html>