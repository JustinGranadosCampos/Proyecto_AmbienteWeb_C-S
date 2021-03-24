<?php
    // include './model/Box.inc.php';
    class ItemBoxController extends ItemBox
    {
        public function addBoxItem($box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            $this->insertItemBox($box, $serialNumber, $name, $asset, $model, $ismp, $details);
        }

        public function updateItemBox($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            $this->updateItem($id, $box, $serialNumber, $name, $asset, $model, $ismp, $details);
        }

        public function deleteItemBox($id)
        {
            $this->deleteItem($id);
        }
    }
?>
