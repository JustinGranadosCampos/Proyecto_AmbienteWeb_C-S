<?php
    session_start();
    $_SESSION['idRol'] = 2;
    if ($_SESSION['idRol'] == 1)
    {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Users</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Boxes</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Cabinets</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Logout</a>';
        echo '</li>';
    }
    else
    {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./admin/login.html">Login</a>';
        echo '</li>';
    }
?>