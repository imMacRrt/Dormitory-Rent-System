<?php
include("include.php");

$cusid = $_POST['cusid'];
$cusname = $_POST['cusname'];       
$cusphone = $_POST['cusphone'];
$cusaddress = $_POST['cusaddress'];
$cusidcard = $_POST['cusidcard'];
$cusbirthday = $_POST['cusbirthday'];
$cusemail = $_POST['cusemail'];
$cusplace = $_POST['cusplace'];
$cuscateissue = $_POST['cuscateissue'];
$cusdateexpiry = $_POST['cusdateexpiry'];
$log_password = $_POST['log_password'];

    $sql = "UPDATE customer 
            SET cusname ='".$cusname."' , cusphone ='".$cusphone."' ,cusaddress ='".$cusaddress."'  
                ,cusbirthday ='".$cusbirthday."',cusemail ='".$cusemail."',cusplace ='".$cusplace."',cuscateissue ='".$cuscateissue."'
                ,cusdateexpiry ='".$cusdateexpiry."' ,log_password ='".$log_password."' 
            WHERE cusid = '".$cusid."' ";
    
    $result = $conn->query($sql);

if($result){
    
    echo '<script type="text/javascript">'; 
    echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว");'; 
    echo 'window.location = "member_index.php";';
    echo 'display_loged_in();';
    echo '</script>';
}
?>
