<?php
    // include './model/Conexion.inc.php';
    // $con = new Conexion();
    // $con->conectar();
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
                <li class="nav-item active activeUnderline">
                    <a class="nav-link" href="#">Boxes Items <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cabinet_items.html">Cabinet Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin/login.html">Login</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">ITEM</a>
                </li> -->
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <button id="btnNewItemBox" type="button" class="btn btn-success btnNew">+ Add New</button>
            </div>
            <!-- <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="tableBox" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Show Box Tables
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="tableCabinet" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Show Cabinet Table
                    </label>
                  </div>
            </div> -->
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="itemTable" class="table table0stripped table-bordered table-condensed"
                        style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th id="boxLabel">BOX LABEL</th>
                                <th id="serialNumber">SERIAL NUMBER</th>
                                <th id="iName">NAME</th>
                                <th id="iAsset">ASSET</th>
                                <th id="iModel">MODEL</th>
                                <th id="iISMP_stat">ISMP STATUS</th>
                                <th id="iDetail">DETAIL</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <button class="btn bg-dark text-light btnEdit">Edit</button>
                                            <button class="btn btn-danger btnDelete">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
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
                <form id="formInventory">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="itemLabel" class="col-form-label">Box Number</label>
                            <input type="text" class="form-control" id="itemLabel">
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
    <script src="./jquery/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="DataTables/datatables.min.js"></script>

    <script src="./js/main/main.js"></script>
</body>

</html>