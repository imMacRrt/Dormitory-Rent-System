<?php
include("include.php");

$id = $_POST['bookid'];

$booklistid = $_POST['booklistid'][$i];
 
$rentdate = $_POST['rentdate'];
$rentdate_cv = (date("Y", strtotime($rentdate))-543).date("-m-d", strtotime($rentdate));

$rentdatelease = $_POST['rentdatelease'];
$rentdatelease_cv = (date("Y", strtotime($rentdatelease))-543).date("-m-d", strtotime($rentdatelease));

$cusid = $_POST['cusid'];

$emid = $_POST['emid'];

$checkbox = $_POST['check_select'];

if(isset($_POST["confirmbt"])){
    echo "Please select checkbox after click save!";
}else{

    for($i=0; $i<=$_SESSION["rent"]; $i++){
         
             
       $roomnumber = $_POST['roomnumber'][$i];
        
       $rentamount = $_POST['rentamount'][$i];
        
       $rentnumlease = $_POST['rentnumlease'][$i];
      
       $checkbox = $_POST['check_select'][$i];
      

        $sql2 = "";//ล้างค่าเป็นค่าว่าง
        $result2 = "";        
        
        $sql = "SELECT a.*
                FROM  bookinglist a
                WHERE a.booklistid = '".$checkbox."'";
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);

         $sql2 = "INSERT INTO rent (rentdate,rentnumlease,rentdatelease,rentdateout,rentinsurance
                            ,rentamount,rentstatus,rentcost,rentnote,rentdateinform
                            ,date_decide,type_move,cusid,emid,booklistid,roomnumber)

                    VALUES  ('".$rentdate_cv."','".$rentnumlease."','".$rentdatelease_cv."','00-00-0000','1500'
                        ,'".$rentamount."','1','2000','no','00-00-0000'
                        ,'00-00-0000','','".$cusid."','".$_SESSION["sees_em_id"]."'
                        ,'".$checkbox."','".$row['roomnumber']."')";
                        
        $result2 = $conn->query($sql2);

            if($result2){

                $sql3 = "UPDATE bookinglist 
                            SET bookliststatus='2' 
                            WHERE booklistid='".$checkbox."'";
                $result3 = $conn->query($sql3); 
                
                $sql4 = "UPDATE booking
                            SET bookstatus='2'
                            WHERE bookid='".$id."'";
                $result4 = $conn->query($sql4);

                $sql5 = "UPDATE room
                            SET roomstatus='2'
                            WHERE roomnumber ='".$row['roomnumber']."'";
                $result5 = $conn->query($sql5);
            }                   
        }    
    }
    if($result5){

        unset($_SESSION['rent']);
        echo '<script type="text/javascript">'; 
        echo 'alert("ยืนยันการเช่าเรียบร้อยแล้ว");'; 
        echo 'window.location ="show_renting.php";';
        echo '</script>';
    }
?>

