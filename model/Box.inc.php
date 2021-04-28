<?php

    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }

    include __DIR__.'/Conexion.inc.php';
    
    class Box extends Conexion
    {
        protected function getBoxes()
        {
            try {
                $sql = "call Show_Boxes()";
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
                    $this->desconectar();
                    echo "\nPDO::errorInfo():\n";
                    echo $this->conectar()->errorInfo();
                }
            } catch (EXCEPTION $e) {
                $this->desconectar();
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->desconectar();
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }

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

        protected function deleteBoxData($id)
        {
            try {
                $sql = "call DeleteBox($id)";
                if ($this->conectar()->query($sql)) {
                    echo '<script>alert("Registro eliminado");</script>';
                    echo '<script>location.replace("../../masterPages/box_management.php");</script>';
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

        protected function getLastIdBox()
        {
            try {
                $sql = $this->conectar()->query("call GetLastIdBox()");
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                // echo $result;
                $lastId = $result['idBOX'] + 1;
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
