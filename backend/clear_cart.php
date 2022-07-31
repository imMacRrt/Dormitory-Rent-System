<?php
    include("config.php");

    unset($_SESSION['admin_cart']);

    echo '<script type="text/javascript">'; 
    echo 'alert("ล้างตะกร้าเรียบร้อยแล้ว");'; 
    echo 'window.location = "select_room.php";';
    echo '</script>';

?>
