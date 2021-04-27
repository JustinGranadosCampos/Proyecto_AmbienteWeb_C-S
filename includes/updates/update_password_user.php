<?php
    include_once '../../model/Conexion.inc.php';

    session_start();
    $wwid = $_SESSION['wwid'];
    $connection = new Conexion();
    $state = "error";

    // { "id": id, "sn": sn, "itemName": itemName, "asset": asset, "model": model, "ismp": ismp, "details": details }
    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];

        $sql = "call UpdateUserPass(?, ?)";
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $wwid, PDO::PARAM_INT);
        $stm->bindParam(2, $pass, PDO::PARAM_STR);

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
