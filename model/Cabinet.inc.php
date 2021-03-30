<?php
    include __DIR__.'/Conexion.inc.php';
    class Cabinet extends Conexion
    {
        protected function getCabinets(){
            $sql = "call ShowCabinets()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
            // $con->desconectar();
                
        }

        protected function getCabinet($id){
            $sql = "call ShowCabinet($id)";
            $result = $this->conectar()->query($sql);
            $data = array();
            $row = $result->fetch();
            
            return $row;
        }

        protected function insertCabinet($id, $number){
            $sql = "call InsertCabinet($id, $number)";
            if ($this->conectar()->query($sql))
            {
                echo '<script>alert("Registro agregado exitosamente");</script>';
                echo '<script>location.replace("./cabinet_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function updateCabinetData($id, $number){
            $sql = "call UpdateCabinet($id, $number)";
            if ($this->conectar()->query($sql)) {
                echo '<script>alert("Registro actualizado exitosamente");</script>';
                echo '<script>location.replace("./cabinet_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function deleteCabinetData($id){
            $sql = "call DeleteCabinet($id)";
            if ($this->conectar()->query($sql)) {
                echo '<script>alert("Registro eliminado");</script>';
                echo '<script>location.replace("./cabinet_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function getLastIdCabinet(){
            $sql = $this->conectar()->query("call GetLastIdCabinet()");
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            // echo $result;
            $lastId = $result['idCABINET'] + 1;
            return $lastId;
        }
    }
?>