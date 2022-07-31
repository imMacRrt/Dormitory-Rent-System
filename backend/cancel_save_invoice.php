<?php
    include("config.php");

    unset($_SESSION['rent_invoice']);
    unset($_SESSION['loop_cart_service']);

    echo '<script type="text/javascript">'; 
    echo 'alert("ยกเลิกการบันทึกใบแจ้งหนี้เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_renting.php";';
    echo '</script>';

?>
