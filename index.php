<?php
    include './view/ItemBoxView.php';
    include './controller/ItemBoxController.php';
    $itemBox = new ItemBoxView();

    if (isset($_POST['btnSaveBoxItem']))
    {
        $itemBoxController = new ItemBoxController();
        $itemBoxController->addBoxItem($_POST['cboBoxNumber'], $_POST['txtSerialNumber'], $_POST['txtName'], $_POST['txtAsset'], $_POST['txtModel'], $_POST['txtIsmpStatus'], $_POST['txtDetails']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,200;1,400&display=swap" rel="stylesheet">
    <title>Items ֎ Boxes</title>
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

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
                <li class="nav-item active activeUnderline">
                    <a class="nav-link" href="#">Box Items <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cabinet_items.php">Cabinet Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin/login.html">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <button id="btnNewItemBox" type="button" class="btn btn-success btnNew">+ Add New</button>
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
                            $itemBox->getItemsBox();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para el CRUD -->
        <div class="modal fade" id="modalItemBoxCRUD" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="itemLabel" class="col-form-label">Box Number</label>
                                <select name="cboBoxNumber" id="cboBoxNumber" class="form-control">
                                    <?php
                                        $itemBox->showBoxes();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtSerialNumber" class="col-form-label">Serial Number</label>
                                <input type="text" name="txtSerialNumber" class="form-control" id="txtSerialNumber">
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-form-label">Name</label>
                                <input type="text" name="txtName" class="form-control" id="txtName">
                            </div>
                            <div class="form-group">
                                <label for="txtAsset" class="col-form-label">ASSET</label>
                                <input type="number" name="txtAsset" class="form-control" id="txtAsset">
                            </div>
                            <div class="form-group">
                                <label for="txtModel" class="col-form-label">MODEL</label>
                                <input type="text" name="txtModel" class="form-control" id="txtModel">
                            </div>
                            <div class="form-group">
                                <label for="txtIsmpStatus" class="col-form-label">ISMP Status</label>
                                <input type="text" name="txtIsmpStatus" class="form-control" id="txtIsmpStatus">
                            </div>
                            <div class="form-group">
                                <label for="txtDetails" class="col-form-label">Details</label>
                                <input type="text" name="txtDetails" class="form-control" id="txtDetails">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <button
                                type="submit"
                                id="btnSaveBoxItem"
                                name="btnSaveBoxItem"
                                class="btn btn-dark">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    <script src="./jquery/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <script src="./js/main/main.js"></script>
</body>

</html>