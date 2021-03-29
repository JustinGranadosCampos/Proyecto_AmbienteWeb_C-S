<?php
    // include './model/Box.inc.php';
    class BoxController extends Box
    {
        public function addBox($id, $label)
        {
            $this->insertBox($id, $label);
        }

        public function updateBox($id, $label)
        {
            $this->updateBoxData($id, $label);
        }

        public function deleteBox($id)
        {
            $this->deleteBoxData($id);
        }
    }
?>
