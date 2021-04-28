<?php

error_reporting(0);
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include __DIR__.'/Conexion.inc.php';
#include './controller/errorHandlerController.php';
class ItemBox extends Conexion
{
    public function getItems()
    {
        try {
            $sql = "call Items_x_Box()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            $this->desconectar();
            return $data;
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
        // $con->desconectar();
    }

    public function getItem_x_Box($id)
    {
        try {
            $sql = "call GetItem_x_box($id)";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            $this->desconectar();
            return $data;
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
        // $con->desconectar();
    }

    public function getItem($id)
    {
        try {
            $sql = "call GetItemBox($id)";
            $result = $this->conectar()->query($sql);
            $data = array();
            $row = $result->fetch();
        
            $this->desconectar();
            return $row;
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function getBoxes()
    {
        try {
            $sql = "call Show_Boxes()";
            $result = $this->conectar()->query($sql);
            $data = array();

            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            $this->desconectar();
            return $data;
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function insertItemBox($box, $serialNumber, $name, $asset, $model, $ismp, $details)
    {
        try {
            $query = $this->conectar()->query("call GetLastIdItemBox()");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $lastId = $result['idITEM_BOX'] + 1;
            $sql = "call InsertNewItemBox($lastId, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
            if ($this->conectar()->query($sql)) {
                $sqlRelation = "call InsertItem_x_Box($box, $lastId)";
                if ($this->conectar()->query($sqlRelation)) {
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
                        $this->desconectar();
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                    $this->desconectar();
                }
            } else {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
                $this->desconectar();
            }
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function updateItem($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details)
    {
        try {
            $sql = "call UpdateItemBox($id, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";

            if ($this->conectar()->query($sql)) {
                $sql = "call UpdateItem_x_Box($id, $box)";
                if ($this->conectar()->query($sql)) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                        swal({
                            "title":"Done!",
                            "text":"The item was sucessfully updated!",
                            "icon":"success"
                        }).then(function(){ 
                                location.replace("../../masterPages/box_items.php");
                            });
                        }, 1500);
                        </script>';
                        $this->desconectar();
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                    $this->desconectar();
                }
            } else {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
                $this->desconectar();
            }
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function deleteItem($id)
    {
        try {
            $sql = "call DeleteItemBox($id)";
            if ($this->conectar()->query($sql)) {
                echo '<script>alert("Registro eliminado exitosamente");</script>';
                echo '<script>location.replace("../../masterPages/box_items.php");</script>';
            
                $this->desconectar();
            } else {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
                $this->desconectar();
            }
        } catch (EXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        } catch (PDOEXCEPTION $e) {
            $this->desconectar();
            $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}
