<?php
    include './view/ItemBoxView.php';
    include './controller/ItemBoxController.php';
    $itemBox = new ItemBoxView();
    $id = $_GET['id'];

    if (isset($_POST['btnSaveUpdateBoxItem']))
    {
        $itemBoxController = new ItemBoxController();
        $itemBoxController->updateItemBox($id, $_POST['cboBoxNumber'], $_POST['txtSerialNumber'], $_POST['txtName'], $_POST['txtAsset'], $_POST['txtModel'], $_POST['txtIsmpStatus'], $_POST['txtDetails']);
    }

    if (isset($_POST['btnDelete']))
    {
        $itemBoxController = new ItemBoxController();
        $itemBoxController->deleteItemBox($id);
    }
    include './validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,200;1,400&display=swap" rel="stylesheet">
    <title>Edit Item Box</title>
	<link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-- Modal para el CRUD -->
    <div class="modal fade" id="modalItemBoxEdit" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="modal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modalEdit-header">
                        <h5 class="modal-title modalEdit-title" id="modal"></h5>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <?php
                                $itemBox->getItemBox($id);
                            ?>
                        <div class="modal-footer">
                            <a href="box_items.php" class="btn btn-light">Cancel</a>
                            <button
                                type="submit"
                                id="btnSaveBoxItem"
                                name="btnSaveUpdateBoxItem"
                                class="btn btn-dark">Save</button>
                                <button type="submit" name="btnDelete" class="btn btn-danger btnDelete">Delete</button></div></div>
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