<?php
include("include.php");

$cusid = $_POST['cusid'];
$cusname = $_POST['cusname'];       
$cusphone = $_POST['cusphone'];
$cusaddress = $_POST['cusaddress'];
$cusidcard = $_POST['cusidcard'];
$cusstatus = $_POST['cusstatus'];
$cusbirthday = $_POST['cusbirthday'];
if($cusbirthday==''){
    
    $cusbirthday ='0000-00-00';
}
$cusemail = $_POST['cusemail'];
$cusplace = $_POST['cusplace'];
$cuscateissue = $_POST['cuscateissue'];
if($cuscateissue==''){
    
    $cuscateissue ='0000-00-00';
}
$cusdateexpiry = $_POST['cusdateexpiry'];
if($cusdateexpiry ==''){
    
    $cusdateexpiry ='0000-00-00';
}
$log_username = $_POST['log_username'];
$log_password = $_POST['log_password'];


    $sql = "INSERT INTO customer (cusname,cusphone,cusaddress,cusidcard,cusstatus,cusbirthday,cusemail,cusplace,cuscateissue,cusdateexpiry,log_username,log_password)
            VALUES('".$cusname."','".$cusphone."','".$cusaddress."','".$cusidcard."','0','".$cusbirthday."','".$cusemail."','".$cusplace."','".$cuscateissue."','".$cusdateexpiry."','".$log_username."','".$log_password."')";
    $result = $conn->query($sql);

if($result){
echo '<script type="text/javascript">'; 
echo 'alert("สมัครสมาชิกเรียบร้อยแล้ว");'; 
echo 'window.location = "login.php";';
echo '</script>';
}
?>
