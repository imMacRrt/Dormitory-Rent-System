<?php
    include("include.php");

    $roomnumber = $_GET['id'];
    unset($_SESSION['loop_cart'][$roomnumber]);

    echo '<script type="text/javascript">'; 
    echo 'alert("ยกเลิกห้องหมายเลข...?");'; 
    echo 'window.location = "save_renting.php";';
    echo '</script>';

?>