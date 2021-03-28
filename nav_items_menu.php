<?php
    $directory = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));
    $directories = array("users_management", "box_management","cabinet_management");
    foreach ($directories as $folder){
        $active[$folder] = ($directory[0] == $folder)? "active":"noactive";
    }

    session_start();
    $_SESSION['idRol'] = 1;
    if ($_SESSION['idRol'] == 1)
    {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./users_management.php">Users</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./box_management.php">Boxes</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./cabinet_management.php">Cabinets</a>';
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