<?php
    include './model/Box.inc.php';
    class BoxView extends Box
    {
        public function showBoxes(){
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="boxLabel">ID BOX</th>';
            echo '<th id="serialNumber">LABEL</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '<th>ACTIONS</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getBoxes();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["idBOX"] . '</td>';
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><a href="updateBox.php?id=' . $row["idBOX"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }
    }
?>