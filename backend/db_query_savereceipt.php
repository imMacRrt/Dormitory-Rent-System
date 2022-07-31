<?php
include("include.php");
 
$invamount = $_POST['invamount'];
$invpayment = $_POST['invpayment'];
$invfines = $_POST['invfines'];
if($_POST['invcategory'] = '1'){
        $_POST['invcategory'] = 'โอนชำระ';
}else if($_POST['invcategory'] = '2'){
        $_POST['invcategory'] = 'ชำระเงินสด';
}
$invcategory = $_POST['invcategory'];
$invreceipt = $_POST['invreceipt'];
$invnote = $_POST['invnote'];
$serviceid = $_POST['serviceid'];
$hid_id = $_POST['hid_id'];

        if(isset($hid_id) && $hid_id > 0){

                $sql = "UPDATE invoice 
                        SET invamount ='".$invamount."',invpayment='".$invpayment."'
                                        ,invfines='".$invfines."',invstatus='1'
                                        ,invcategory='".$invcategory."',invreceipt='".$invreceipt."'
                                        ,invnote='".$invnote."',emid='".$_SESSION["sees_em_id"]."'
                        WHERE invid = '".$hid_id."' ";
                                       
                $result = $conn->query($sql);

                if($result){           
                                
                        $sql2 = "UPDATE costlist 
                                SET coststatus ='1'
                                WHERE invid = '".$hid_id."' ";
                                
                        $result2 = $conn->query($sql2);
                                
                }
        }else{
                echo "Update Fail!";
        }
      
                if($result2){
                        
                        echo '<script type="text/javascript">'; 
                        echo 'alert("บันทึกการรับชำระเรียบร้อยแล้ว");'; 
                        echo 'window.location = "show_invoice.php";';
                        echo '</script>';
                }
    
?>



