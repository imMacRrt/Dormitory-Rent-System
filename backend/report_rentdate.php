<?php
	include("include.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายงานการเช่าประจำเดือน</title>
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
            <td align="center" valign="top"><h3>รายงานการเช่าประจำวัน<br>
              วันที่ <?php echo fn_thai_date($date1,2); ?> ถึง วันที่ <?php echo fn_thai_date($date2,2); ?><br>
            </h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">วันที่พิมพ์ <?php echo fn_thai_date($dnow,"2"); ?></td>
          </tr>
        </tbody>
      </table>
        ______________________________________________________________________________________________________________________________________________________________<br>
<table border="0">
<tr>
    <td width="95" align="center" valign="top"><strong>วันที่เช่า</strong></td>
    <td width="100" align="center" valign="top"><strong>เลขที่เช่า</strong></td>
    <td width="90" align="center" valign="top"><strong>รหัสลูกค้า</strong></td>
    <td width="150" align="left" valign="top"><strong>ชื่อ-นามสกุล</strong></td>
    <td width="150" align="center" valign="top"><strong>หมายเลขห้องพัก</strong></td>
    <td width="100" align="center" valign="top"><strong>จำนวนผู้พัก</strong></td>
    <td width="150" align="center" valign="top"><strong>สัญญาเช่า</strong></td>
    <td width="100" align="center" valign="top"><strong>วันครบสัญญา</strong></td>
    <td width="150" align="right" valign="top"><strong>ค่าเช่า (บาท)</strong></td>
    <td width="150" align="right" valign="top"><strong>ค่าประกัน (บาท)</strong></td>
	<td width="110" align="left" valign="top"><strong>สถานะเช่า</strong></td>
  </tr>
  <tr>
      <td colspan="11" align="center" valign="top">______________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_set_charset($conn,'utf8');
	$sql1 = "use dormitory_system";
	$result1 = mysqli_query($conn,$sql1);
	$sql1 = "SELECT * FROM rent WHERE rentdate between '$date1' AND '$date2' ORDER BY rentdate";	  
	$result1 = mysqli_query($conn,$sql1);
	$num_record = mysqli_num_rows($result1);
	$newdate = null;
	$total = 0;
	$total1 = 0;
	$total2 = 0;
	$total3 = 0;
	$total4 = 0;
	$total5 = 0;
	$total6 = 0;
	$total7 = 0;
	$total8 = 0;
	$total9 = 0;
	$total10 = 0;
	$total11 = 0;
	$count = 0;
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	$count4 = 0;
	$count5 = 0;
	$p1 = 0; $p2 =0; $p3 = 0;
	while($rent = mysqli_fetch_row($result1)){
		$rentdate = $rent[1];
		$rentid = $rent[0];
		$cusid = $rent[13];
		$roomnumber = $rent[16];
		$rentmount = $rent[6];
		$rentnumlease = $rent[2];
		$rentdatelease = $rent[3];
		$rentcost = $rent[8];
		$rentinsurance = $rent[5];
		$rentstatus = $rent[7];

		$conn = mysqli_connect("localhost","root","");
		mysqli_set_charset($conn,'utf8');
		$sql2 = "use dormitory_system";
		$result2 = mysqli_query($conn, $sql2);
		$sql2 = "SELECT * FROM customer where cusid = $cusid";
		$result2 = mysqli_query($conn,$sql2);
		$cus = mysqli_fetch_array($result2);
		$cusname = $cus[1];

		if(($newdate != $rentdate) && ($newdate != null) ){
?>
	<tr>
      <td colspan="8" align="right" valign="top"><strong> รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total1); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count; ?> รายการ</strong></td>	
    </tr>
	<tr>
      <td colspan="11" align="center" valign="top">______________________________________________________________________________________________________________________________________________________________</td>
      </tr>
<?php
			$total = 0;
			$total1 = 0;
			$count = 0;
?>
<?php
		}
		if($rentdate != $newdate){
			$newdate = $rentdate;
		}else{
			$newdate = "";
		}
?>
	<tr>
      <td align="center" valign="top"><?php echo fn_thai_date($newdate,"1"); ?></td>
      <td align="center" valign="top"><?php echo $rentid; ?></td>
      <td align="center" valign="top"><?php echo $cusid; ?></td>
      <td align="left" valign="top"><?php echo $cusname; ?></td>
      <td align="center" valign="top"><?php echo $roomnumber; ?></td>
	  <td align="center" valign="top"><?php echo $rentmount; ?></td>
	  <td align="center" valign="top"><?php echo $rentnumlease?> </td>
	  <td align="center" valign="top"><?php echo fn_thai_date($rentdatelease,"1"); ?></td>
	  <td align="right" valign="top">
	  <?php 
				if($rentstatus==1){ ?>
        		<font color="green"><?php echo number_format($rentcost); ?></font>
        <?php
				}elseif($rentstatus==2){ ?>
				<font color ="red"><?php echo number_format($rentcost); ?></font>
		<?php
				}elseif($rentstatus==3){ ?>
				<font color ="gray"><?php echo number_format($rentcost); ?></font>
		<?php
				}elseif($rentstatus==4){ ?>
				<font color="purple"><?php echo number_format($rentcost); ?></font>
		<?php
				}
		 ?></td>
	  <td align="right" valign="top">
	  <?php 
				if($rentstatus==1){ ?>
        		<font color="green"><?php echo number_format($rentinsurance); ?></font>
        <?php
				}elseif($rentstatus==2){ ?>
				<font color ="red"><?php echo number_format($rentinsurance); ?></font>
		<?php
				}elseif($rentstatus==3){ ?>
				<font color ="gray"><?php echo number_format($rentinsurance); ?></font>
		<?php
				}elseif($rentstatus==4){ ?>
				<font color="purple"><?php echo number_format($rentinsurance); ?></font>
		<?php
				}
		 ?></td>
	  <td align="left" valign="top">
	  <?php 
				if($rentstatus==1){ $total4 = $total4 + $rentcost ; $total5 = $total5 + $rentinsurance ; $count2 = $count2 + 1; ?>
        <font color="green"> เช่า </font>
        <?php
				}elseif($rentstatus==2){ $total6 = $total6 + $rentcost ; $total7 = $total7 + $rentinsurance ; $count3 = $count3 + 1; ?>
        <font color="red"> ยกเลิก </font>
		 <?php
				}elseif($rentstatus==3){ $total8 = $total8 + $rentcost ; $total9 = $total9 + $rentinsurance ; $count4 = $count4 + 1; ?>
		<font color="gray"> ย้ายห้อง </font>
		<?php
				}elseif($rentstatus==4){ $total10 = $total10 + $rentcost ; $total11 = $total11 + $rentinsurance ; $count5 = $count5 + 1; ?>
		<font color="purple"> ย้ายออก </font>
		<?php
				}
		 ?></td>
	</tr>
<?php
		$newdate=$rentdate;
		$count++;
		$count1++;
		$total = $total + $rentcost ;
		$total1 = $total1 + $rentinsurance ;
		$total2 = $total2 + $rentcost ;
		$total3 = $total3 + $rentinsurance ;
	}
?>

<tr>
      <td colspan="8" align="right" valign="top"><strong> รวม</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total1); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count; ?> รายการ</strong></td>	
    </tr>
	<tr>
      <td colspan="11" align="center" valign="top">______________________________________________________________________________________________________________________________________________________________</td>
      </tr>
	<tr>
      <td colspan="8" align="right" valign="top"><strong>รวมทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total2); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo number_format($total3); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><strong><?php echo $count1; ?> รายการ</strong></td>	
    </tr>
	<tr>
	  <td colspan="8" align="right" valign="top"><font color="green"><strong>รวมเช่าทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="green"><strong><?php echo number_format($total4); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="green"><strong><?php echo number_format($total5); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="green"><strong><?php echo $count2; ?> รายการ</strong></td>
	  </tr>
	  <tr>
	  <td colspan="8" align="right" valign="top"><font color="red"><strong>รวมยกเลิกทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="red"><strong><?php echo number_format($total6); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="red"><strong><?php echo number_format($total7); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="red"><strong><?php echo $count3; ?> รายการ</strong></td>
	</tr>
	<tr>
	  <td colspan="8" align="right" valign="top"><font color="gray"><strong>รวมย้ายห้องทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="gray"><strong><?php echo number_format($total8); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="gray"><strong><?php echo number_format($total9); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="gray"><strong><?php echo $count4; ?> รายการ</strong></td>
	  </tr>
	<tr>
	  <td colspan="8" align="right" valign="top"><font color="purple"><strong>รวมย้ายออกทั้งหมด :</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="purple"><strong><?php echo number_format($total10); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="purple"><strong><?php echo number_format($total11); ?> บาท</strong></td>
	  <td colspan="1" align="right" valign="top"><font color="purple"><strong><?php echo $count5; ?> รายการ</strong></td>
	</tr>

</table>
	 </td>
    </tr>
  </tbody>
</table>
</body>
</html>