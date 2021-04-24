<?php
    include __DIR__.'/Conexion.inc.php';

    class CabinetLevel extends Conexion
    {
        #Get All Cabinet_Level
        protected function getCabinetsLevels(){
            $sql = "call ShowCabinetsLevels()";
            $result = $this->conectar()->query($sql);
            $data = array();

            while ($row = $result->fetch()) {
                $data[] = $row;
            }

            return $data;
            // $con->desconectar();
                
        }

        #Get Cabinet_Level by ID
        protected function getBox($id){
            $sql = "call ShowBox($id)";
            $result = $this->conectar()->query($sql);
            $row = $result->fetch();
            
            return $row;
        }

        #Insert to Cabinet_Level
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
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        #Update Cabinet_Level
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
                            location.replace("./box_management.php");
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

        #Delete Cabinet_Level by ID
        protected function deleteBoxData($id){
            $sql = "call DeleteBox($id)";
            if ($this->conectar()->query($sql)) {
                echo '<script>alert("Registro eliminado");</script>';
                echo '<script>location.replace("./box_management.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }

        #Get the next auto_incremental ID from Cabinet_Level
        protected function getLastIdCabinetLevel(){
            $sql = $this->conectar()->query("call GetLastIdCabinetLevel()");
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $lastId = $result['ID'] + 1;
            return $lastId;
        }

        #Get All Cabinet Items
        protected function getAllItems(){
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
        
        #Get All Cabinets
        protected function geAlltCabinets(){
            $sql = "call ShowCabinets()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
            // $con->desconectar();
                
        }
    }
?>