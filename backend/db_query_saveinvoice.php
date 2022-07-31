<?php
include("include.php");

// Invoice Table 
$invdate = $_POST['invdate'];
$invdate_cv = (date("Y", strtotime($invdate))-543).date("-m-d", strtotime($invdate));

$invdatepayment = $_POST['invdatepayment'];
$invdatepayment_cv = (date("Y", strtotime($invdatepayment))-543).date("-m-d", strtotime($invdatepayment));

$rentnumleast = $_POST['rentnumlease'];

if($_POST['invoutstand']=''){
    $_POST['invoutstand'] = 0;
}
$invoutstand = $_POST['invoutstand'];

$invprice = $_POST['invprice'];

if($invprice > 0){

    $sees_rent_inv = $_SESSION['rent_invoice'];
    $que = "SELECT * 
            FROM rent   
            WHERE rentid = '".$_SESSION['rent_invoice']."' ";
                
    $resultque = $conn->query($que);
    $row = mysqli_fetch_array($resultque);
    
    echo "<br>";

    $sql ="INSERT INTO invoice (invprice,invamount,invdate,invpayment,invdatepayment
                                    ,invfines,invstatus,invoutstand,invcategory,invreceipt,invnote,emid,cusid,rentid)
                    
                VALUES('".$invprice."','0','".$invdate_cv."','0000-00-00','".$invdatepayment."'
                            ,'0','0','".$invoutstand."','','','','".$_SESSION["sees_em_id"]."','".$row['cusid']."','".$_SESSION['rent_invoice']."')";
    
    $result = $conn->query($sql);
    echo "<br>";

    
    if($result){
       
        $insert_id = $conn->insert_id;

        for($i=0; $i<=$_SESSION["invoice"]; $i++){
            echo '<br>';
             $serviceid = $_POST['serviceid'][$i];  
             $servicename = $_POST['servicename'][$i]; 
             $unitstart = $_POST['unitstart'][$i]; 
             $unitend = $_POST['unitend'][$i]; 
             $amount = $_POST['amount'][$i]; 
             $price = $_POST['price'][$i]; 

            if($servicename == "ค่าน้ำ"){
                echo '<br>';
                echo $sql2 = "INSERT INTO costlist (costprice,costamount,coststatus,coststartunit
                                    ,costendunit,invid,serviceid)
                        VALUES('".$price."','".$amount."','0','".$unitstart."','".$unitend."','$insert_id','$serviceid')";
                $result2 = $conn->query($sql2);
                echo '<br>';
                if($result2){

                    echo $sql3 = "UPDATE room
                            SET  water_unit = '".$unitend."'
                            WHERE roomnumber = '".$row['roomnumber']."'";
                
                    $result3 = $conn->query($sql3);
                    echo "<br>";
                
                }    
            
            }elseif($servicename == "ค่าไฟ"){
                echo '<br>';
                echo $sql4 = "INSERT INTO costlist (costprice,costamount,coststatus,coststartunit
                                    ,costendunit,invid,serviceid)
                        VALUES('".$price."','".$amount."','0','".$unitstart."','".$unitend."','$insert_id','$serviceid')";
                $result4 = $conn->query($sql4);
                echo '<br>'; 
                if($result4){

                    $sql5 = "UPDATE room
                             SET  elec_unit = '".$unitend."'
                             WHERE roomnumber = '".$row['roomnumber']."'";
                 
                    $result5 = $conn->query($sql5);
                     echo "<br>";
                 
                 }       
            }else{
                echo '<br>';
                echo $sql6 = "INSERT INTO costlist (costprice,costamount,coststatus,coststartunit
                                    ,costendunit,invid,serviceid)
                        VALUES('".$price."','".$amount."','0','".$unitstart."','".$unitend."','$insert_id','$serviceid')";
                $result6 = $conn->query($sql6);
                echo '<br>';
            }

        }
                
    }if($result3 && $result5 ){
        unset($_SESSION['rent_invoice']);
        unset($_SESSION['loop_cart_service']);
        echo '<script type="text/javascript">'; 
        echo 'alert("บันทึกใบแจ้งหนี้เรียบร้อยแล้ว");'; 
        echo 'window.location = "show_invoice.php";';
        echo '</script>';                 
    }
}else{

        echo '<script type="text/javascript">'; 
        echo 'alert("กรุณากรอกยูนิตสิ้นสุดให้ครบทุกรายการ");'; 
        echo 'window.location = "save_invoice.php";';
        echo '</script>'; 
}
           
?>

