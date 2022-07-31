<?php
    include("config.php");

    $roomnumber = $_GET['id'];
    unset($_SESSION['admin_cart'][$roomnumber]);

    echo '<script type="text/javascript">';  
    echo 'window.location = "cart_room.php";';
    echo '</script>';
?>