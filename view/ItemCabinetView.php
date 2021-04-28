<?php
    include $_SERVER['DOCUMENT_ROOT'].'/model/ItemsCabinet.inc.php';
    class ItemCabinetView extends ItemCabinet
    {
        public function showButtonNew()
        {
            if ($_SESSION['Profile'] == 1) {
                echo '<button id="btnNewItemCabinet" type="button" class="btn btn-success btnNew">+ Add New</button>';
            } else {
                echo '<br>';
                echo '<br>';
            }
        }

        public function getItemsCabinet()
        {
            echo '<thead class="text-center">';
            echo '<tr>';
            // echo '<th id="boxLabel">CABINET Number</th>';
            echo '<th id="idCabinet">ID</th>';
            echo '<th id="serialNumber">SERIAL NUMBER</th>';
            echo '<th id="iName">NAME</th>';
            echo '<th id="iAsset">ASSET</th>';
            echo '<th id="iModel">MODEL</th>';
            echo '<th id="iISMP_stat">ISMP STATUS</th>';
            echo '<th id="iDetail">DETAIL</th>';
            if ($_SESSION['Profile'] == 1) {
                echo '<th>ACTIONS</th>';
            }
            //Validate if $_SESSION['idRol'] == 1 to show actions
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $result = $this->getItems();
            foreach ($result as $row) {
                echo '<tr>';
                // echo '<td>' . $row["idCABINET"] . '</td>';
                echo '<td>' . $row["idITEM_CABINET"] . '</td>';
                echo '<td>' . $row["SERIAL_NUMBER"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                echo '<td>' . $row["ASSET"] . '</td>';
                echo '<td>' . $row["MODEL"] . '</td>';
                echo '<td>' . $row["ISMP_STATUS"] . '</td>';
                echo '<td>' . $row["DETAIL"] . '</td>';
                if ($_SESSION['Profile'] == 1) {
                    echo '<td><div class="text-center"><div class="btn-group"><button type="button" name="btnEditItemCabinet" class="btn bg-dark text-light btnEdit" id="btnEditItemCabinet">Edit</button></div></div></td>';
                }
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

        public function getItemCabinet($id)
        {
            $result = $this->getItem($id);
            $cabinetsResult = $this->getFullItem($id);
            // $joinResult = $this->getItem_x_Box($id);
            echo '<div class="form-group">';
            echo '<label for="itemLabel" class="col-form-label">Cabinet Number</label>';
            echo '<select name="cboCabinetNumber" id="cboCabinetNumber" class="form-control" data-live-search="true" title="Select Cabinet Number">';
            echo '<option value=' . $cabinetsResult["idCABINET"] . '>' . $cabinetsResult["CABINET_NUMBER"] . '</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtCabinetLabel" class="col-form-label">Cabinet Label</label>';
            echo '<select name="cboCabinetLabel" id="cboCabinetLabel" class="form-control" data-live-search="true" title="Select Cabinet Level Number">';
            echo '</select>';
            echo '</div>';
            //fill the inputs
            echo '<div class="form-group">';
            echo '<label for="txtSerialNumber" class="col-form-label">Serial Number</label>';
            echo '<input type="text" name="txtSerialNumber" class="form-control" id="txtSerialNumber" value="' . $cabinetsResult["SERIAL_NUMBER"] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtName" class="col-form-label">Name</label>';
            echo '<input type="text" name="txtName" class="form-control" id="txtName" value="' . $cabinetsResult["NAME"] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtAsset" class="col-form-label">ASSET</label>';
            echo '<input type="number" name="txtAsset" class="form-control" id="txtAsset" onkeypress="return isNumber(event)" value="' . $cabinetsResult['ASSET'] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtModel" class="col-form-label">MODEL</label>';
            echo '<input type="text" name="txtModel" class="form-control" id="txtModel" value="' . $cabinetsResult['MODEL'] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtIsmpStatus" class="col-form-label">ISMP Status</label>';
            echo '<input type="text" name="txtIsmpStatus" class="form-control" id="txtIsmpStatus" value="' . $cabinetsResult['ISMP_STATUS'] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtDetails" class="col-form-label">Details</label>';
            echo '<input type="text" name="txtDetails" class="form-control" id="txtDetails" value="' . $cabinetsResult['DETAIL'] . '">';
            echo '</div>';
            echo '</div>';
        }

        public function showCabinetsLevels()
        {
            $result = $this->getCabinetsLevels();
            foreach ($result as $row) {
                echo '<option value=' . $row["LEVEL_NUMBER"] . '>' . $row["LABEL"] . '</option>';
            }
        }

        public function showNextItemCabinet()
        {
            $result = $this->getLastIdItemCabinet();
            echo '<input type="text" class="form-control" id="idItemCabinet" name="idItemCabinet" value=' . $result . ' readonly>';
        }
    }
