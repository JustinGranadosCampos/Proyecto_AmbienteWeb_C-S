<?php
    include './model/Box.inc.php';
    class BoxView extends Box
    {
        public function showBoxes()
        {
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
                echo '<td><div class="text-center"><div class="btn-group"><a href="edit_box.php?id=' . $row["idBOX"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
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
