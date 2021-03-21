<?php
    include './model/Box.inc.php';
    class ItemBoxController extends ItemBox
    {
        public function addBoxItem($box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            echo $box;
            // $box = $_POST['cboBoxNumber'];
            // $serialNumber = $_POST['txtSerialNumber'];
            // $name = $_POST['txtName'];
            // $asset = $_POST['txtAsset'];
            // $model = $_POST['txtModel'];
            // $ismp = $_POST['txtIsmpStatus'];
            // $details = $_POST['txtDetails'];
            $this->insertItemBox($box, $serialNumber, $name, $asset, $model, $ismp, $details);
            // $boxNumber = $_POST['data_1'];
            // $serialNumber = $_POST['data_2'];
            // $name = $_POST['data_3'];
            // $asset = $_POST['data_4'];
            // $model = $_POST['data_5'];
            // $ismp = $_POST['data_6'];
            // $details = $_POST['data_7'];
            // var_dump($boxNumber);
            // var_dump($serialNumber);
            // var_dump($name);
            // var_dump($asset);
            // var_dump($model);
            // var_dump($ismp);
            // var_dump($details);
        }
    }
?>
