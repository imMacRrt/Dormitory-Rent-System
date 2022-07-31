<?php
include("include.php");


$bookevidence = $_POST['bookevidence'];
 
$bookcategory = $_POST['bookcategory'];

$bookinform_date = $_POST['bookinform_date'];

$hid_id = $_POST['hid_id'];


if(isset($hid_id) >0 ){
        
        $sql = "UPDATE booking 
                SET bookcategory ='".$bookcategory."' 
                , bookinform_date ='".$bookinform_date."'  
                WHERE bookid ='".$hid_id."' ";
        
        $result = $conn->query($sql);

        if($result) {

            $target_dir = "../backend/upload/evidence/"; 
            $target_file = $target_dir . basename($_FILES["bookevidence"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $image_new_name = $target_dir.$hid_id.'.'.$imageFileType;
            $images_upload = $_FILES["bookevidence"]["tmp_name"];

                if(move_uploaded_file($images_upload, $image_new_name)) {
                        
                        $sql2 = "UPDATE booking 
                                    SET bookstatus ='1' , bookevidence ='".$hid_id.'.'.$imageFileType."'  
                                    WHERE bookid ='".$hid_id."'";
                        $result2 = $conn->query($sql2);
                }
                    echo '<script type="text/javascript">'; 
                    echo 'alert("แจ้งหลักฐานรหัสการจองที่ '.$hid_id.' เรียบร้อยแล้ว");'; 
                    echo 'window.location = "member_index.php";';
                    echo 'display_loged_in();';
                    echo '</script>';
                    }
        }
?>

