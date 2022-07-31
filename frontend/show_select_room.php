<?php
  include("include.php");
  include("doctype_html.php");
  include("member_hder.php");
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<style>
table.paleBlueRows {
  font-family: Tahoma, sans-serif;
  border: 1px solid #FFFFFF;
  background-color: #EEEEEE;
  width: 1200px;
  height: 200px;
  /*text-align: center;*/
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #54AA94;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 16px;
  color: #515151;
  /*text-align: center;*/
}
table.paleBlueRows tr:nth-child(even) {
  background: #A5F5DE;
}
table.paleBlueRows thead {
  background: #3EC690;
  border-bottom: 3px solid #54AA94;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #000000;
  /*text-align: center;*/
}
table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  background: #3EC690;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
</style>

<script  type="text/javascript"> 
    $(document).ready(function(){
      
        $(".clearbt").click(function(){
          var ind = $('.clearbt').index(this);
          var id_val = $('.clearbt').eq(ind).attr('id');
          if(confirm("ยืนยันการล้างตะกร้า")){
            window.location.replace("clear.php?id="+id_val);
          }
        })
    });
  </script>

<h1>เลือก/ยกเลิกห้องพัก</h1>
<br>
<br>
<br>
<br>

  <table class="paleBlueRows" align="center">
  <thead>
  <tr style="font-weight: bolder; color: black; font-size:large;">
    
    <td>รูป</td>
    <td>หมายเลขห้อง</td>
    <td align="right">ราคา (บาท)</td>
    <td>รายละเอียดห้องพพัก</td>
    <td>ประเภท</td>
    <td>ยกเลิกห้องพัก</td>
  </tr>
    </thead>
      <tbody>
        <?php
        
          $roomnumber = $_GET['roomnumber'];
        if(isset($roomnumber) && $roomnumber > 0){
          $_SESSION['loop_cart'][$roomnumber]= $roomnumber;
        }
          if(count($_SESSION['loop_cart'])>0){
            
            foreach($_SESSION['loop_cart'] as $k=>$v){
               
              $sql = "SELECT * FROM room WHERE roomnumber = '".$v."' ";
              $result = mysqli_query($conn,$sql)  or die ("Error in query: $sql " . $conn->connect_error());
              $row = mysqli_fetch_array($result);
            
              ?>
              <tr>             
              <td width="150"><img src="../backend/upload/<?php echo $row['roomimage'];?>" width="150px"></td>
              <td><?php echo $row["roomnumber"];?></td>
              <td align="right"><?php echo number_format($row["roomprice"]);?></td>
              <td><?php echo $row["roomdetail"];?></td>
              <td><?php echo $roomcategory[$row["roomcategory"]];?></td>
              <td><a  id="delete" class="btn btn-danger waves-effect waves-light"   value="" href="delete.php?id=<?php echo $row["roomnumber"];?>">ลบ</td>
              </tr>
              <?php    
            }
          
          }else{?>
              <td colspan="6" align="center" style="font-weight:bolder; color:red;">ไม่มีข้อมูลห้องพัก</td>
              <?php
            }
      ?>
    </tbody>
  </table>
    <br>
    <br>

      <div class="btn">
        <a id="addrmbt" class="btn btn-primary waves-effect waves-light" type="button" value="" href="member_room-grid.php">เลือกเพิ่ม</a>   
        <?php   if(count($_SESSION['loop_cart'])==0){ }else{?>
        <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" href="save_booking.php">ยืนยัน</a>
        <a  id="<?php echo $_SESSION['loop_cart']; ?>" class="clearbt btn btn-warning waves-effect waves-light" type="button">ล้างตะกร้า</a>
        <?php
                                      }
        ?>
      </div>  


<?php
  include("footer.php");
?>

