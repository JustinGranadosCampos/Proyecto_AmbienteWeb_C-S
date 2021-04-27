<?php
    
    include_once '../../model/Conexion.inc.php';

    session_start();
    $connection = new Conexion();
    $state = "error";
    $wwid = $_SESSION['wwid'];

    // { "id":id, "detail":detail}
    if (isset($_POST['id']) && isset($_POST['detail'])) {
        $id = $_POST['id'];
        $detail = $_POST['detail'];

        $sql = "call GetLastIdLoanItemBox()";
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $id, PDO::PARAM_INT);
        $stm->bindParam(2, $wwid, PDO::PARAM_INT);

        $result = $stm->execute();

        $lastIdLoan = $result['idLOAN_ITEMBOX'];

        $sql = "call AddLoanItemBox(?, ?, ?)";
        $stm = $connection->conectar()->prepare($sql);

        $stm->bindParam(1, $lastIdLoan, PDO::PARAM_INT);
        $stm->bindParam(2, $id, PDO::PARAM_INT);
        $stm->bindParam(3, $wwid, PDO::PARAM_INT);

        $result = $stm->execute();

        if ($result) {
        // if (true) {
            $sql = "call GetLastIdLoanItemBox()";
            $stm = $connection->conectar()->prepare($sql);

            $result = $stm->execute();
            $lastId = $result['idLOAN_ITEMBOX'];
            if ($lastId == 0 || $lastId == '' ) {
                $lastId = 1;
            }
            
            
            $sql = "call AddLoanItemBoxStatus(?, ?)";
            $stm = $connection->conectar()->prepare($sql);

            $stm->bindParam(1, $detail, PDO::PARAM_STR);
            $stm->bindParam(2, $lastId, PDO::PARAM_INT);

            $result = $stm->execute();
            $cant_rows = $result->fetchColumn();
            if ($result) {
            // if (true) {
                $sql = "call UpdateItemBoxStatus(?)";
                $stm = $connection->conectar()->prepare($sql);

                $stm->bindParam(1, $id, PDO::PARAM_STR);

                $result = $stm->execute();
                $state = "success";
            }
        } else {
            echo "\nPDO::errorInfo():\n";
            echo $connection->conectar()->errorInfo();
        }
    }
    $connection->desconectar();
    echo $state;