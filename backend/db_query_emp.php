<?php
include("config.php");
include("db_connect.php");


$emname = $_POST['emname'];
$emaddress = $_POST['emaddress'];
$emphone = $_POST['emphone'];
$emcard = $_POST['emcard'];
$emposition = $_POST['emposition'];
$emstatus = $_POST['emstatus'];
$ememail = $_POST['ememail'];
$emdegree = $_POST['emdegree'];
$emuser = $_POST['emuser'];
$empassword = $_POST['empassword'];
$hid_id = $_POST['hid_id'];
$hid_page = $_POST['hid_page'];

if(isset($hid_id) && $hid_id > 0 && $hid_page==2){//แก้ไขข้อมูลพนักงาน
   $sql = "UPDATE employee SET emname ='".$emname."' , emaddress ='".$emaddress."' ,emphone ='".$emphone."',emposition ='".$emposition."'  
    ,emstatus ='".$emstatus."',ememail ='".$ememail."',emdegree ='".$emdegree."' 
    WHERE emid='".$hid_id."'";
    $result = $conn->query($sql);
    
    if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("แก้ไขข้อมูลพนักงาน '.$emname.' เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_emp.php";';
    echo 'display_loged_in();';
    echo '</script>';
    }
    
}else if(isset($hid_id) && $hid_id > 0 && $hid_page==1){//แก้ไขข้อมูลผู้ใช้
    $sql2 = "UPDATE employee 
             SET emname ='".$emname."' , emaddress ='".$emaddress."',emphone ='".$emphone."' ,emcard ='".$emcard."',emposition ='".$emposition."'  
                ,emstatus ='".$emstatus."',ememail ='".$ememail."',empassword ='".$empassword."',emdegree ='".$emdegree."' 
            WHERE emid='".$hid_id."'";
    
    $result2 = $conn->query($sql2);
    
    if($result2){
        echo '<script type="text/javascript">'; 
        echo 'alert("แก้ไขข้อมูลผู้ใช้ '.$emname.' เรียบร้อยแล้ว");'; 
        echo 'window.location = "index.php";';
        echo 'display_loged_in();';
        echo '</script>';
    }

}else{//เพิ่มข้อมูลพนักงาน
    $sql3 = "INSERT INTO employee (emname,emaddress,emphone,emcard,emposition,emstatus,ememail,emuser,empassword,emdegree)
                VALUES('".$emname."','".$emaddress."','".$emphone."','".$emcard."','".$emposition."','".$emstatus."','".$ememail."','".$emcard."','".$emcard."','".$emdegree."')";
    $result3 = $conn->query($sql3);
    
    if($result3){
    echo '<script type="text/javascript">'; 
    echo 'alert("เพิ่มข้อมูลพนักงาน '.$emname.' เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_emp.php";';
    echo 'display_loged_in();';
    echo '</script>'; 
    }
}
?>