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
  text-align: center;
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
  text-align: center;
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
    $search = $_POST['search'];
    if($search!=''){
      $where_condition .= " AND ( bookid LIKE '%".$search."%' OR bookdate LIKE '%".$search."%' )";
      }
?>



<?php   $sql = "SELECT *  
        FROM booking   
        WHERE cusid = '".$_SESSION["sees_cus_id"]."' AND 1=1 ".$where_condition."
        ORDER BY bookid DESC ";

        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
?>


<h1>แสดงรายการจอง</h1>
<form id = "form_search" class=""  method = "POST" action = "show_booking.php">
        <div class="col-sm-6" align="center">
          <div class="">
            <input name="search" type="text"  class="col-sm-4"  placeholder="ค้นหา">
              
                <button class="btn btn-primary" type="submit" value=" ">ค้นหา</button>
              
          </div>
        </div>
    </form>
<br>
<br>


  <table class="paleBlueRows" align="center">
    <thead>
        <tr>       
            <th width="60">รหัสจอง</th>
            <th width="70">วันที่จอง</th>
            <th width="70">เงินมัดจำ(บาท)</th>
            <th width="70">สถานะ</th>
            <th width="70">แจ้งหลักฐาน</th>
            <th width="70">รายละเอียดการจอง</th>
        </tr>
    </thead>
    <tbody>
      <?php
       if($row > 0){   
       foreach($result as $row) { ?>
            <tr> 
              <td><?php 
              echo sprintf("%05d",$row["bookid"]);
              ?></td>
              <td><?php $ThisYear = date('d-m-',strtotime($row['bookdate']. " + 0 day")).(date('Y',strtotime($row['bookdate']. " + 0 day"))+543);
                            echo $ThisYear;?></td>
              <td><?php echo number_format($row["bookmoney"]);?></td>
              <td><?php echo $bookstatus[$row["bookstatus"]];?></td>
              <td>
              <?php 
                if($row['bookstatus']!='0'&& $row['bookstatus']!='3'){
                  echo "แจ้งหลักฐานแล้ว";
                }elseif($row['bookstatus']=='3'){
                  echo "รายการจองถูกยกเลิก";
                }else{
                ?><a id="evidence" name="evidence"class="btn btn-warning waves-effect waves-light" type="button" value="" href="inform_evidence.php?id=<?php echo $row['bookid'];?>">แจ้งหลักฐาน</a>
              <?php }?>
              </td>
              <td>
              <a id="detail" name="detail"class="btn btn-success waves-effect waves-light" type="button" value="" href="booking_detail.php?id=<?php echo $row['bookid'];?>">รายละเอียดการจอง</a>
              </td>
            </tr>
            <?php
            
          }
        }else{?>
          <td colspan="6" align="center" style="font-weight:bolder; color:red;">ไม่มีข้อมูลการจอง</td>
          <?php
        }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"> </td>         
        </tr>
    </tfoot>
  </table>
    <br>
    <br>
    <div>
        <label class="col-sm-6" align="center">
              <h6 style="font-weight: bold;">หมายเหตุ : <span style="font-weight: 100;">หลังจากลูกค้าชำระค่าจองห้องพักแล้ว หากต้องการสอบถามรายละเอียดเพิ่มเติมสามารถิตดต่อสอบถามเจ้าหน้าที่ได้ทันที<br><br>
                                                                                       โทร:094-202-9180 Email:
                                                                                       <a target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZcRZnswrvxRdrBLLXmZVvGfzlMSstfFglvBkGHVkpSgvgmgKKHgvRwSwVJHxQldQsRKtL">peepachara40@gmail.com</a></span></h6>    
                                                 
        </label>
    </div>
</form>

<?php
  include("footer.php");
?>

