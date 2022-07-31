<?php
include("include.php");
 

$rentdatelease = $_POST['rentdatelease'];

$rentdatelease_cv = (date("Y", strtotime($rentdatelease))-543).date("-m-d", strtotime($rentdatelease));  

$rentamount = $_POST['rentamount'][$i];

$rentcost = $_POST['rentcost'];

$rentinsurance=$_POST['rentinsurance'];

$rentnumlease=$_POST['rentnumlease'];

$hid_id = $_POST['hid_id'];

if(isset($hid_id) && $hid_id > 0){

        $sql = "UPDATE rent 
                SET rentnumlease ='".$rentnumlease."',rentdatelease ='".$rentdatelease_cv."',rentamount='".$rentamount."'
                                ,rentcost='".$rentcost."',rentinsurance='".$rentinsurance."'
                WHERE rentid = '".$hid_id."' ";
                                
        $result = $conn->query($sql); 

}else{
        echo "Update Fail!";
} 

if($result){
echo '<script type="text/javascript">'; 
echo 'alert("บันทึกการปรับปรุงสัญญาเรียบร้อยแล้ว");'; 
echo 'window.location = "show_renting.php";';
echo '</script>';
}
    
?>



