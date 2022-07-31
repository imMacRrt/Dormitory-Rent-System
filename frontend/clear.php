<?php
    include("config.php");

    unset($_SESSION['loop_cart']);

    echo '<script type="text/javascript">'; 
    echo 'alert("ยกเลิกรายการทั้งหมดแล้ว");'; 
    echo 'window.location = "show_select_room.php";';
    echo '</script>';

?>

