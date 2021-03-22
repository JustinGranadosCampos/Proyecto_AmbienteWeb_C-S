<?php
    include './model/ItemsBox.inc.php';
    class ItemBoxView extends ItemBox
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
                echo '<td><div class="text-center"><div class="btn-group"><a href="updateItemBox.php?id=' . $row["idITEM_BOX"] . '" class="btn bg-dark text-light btnEdit">Edit</a><button class="btn btn-danger btnDelete">Delete</button></div></div></td>';
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
