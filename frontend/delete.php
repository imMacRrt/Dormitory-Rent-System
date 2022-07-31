<?php
    include("config.php");

    $roomnumber = $_GET['id'];
    unset($_SESSION['loop_cart'][$roomnumber]);

    echo '<script type="text/javascript">';  
    echo 'window.location = "show_select_room.php";';
    echo '</script>';

?>