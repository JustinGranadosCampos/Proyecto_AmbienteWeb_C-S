<?php
    include './model/Cabinet_Level.php';
    class CabinetLevelView extends CabinetLevel
    {
        public function showCabinetsLevels()
        {
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="idCabinetLevel">ID</th>';
            echo '<th id="levelNumber">LEVEL NUMBER</th>';
            echo '<th id="label">LABEL</th>';
            echo '<th id="idCabinet">CABINET</th>';
            echo '<th id="idItemCabinet">ITEM</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '<th>ACTIONS</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getCabinetsLevels();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["ID"] . '</td>';
                echo '<td>' . $row["LEVEL_NUMBER"] . '</td>';
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td>' . $row["CABINET_idCABINET"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><a href="" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }

        public function showBox($id)
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

        public function showNextBox()
        {
            $result = $this->getLastIdBox();
            echo '<input type="text" name="txtBoxNumber" class="form-control" id="txtBoxNumber" value=' . $result . ' readonly>';
        }
    }
