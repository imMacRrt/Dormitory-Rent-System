<?php
  include("config.php");
  include("db_connect.php");

  $id = $_GET['id'];

  if(isset($id) && $id>0){//delete
    
    $sql = "DELETE FROM customer WHERE cusid='".$id."' ";
    $result = $conn->query($sql);

    if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("ลบข้อมูลสมาชิกเรียบร้อยแล้ว");'; 
    echo 'window.location = "show_member.php";';
    echo '</script>';
    }else{
      echo '<script type="text/javascript">'; 
      echo 'alert("ไม่สามารถลบข้อมูลได้ เนื่องจากมีการใช้ข้อมูลอ้างอิงอยู่");'; 
      echo 'window.location = "show_member.php";';
      echo '</script>';
      }
  }
?>

