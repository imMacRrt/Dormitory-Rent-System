<?php
include("include.php");

$booklistid = $_POST['booklistid'];
 
$bookdate = $_POST['bookdate'];

$booklistdate = $_POST['booklistdate'];

$bookmoney = $_POST['bookmoney'];

$bookinform_date = $_POST['bookinform_date'];



    $sql = "INSERT INTO booking (bookdate,bookstatus,bookprice,bookcategory,bookevidence,bookinform_date,bookmoney,cusid)
            VALUES('".$bookdate."','0','0','','','0000-00-00','$bookmoney','".$_SESSION["sees_cus_id"]."')";
    $result = $conn->query($sql);

    if($result){
        $insert_id = $conn->insert_id;

        foreach($_SESSION['loop_cart'] as $k=>$v){

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
        unset($_SESSION['loop_cart']);
        echo '<script type="text/javascript">'; 
        echo 'alert("บันทึกการจองห้องพักเรียบร้อยแล้ว");'; 
        echo 'window.location = "show_booking.php";';
        echo '</script>';
        }
?>

