<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "call GetItem_x_box($id)";
        $statement = $connection->conectar()->prepare($sql);
        $statement->execute();
        $output = array();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
            'idItem' => $row['idITEM_BOX'],
            'idBOX' => $row['idBOX'],
            'sn' => $row['SERIAL_NUMBER'],
            'name' => $row['NAME'],
            'asset' => $row['ASSET'],
            'model' => $row['MODEL']
            );
        }
    }

    $jsonObj = json_encode($output, JSON_FORCE_OBJECT);
    echo $jsonObj;
