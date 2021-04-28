<?php

    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }
    include __DIR__.'/Conexion.inc.php';

    class CabinetLevel extends Conexion
    {
        #Get All Cabinet_Level
        protected function getCabinetsLevels()
        {
            try {
                $sql = "call ShowCabinetsLevels()";
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

        #Get Cabinet_Level by ID
        protected function getBox($id)
        {
            try {
                $sql = "call ShowBox($id)";
                $result = $this->conectar()->query($sql);
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

        #Insert to Cabinet_Level
        protected function insertBox($id, $label)
        {
            try {
                $sql = "call InsertBox($id, '$label')";
                if ($this->conectar()->query($sql)) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                    swal({
                        "title":"Box Added!",
                        "text":"New Box Added!",
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
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        #Update Cabinet_Level
        protected function updateBoxData($id, $label)
        {
            try {
                $sql = "call UpdateBox($id, '$label')";
                if ($this->conectar()->query($sql)) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                    swal({
                        "title":"Done!",
                        "text":"The box was sucessfully updated!",
                        "icon":"success"
                    }).then(function(){ 
                            location.replace("../../masterPages/box_management.php");
                        });
                    }, 1500);
                    </script>';
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

        #Delete Cabinet_Level by ID
        protected function deleteBoxData($id)
        {
            try {
                $sql = "call DeleteBox($id)";
                if ($this->conectar()->query($sql)) {
                    echo '<script>alert("Registro eliminado");</script>';
                    echo '<script>location.replace("../../masterPages/box_management.php");</script>';
                } else {
                    $this->desconectar();
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

        #Get the next auto_incremental ID from Cabinet_Level
        protected function getLastIdCabinetLevel()
        {
            try {
                $sql = $this->conectar()->query("call GetLastIdCabinetLevel()");
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $lastId = $result['ID'] + 1;
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

        #Get All Cabinet Items
        protected function getAllItems()
        {
            try {
                $sql = "call Items_x_Cabinet()";
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
            // $con->desconectar();
        }
        
        #Get All Cabinets
        protected function geAlltCabinets()
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
            // $con->desconectar();
        }
    }
