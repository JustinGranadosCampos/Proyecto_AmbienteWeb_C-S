<?php
    include __DIR__.'/Conexion.inc.php';
    class Box extends Conexion
    {
        protected function getBoxes(){
            $sql = "call Show_Boxes()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
            // $con->desconectar();
                
        }

        protected function getBox($id){
            $sql = "call ShowBox($id)";
            $result = $this->conectar()->query($sql);
            $row = $result->fetch();
            
            return $row;
        }

        protected function insertBox($id, $label){
            $sql = "call InsertBox($id, '$label')";
            if ($this->conectar()->query($sql))
            {
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
                // echo '<script>location.replace("./box_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function updateBoxData($id, $label){
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
                // echo '<script>location.replace("./box_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function deleteBoxData($id){
            $sql = "call DeleteBox($id)";
            if ($this->conectar()->query($sql)) {
                echo '<script>alert("Registro eliminado");</script>';
                echo '<script>location.replace("../../masterPages/box_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        protected function getLastIdBox(){
            $sql = $this->conectar()->query("call GetLastIdBox()");
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            // echo $result;
            $lastId = $result['idBOX'] + 1;
            return $lastId;
        }
    }
?>