<?php
    include __DIR__.'/Conexion.inc.php';
    class ItemCabinet extends Conexion
    {
        protected function getItems()
        {
            $sql = "call Items_x_Cabinet()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
            // $con->desconectar();
        }

        protected function getItem($id){
            $sql = "call GetItemCabinet($id)";
            $result = $this->conectar()->query($sql);
            $data = array();
            $row = $result->fetch();
            
            return $row;
        }

        protected function getLabel($id, $levelNum){
            $sql = "call GetCabinetLabel($id, $levelNum)";
            $result = $this->conectar()->query($sql)->fetch();
            $row = $result['LABEL'];
            return $row;
        }

        protected function getCabinets()
        {
            $sql = "call ShowCabinets()";
            $result = $this->conectar()->query($sql);
            $data = array();

            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }

        protected function getCabinetsLevels()
        {
            $sql = "call ShowCabinetLevel()";
            $result = $this->conectar()->query($sql);
            $data = array();

            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }

        protected function insertItem($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details){
            $query = $this->conectar()->query("call GetLastIdItemCabinet()");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $lastId = $result['idITEM_CABINET'] + 1;
            $sql = "call InsertNewItemCabinet($lastId, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
            if ($this->conectar()->query($sql))
            {
                $sqlRelation = "call InsertItemCabinetLevel($cabinetLevel, '$cabinetLabel', $lastId, $cabinetNumber)";
                if ($this->conectar()->query($sqlRelation))
                {
                    echo '<script>alert("Registro agregado exitosamente");</script>';
                    echo '<script>location.replace("./cabinet_items.php");</script>';
                }
                else
                {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function updateItem($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details){
            $sql = "call UpdateItemBox($id, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
            if ($this->conectar()->query($sql))
            {
                $sql = "call UpdateItem_x_Box($id, $box)";
                if ($this->conectar()->query($sql))
                {
                    echo '<script>alert("Registro actualizado exitosamente");</script>';
                    echo '<script>location.replace("./index.php");</script>';
                }
                else
                {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function deleteItem($id){
            $sql = "call DeleteItemBox($id)";
            if($this->conectar()->query($sql))
            {
                echo '<script>alert("Registro eliminado exitosamente");</script>';
                echo '<script>location.replace("./index.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }
    }
?>