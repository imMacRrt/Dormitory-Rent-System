<?php
	include("include.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายงานการแจ้งย้ายประจำเดือน</title>
</head>
  <body>

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
      <td align="center"><table width="1000" border="0" align="center">
        <tbody>
          <tr>
            <td align="center" valign="top"><h3>รายงานการแจ้งย้ายประจำเดือน<br>
              เดือน <strong><?php echo $thai_full_month_arr[$month]; ?></strong> พ.ศ. <?php echo $year+543; ?><br>
            </h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">วันที่พิมพ์  <?php echo fn_thai_date($dnow,"2") ?></td>
          </tr>
        </tbody>
      </table>
        _____________________________________________________________________________________________________________________________________________________________<br>

<table border="0">
  <tr>
    <td width="100" align="center" valign="top"><strong>วันที่แจ้งย้าย</strong></td>
    <td width="100" align="center" valign="top"><strong>หมายเลขห้อง</strong></td>
    <td width="100" align="center" valign="top"><strong>เลขที่เช่า</strong></td>
    <td width="100" align="center" valign="top"><strong>สัญญาเช่า</strong></td>
    <td width="100" align="center" valign="top"><strong>รหัสลูกค้า</strong></td>
    <td width="100" align="left" valign="top"><strong>ชื่อ-นามสกุล</strong></td>
	<td width="100" align="center" valign="top"><strong>เบอร์โทรศัพท์</strong></td>
	<td width="100" align="center" valign="top"><strong>วันกำหนดย้าย</strong></td>
	<td width="150" align="left" valign="top"><strong>ประเภทแจ้งย้าย</strong></td>
	<td width="100" align="left" valign="top"><strong>สถานะเช่า</strong></td>
    </tr>
  <tr>
      <td colspan="10" align="center" valign="top"> _____________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_set_charset($conn,'utf8');
	$sql1 = "use dormitory_system";
	$result = mysqli_query($conn,$sql1);
	$sql1 = " SELECT * FROM rent WHERE rentstatus = 1 AND DATE_FORMAT(rentdateinform,'%Y%m')='".$year.$month."' ORDER BY rentdateinform";
	$result1 = mysqli_query($conn,$sql1);
	$num_record = mysqli_num_rows($result1);
	$newdate = null;
	$count = 0;
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	$count4 = 0;
	$count5 = 0;
	while($move = mysqli_fetch_row($result1)){
		$rentdateinform = $move [10];
		$roomnumber = $move [16];
		$rentid = $move [0];
		$rentnumlease = $move [2];
		$cusid = $move [13];
		$date_decide = $move [11];
		$type_move = $move [12];
		$rentstatus = $move [7];
		
		$conn = mysqli_connect("localhost","root","");
		mysqli_set_charset($conn,'utf8');
		$sql2 = "use dormitory_system";
		$result2 = mysqli_query($conn,$sql2);
		$sql2 = "SELECT * FROM customer WHERE cusid = $cusid";
		$result2 = mysqli_query($conn,$sql2);
		$cus = mysqli_fetch_array($result2);
		$cusname = $cus [1];
		$cusphone = $cus [2];

		if(($newdate != $rentdateinform) && ($newdate != null) ){
?>
	<tr>
      <td colspan="9" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo ($count); ?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="10" align="center" valign="top"> _____________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
			$total = 0;
			$count = 0;
?>
<?php
		}
		if(($rentdateinform!=$newdate)){
			$newdate = $rentdateinform;
			
		}else{
			$newdate = "";
		}
?>
    <tr>
      <td align="center" valign="top"><?php echo fn_thai_date($newdate,""); ?></td>
      <td align="center" valign="top"><?php echo $roomnumber; ?></td>
      <td align="center" valign="top"><?php echo $rentid; ?></td>
      <td align="center" valign="top"><?php echo $rentnumlease; ?></td>
	  <td align="center" valign="top"><?php echo $cusid; ?></td>
	  <td align="left" valign="top"><?php echo $cusname; ?></td>
	  <td align="center" valign="top"><?php echo $cusphone; ?></td>
	  <td align="center" valign="top"><?php echo fn_thai_date($date_decide,""); ?></td>
	  <td align="left" valign="top">
	  <?php 
				if($type_move=='ย้ายออก'){ $count2 = $count2 + 1; ?>
        <font color="purple"><strong> ย้ายออก </strong></font>
        <?php
				}elseif($type_move=='ย้ายห้อง'){ $count3 = $count3 +1; ?>
        <font color="gray"><strong> ย้ายห้อง </storng></font>
		<?php
				}
		 ?>
	  </td>
	  <td align="left" valign="top">
	  	<?php 
			if($rentstatus == 1){ ?>
			<font color = "green"><strong> เช่า </strong></font>
		<?php
			}elseif($rentstatus = 2){ ?>
			<font color = "red"><strong> ยกเลิก </strong></font>
		<?php
			}elseif($rentstatus = 3){ ?>
			<font color = "gray"><strong> ย้ายห้อง </strong></font>
		<?php
			}elseif($rentstatus = 4){ ?>
			<font color = "purple"><strong> ย้ายออก </strong></font>
		<?php
		
		}

		?>
	  </td>
      </tr>
<?php

		$newdate = $rentdateinform;
		$count++;
		$count1++;
	}
?>
	<tr>
	  <td colspan="9" align="right" valign="top"><strong>รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo ($count); ?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="10" align="center" valign="top"> _____________________________________________________________________________________________________________________________________________________________</td>
      </tr>
	<tr>
      <td colspan="9" align="right" valign="top"><strong>รวมทั้งหมด</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo ($count1);?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="9" align="right" valign="top"><strong><font color="purple">รวมแจ้งย้ายออกทั้งหมด</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="purple"><?php echo ($count2); ?> รายการ</strong></td>
    </tr>
	<tr>
      <td colspan="9" align="right" valign="top"><strong><font color="gray">รวมแจ้งย้ายห้องทั้งหมด</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><font color="gray"><?php echo ($count3); ?> รายการ</strong></td>
    </tr>
</table>
	 </td>
    </tr>
  </tbody>
</table>
</body>
</html>