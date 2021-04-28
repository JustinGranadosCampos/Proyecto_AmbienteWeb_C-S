<?php

    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }
    include __DIR__.'/Conexion.inc.php';
    class Cabinet extends Conexion
    {
        protected function getCabinets()
        {
            try {
                $sql = "call ShowCabinets()";
                $result = $this->conectar()->query($sql);
                $data = array();

                #Saves all the items into $data that get from the DB
                while ($row = $result->fetch()) {
                    $data[] = $row;
                }
                return $data;
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
            // $con->desconectar();
        }

        protected function getCabinet($id)
        {
            try {
                $sql = "call ShowCabinet($id)";
                $result = $this->conectar()->query($sql);
                $data = array();
                $row = $result->fetch();
            
                return $row;
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function insertCabinet($id, $number)
        {
            try {
                $sql = "call InsertCabinet($id, $number)";
                if ($this->conectar()->query($sql)) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                    swal({
                        "title":"Cabinet Added!",
                        "text":"The cabinet was sucessfully added!",
                        "icon":"success"
                    }).then(function(){ 
                            
                        });
                    }, 1500);
                    </script>';
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function updateCabinetData($id, $number)
        {
            try {
                $sql = "call UpdateCabinet($id, $number)";
                if ($this->conectar()->query($sql)) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                    swal({
                        "title":"Done!",
                        "text":"The item was sucessfully updated!",
                        "icon":"success"
                    }).then(function(){ 
                            location.replace("../../masterPages/cabinet_management.php");
                        });
                    }, 1500);
                    </script>';
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function deleteCabinetData($id)
        {
            try {
                $sql = "call DeleteCabinet($id)";
                if ($this->conectar()->query($sql)) {
                    echo '<script>alert("Registro eliminado");</script>';
                    echo '<script>location.replace("../../masterPages/cabinet_management.php");</script>';
                } else {
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

        protected function getLastIdCabinet()
        {
            try {
                $sql = $this->conectar()->query("call GetLastIdCabinet()");
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $lastId = $result['idCABINET'] + 1;
                return $lastId;
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }
    }
