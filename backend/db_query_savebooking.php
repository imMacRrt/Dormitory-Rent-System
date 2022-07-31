<?php
include("include.php");

$booklistid = $_POST['booklistid'];
 
$bookdate = $_POST['bookdate'];

$booklistdate = $_POST['booklistdate'];

$bookmoney = $_POST['bookmoney'];

$bookprice = $_POST['bookprice'];

$cusid = $_POST['cusid'];



        $sql =    "INSERT INTO booking (bookdate,bookstatus,bookprice,bookcategory,bookevidence,bookinform_date,bookmoney,cusid)
                    VALUES('".$bookdate."','2','".$bookprice."','เงินสด','','".$bookdate."','$bookmoney','$cusid')";
        $result = $conn->query($sql);

    if($result){
        
        $insert_id = $conn->insert_id;

        foreach($_SESSION['admin_cart'] as $k=>$v){

            $sql2 = "";//ล้างค่าเป็นค่าว่าง 
            $result2 = "";
            
                $sql2 = "INSERT INTO bookinglist (booklistdate,booklistmoney,bookliststatus,bookid,roomnumber)
                        VALUES('".$booklistdate."','1500','0','$insert_id','$k')";
                $result2 = $conn->query($sql2);

                if($result2){

                        $sql3 =    "UPDATE room 
                                        SET roomstatus ='1'   
                                        WHERE roomnumber ='".$k."'";
                        $result3 = $conn->query($sql3);
                   
                        }
        }
    }
           if($result2){
               unset($_SESSION['admin_cart']);
            echo '<script type="text/javascript">'; 
            echo 'alert("ยืนยันการจองห้องเรียบร้อยแล้ว");'; 
            echo 'window.location = "show_booking.php";';
            echo '</script>';
            }
?>

