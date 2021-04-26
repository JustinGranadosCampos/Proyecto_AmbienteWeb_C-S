<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    $state = "error";

    // { "id": id, "sn": sn, "itemName": itemName, "asset": asset, "model": model, "ismp": ismp, "details": details },
    if (isset($_POST['id']) && isset($_POST['sn']) && isset($_POST['itemName']) && isset($_POST['asset']) &&
        isset($_POST['model']) && isset($_POST['ismp'])) {

        $id = $_POST['id'];
        $sn = $_POST['sn'];
        $itemName = $_POST['itemName'];
        $asset = $_POST['asset'];
        $model = $_POST['model'];
        $ismp = $_POST['ismp'];
        $details = $_POST['details'];

        $sql = "call  UpdateItemCabinet(?, ?, ?, ?, ?, ?, ?)";
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $id, PDO::PARAM_INT);
        $stm->bindParam(2, $sn, PDO::PARAM_STR);
        $stm->bindParam(3, $itemName, PDO::PARAM_STR);
        $stm->bindParam(4, $model, PDO::PARAM_STR);
        $stm->bindParam(5, $asset, PDO::PARAM_STR);
        $stm->bindParam(6, $ismp, PDO::PARAM_STR);
        $stm->bindParam(7, $details, PDO::PARAM_STR);

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
