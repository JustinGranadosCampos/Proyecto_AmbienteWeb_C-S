<?php
    include '../model/Conexion.inc.php';
    class User extends Conexion
    {
        protected function login($wwid, $pass){
            $sql = "call ShowUserLogin($wwid, '$pass')";
            $result = $this->conectar()->query($sql);
            if ($result)
            {
                $row = $result->fetch();
                session_start();
                $_SESSION['Profile'] = $row['idROL'];
                $_SESSION['Desc_profile'] = $row['ROL_NAME'];
                $_SESSION['wwid'] = $row['WWID'];
                echo '<script>location.replace("../index.php");</script>';
            }
            else
            {
                echo "\nPDO::errorInfo():\n";
                echo $this->conectar()->errorInfo();
            }
        }
    }
?>