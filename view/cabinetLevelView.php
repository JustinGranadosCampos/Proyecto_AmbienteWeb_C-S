<?php
    include $_SERVER['DOCUMENT_ROOT'].'/model/Cabinet_Level.php';
    class CabinetLevelView extends CabinetLevel
    {
        public function showCabinetsLevels()
        {
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="idCabinet">CABINET</th>';
            echo '<th id="idCabinetLevel">ID CABINET LEVEL</th>';
            echo '<th id="levelNumber">LEVEL NUMBER</th>';
            echo '<th id="label">LABEL</th>';
            echo '<th id="idItemCabinet">ITEM</th>';
            echo '<th>ACTIONS</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getCabinetsLevels();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["CABINET_idCABINET"] . '</td>';
                echo '<td>' . $row["ID"] . '</td>';
                echo '<td>' . $row["LEVEL_NUMBER"] . '</td>';
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                // echo '<td><div class="text-center"><div class="btn-group"><a href="" class="btn bg-dark text-light btnEdit" id>Edit</a></div></div></td>';
                echo '<td><div class="text-center"><div class="btn-group"><button type="button" name="btnEditCabinetLevel" class="btn bg-dark text-light btnEdit" id="btnEditCabinetLevel">Edit</button></div></div></td>';
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

        public function showNextCabinetLevel()
        {
            $result = $this->getLastIdCabinetLevel();
            echo '<input type="text" name="txtIdNextCabinetLevel" class="form-control" id="txtIdNextCabinetLevel" value=' . $result . ' readonly>';
        }

        public function showItems()
        {
            $result = $this->getAllItems();
            foreach ($result as $row) {
                echo '<option value="' . $row['idITEM_CABINET'] . '">' . $row['NAME'] . ": " . $row['SERIAL_NUMBER'] . '</option>';
            }
        }
        
        public function showCabinets()
        {
            $result = $this->geAlltCabinets();
            foreach ($result as $row) {
                echo '<option value="' . $row['idCABINET'] . '">' . $row['CABINET_NUMBER'] . '</option>';
            }
        }
    }
