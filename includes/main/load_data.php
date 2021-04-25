<?php
    include_once '../../model/Conexion.inc.php';
    $type = $_POST['type'];
    $id = $_POST['id'];
    $connection = new Conexion();
    // $statement = '';
    if(isset($_POST['type']))
    {
        if($type == "category_data")
        {
            $sql = 'call ShowCabinets()';
            $statement = $connection->conectar()->prepare($sql);
            $statement->execute();
            $output = array();
            $data = $statement->fetchAll();
            foreach ($data as $row) {
                $output[] = array(
                    'id' => $row['idCABINET'],
                    'name' => $row['CABINET_NUMBER']
                );
            }
        }
        else
        {
            $sql = "call ShowCabinetLevelByID($id)";
            $statement = $connection->conectar()->prepare($sql);
            $statement->execute();

            $data = $statement->fetchAll();
            foreach ($data as $row) {
                $output[] = array(
                    'id'    => $row['LEVEL_NUMBER'],
                    'name'  => $row['LABEL']
                ); 
            }
        }
        $jsonObj = json_encode($output, JSON_FORCE_OBJECT);
        echo $jsonObj;
    }
?>