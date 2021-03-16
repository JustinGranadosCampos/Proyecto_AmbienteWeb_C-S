<?php
    include __DIR__.'/Conexion.inc.php';
    class Box extends Conexion{
        // private 

        public function getItems()
        {
            $sql = "call Items_x_Box()";
            $result = $this->conectar()->query($sql);
            $data = array();

            #Saves all the items into $data that get from the DB
            while($row = $result->fetch())
            {
                $data[] = $row;
            }
            return $data;
            // $con->desconectar();
        }
    }
?>