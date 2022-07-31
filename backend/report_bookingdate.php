<?php include("include.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายงานการจองประจำวัน</title>
</head>

<?php
date_default_timezone_set('Asia/Bangkok');
?>	
<?php
	function fn_thai_date($time,$formatdate){
	if(($time=="0000-00-00")||($time=="")) {
		return '';
	}
	$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
	$thai_full_month_arr=array(
		"0"=>"",
		"1"=>"มกราคม",
		"2"=>"กุมภาพันธ์",
		"3"=>"มีนาคม",
		"4"=>"เมษายน",
		"5"=>"พฤษภาคม",
		"6"=>"มิถุนายน",	
		"7"=>"กรกฏาคม",
		"8"=>"สิงหาคม",
		"9"=>"กันยายน",
		"10"=>"ตุลาคม",
		"11"=>"พฤศจิกายน",
		"12"=>"ธันวาคม"
	);
	$thai_month_arr=array(
		"0"=>"",
		"1"=>"ม.ค.",
		"2"=>"ก.พ.",
		"3"=>"มี.ค.",
		"4"=>"เม.ย.",
		"5"=>"พ.ค.",
		"6"=>"มิ.ย.",	
		"7"=>"ก.ค.",
		"8"=>"ส.ค.",
		"9"=>"ก.ย.",
		"10"=>"ต.ค.",
		"11"=>"พ.ย.",
		"12"=>"ธ.ค."					
	);
	$time = strtotime($time);
	if($formatdate=="2") {
		$thai_date_return =	'<span class="underlineStlye">&nbsp;&nbsp;'.(date("d",$time)*1).'&nbsp;&nbsp;</span>';
		$thai_date_return.='<span class="underlineStlye">&nbsp;&nbsp;'.($thai_full_month_arr[date("n",$time)]).'&nbsp;&nbsp;</span>';
		$thai_date_return.=	' พ.ศ. '.'<span class="underlineStlye">&nbsp;&nbsp;'.((date("Y",$time)+543)).'&nbsp;&nbsp;</span>';
	}else if($formatdate=="3") {
		$thai_date_return =	"".(date("d",$time)*1);
		$thai_date_return.=" ".($thai_full_month_arr[date("n",$time)]);
		$thai_date_return.=	" ".((date("Y",$time)+543));
	}else if($formatdate=="4") {
		$thai_date_return =	"".(date("m",$time)*1);
		$thai_date_return.="/".(date("d",$time));
		$thai_date_return.="/".(date("Y",$time));
	}else{
		$thai_date_return =	"".(date("d",$time)*1);
		$thai_date_return.=" ".($thai_month_arr[date("n",$time)]);
		$thai_date_return.=	" ".((date("Y",$time)+543));
	}
	if($thai_date_return!="1 ม.ค. 2513") { return $thai_date_return;  }else{ return ""; }
}

?>
<?php
$thai_month_arr2=array(
  ""=>"0",
  "ม.ค."=>"01",
  "ก.พ."=>"02",
  "มี.ค"=>"03",
  "เม.ย."=>"04",
  "พ.ค."=>"05",
  "มิ.ย"=>"06", 
  "ก.ค."=>"07",
  "ส.ค."=>"08",
  "ก.ย."=>"09",
  "ต.ค."=>"10",
  "พ.ย."=>"11",
  "ธ.ค."=>"12."     
 );
	$date1 = $_GET['date1'];
	$date2 = $_GET['date2'];
	$dnow = date('Y-m-d');
	$arr=explode("/",$date1);
	$arr[1]=$arr[1];
	$arr[2]=$arr[2]-543;
	$date1=$arr[2].'-'.$arr[1].'-'.$arr[0];
	
	$arr=explode("/",$date2);
	$arr[1]=$arr[1];
	$arr[2]=$arr[2]-543;
	$date2=$arr[2].'-'.$arr[1].'-'.$arr[0];

?>	

<table width="1100" border="1" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td align="center"><table width="1100" border="0" align="center">
        <tbody>
          <tr>
            <td align="center" valign="top"><h3>รายงานการจองประจำวัน<br>
              วันที่ <?php echo fn_thai_date($date1,2); ?> ถึง วันที่ <?php echo fn_thai_date($date2,2); ?><br>
            </h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">วันที่พิมพ์ <?php echo fn_thai_date($dnow,"2"); ?></td>
          </tr>
        </tbody>
      </table>
        _____________________________________________________________________________________________________________________________________________________________________________<br>
<table border="0">
<tr>
    <td width="95" align="center" valign="top"><strong>วันที่จอง</strong></td>
    <td width="100" align="center" valign="top"><strong>รหัสการจอง</strong></td>
    <td width="90" align="center" valign="top"><strong>รหัสลูกค้า</strong></td>
    <td width="150" align="left" valign="top"><strong>ชื่อ-นามสกุล</strong></td>
    <td width="150" align="center" valign="top"><strong>เบอร์โทรศัพท์</strong></td>
    <td width="100" align="left" valign="top"><strong>สถานะ</strong></td>
    <td width="150" align="right" valign="top"><strong>รวมเงินมัดจำ (บาท)</strong></td>
    <td width="100" align="center" valign="top"><strong>หมายเลขห้อง</strong></td>
    <td width="150" align="center" valign="top"><strong>วันกำหนดเข้าพัก</strong></td>
    <td width="110" align="right" valign="top"><strong>เงินมัดจำ (บาท)</strong></td>
  </tr>
  <tr>
      <td colspan="10" align="center" valign="top">_____________________________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_set_charset($conn,'utf8');
	$sql1 = "use dormitory_system";
	$result1 = mysqli_query($conn,$sql1);
	$sql1 = "SELECT * FROM booking WHERE bookdate between '$date1' AND '$date2' ORDER BY bookid";  
	$result1 = mysqli_query($conn,$sql1);
	$num_record = mysqli_num_rows($result1);
	$newdate = null;
	$total = 0;
	$total1 = 0;
	$total2 = 0;
	$total3 = 0;
	$total4 = 0;
	$total5 = 0;
	$count = 0;
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	$count4 = 0;
	$count5 = 0;
	while($booking = mysqli_fetch_row($result1)){
		$bookid = $booking[0];
		$bookdate = $booking[1];
		$bookstatus = $booking[2];
		$bookmoney = $booking[7];
		$cusid = $booking[8];
		
		$sql2 = "use dormitory_system";
		$result2 = mysqli_query($conn, $sql2);
		$sql2 = "SELECT * FROM customer where cusid = $cusid";
		$result2 = mysqli_query($conn,$sql2);
		$cus = mysqli_fetch_array($result2);
		$cusname = $cus[1];
		$cusphone = $cus[2];

		if(($newdate != $bookdate) && ($newdate != null) ){
?>
	<tr>
      <td colspan="6" align="right" valign="top"><strong> รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count; ?> รายการ</strong></td>	
    </tr>
	<tr>
      <td colspan="10" align="center" valign="top">_____________________________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
			$total = 0;
			$count = 0;
?>
<?php
		}
		if($bookdate != $newdate){
			$newdate = $bookdate;
		}else{
			$newdate = "";
		}
?>
		<?php
          $sql3 = "SELECT * FROM bookinglist where bookid = $bookid";
            $result3 = $conn->query($sql3) or die($conn->error);
            $row3 = $result3->fetch_assoc();
          foreach ($result3 as $key => $row3) {  
		?>
<tr>
			<?php if ($key == 0) { ?>
      <td align="center" valign="top"><?php echo fn_thai_date($newdate,"1"); ?></td>
	  <td align="center" valign="top"><?php echo $bookid; ?></td>
      <td align="center" valign="top"><?php echo $cusid; ?></td>
      <td align="left" valign="top"><?php echo $cusname; ?></td>
      <td align="center" valign="top"><?php echo $cusphone; ?></td>
	  <td align="left" valign="top">
	  	 <?php 
				if($bookstatus==0){ $total2 = $total2 + $bookmoney; $count2 = $count2 + 1;?>
        <font color="purple"> รอแจ้ง </font>
        <?php
				}elseif($bookstatus==1){ $total3 = $total3 + $bookmoney; $count3 = $count3 +1; ?>
        <font color="gray"> รอตรวจสอบ </font>
		 <?php
				}elseif($bookstatus==2){ $total4 = $total4 + $bookmoney; $count4 = $count4 +1; ?>
		<font color="green"> ชำระเงินแล้ว </font>
		<?php
				}elseif($bookstatus==3){ $total5 = $total5 + $bookmoney; $count5 = $count5 +1; ?>
		<font color="red"> ยกเลิก </font>
		<?php
				}
		 ?></td>
	  <td align="right" valign="top">
	  			<?php 
				if($bookstatus==0){ ?>
        		<font color="purple"><?php echo number_format($bookmoney); ?></font>
        <?php
				}elseif($bookstatus==1){ ?>
				<font color ="gray"><?php echo number_format($bookmoney); ?></font>
		<?php
				}elseif($bookstatus==2){ ?>
				<font color ="green"><?php echo number_format($bookmoney); ?></font>
		<?php
				}elseif($bookstatus==3){ ?>
				<font color="red"><?php echo number_format($bookmoney); ?></font>
		<?php
				}
		 ?></td>
				<?php } else {?>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
				<?php } ?>
            <td align="right" valign="top"><?php echo $row3['roomnumber']; ?></td> 
            <td align="center"valign="top"><?php echo fn_thai_date($row3['booklistdate'],"1"); ?></td>
            <td align="right" valign="top"><?php echo number_format($row3['booklistmoney']); ?></td>
        <?php 	
		}
		?>
	</tr>
<?php
		$newdate=$bookdate;
		$count++;
		$count1++;
		$total = $total + $bookmoney;
		$total1 = $total1 + $bookmoney;
	}
?>

<tr>
      <td colspan="6" align="right" valign="top"><strong> รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count; ?> รายการ</strong></td>	
    </tr>
	<tr>
      <td colspan="10" align="center" valign="top">_____________________________________________________________________________________________________________________________________________________________________________</td>
      </tr>
	<tr>
      <td colspan="6" align="right" valign="top"><strong>รวมทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total1); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count1; ?> รายการ</strong></td>	
    </tr>
	<tr>
	  <td colspan="6" align="right" valign="top"><font color="purple"><strong>รวมรอแจ้งทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="purple"><strong><?php echo number_format($total2); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="purple"><strong><?php echo $count2; ?> รายการ</strong></td>
	  </tr>
	<tr>
	  <td colspan="6" align="right" valign="top"><font color="gray"><strong>รวมรอตรวจสอบทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="gray"><strong><?php echo number_format($total3); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="gray"><strong><?php echo $count3; ?> รายการ</strong></td>
	  </tr>
	<tr>
	  <td colspan="6" align="right" valign="top"><font color="green"><strong>รวมชำระเงินแล้วทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="green"><strong><?php echo number_format($total4); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="green"><strong><?php echo $count4; ?> รายการ</strong></td>
	</tr>
	<tr>
	  <td colspan="6" align="right" valign="top"><font color="red"><strong>รวมยกเลิกทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="red"><strong><?php echo number_format($total5); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="red"><strong><?php echo $count5; ?> รายการ</strong></td>
	  </tr>
</table>
	 </td>
    </tr>
  </tbody>
</table>