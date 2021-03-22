<?php
    // include './model/Box.inc.php';
    class ItemBoxController extends ItemBox
    {
        public function addBoxItem($box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            // echo $box;
            // $box = $_POST['cboBoxNumber'];
            // $serialNumber = $_POST['txtSerialNumber'];
            // $name = $_POST['txtName'];
            // $asset = $_POST['txtAsset'];
            // $model = $_POST['txtModel'];
            // $ismp = $_POST['txtIsmpStatus'];
            // $details = $_POST['txtDetails'];
            $this->insertItemBox($box, $serialNumber, $name, $asset, $model, $ismp, $details);
        }

        public function updateBoxItem($box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {

        }
    }
?>
