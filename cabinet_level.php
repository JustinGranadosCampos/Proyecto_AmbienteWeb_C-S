<?php
    include __DIR__.'\validation.php';
    include __DIR__.'\view\cabinetLevelView.php';
    
    $cabLevel = new CabinetLevelView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Level Management</title>
    <?php
        include __DIR__.'\styles.php';;
    ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="box_items.php">
            <img src="/img/qrv_logo.png" width="80" height="50" alt="Main_logo" loading="lazy"
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
                    <a class="nav-link" href="/box_items.php">Box Items <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cabinet_items.php">Cabinet Items</a>
                </li>
                <?php
                    include __DIR__.'\nav_items_menu.php';
                ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <button id="btnNewCabinetLevel" type="button" class="btn btn-success btnNew">+ Add New</button>
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
                            $cabLevel->showCabinetsLevels();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
        class="modal fade"
        id="modalAddNewCabinetLevel"
        tabindex="1"
        role="dialog"
        aria-labelledby="modalAddCabinetLevel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddCabinetLevel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtIdNextCabinetLevel" class="col-form-label">ID CABINET LEVEL</label>
                            <?php
                                        $cabLevel->showNextCabinetLevel();
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="txtLevel_Number" class="col-form-label">LEVEL NUMBER</label>
                            <input type="text" name="txtLevel_Number" class="form-control" id="txtLevel_Number" onkeypress="return isNumber();">
                        </div>
                        <div class="form-group">
                            <label for="txtLabelCabinetLevel" class="col-form-label">LABEL</label>
                            <input type="text" name="txtLabelCabinetLevel" class="form-control" id="txtLabelCabinetLevel">
                        </div>
                        <div class="form-group">
                            <label for="txtIdCabinet_CL" class="col-form-label">CABINET NUMBER</label>
                            <select name="txtIdCabinet_CL" id="txtIdCabinet_CL" class="form-control">
                                <option value="-1">Select an option</option>
                                <?php
                                    $cabLevel->showCabinets();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtIdItem_CL" class="col-form-label">ITEM SERIAL NUMBER</label>
                            <select name="txtIdItem_CL" id="txtIdItem_CL" class="form-control">
                                <option value="-1">Select an option</option>
                                <?php
                                    $cabLevel->showItems();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="btnSaveBox" name="btnSaveBox" class="btn btn-dark">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
        include __DIR__.'\scripts.php';
    ?>
</body>
</html>