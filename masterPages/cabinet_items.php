 <?php
    include '../includes/main/validation.php';
    include '../view/ItemCabinetView.php';
    include '../controller/ItemCabinetController.php';
    $itemView = new ItemCabinetView();

    // if (isset($_POST['btnSaveItemCabinet'])) {
        // $itemController = new ItemCabinetController();
    //     if (isset($_POST['cboCabinetLabel'])) {
            // $itemController->insertItemCabinet(
    //             $_POST['serial-number'],
    //             $_POST['item-name'],
    //             $_POST['item-asset'],
    //             $_POST['item-model'],
    //             $_POST['ismpStatus'],
    //             $_POST['details']
    //         );
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Items in Cabinets</title>
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
                    <a class="nav-link" href="./box_items.php">Box Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active activeUnderline" href="./cabinet_items.php">Cabinet Items <span class="sr-only">(current)</span></a>
                </li>
                <?php
                    include $_SERVER['DOCUMENT_ROOT'].'/includes/main/nav_items_menu.php';
                ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?php
                    $itemView->showButtonNew();
                ?>
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
                <form action="cabinet_items.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idItemCabinet" class="col-form-label">ID</label>
                            <?php
                                $itemView->showNextItemCabinet();
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="serial-number" class="col-form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial-number" name="serial-number" required>
                        </div>
                        <div class="form-group">
                            <label for="item-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="item-name" name="item-name" required>
                        </div>
                        <div class="form-group">
                            <label for="item-asset" class="col-form-label">ASSET</label>
                            <input type="text" class="form-control" id="item-asset" name="item-asset" onkeypress="return isNumber();" required>
                        </div>
                        <div class="form-group">
                            <label for="item-model" class="col-form-label">MODEL</label>
                            <input type="text" class="form-control" id="item-model" name="item-model" required>
                        </div>
                        <div class="form-group">
                            <label for="ismpStatus" class="col-form-label">ISMP Status</label>
                            <input type="text" class="form-control" id="ismpStatus" name="ismpStatus" required>
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-form-label">Details</label>
                            <input type="text" class="form-control" id="details" name="details">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" name="btnCancelItemCabinet" data-dismiss="modal">Cancel</button>
                        <button type="button" id="btnSaveItemCabinet" name="btnSaveItemCabinet" class="btn btn-dark">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/includes/main/scripts.php';
    ?>
</body>

</html>
