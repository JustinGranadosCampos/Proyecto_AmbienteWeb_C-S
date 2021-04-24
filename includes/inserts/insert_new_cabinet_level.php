<?php
    
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    $state = "error";

    // { "id":id, "lvlNumber":lvlNumber, "label":label, "idCabinet":idCabinet, "idItem":idItem}
    if (isset($_POST['id']) && isset($_POST['lvlNumber']) && isset($_POST['label']) && 
        isset($_POST['idCabinet']) && isset($_POST['idItem'])) {
        
        $id = $_POST['id'];
        $lvlNumber = $_POST['lvlNumber'];
        $label = $_POST['label'];
        $idCabinet = $_POST['idCabinet'];
        $idItem = $_POST['idItem'];

        $sql = "call InsertCabinetLevel(?, ?, ?, ?, ?)";
        
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $id, PDO::PARAM_INT);
        $stm->bindParam(2, $lvlNumber, PDO::PARAM_INT);
        $stm->bindParam(3, $label, PDO::PARAM_STR);
        $stm->bindParam(4, $idCabinet, PDO::PARAM_INT);
        $stm->bindParam(5, $idItem, PDO::PARAM_INT);

        $result = $stm->execute();

        if ($result) {
            $state = "success";
        } else {
            echo "\nPDO::errorInfo():\n";
            echo $connection->conectar()->errorInfo();
        }
    }
    $connection->desconectar();
    echo $state;
