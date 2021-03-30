<?php
    include './view/CabinetView.php';
    include './controller/cabinetController.php';
    $cabinetView = new CabinetView();
    $id = $_GET['id'];

    if (isset($_POST['btnSaveUpdateCabinet']))
    {
        $cabinetController = new CabinetController();
        $cabinetController->updateCabinet($id, $_POST['txtNumber']);
    }

    if (isset($_POST['btnDeleteCabinet']))
    {
        $cabinetController = new CabinetController();
        $cabinetController->deleteCabinet($id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cabinet</title>
    <?php
        include './styles.php';
    ?>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modalCabinetEdit" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="modalCabinet"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modalEdit-header">
                        <h5 class="modal-title modalEdit-title" id="modalCabinet"></h5>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <?php
                                $cabinetView->showCabinet($id);
                            ?>
                        <div class="modal-footer">
                            <a href="./Cabinet_management.php" class="btn btn-light">Cancel</a>
                            <button
                                type="submit"
                                id="btnSaveUpdateCabinet"
                                name="btnSaveUpdateCabinet"
                                class="btn btn-dark">Save</button>
                                <button type="submit" name="btnDeleteCabinet" class="btn btn-danger btnDelete">Delete</button></div></div>
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