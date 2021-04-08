<?php
    include '../model/Conexion.inc.php';
    class User extends Conexion
    {
        protected function login($wwid, $pass){
            $sql = "call ShowUserLogin($wwid, '$pass')";
            $result = $this->conectar()->query($sql);
            $validation = $result->fetchColumn() > 0;
            if ($validation > 0)
            {
                $result = $this->conectar()->query($sql);
                $row = $result->fetch();
                session_start();
                $_SESSION['Profile'] = $row['idROL'];
                $_SESSION['UserName'] = $row['FIRST_NAME'];
                $_SESSION['Desc_profile'] = $row['ROL_NAME'];
                $_SESSION['wwid'] = $row['WWID'];
                echo '<script>location.replace("../box_items.php");</script>';
            }
            else
            {
                // echo "\nPDO::errorInfo():\n";
                // echo $this->conectar()->errorInfo();
                echo '<script>location.replace("../admin/login.php");</script>';
            }
        }
    }
?>