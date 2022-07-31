<?php
  include("include.php");
  include("doctype_html.php");
  include("member_hder.php");
  date_default_timezone_set('Asia/Bangkok');
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
  font-family: "Times New Roman", Times, serif;
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
  font-size: 13px;
  color: #515151;
}
table.paleBlueRows tr:nth-child(even) {
  background: #A5F5DE;
}
table.paleBlueRows thead {
  background: #3EC690;
  border-bottom: 3px solid #54AA94;
}
table.paleBlueRows thead th {
  font-size: 20px;
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
  font-size: 20px;
}
</style>

<?php
  $id = $_GET['id']; 

  $sees_cus_id = $_SESSION['sees_cus_id'];

//query ข้อมูลจากตาราง
$sql = "SELECT a.*,b.*
        FROM  (booking a LEFT JOIN customer b
        ON b.cusid=a.cusid)
        WHERE a.bookid = '".$id."'";

$result =  $conn->query($sql);
$row = mysqli_fetch_array($result);
?>


<h1>แจ้งหลักฐานการชำระ</h1>
<br>
<br>
<br>
<form id="form_savebooking" method="post" action="db_savebooking.php">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>รหัสการจอง</h6></label>      
        <input id="bookid" name="bookid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?php echo $id; ?>" readonly/>
        <label class="col-sm-1 col-form-label" align="right"><h6>สถานะ</h6></label>      
        <h6 id="bookstatus" name="bookstatus"type="text" style="font-weight:bold"> &nbsp <?php echo $bookstatus[$row['bookstatus']] ;?></h6>       
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>รหัสลูกค้า</h6></label>      
        <input id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?php echo $sees_cus_id; ?>" readonly/>
        <label class="col-sm-1 col-form-label" align="right"><h6>ชื่อลูกค้า</h6></label>      
        <input id="cusphone" name="cusphone"type="text" class="col-sm-2 col-form-label" maxlength="50" value="<?=$row['cusname'];?>" readonly/>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>อีเมล</h6></label>
        <input id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label" maxlength="50" value="<?=$row['cusemail'];?>" readonly/>
        <label class="col-sm-1 col-form-label" align="right"><h6>เบอร์โทรศัพท์</h6></label>   
        <input id="cusphone" name="cusphone"type="text" class="col-sm-2 col-form-label" maxlength="10" value="<?=$row['cusphone'];?>" readonly />   
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>วันที่จอง</h6></label>
        
        <input id="bookdate" name="bookdate" class="col-sm-2 col-form-label" value="<?php $ThisYear = date('d-m-',strtotime($row['rentdateinform']. " + 0 day")).(date('Y',strtotime($row['rentdateinform']. " + 0 day"))+543);
                            echo $ThisYear; ?>" readonly >
    </div>
</form>    
<br>
<br>
<?php
       $sql2 = "SELECT a.*,b.*
                FROM  (bookinglist a LEFT JOIN room b
                ON b.roomnumber=a.roomnumber)
                WHERE a.bookid = '".$id."'";
  $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql " . $conn->connect_error());

?>

<h4>รายละเอียดการจอง</h4>
<br>
  <table class="paleBlueRows" align="center">
    <thead>
        <tr style="font-weight: bolder; color: black; font-size:large;">
            <td>วันกำหนดเข้าพัก</td>
            <td>รูป</td>
            <td>หมายเลขห้อง</td>
            <td>รายละเอียดห้องพัก</td>
            <td align="right">ราคา (บาท)</td>
            <td align="right">เงินมัดจำ(บาท)</td>
        </tr>
    </thead>
    <tbody>
      <?php   

         while($row2 = mysqli_fetch_array($result2))
          {
            ?>
            <tr>
            <td><?php $ThisYear = date('d-m-',strtotime($row2['booklistdate']. " + 0 day")).(date('Y',strtotime($row2['booklistdate']. " + 0 day"))+543);
                      echo $ThisYear;?></td>           
            <td width="150"><img src="../backend/upload/<?php echo $row2['roomimage'];?>" width="150px"></td>
            <td><?php echo $row2["roomnumber"];?></td>
            <td><?php echo $row2["roomdetail"];?></td>
            <td align="right"><?php echo number_format($row2["roomprice"]);
                           $total1 +=$row2["roomprice"];?></td>
            <td align="right"><?php echo number_format("1500");
                           $total2 += 1500; ?></td>
            </tr>
            <?php         
          }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" > </td>
            <td align="right"> รวม(บาท) </td>
            <td align="right"> <?php echo number_format($total1); ?> </td>
            <td align="right"> <?php echo number_format($total2); ?> </td>    
        </tr>
    </tfoot>
  </table>
    <br>
    <br>
    
</form>
  
  <form id="form_evidence" method="POST" action="db_informevidence.php" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" align="right" style="font-size:medium"><span>วันที่แจ้งหลักฐาน:</span></label>
        <div class="col-sm-6 col-form-label" align="left">
          <input id="bookinform_date" name="bookinform_date" class="form-control-sm-3"  value="<?php $ThisYear = date('d-m-').(date('Y'. " + 0 day")+543);
                            echo $ThisYear; ?>" readonly >
        </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" align="right" style="font-size:medium"><span>ประเภทการชำระ:</span></label>
          <div class="col-sm-6 col-form-label" align="left">
            <input id="bookcategory" name="bookcategory" class="col-sm-2 col-form-label" type="text" value="โอนชำระ" readonly />
          </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" align="right" style="font-size:medium"><span>แจ้งหลักฐาน *:</span></label>
        <div class="col-sm-6 col-form-label" align="left">
          <input id="bookevidence" name="bookevidence" type="file" class="form-control-sm-3" value="<?php echo $row['bookevidence'];?>" >
        </div>
    </div>


    <div class="btn">
        <input type="hidden" name="hid_id" value="<?php echo $id;?>" >
        <input  id="confirmbt" class="confirmbt btn btn-success waves-effect waves-light" type="button" value="บันทึก"></input>
        <input  id="resetbt" class="btn btn-primary waves-effect waves-light" type="button" value="ล้างค่า" ></input>   
        <input  id="cancelbt" class="btn btn-warning waves-effect waves-light" type="button" value="ยกเลิก"></input>
      </div>
      <br>
      <br>
      <div>
        <label class="col-sm-12">
            <h6>หมายเหตุ : <span style="font-weight: 100;">หลังจากลูกค้าชำระค่าจองห้องพักแล้ว หากต้องการสอบถามรายละเอียดเพิ่มเติมสามารถติดต่อสอบถามเจ้าหน้าที่ได้ทันที<br><br>
                                                                                       โทร:094-202-9180 Email:<a target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZcRZnswrvxRdrBLLXmZVvGfzlMSstfFglvBkGHVkpSgvgmgKKHgvRwSwVJHxQldQsRKtL">peepachara40@gmail.com</a></span></h6>
        </label>
    </div>
      <script  type="text/javascript"> 
          $("#resetbt").click(function(){
              $('#form_evidence')[0].reset();
          });

          $("#cancelbt").click(function(){
              window.location.replace("member_index.php")
          });
          
          $(document).ready(function(){
          
            $("#confirmbt").click(function(){ 

              var bookevidence = $("#bookevidence");
              var bookevidence_trim = $.trim(bookevidence.val());
              
              if(bookevidence_trim == ""){
              alert('กรุณาแจ้งหลักฐาน');
              bookevidence.focus();
              return false;
              
              }else{
          
                if(confirm("ยืนยันการแจ้งหลักฐาน")){
                  $('form').submit();
                  }   
              }
            });    
          });
      </script>
  </form>    


<?php
  include("footer.php");
?>

