<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    $state = "error";

    // { "id":id }
    if (isset($_POST['id'])) {
        
        $id = $_POST['id'];

        $sql = "call DeleteItemCabinet(?)";
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $id, PDO::PARAM_INT);

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