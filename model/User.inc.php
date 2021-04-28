<?php
    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }
    include '../model/Conexion.inc.php';
    class User extends Conexion
    {
        protected function login($wwid, $pass)
        {
            try {
                $sql = "call ShowUserLogin($wwid, '$pass')";
                $result = $this->conectar()->query($sql);
                $validation = $result->fetchColumn() > 0;
                if ($validation > 0) {
                    $result = $this->conectar()->query($sql);
                    $row = $result->fetch();
                    session_start();
                    $_SESSION['Profile'] = $row['idROL'];
                    $_SESSION['UserName'] = $row['FIRST_NAME'];
                    $_SESSION['Desc_profile'] = $row['ROL_NAME'];
                    $_SESSION['wwid'] = $row['WWID'];
                    echo '<script>location.replace("../masterPages/box_items.php");</script>';
                } else {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                    swal({
                        "title":"Error!",
                        "text":"The WWID or password are incorrect!",
                        "icon":"error"
                    }).then(function(){ 
                            location.replace("../admin/login.php");
                        });
                    }, 500);
                    </script>';
                }
            } catch (EXCEPTION $e) {
                $this->reportError($wwid, $_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            } catch (PDOEXCEPTION $e) {
                $this->reportError($_SESSION['wwid'], $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }
    }
