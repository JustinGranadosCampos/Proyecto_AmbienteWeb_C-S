<?php
    include './model/ItemsCabinet.inc.php';
    class ItemCabinetView extends ItemCabinet
    {
        public function getItemsCabinet()
        {
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="boxLabel">CABINET Number</th>';
            echo '<th id="boxLabel">CABINET LABEL</th>';
            echo '<th id="serialNumber">SERIAL NUMBER</th>';
            echo '<th id="iName">NAME</th>';
            echo '<th id="iAsset">ASSET</th>';
            echo '<th id="iModel">MODEL</th>';
            echo '<th id="iISMP_stat">ISMP STATUS</th>';
            echo '<th id="iDetail">DETAIL</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '<th>ACTIONS</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getItems();
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row["idCABINET"] . '</td>';
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td>' . $row["SERIAL_NUMBER"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                echo '<td>' . $row["ASSET"] . '</td>';
                echo '<td>' . $row["MODEL"] . '</td>';
                echo '<td>' . $row["ISMP_STATUS"] . '</td>';
                echo '<td>' . $row["DETAIL"] . '</td>';
                echo '<td><div class="text-center"><div class="btn-group"><a href="updateItemBox.php?id=' /*. $row["idITEM_BOX"]*/ . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }

        public function showCabinets()
        {
            $result = $this->getCabinets();
            foreach ($result as $row) {
                echo '<option value=' . $row["idCABINET"] . '>' . $row["CABINET_NUMBER"] . '</option>';
            }
        }
    }
?>