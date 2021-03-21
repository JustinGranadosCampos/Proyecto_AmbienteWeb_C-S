<?php
include __DIR__.'/Conexion.inc.php';
class ItemBox extends Conexion
{
    // private

    public function getItems()
    {
        $sql = "call Items_x_Box()";
        $result = $this->conectar()->query($sql);
        $data = array();

        #Saves all the items into $data that get from the DB
        while ($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
        // $con->desconectar();
    }

    public function getBoxes()
    {
        $sql = "call Show_Boxes()";
        $result = $this->conectar()->query($sql);
        $data = array();

        while ($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertItemBox($box, $serialNumber, $name, $asset, $model, $ismp, $details){
        $sql = "call InsertNewItemBox('$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
        if ($this->conectar->query($sql))
        {
            $idItemBox = $this->conectar->lastInsertId();
            $sql = "call InsertItem_x_Box($box, $idItemBox)";
            if ($this->conectar->query($sql))
            {
                echo '<script>alert("Registro agregado exitosamente");</script>';
                echo '<script>window.location.reload;</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar->errorInfo();
            }
        }
        else
        {
            echo "\nPDO::errorInfo():\n";
            echo $this->conectar->errorInfo();
        }
    }
}
?>