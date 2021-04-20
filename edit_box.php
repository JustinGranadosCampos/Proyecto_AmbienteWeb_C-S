<?php
    include './view/BoxView.php';
    include './controller/boxController.php';
    $boxView = new BoxView();
    $id = $_GET['id'];

    if (isset($_POST['btnSaveUpdateBox']))
    {
        $boxController = new BoxController();
        $boxController->updateBox($id, $_POST['txtIdLabel']);
    }
    include './validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Box</title>
    <?php
        include './styles.php';
    ?>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modalBoxEdit" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="modalBox"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modalEdit-header">
                        <h5 class="modal-title-Box modalEdit-title" id="modalBox"></h5>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <?php
                                $boxView->showBox($id);
                            ?>
                        <div class="modal-footer">
                            <a href="./box_management.php" class="btn btn-light">Cancel</a>
                            <button
                                type="submit"
                                id="btnSaveUpdateBox"
                                name="btnSaveUpdateBox"
                                class="btn btn-dark">Save</button>
                                <button type="submit" name="btnDeleteBox" class="btn btn-danger btnDeleteBox">Delete</button></div></div>
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