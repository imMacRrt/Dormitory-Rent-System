<?php
  include("config.php");
  include("db_connect.php");

  $id = $_GET['id'];

  if(isset($id) && $id>0){//delete

        $sql3 = "UPDATE bookinglist
                SET bookliststatus ='1' 
                WHERE bookid ='".$id."'AND bookliststatus = '0' ";

        $result3 = $conn->query($sql3);     
    
    if($result3){
      
      $sql4= "SELECT  a.* , b.* 
                  FROM    bookinglist  a
                  LEFT JOIN room b ON a.roomnumber = b.roomnumber
                  WHERE  a.roomnumber AND a.bookid = '".$id."' AND a.bookliststatus= 1";
                    
      $result4 = $conn->query($sql4);
      
      while($row4 = mysqli_fetch_array($result4)){

      $sql5 ="UPDATE room
                  SET roomstatus='0'
                  WHERE roomnumber = '".$row4['roomnumber']."' ";

      $result5 = $conn->query($sql5);
      }
    
    }if($result5){

        $sql2 = "UPDATE booking
                SET bookstatus ='3'
                WHERE bookid ='".$id."' ";
        $result2 = $conn->query($sql2);
  
      echo '<script type="text/javascript">'; 
      echo 'alert("ยกเลิกการจองเรียบร้อยแล้ว");'; 
      echo 'window.location = "show_booking.php";';
      echo '</script>';     
    }else{
      echo '<script type="text/javascript">'; 
      echo 'alert("ไม่สามารถยกเลิกได้ เนื่องจากการจองที่ '.$id.' ถูกเช่าครบแล้ว");'; 
      echo 'window.location = "show_booking.php";';
      echo '</script>';
    }

}
  
?>


            