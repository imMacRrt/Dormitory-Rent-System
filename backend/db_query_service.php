<?php
include("config.php");
include("db_connect.php");
    
$servicename = $_POST['servicename'];
$serviceprice = $_POST['serviceprice'];
$serviceunit = $_POST['serviceunit'];
$servicecategory = $_POST['servicecategory'];
$servicestatus = $_POST['servicestatus'];

$hid_id = $_POST['hid_id'];

    if(isset($hid_id) && $hid_id > 0){//update
        $sql = "UPDATE servicelist SET servicename ='".$servicename."' , serviceprice ='".$serviceprice."' ,serviceunit ='".$serviceunit."',servicecategory ='".$servicecategory."'  
                        ,servicestatus ='".$servicestatus."' 
                WHERE serviceid='".$hid_id."'";
        $result = $conn->query($sql);
        
        if($result){
        echo '<script type="text/javascript">'; 
        echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว");'; 
        echo 'window.location = "show_servicelist.php";';
        echo 'display_loged_in();';
        echo '</script>';
        }


    }else{//insert
        
            
            $sql = "INSERT INTO servicelist (servicename,serviceprice,serviceunit,servicecategory,servicestatus)
                    VALUES('".$servicename."','".$serviceprice."','".$serviceunit."','".$servicecategory."','".$servicestatus."')";
            $result = $conn->query($sql);
        
        
    }      
    
    if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("เพิ่มข้อมูลรายการบริการ'.$servicename.'เรียบร้อยแล้ว");'; 
    echo 'window.location = "show_servicelist.php";';
    echo '</script>'; 
    }

?>