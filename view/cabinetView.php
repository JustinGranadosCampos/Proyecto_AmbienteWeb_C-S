<?php
    include './model/Cabinet.inc.php';
    class CabinetView extends Cabinet
    {
        public function showCabinets(){
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
            $result = $this->getCabinets();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["idCABINET"] . '</td>';
                echo '<td>' . $row["CABINET_NUMBER"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><a href="updateBox.php?id=' . $row["idCABINET"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }
    }
?>