<?php
    include("config.php");

    unset($_SESSION['loop_cart_service']);

    echo '<script type="text/javascript">'; 
    echo 'alert("ยกเลิกรายการบริการทั้งหมด");'; 
    echo 'window.location = "select_servicelist.php";';
    echo '</script>';
?>
