<?php
include __DIR__.'/Conexion.inc.php';
class ItemBox extends Conexion
{
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

    public function getItem_x_Box($id)
    {
        $sql = "call GetItem_x_box($id)";
        $result = $this->conectar()->query($sql);
        $data = array();

        #Saves all the items into $data that get from the DB
        while ($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
        // $con->desconectar();
    }

    public function getItem($id){
        $sql = "call GetItemBox($id)";
        $result = $this->conectar()->query($sql);
        $data = array();
        $row = $result->fetch();
        
        return $row;
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
        $query = $this->conectar()->query("call GetLastIdItemBox()");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['idITEM_BOX'] + 1;
        $sql = "call InsertNewItemBox($lastId, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
        if ($this->conectar()->query($sql))
        {
            $sqlRelation = "call InsertItem_x_Box($box, $lastId)";
            if ($this->conectar()->query($sqlRelation))
            {
                echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                        swal({
                            "title":"Item Added!",
                            "text":"The item was sucessfully added!",
                            "icon":"success"
                        }).then(function(){ 
                                
                            });
                        }, 1500);
                        </script>';
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

    public function updateItem($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details){
        try{
            $sql = "call UpdateItemBox($id, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
            /*
            $sql = "call UpdateItemBox(?, ?, ?, ?, ?, ?, ?)";
            $gsent = $gbd->prepare($sql);
            $gsent->bindParam(1, $id, PDO::PARAM_INT);
            $gsent->bindParam(2, $serialNumber, PDO::PARAM_INT);
            $gsent->bindParam(3, $name, PDO::PARAM_INT);
            $gsent->bindParam(4, $asset, PDO::PARAM_INT);
            $gsent->bindParam(5, $model, PDO::PARAM_INT);
            $gsent->bindParam(6, $ismp, PDO::PARAM_INT);
            $gsent->bindParam(7, $details, PDO::PARAM_INT);
            
            $gsent->execute();
            */

            if ($this->conectar()->query($sql))
            {
                $sql = "call UpdateItem_x_Box($id, $box)";
                if ($this->conectar()->query($sql))
                {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                        swal({
                            "title":"Done!",
                            "text":"The item was sucessfully updated!",
                            "icon":"success"
                        }).then(function(){ 
                                location.replace("./box_items.php");
                            });
                        }, 1500);
                        </script>';
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
        }catch(EXCEPTION $e){
            $this->reportError($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            #echo "\nPDO::errorInfo():\n";
            #echo 'LA CAGUE PORQUE HICE MAL LA VARA';
        }catch(PDO_EXCEPTION $e){
            $this->reportError($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            #echo "\nPDO::errorInfo():\n";
            #echo 'LA CAGUE PORQUE HICE MAL LA VARA';
        }
    }

    public function deleteItem($id){
        $sql = "call DeleteItemBox($id)";
        if($this->conectar()->query($sql))
        {
            echo '<script>alert("Registro eliminado exitosamente");</script>';
            echo '<script>location.replace("./box_items.php");</script>';
        }
        else
        {
            echo "\nPDO::errorInfo():\n";
            echo $this->conectar()->errorInfo();
        }
    }
}
?>