<?php
  include("config.php");
  include("db_connect.php");

  $id = $_GET['id'];

  if(isset($id) && $id>0){//delete

    $sql= "SELECT * 
          FROM invoice
          WHERE invid ='".$id."'";
                    
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    if($result){
    
    $sql2 = "UPDATE invoice
                 SET invstatus ='2'
                 WHERE invid ='".$id."' ";
    $result2 = $conn->query($sql2);
    }
    
        if($result){
        echo '<script type="text/javascript">'; 
        echo 'alert("ยกเลิกใบแจ้งหนี้เรียบร้อยแล้ว");'; 
        echo 'window.location = "show_invoice.php";';
        echo '</script>';     
        }

}
  
?>