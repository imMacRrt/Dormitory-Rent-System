<?php
  include("include.php");
  include("doctype_html.php");
  include("member_hder.php");
  date_default_timezone_set('Asia/Bangkok');
?>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
			$("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});  

     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
</script>
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

<!--***รับค่าไอดีที่จะแก้ไข***-->
<?php
$sees_cus_id = $_SESSION['sees_cus_id'];

//query ข้อมูลจากตาราง
$sql = "SELECT * FROM customer WHERE cusid = '".$sees_cus_id."'";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . $conn->connect_error());
$row = mysqli_fetch_array($result);

?>



<h1>บันทึกการจอง</h1>
<br>
<br>
<br>
<form id="form_savebooking" method="post" action="db_savebooking.php">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>รหัสลูกค้า</h6></label>
        <!--div class="col-sm-6"-->
        <input id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?php echo $sees_cus_id; ?>" readonly/>
        <!--/!--div-->
        <label class="col-sm-1 col-form-label" align="right"><h6>ชื่อลูกค้า</h6></label>
        
        <input id="cusphone" name="cusphone"type="text" class="col-sm-2 col-form-label" maxlength="50" value="<?=$row['cusname'];?>" readonly/>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>อีเมล</h6></label>
        <!--div class="col-sm-6"-->
        <input id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label" maxlength="50" value="<?=$row['cusemail'];?>" readonly/>
        <!--/!--div-->
        <label class="col-sm-1 col-form-label" align="right"><h6>เบอร์โทรศัพท์</h6></label>
        
        <input id="cusphone" name="cusphone"type="text" class="col-sm-2 col-form-label" maxlength="10" value="<?=$row['cusphone'];?>" readonly />
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" align="right"><h6>วันที่จอง</h6></label>
        <!--div class="col-sm-6"-->
        <input id="bookdateB" name="bookdateB"  class="col-sm-2 col-form-label" value="<?php echo date('d-m-',strtotime($row['bookdate']. " + 0 day")).(date('Y',strtotime($row['bookdate']. " + 0 day"))+543); ?>" readonly>
        <input id="bookdate" name="bookdate"  class="col-sm-2 col-form-label" type="hidden"
              value="<?php echo date('Y-m-d'); ?>" readonly >

        <!--/!--div-->
        <label class ="col-sm-1 col-form-label" align="right"><h6>วันกำหนดเข้าพัก</h6></label>
        
        <input id="booklistdate" name="booklistdate"type="date" class="col-sm-2 col-form-label" min="<?php echo date('Y-m-d');?>"  >
        
    </div>

<br>
<br>


  <table class="paleBlueRows" align="center">
    <thead>
        <tr style="font-weight: bolder; color: black; font-size:large;"> 
            <td>รูป</td>
            <td>หมายเลขห้อง</td>
            <td>รายละเอียดห้องพัก</td>
            <td align="right">ราคา (บาท)</td>
            <td align="right">เงินมัดจำ (บาท)</td>
        </tr>
    </thead>
    <tbody>
      <?php

          foreach($_SESSION['loop_cart'] as $k=>$v)
          {
          
            $sql = "SELECT * FROM room WHERE roomnumber = '".$v."' ";
            $result = mysqli_query($conn,$sql)  or die ("Error in query: $sql " . $conn->connect_error());
            $row = mysqli_fetch_array($result);
            
            ?>
            <tr>           
            <td width="150"><img src="../backend/upload/<?php echo $row['roomimage'];?>" width="150px"></td>
            <td><?php echo $row["roomnumber"];?></td>
            <td align="left"><?php echo $row["roomdetail"];?></td>
            <td align="right"><?php echo number_format($row["roomprice"]);
                           $total1 +=$row["roomprice"];?></td>
            <td align="right"><?php echo number_format("1500");
                           $total2 += 1500; ?></td>
            </tr>
            <?php
            
          }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"> </td>
            <td align="right"> รวม(บาท) </td>
            <td align="right"> <?php echo number_format($total1); ?> </td>
            <td align="right"> <?php echo number_format($total2); ?> </td>    
        </tr>
    </tfoot>
  </table>
    <br>
    <br>
    <div>
        <label class="col-sm-12">
            <h6>หมายเหตุ : <span style="font-weight: 100;">หลังจากลูกค้าชำระค่าจองห้องพักแล้ว หากต้องการสอบถามรายละเอียดเพิ่มเติมสามารถติดต่อสอบถามเจ้าหน้าที่ได้ทันที<br><br>โทร:094-202-9180 Email:<a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZcRZnswrvxRdrBLLXmZVvGfzlMSstfFglvBkGHVkpSgvgmgKKHgvRwSwVJHxQldQsRKtL">peepachara40@gmail.com</a></span></h6>
        </label>
    </div>
    <div class="btn">
        <input type="hidden" name="bookmoney" value="<?php echo $total2?>" >
        <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" href="#">บันทึก</a>
        <a id="resetbt" class="btn btn-primary waves-effect waves-light" type="button" value="" href="#">ล้างค่า</a>   
        <a  id="cancelbt" class="btn btn-warning waves-effect waves-light" type="button" value="" href="#">ยกเลิก</a>
      </div>
</form>

<script  type="text/javascript"> 
    $(document).ready(function(){
        
        $("#resetbt").click(function(){
            $('#form_savebooking')[0].reset();
        });

        $("#cancelbt").click(function(){
            window.location.replace("member_room-grid.php")
        });
        
        $("#confirmbt").click(function(){  
            var booklistdate = $("#booklistdate");
            var booklistdate_trim = $.trim(booklistdate.val());
            
            if(booklistdate_trim == ""){
            alert('กรุณากำหนดวันเข้าพัก');
            booklistdate.focus();
            return false;
              }else{
                
                if(confirm("ยืนยันการจองห้องพัก")){
                $('form').submit();

                
            }
            }});
    });
    </script>

              

<?php
  include("footer.php");
?>

