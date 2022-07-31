<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ใบแจ้งหนี้</title>
</head>

<body onLoad="window.print()">
<?php
	include("include.php");
?>

<?php
date_default_timezone_set('Asia/Bangkok');
?>	
	
<?php
	$dnow = date('Y-m-d');
	$id = $_GET['id'];
	
	$sql = "SELECT a.* , b.* , c.*
            FROM invoice a 
            LEFT JOIN  customer b 	ON a.cusid = b.cusid
			LEFT JOIN  rent c 		ON a.rentid = c.rentid
            WHERE invid = '".$id."' ";
	
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);

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

<table width="900" border="1" align="center">
  <tbody>
    <tr>
      <td align="center">
	  <strong>หอพัก กุลชญา</strong><br>
	  เลขที่ 50/19 หมู่ที่ 11<br>
	  ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 12120<br>
	  โทรศัพท์ 082-555-4590<br>
      ________________________________________________________________________________________________________________<br>
		<h3> ใบแจ้งหนี้ </h3>
      <table width="780" border="0">
        <tbody>
			<tr>
            <td width="160" align="right"><strong>สถานะ : </strong></td>
			<?php 
				if($row['invstatus'] == 0){?>
            		<td width="160"><u><strong><font color = "orange"><?php echo $invstatus[$row['invstatus']]; ?></strong></u></td>
			<?php }elseif($row['invstatus'] == 1){?>
				<td width="160"><u><strong><font color = "green"><?php echo $invstatus[$row['invstatus']]; ?></strong></u></td>
			<?php }elseif($row['invstatus'] == 2){?>
				<td width="160"><u><strong><font color = "red"><?php echo $invstatus[$row['invstatus']]; ?></strong></u></td>
			<?php } ?>				
          </tr>
		  <tr>
            <td width="160" align="right"><strong>รหัสใบแจ้งหนี้ :</strong></td>
            <td width="160"><?php echo $id; ?></td>
            <td width="160" align="right"><strong>ชื่อลูกค้า :</strong></td>
            <td width="160"><?php echo $row['cusname']; ?></td>
          </tr>
          <tr>
            <td align="right"><strong>วันที่ออกใบแจ้งหนี้ :</strong></td>
            <td><?php echo fn_thai_date($row['invdate'],"3"); ?></td>
            <td align="right"><strong>เบอร์โทรศัพท์ :</strong></td>
            <td><?php echo $row['cusphone']; ?></td>
          </tr>
          <tr>
            <td align="right"><strong>วันกำหนดชำระ :</strong></td>
            <td><?php echo fn_thai_date($row['invdatepayment'],"3"); ?></td>
            <td align="right"><strong>หมายเลขห้อง :</strong></td>
            <td ><?php echo $row['roomnumber']; ?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
<?php	
	$sql2 = "SELECT a.* , b.* , c.*
			FROM costlist a 
			LEFT JOIN  invoice b 	ON a.invid = b.invid
			LEFT JOIN  servicelist c 	ON a.serviceid = c.serviceid
			WHERE a.invid = '".$id."' ";
	
	$result2 = $conn->query($sql2);
	$row2 = mysqli_fetch_array($result2);
?>
    <table width="900" border="0">
        <tbody>
          	<tr>
				<td width="850" colspan="7" align="right">
					<table width="850" border="1">
						<thead style="font-weight: bold;">
						<tr>
						<td width="80" align="center" valign="top" bgcolor="#98CDFF">รายการบริการ</td>
						<td width="50" align="center" bgcolor="#98CDFF">ยูนิตเริ่มต้น</td>
						<td width="50" align="center" bgcolor="#98CDFF">ยูนิตสิ้นสุด</td>
						<td width="50" align="center" bgcolor="#98CDFF">จำนวน</td>
						<td width="50" align="center" bgcolor="#98CDFF">หน่วยนับ</td>
						<td width="100" align="center" bgcolor="#98CDFF">ราคา/หน่วย(บาท)</td>
						<td width="100" align="center" bgcolor="#98CDFF">จำนวนเงิน(บาท)</td>
						</tr>
						</thead>
						<tbody>
						<?php
												
							foreach($result2 as $row2) { 
								
						?>		
						<tr>				
						<td align="left" valign="top"><?php echo $row2['servicename']; ?></td>
						<td align="right" valign="top"><?php echo number_format($row2['coststartunit']); ?></td>
						<td align="right" valign="top"><?php echo number_format($row2['costendunit']); ?></td>
						<td align="right" valign="top"><?php echo number_format($row2['costamount']);
																	$costamount = $row2['costamount'];?></td>
						<td align="right" valign="top"><?php echo $row2['serviceunit']; ?></td>
						<td align="right" valign="top"><?php echo number_format($row2['costprice'] / $row2['costamount']);?></td>
						<td align="right" valign="top"><?php echo number_format($row2['costprice']);?></td>
						</tr>
						<?php }?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5"> </td>
								<td style="font-weight: bold;" align="right">ราคารวม(บาท)</td>
								<td style="font-weight: bold;" align="right"> <?php echo number_format($row['invprice']); ?></td>
							</tr>
						</tfoot>
					</table>
				</td>
        	</tr>
        </tbody>
    </table>
      ________________________________________________________________________________________________________________<br>
<table width="800" border="0">
  <tbody>
          <tr>
            <td align="left" ><p>กรุณาชำระภายในวันที่ 5 กรณีเลยกำหนดต้องเสียค่าปรับ วันละ 50 บาท<br></p></td>
			<td align="right"><strong>วันที่พิมพ์ : </strong><?php echo fn_thai_date($dnow,"2") ; ?></td>
          </tr>
        </tbody>
    </table>
</td>
    </tr>
  </tbody>
</table>
</body>
</html>