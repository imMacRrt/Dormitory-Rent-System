<?php
include("config.php");
include("db_connect.php");



$roomnumber = $_POST['roomnumber'];       
$roomprice = $_POST['roomprice'];
$roomstatus = $_POST['roomstatus'];
$roomdetail = $_POST['roomdetail'];
$roomcategory = $_POST['roomcategory'];
$elec_unit = $_POST['elec_unit'];
    if($elec_unit==''){
        $elec_unit =0 ;
    }
$water_unit = $_POST['water_unit'];
    if($water_unit==''){
        $water_unit =0 ;
    }
$roomimage = $_POST['roomimage'];

$hid_id = $_POST['hid_id'];

if(isset($hid_id) && $hid_id > 0){//update

    $sql = "UPDATE room SET roomprice ='".$roomprice."' ,roomstatus ='".$roomstatus."',roomdetail ='".$roomdetail."'  
    ,roomcategory ='".$roomcategory."',elec_unit ='".$elec_unit."', water_unit = '".$water_unit."' WHERE roomnumber ='".$hid_id."'";
    $result = $conn->query($sql);
    
    if($result) {

                $target_dir = "upload/"; 
                $target_file = $target_dir . basename($_FILES["roomimage"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_new_name = $target_dir.$roomnumber.'.'.$imageFileType;
                $images_upload = $_FILES["roomimage"]["tmp_name"];

                    if (move_uploaded_file($images_upload, $image_new_name)) {
                    
                    $sql = "UPDATE room SET roomimage ='".$roomnumber.'.'.$imageFileType."' WHERE roomnumber ='".$roomnumber."'";
                    $result = $conn->query($sql);

            }
                echo '<script type="text/javascript">'; 
                echo 'alert("แก้ไขข้อมูลห้องพักหมายเลข '.$hid_id.' เรียบร้อยแล้ว");'; 
                echo 'window.location = "show_room.php";';
                echo '</script>';
                }
}
else{//insert
    
    $sql_inst_room = "INSERT INTO room (roomnumber,roomprice,roomstatus,roomdetail,roomcategory,elec_unit,water_unit)
    VALUES('".$roomnumber."','".$roomprice."','".$roomstatus."','".$roomdetail."','".$roomcategory."',".$elec_unit.",".$water_unit.")";

    $result = $conn->query($sql_inst_room);



    if($result) { 
        

            $target_dir = "upload/"; 
            $target_file = $target_dir . basename($_FILES["roomimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $image_new_name = $target_dir.$roomnumber.'.'.$imageFileType;
            $images_upload = $_FILES["roomimage"]["tmp_name"];

                if (move_uploaded_file($images_upload, $image_new_name)) {
                
                $sql = "UPDATE room SET roomimage ='".$roomnumber.'.'.$imageFileType."' WHERE roomnumber ='".$roomnumber."'";
                $result = $conn->query($sql);

                }

                    echo '<script type="text/javascript">'; 
                    echo 'alert("เพิ่มห้องพักหมายเลข '.$roomnumber.' เรียบร้อยแล้ว");'; 
                    echo 'window.location = "show_room.php";';
                    echo '</script>';
                }
}
?>