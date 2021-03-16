<?php
    include './model/Box.inc.php';
    class BoxView extends Box
    {
        public function getItemsBox()
        {
            $result = $this->getItems();
            foreach ($result as $row) {
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
        }

        public function showBoxes()
        {
            $result = $this->getBoxes();
            foreach ($result as $row) {
                echo '<option value=' . $row["idBOX"] . '>' . $row["LABEL"] . '</option>';
            }
        }
    }
