<?php
    // include_once './controller/ItemBoxController.php';
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    $state = "error";

    // echo $_SERVER['DOCUMENT_ROOT'];
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        // deleteItemBox($id);
        $sql = "call DeleteItemBox($id)";
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