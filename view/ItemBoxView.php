<?php
    include $_SERVER['DOCUMENT_ROOT'].'/model/ItemsBox.inc.php';
    class ItemBoxView extends ItemBox
    {
        public function showButtonNew()
        {
            if ($_SESSION['Profile'] == 1) {
                echo '<button id="btnNewItemBox" type="button" class="btn btn-success btnNew">+ Add New</button>';
            } else {
                echo '<br>';
                echo '<br>';
            }
        }

        public function getItemsBox()
        {
            echo '<thead class="text-center">';
            echo '<tr>';
            echo '<th id="boxLabel">BOX LABEL</th>';
            echo '<th id="serialNumber">SERIAL NUMBER</th>';
            echo '<th id="iName">NAME</th>';
            echo '<th id="iAsset">ASSET</th>';
            echo '<th id="iModel">MODEL</th>';
            echo '<th id="iISMP_stat">ISMP STATUS</th>';
            echo '<th id="iDetail">DETAIL</th>';
            //Validate if $_SESSION['idRol'] == 1 to show actions
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
                echo '<td>' . $row["LABEL"] . '</td>';
                echo '<td>' . $row["SERIAL_NUMBER"] . '</td>';
                echo '<td>' . $row["NAME"] . '</td>';
                echo '<td>' . $row["ASSET"] . '</td>';
                echo '<td>' . $row["MODEL"] . '</td>';
                echo '<td>' . $row["ISMP_STATUS"] . '</td>';
                echo '<td>' . $row["DETAIL"] . '</td>';
                if ($_SESSION['Profile'] == 1) {
                    echo '<td><div class="text-center"><div class="btn-group"><a href="../includes/edit/updateItemBox.php?id=' . $row["idITEM_BOX"] . '" class="btn bg-dark text-light btnEdit">Edit</a></div></div></td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
        }

        public function getItemBox($id)
        {
            $result = $this->getItem($id);
            $boxesResult = $this->getBoxes();
            $joinResult = $this->getItem_x_Box($id);
            echo '<div class="form-group">';
            echo '<label for="itemLabel" class="col-form-label">Box Number</label>';
            echo '<select name="cboBoxNumber" id="cboBoxNumber" class="form-control" required>';
            if (!empty($boxesResult)) {
                foreach ($boxesResult as $row) {
                    $selected = "";
                    if ($row["idBOX"]==$joinResult[0]['idBOX']) {
                        $selected="selected";
                    }
                    echo '<option '.$selected.' value=' . $row["idBOX"] . '>' . $row["LABEL"] . '</option>';
                }
            }
            echo '</select>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtSerialNumber" class="col-form-label">Serial Number</label>';
            echo '<input type="text" name="txtSerialNumber" class="form-control" id="txtSerialNumber" value="' . $result["SERIAL_NUMBER"] . '" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtName" class="col-form-label">Name</label>';
            echo '<input type="text" name="txtName" class="form-control" id="txtName" value="' . $result["NAME"] . '" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtAsset" class="col-form-label">ASSET</label>';
            echo '<input type="text" name="txtAsset" class="form-control" id="txtAsset" onkeypress="return isNumber(event)" value="' . $result['ASSET'] . '" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtModel" class="col-form-label">MODEL</label>';
            echo '<input type="text" name="txtModel" class="form-control" id="txtModel" value="' . $result['MODEL'] . '" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtIsmpStatus" class="col-form-label">ISMP Status</label>';
            echo '<input type="text" name="txtIsmpStatus" class="form-control" id="txtIsmpStatus" value="' . $result['ISMP_STATUS'] . '" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="txtDetails" class="col-form-label">Details</label>';
            echo '<input type="text" name="txtDetails" class="form-control" id="txtDetails" value="' . $result['DETAIL'] . '">';
            echo '</div>';
            echo '</div>';
        }

        public function showBoxes()
        {
            $result = $this->getBoxes();
            foreach ($result as $row) {
                echo '<option value=' . $row["idBOX"] . '>' . $row["LABEL"] . '</option>';
            }
        }
    }
