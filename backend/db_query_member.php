<?php
include("config.php");
include("db_connect.php");



$cusname = $_POST['cusname'];       
$cusphone = $_POST['cusphone'];
$cusaddress = $_POST['cusaddress'];
$cusemail = $_POST['cusemail'];
$cusidcard = $_POST['cusidcard'];
$cusstatus = $_POST['cusstatus'];
$cusbirthday = $_POST['cusbirthday'];
$cusplace = $_POST['cusplace'];
$cuscateissue = $_POST['cuscateissue'];
$cusdateexpiry = $_POST['cusdateexpiry'];

$hid_id = $_POST['hid_id'];

if(isset($hid_id) && $hid_id > 0){//update
    
    $sql = "UPDATE customer SET cusname ='".$cusname."' , cusphone ='".$cusphone."' ,cusaddress ='".$cusaddress."'  
    ,cusplace ='".$cusplace."',cuscateissue ='".$cuscateissue."',cusdateexpiry ='".$cusdateexpiry."',cusstatus ='".$cusstatus."',cusbirthday ='".$cusbirthday."',cusemail ='".$cusemail."' WHERE cusid='".$hid_id."'";
    $result = $conn->query($sql);
    
    if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("แก้ไขข้อมูลสมาชิก '.$cusname.' เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_member.php";';
    echo 'display_loged_in();';
    echo '</script>';
    }


}else{//insert
    
    $sql_inst_mem = "INSERT INTO customer (cusname,cusphone,cusaddress,cusidcard,cusplace,cuscateissue,cusdateexpiry,cusstatus,cusbirthday,cusemail,log_username,log_password)
                    VALUES('".$cusname."','".$cusphone."','".$cusaddress."','".$cusidcard."','".$cusplace."','".$cuscateissue."','".$cusdateexpiry."','".$cusstatus."','".$cusbirthday."','".$cusemail."','".$cusidcard."','".$cusidcard."')";
    $result = $conn->query($sql_inst_mem);
    
    if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("เพิ่มข้อมูลสมาชิก '.$cusname.' เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_member.php";';
    echo '</script>'; 
    }
}
?>



