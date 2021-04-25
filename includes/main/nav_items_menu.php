<?php
    $directory = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));
    $directories = array("users_management", "box_management","cabinet_management");
    foreach ($directories as $folder){
        $active[$folder] = ($directory[0] == $folder)? "active":"noactive";
    }

    $username = $_SESSION['UserName'];

    if ($_SESSION['Profile'] == 1)
    {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="../../masterPages/box_management.php">Boxes</a>';
        echo '</li>';

        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cabinets</a>';
        echo '<div class="dropdown-menu">';
        echo '<a class="dropdown-item" href="../../masterPages/cabinet_management.php">Cabinet Management</a>';
        echo '<a class="dropdown-item" href="../../masterPages/cabinet_level.php">Cabinet Level Management</a>';
        echo '</div>';
        echo '</li>';

        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>';
        echo '<div class="dropdown-menu">';
        echo '<a class="dropdown-item" href="#">'.$username.'</a>';
        echo '<a class="dropdown-item" href="../../masterPages/logout.php">Logout</a>';
        echo '</div>';
        echo '</li>';
    }
    else if($_SESSION['Profile'] == 2)
    {
        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>';
        echo '<div class="dropdown-menu">';
        echo ' <a class="dropdown-item" href="#">'.$username.'</a>';
        echo '<a class="dropdown-item" href="../../masterPages/logout.php">Logout</a>';
        echo '</div>';
        echo '</li>';
    }
    else
    {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="../../admin/login.php">Login</a>';
        echo '</li>';
    }
?>