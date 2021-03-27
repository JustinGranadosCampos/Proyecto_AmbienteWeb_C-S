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

        // public function getItem_x_Box($id)
        // {
        //     $sql = "call GetItem_x_box($id)";
        //     $result = $this->conectar()->query($sql);
        //     $data = array();

        //     #Saves all the items into $data that get from the DB
        //     while ($row = $result->fetch()) {
        //         $data[] = $row;
        //     }
        //     return $data;
        //     // $con->desconectar();
        // }

        protected function getItem($id){
            $sql = "call GetItemBox($id)";
            $result = $this->conectar()->query($sql);
            $data = array();
            $row = $result->fetch();
            
            return $row;
        }

        protected function getCabinets()
        {
            $sql = "call Show_Boxes()";
            $result = $this->conectar()->query($sql);
            $data = array();

            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }

        protected function insertItem($box, $serialNumber, $name, $asset, $model, $ismp, $details){
            $query = $this->conectar()->query("call GetLastIdItemBox()");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $lastId = $result['idITEM_BOX'] + 1;
            $sql = "call InsertNewItemBox($lastId, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
            // $idItemBox = $this->conectar()->lastInsertId();
            if ($this->conectar()->query($sql))
            {
                $sqlRelation = "call InsertItem_x_Box($box, $lastId)";
                if ($this->conectar()->query($sqlRelation))
                {
                    echo '<script>alert("Registro agregado exitosamente");</script>';
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