<?php include("include.php");?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายงานหนี้ค้างชำระประจำเดือน</title>
</head>

<body>
<?php
	include("dbconnect.php");
?>
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

<table width="1000" border="1" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td align="center"><table width="990" border="0" align="center">
        <tbody>
          <tr>
            <td align="center" valign="top"><h3>รายงานหนี้ค้างชำระประจำเดือน<br>
              เดือน <strong><?php echo $thai_full_month_arr[$month]; ?></strong> พ.ศ. <?php echo $year+543; ?><br>
            </h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">วันที่พิมพ์  <?php echo fn_thai_date($dnow,"2") ?></td>
          </tr>
        </tbody>
      </table>
_________________________________________________________________________________________________________________________________________<br>

<table border="0">
  <tr>
  	<td width="110" align="center" valign="top"><strong>วันที่ออกใบแจ้งหนี้</strong></td>
    <td width="100" align="center" valign="top"><strong>วันที่กำหนดชำระ</strong></td>
    <td width="80" align="center" valign="top"><strong>รหัสใบแจ้งหนี้</strong></td>
    <td width="80" align="center" valign="top"><strong>หมายเลขห้อง</strong></td>
    <td width="80" align="center" valign="top"><strong>รหัสลูกค้า</strong></td>
    <td width="100" align="left" valign="top"><strong>ชื่อ-นามสกุล</strong></td>
    <td width="90" align="right" valign="top"><strong>ราคารวม (บาท)</strong></td>
	<td width="80" align="right" valign="top"><strong>ค่าปรับ (บาท)</strong></td>
	<td width="120" align="right" valign="top"><strong>ยอดค้างชำระ (บาท)</strong></td>
    </tr>
  <tr>
      <td colspan="9" align="center" valign="top">
	  _________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_set_charset($conn,'utf8');
	$sql1 = "use dormitory_system";
	$result = mysqli_query($conn,$sql1);
	$sql1 = " SELECT * FROM invoice WHERE invstatus = 0 AND DATE_FORMAT(invdate,'%Y%m')='".$year.$month."' ORDER BY invdate ";
	$result1 = mysqli_query($conn,$sql1);
	$num_record = mysqli_num_rows($result1);
	$newdate = null;
	$newinv = null;
	$total = 0;
	$total1 = 0;
	$total2 = 0;
	$total3 = 0;
	$total4 = 0;
	$total5 = 0;
	$sumpay = 0;
	$count = 0;
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	$count4 = 0;
	$count5 = 0;
	while($inv = mysqli_fetch_row($result1)){
		$invdatepayment = $inv [5];
		$invid = $inv [0];
		$invprice = $inv [1];
		$invfines = $inv [6];
		$invoutstand = $inv [8];
		$invdate = $inv [3];
		$rentid = $inv [14];
		$cusid = $inv [13];
		
		$conn = mysqli_connect("localhost","root","");
		mysqli_set_charset($conn,'utf8');
		$sql2 = "use dormitory_system";
		$result2 = mysqli_query($conn,$sql2);
		$sql2 = "SELECT * FROM customer WHERE cusid = $cusid";
		$result2 = mysqli_query($conn,$sql2);
		$cus = mysqli_fetch_array($result2);
		$cusname = $cus [1];

		$sql3 = "use dormitory_system";
		$result3 = mysqli_query($conn,$sql3);
		$sql3 = "SELECT * FROM rent WHERE rentid = $rentid ";
		$result3 = mysqli_query($conn,$sql3);
		$rent = mysqli_fetch_array($result3);
		$roomnumber = $rent [16];

		if(($newdate != $invdatepayment) && ($newdate != null) ){
?>
	<tr>
      <td colspan="5" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo ($count); ?> รายการ</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total1); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total2); ?></strong></td>
    </tr>
	<tr>
      <td colspan="9" align="center" valign="top">
	  _________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
			$total = 0;
			$total1 = 0;
			$total2 = 0;
			$count = 0;
?>
<?php
		}
		if(($invdatepayment!=$newdate)){
			$newdate = $invdatepayment;
			
		}else{
			$newdate = "";
		}
		if(($invdate!=$newinv)){
			$newinv = $invdate;
			
		}else{
			$newinv = "";
		}
?>
    <tr>
	  <td align="center" valign="top"><?php echo fn_thai_date($newinv,1); ?></td>
      <td align="center" valign="top"><?php echo fn_thai_date($newdate,1); ?></td>
      <td align="center" valign="top"><?php echo $invid; ?></td>
      <td align="center" valign="top"><?php echo $roomnumber; ?></td>
      <td align="center" valign="top"><?php echo $cusid; ?></td>
	  <td align="left" valign="top"><?php echo $cusname; ?></td>
	  <td align="right" valign="top"><?php echo number_format($invprice); ?></td>
	  <td align="right" valign="top"><?php echo number_format($invfines); ?></td>
		<?php 
			$sumpay = $invprice + $invfines;		
		?>
	  <td align="right" valign="top"><?php echo number_format($sumpay); ?></td>
      </tr>
<?php
		$total = $total + $invprice ;
		$total1 = $total1 + $invfines ;
		$total2 = $total2 + $sumpay ;
		$total3 = $total3 + $invprice ;
		$total4 = $total4 + $invfines ;
		$total5 = $total5 + $sumpay ;
		$newdate = $invdatepayment;
		$newinv = $invdate ;
		$count++;
		$count1++;
	}
?>
	<tr>
      <td colspan="5" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo ($count); ?> รายการ</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total1); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><?php echo number_format($total2); ?></strong></td>
    </tr>
	<tr>
      <td colspan="9" align="center" valign="top">
	  _________________________________________________________________________________________________________________________________________</td>
      </tr>
	<tr>
      <td colspan="5" align="right" valign="top"><strong><font color="blue">รวมทั้งหมด</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="blue"><?php echo ($count1);?> รายการ</strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="blue"><?php echo number_format($total3); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="blue"><?php echo number_format($total4); ?></strong></td>
	  <td colspan="0" align="right" valign="top"><strong><font color="blue"><?php echo number_format($total5); ?></strong></td>
    </tr>
</table>
	 </td>
    </tr>
  </tbody>
</table>
</body>
</html>