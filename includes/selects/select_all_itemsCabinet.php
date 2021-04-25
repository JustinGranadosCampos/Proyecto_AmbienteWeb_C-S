<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    
    if (isset($_POST['idItem'])) {
        $sql = 'call Items_x_Cabinet()';
        $statement = $connection->conectar()->prepare($sql);
        $statement->execute();
        $output = array();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
            'id' => $row['idITEM_CABINET'],
            'serialNumber' => $row['SERIAL_NUMBER'],
            'name' => $row['NAME']
            );
        }
    }

    $jsonObj = json_encode($output, JSON_FORCE_OBJECT);
    echo $jsonObj;
