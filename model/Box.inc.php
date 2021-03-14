<?php
    include __DIR__.'/Conexion.inc.php';
    class Box extends Conexion{
        // private 

        public function getItems()
        {
            $sql = "call Items_x_Box()";
            $result = $this->conectar()->query($sql);
            
            #Shows all the items that get from DB
            while($row = $result->fetch())
            {
                echo '<tr>';
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td>' . $row["SERIAL_NUMBER"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                echo '<td>' . $row["ASSET"] . '</td>';
                echo '<td>' . $row["MODEL"] . '</td>';
                echo '<td>' . $row["ISMP_STATUS"] . '</td>';
                echo '<td>' . $row["DETAIL"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><button class="btn bg-dark text-light btnEdit">Edit</button><button class="btn btn-danger btnDelete">Delete</button></div></div></td>';
                echo '</tr>';
            }
            // $con->desconectar();
        }
    }
?>