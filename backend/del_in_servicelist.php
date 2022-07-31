<?php
    include("include.php");

    $serviceid = $_GET['serviceid'];
    unset($_SESSION['loop_cart_service'][$serviceid]);

    echo '<script type="text/javascript">'; 
    echo 'alert("ยกเลิกรายการบริการ");'; 
    echo 'window.location = "cart_servicelist.php";';
    echo '</script>';

?>