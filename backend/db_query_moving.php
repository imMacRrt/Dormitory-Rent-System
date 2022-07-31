<?php
include("include.php");
 

$rentdateout = $_POST['rentdateout'];

$hid_id = $_POST['hid_id'];


if(isset($hid_id) && $hid_id > 0){

        
        $sqlA = "SELECT a.* ,b.*
                 FROM  rent a
                 LEFT JOIN invoice b ON a.rentid = b.rentid
                 WHERE a.rentid ='".$hid_id."' ";    
        $resultA = $conn->query($sqlA);
        $rowA = mysqli_fetch_array($resultA);

        if($rowA['invstatus'] == '0'){

                echo '<script type="text/javascript">'; 
                echo 'alert("ไม่สามารถย้ายได้ เนื่องจากเลขที่เช่า '.$hid_id.' ยังมีหนี้ค้างชำระ");'; 
                echo 'window.location = "show_renting.php";';
                echo '</script>';
        
                
        }else{
                
                $sql= "SELECT a.*, b.* 
                FROM rent a
                LEFT JOIN room b ON a.roomnumber = b. roomnumber
                WHERE rentid ='".$hid_id."'";
                
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);   
                
                if(($result) && $row['type_move'] == 'ย้ายห้อง'){
                        
                        $sql2 ="UPDATE rent 
                                SET rentdateout ='".$rentdateout."',rentstatus ='3'  
                                WHERE rentid = '".$hid_id."' ";               
                        $result2 = $conn->query($sql2);

                        if($result2){
        
                                $sql3 ="UPDATE  room 
                                        SET     roomstatus = '0'
                                WHERE   roomnumber =".$row['roomnumber']." ";
                        
                                $result3 = $conn->query($sql3);
                
                                }
        
                }elseif(($result) && $row['type_move'] == 'ย้ายออก'){
                        
                        $sql4 ="UPDATE rent 
                                SET rentdateout ='".$rentdateout."',rentstatus ='4'  
                                WHERE rentid = '".$hid_id."' ";               
                        $result4 = $conn->query($sql4);

                        if($result4){
        
                                $sql5 ="UPDATE  room 
                                        SET     roomstatus = '0'
                                WHERE   roomnumber =".$row['roomnumber']." ";
                        
                                $result5 = $conn->query($sql5);
                
                        }
                }
                if(($result3)||($result5)){
                        echo '<script type="text/javascript">'; 
                        echo 'alert("บันทึกการย้ายเรียบร้อยแล้ว");'; 
                        echo 'window.location = "show_renting.php";';
                        echo '</script>';
                }
        }
}else{
        echo 'Update Fail ! ';
    }        
    
?>



