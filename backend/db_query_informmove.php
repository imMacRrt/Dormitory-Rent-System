<?php
include("include.php");
 

$cusid = $_POST['cusid'];

$roomnumber = $_POST['roomnumber'][$i];

$emid = $_POST['emid'];

$type_move=$_POST['type_move'];

$rentdateinform = $_POST['rentdateinform'];

$date_decide = $_POST['date_decide'];

$hid_id = $_POST['hid_id'];

        if(isset($hid_id) && $hid_id > 0){

                $sql = "UPDATE rent 
                        SET type_move ='".$type_move."',rentdateinform='".$rentdateinform."'
                                        ,date_decide='".$date_decide."'
                        WHERE rentid = '".$hid_id."' ";
                                       
                $result = $conn->query($sql);

                if($result){

                        if(($type_move)=='1'){

                        $sql3 = "UPDATE rent
                                 SET  type_move ='ย้ายห้อง'
                                 WHERE rentid = '".$hid_id."'";
                        $result3 = $conn->query($sql3);
                
                        }if(($type_move)=='2'){

                        $sql4 = "UPDATE rent
                                 SET  type_move ='ย้ายออก'
                                 WHERE rentid = '".$hid_id."'";
                        $result4 = $conn->query($sql4);
                        }
                }
    
        }else{
                echo "Update Fail!";
        }
        
                if(($result3)||($result4)){
                        
                        echo '<script type="text/javascript">'; 
                        echo 'alert("บันทึกการแจ้งย้ายเรียบร้อยแล้ว");'; 
                        echo 'window.location = "show_renting.php";';
                        echo '</script>';
                }
?>



