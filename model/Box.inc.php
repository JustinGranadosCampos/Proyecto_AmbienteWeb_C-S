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
            $data = array();
            $row = $result->fetch();
            
            return $row;
        }

        protected function insertBox($id /*....*/){
            $sql = "call AddBox($id /*....*/)";
        }

        protected function deleteBox($id){
            $sql = "call DeleteBox($id)";
        }
    }
?>