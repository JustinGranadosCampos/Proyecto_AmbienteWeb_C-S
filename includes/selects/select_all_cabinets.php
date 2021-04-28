<?php
    include_once '../../model/Conexion.inc.php';

    $connection = new Conexion();
    
    if (isset($_POST['idCabinet'])) {
        $sql = 'call ShowCabinets()';
        $statement = $connection->conectar()->prepare($sql);
        $statement->execute();
        $output = array();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
            'value' => $row['idCABINET'],
            'name' => $row['CABINET_NUMBER']
        );
        }
    }

    $connection->desconectar();
    $jsonObj = json_encode($output, JSON_FORCE_OBJECT);
    echo $jsonObj;
