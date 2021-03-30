<?php
    class CabinetController extends Cabinet
    {
        public function addCabinet($id, $number)
        {
            $this->insertCabinet($id, $number);
        }

        public function updateCabinet($id, $number)
        {
            $this->updateCabinetData($id, $number);
        }

        public function deleteCabinet($id)
        {
            $this->deleteCabinetData($id);
        }
    }
?>