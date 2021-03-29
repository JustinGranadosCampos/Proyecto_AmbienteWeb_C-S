<?php
    include '../model/User.inc.php';
    class UserView extends User
    {
        public function loginUser($wwid, $pass)
        {
            $this->login($wwid, $pass);
        }
    }
?>