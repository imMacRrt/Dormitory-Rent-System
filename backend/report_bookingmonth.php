<?php
	include("include.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายงานการจองประจำเดือน</title>
</head>

<?php
	$month = $_POST['month'];
	$year = $_POST['year'];
?>
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
		$thai_date_return =	'<span class="underlineStlye">&nbsp;'.(date("d",$time)*1).'&nbsp;</span>';
		$thai_date_return.='<span class="underlineStlye">&nbsp;'.($thai_full_month_arr[date("n",$time)]).'&nbsp;</span>';
		$thai_date_return.=	' พ.ศ. '.'<span class="underlineStlye">'.((date("Y",$time)+543)).'&nbsp;</span>';
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

$thai_full_month_arr=array(
		"00"=>"",
		"01"=>"มกราคม",
		"02"=>"กุมภาพันธ์",
		"03"=>"มีนาคม",
		"04"=>"เมษายน",
		"05"=>"พฤษภาคม",
		"06"=>"มิถุนายน",	
		"07"=>"กรกฏาคม",
		"08"=>"สิงหาคม",
		"09"=>"กันยายน",
		"10"=>"ตุลาคม",
		"11"=>"พฤศจิกายน",
		"12"=>"ธันวาคม"
	);
	
$dnow = date('Y-m-d');
?>

<table width="700" border="1" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td align="center"><table width="700" border="0" align="center">
        <tbody>
          <tr>
            <td align="center" valign="top"><h3>รายงานการจองประจำเดือน<br>
              เดือน <strong><?php echo $thai_full_month_arr[$month]; ?></strong> พ.ศ. <?php echo $year+543; ?><br>
            </h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">วันที่พิมพ์  <?php echo fn_thai_date($dnow,"2") ?></td>
          </tr>
        </tbody>
      </table>
        ____________________________________________________________________________________________________________<br>

<table border="0">
  <tr>
    <td width="100" align="center" valign="top"><strong>วันที่จอง</strong></td>
    <td width="100" align="center" valign="top"><strong>รหัสการจอง</strong></td>
    <td width="100" align="center" valign="top"><strong>รหัสลูกค้า</strong></td>
    <td width="100" align="left" valign="top"><strong>ชื่อ-นามสกุล</strong></td>
    <td width="100" align="left" valign="top"><strong>สถานะ</strong></td>
    <td width="100" align="right" valign="top"><strong>รวมเงินมัดจำ (บาท)</strong></td>
    </tr>
  <tr>
      <td colspan="6" align="center" valign="top">____________________________________________________________________________________________________________</td>
      </tr>
<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_set_charset($conn,'utf8');
	$sql1 = "use dormitory_system";
	$result = mysqli_query($conn,$sql1);
	$sql1 = " SELECT * FROM booking WHERE DATE_FORMAT(bookdate,'%Y%m')='".$year.$month."' ORDER BY bookid";
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
		$bookdate = $booking [1];
		$bookid = $booking[0];
		$bookstatus = $booking[2];
		$bookmoney = $booking[7];
		$cusid = $booking[8];
		
		$conn = mysqli_connect("localhost","root","");
		mysqli_set_charset($conn,'utf8');
		$sql2 = "use dormitory_system";
		$result2 = mysqli_query($conn,$sql2);
		$sql2 = "SELECT * FROM customer WHERE cusid = $cusid";
		$result2 = mysqli_query($conn,$sql2);
		$cus = mysqli_fetch_array($result2);
		$cusname = $cus [1];

		if(($newdate != $bookdate) && ($newdate != null) ){
?>
	<tr>
      <td colspan="5" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="6" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
    </tr>
	<tr>
      <td colspan="6" align="center" valign="top">____________________________________________________________________________________________________________</td>
      </tr>
<?php
			$total = 0;
			$count = 0;
?>
<?php
		}
		if(($bookdate!=$newdate)){
			
			$newdate = $bookdate;
			
		}else{
			$newdate = "";
		}
?>
    <tr>
      <td align="center" valign="top"><?php echo fn_thai_date($newdate,""); ?></td>
      <td align="center" valign="top"><?php echo $bookid; ?></td>
      <td align="center" valign="top"><?php echo $cusid; ?></td>
      <td align="left" valign="top"><?php echo $cusname; ?></td>
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
					<font color="gray"><?php echo number_format($bookmoney); ?></font>
			<?php
					}elseif($bookstatus==2){ ?>
					<font color="green"><?php echo number_format($bookmoney); ?></font>
			<?php
					}elseif($bookstatus==3){ ?>
					<font color="red"><?php echo number_format($bookmoney); ?></font>
			<?php
					}
		  	?></td>
      </tr>
<?php
		$total = $total + $bookmoney;
		$total1 = $total1 + $bookmoney;
		$newdate=$bookdate;
		$count++;
		$count1++;
	}
?>
	<tr>
      <td colspan="5" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="6" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
    </tr>
	<tr>
      <td colspan="6" align="center" valign="top">____________________________________________________________________________________________________________</td>
      </tr>
	<tr>
      <td colspan="4" align="right" valign="top"><strong>รวมทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total1,); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo ($count1);?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="4" align="right" valign="top"><strong><font color="purple">รวมรอแจ้งทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="purple"><?php echo number_format($total2,); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="purple"><?php echo ($count2);?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="4" align="right" valign="top"><strong><font color="gray">รวมรอตรวจสอบทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="gray"><?php echo number_format($total3,); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="gray"><?php echo ($count3);?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="4" align="right" valign="top"><strong><font color="green">รวมชำระเงินแล้วทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="green"><?php echo number_format($total4,); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="green"><?php echo ($count4);?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="4" align="right" valign="top"><strong><font color="red">รวมยกเลิกทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="red"><?php echo number_format($total5,); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="red"><?php echo ($count5);?> รายการ</strong></td>
    </tr>
</table>
	 </td>
    </tr>
  </tbody>
</table>
</body>
</html>