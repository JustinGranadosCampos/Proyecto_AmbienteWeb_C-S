<?php
    include './view/ItemCabinetView.php';
    // include './controller/ItemBoxController.php';
    $itemView = new ItemCabinetView();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Items ֎ Cabinets</title>
    <?php
        include './styles.php';
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">
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
                    <a class="nav-link" href="./index.php">Boxes Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active activeUnderline" href="./cabinet_items.html">Cabinet Items <span class="sr-only">(current)</span></a>
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
                <button id="btnNewItemCabinet" type="button" class="btn btn-success btnNew">+ Add New</button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="cabinetTable" class="display cabinetTable table table0stripped table-bordered table-condensed"
                        style="width: 100%;">
                        <?php
                            $itemView->getItemsCabinet();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para el CRUD -->
    <div class="modal fade" id="modalItemCabinetCRUD" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formInventory">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="itemLabel" class="col-form-label">Cabinet Number</label>
                            <select name="cboCabinetNumber" id="cboCabinetNumber" class="form-control">
                                <?php
                                    $itemView->showCabinets();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="serial-number" class="col-form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial-number">
                        </div>
                        <div class="form-group">
                            <label for="item-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="item-name">
                        </div>
                        <div class="form-group">
                            <label for="item-asset" class="col-form-label">ASSET</label>
                            <input type="text" class="form-control" id="item-asset">
                        </div>
                        <div class="form-group">
                            <label for="item-model" class="col-form-label">MODEL</label>
                            <input type="text" class="form-control" id="item-model">
                        </div>
                        <div class="form-group">
                            <label for="ismpStatus" class="col-form-label">ISMP Status</label>
                            <input type="text" class="form-control" id="ismpStatus">
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-form-label">Details</label>
                            <input type="text" class="form-control" id="details">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="btnSave" class="btn btn-dark" data-dismiss="modal">Save</button>
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
