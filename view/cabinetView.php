<?php
    include $_SERVER['DOCUMENT_ROOT'].'/model/Cabinet.inc.php';
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
                echo '<td><div class="text-center"><div class="btn-group"><a href="../includes/edit/edit_cabinet.php?id=' . $row["idCABINET"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }

        public function showCabinet($id)
        {
            $result = $this->getCabinet($id);
            if (!empty($result))
            {
                echo '<div class="form-group">';
                echo '<label for="txtIdCabinet" class="col-form-label">ID Cabinet</label>';
                echo '<input type="text" name="txtIdCabinet" class="form-control" id="txtIdCabinet" value="' . $result["idCABINET"] . '" readonly>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="txtNumber" class="col-form-label">Cabinet Number</label>';
                echo '<input type="text" name="txtNumber" class="form-control" id="txtNumber" value="' . $result["CABINET_NUMBER"] . '">';
                echo '</div>';
            }
        }

        public function showNextCabinet()
        {
            $result = $this->getLastIdCabinet();
            echo '<input type="text" name="txtId" class="form-control" id="txtId" value=' . $result . ' readonly>';
        }
    }
?>