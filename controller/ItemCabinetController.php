<?php
    class ItemCabinetController extends ItemCabinet{
        // public function insertItemCabinet($serialNumber, $name, $asset, $model, $ismp, $details)
        // {
        //     $this->insertItem($serialNumber, $name, $asset, $model, $ismp, $details);
        // }

        public function updateItemCabinet($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details)
        {
            $this->updateItem($cabinetNumber, $cabinetLevel, $cabinetLabel, $serialNumber, $name, $asset, $model, $ismp, $details);
        }

        public function getCabinetLevelLabel($id, $levelNum){
            return $this->getLabel($id, $levelNum);
        }
    }
?>