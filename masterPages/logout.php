<?php
    session_start();
    if ($_SESSION == null) {
        echo '<script>location.replace("../404.html");</script>';
    }
    else
    {
        session_destroy();
        echo '<script>location.replace("../admin/login.php");</script>';
    }
?>