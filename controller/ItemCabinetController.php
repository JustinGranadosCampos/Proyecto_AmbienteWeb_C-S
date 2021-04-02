<?php
    class ItemCabinetController extends ItemCabinet{
        public function insertItemCabinet($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            $this->insertItem($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details);
        }

        public function updateItemCabinet($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            $this->updateItem($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details);
        }
    }
?>