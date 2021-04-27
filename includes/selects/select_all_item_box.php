<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    
        $sql = 'call SelectItemsBoxNoLoan()';
        $statement = $connection->conectar()->prepare($sql);
        $statement->execute();
        $output = array();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
            'idItem' => $row['idITEM_BOX'],
            'sn' => $row['SERIAL_NUMBER'],
            'name' => $row['NAME']
            );
        }

    $jsonObj = json_encode($output, JSON_FORCE_OBJECT);
    echo $jsonObj;
