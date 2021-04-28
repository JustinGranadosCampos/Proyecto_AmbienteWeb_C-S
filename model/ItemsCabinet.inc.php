<?php

    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }
    include __DIR__.'/Conexion.inc.php';
    class ItemCabinet extends Conexion
    {
        protected function getItems()
        {
            try {
                $sql = "call ShowAllItemCabinet()";
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

        protected function getItem($id)
        {
            try {
                $sql = "call GetItemCabinet($id)";
                $result = $this->conectar()->query($sql);
                $data = array();
                $row = $result->fetch();
            
                $this->desconectar();
                return $row;
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function getFullItem($id)
        {
            try {
                $sql = "call ShowItem_Cabinet_Level($id)";
                $result = $this->conectar()->query($sql);
                $data = array();
                $row = $result->fetch();
            
                $this->desconectar();
                return $row;
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function getCabinetData($idCabinet, $cabinetNumber)
        {
            try {
                $sql = "call GetCabinet($idCabinet, $cabinetNumber)";
                $result = $this->conectar()->query($sql);
                $data = array();
                $row = $result->fetch();
            
                $this->desconectar();
                return $row;
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function getLabel($id, $levelNum)
        {
            try {
                $sql = "call GetCabinetLabel($id, $levelNum)";
                $result = $this->conectar()->query($sql)->fetch();
                $row = $result['LABEL'];
                $this->desconectar();
                return $row;
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function getCabinets()
        {
            try {
                $sql = "call ShowCabinets()";
                $result = $this->conectar()->query($sql);
                $data = array();

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
        }

        protected function getCabinetsLevels()
        {
            try {
                $sql = "call ShowCabinetLevel()";
                $result = $this->conectar()->query($sql);
                $data = array();

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
        }

        protected function updateItem($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            try {
                $sql = "call UpdateItemBox($id, '$serialNumber', '$name', '$asset', '$model', '$ismp', '$details')";
                if ($this->conectar()->query($sql)) {
                    $sql = "call UpdateItem_x_Box($id, $box)";
                    if ($this->conectar()->query($sql)) {
                        echo '<script>alert("Registro actualizado exitosamente");</script>';
                        echo '<script>location.replace("./index.php");</script>';
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
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function deleteItem($id)
        {
            try {
                $sql = "call DeleteItemBox($id)";
                if ($this->conectar()->query($sql)) {
                    echo '<script>alert("Registro eliminado exitosamente");</script>';
                    echo '<script>location.replace("./index.php");</script>';
                    $this->desconectar();
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                    $this->desconectar();
                }
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        #Get the next auto_incremental ID from Item Cabinet
        protected function getLastIdItemCabinet()
        {
            try {
                $sql = $this->conectar()->query("call GetLastIdItemCabinet()");
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $lastId = $result['idITEM_CABINET'] + 1;
                $this->desconectar();
                return $lastId;
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }
    }
