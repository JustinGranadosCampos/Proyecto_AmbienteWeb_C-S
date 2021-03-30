<?php
    include './model/Cabinet.inc.php';
    class CabinetView extends Cabinet
    {
        public function showCabinets(){
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="boxLabel">ID CABINET</th>';
            echo '<th id="serialNumber">CABINET NUMBER</th>';
            echo '<th>ACTIONS</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getCabinets();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["idCABINET"] . '</td>';
                echo '<td>' . $row["CABINET_NUMBER"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><a href="./edit_cabinet.php?id=' . $row["idCABINET"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }

        public function showCabinet($id)
        {
            $result = $this->getBox($id);
            if (!empty($result))
            {
                echo '<div class="form-group">';
                echo '<label for="txtIdBox" class="col-form-label">ID BOX</label>';
                echo '<input type="text" name="txtIdBox" class="form-control" id="txtIdBox" value="' . $result["idBOX"] . '" readonly>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="txtIdLabel" class="col-form-label">LABEL</label>';
                echo '<input type="text" name="txtIdLabel" class="form-control" id="txtIdLabel" value="' . $result["LABEL"] . '">';
                echo '</div>';
            }
        }

        public function showNextCabinet()
        {
            $result = $this->getLastIdCabinet();
            echo '<input type="text" name="txtCabinetNumber" class="form-control" id="txtCabinetNumber" value=' . $result . ' readonly>';
        }
    }
?>