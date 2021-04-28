<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    $state = "error";

    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        $sql = "call DeleteCabinet($id)";
        if($connection->conectar()->query($sql))
        {
            $state = "success";
        }
        else
        {
            echo "\nPDO::errorInfo():\n";
            echo $connection->conectar()->errorInfo();
        }
    }
    $connection->desconectar();
    echo $state;