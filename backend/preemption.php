<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ใบจอง</title>
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
	
	$sql = "SELECT a.* , b.* 
            FROM booking a 
            LEFT JOIN  customer b 	ON a.cusid = b.cusid			
            WHERE a.bookid = '".$id."' ";
	
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
		<h3> ใบจอง </h3>
      <table width="780" border="0">
        <tbody>
          <tr>
            <td width="160" align="right"><strong>รหัสการจอง :</strong></td>
            <td width="160"><?php echo $id; ?></td>
            <td width="160" align="right"><strong>สถานะ :</strong></td>
            <td width="160"><?php echo $bookstatus[$row['bookstatus']]; ?></td>
          </tr>
          <tr>
            <td align="right"><strong>รหัสลูกค้า :</strong></td>
            <td><?php echo $row['cusid']; ?></td>
            <td align="right"><strong>ชื่อลูกค้า :</strong></td>
            <td><?php echo $row['cusname']; ?></td>
          </tr>
          <tr>
            <td align="right"><strong>อีเมล :</strong></td>
            <td><?php echo $row['cusemail']; ?></td>
            <td align="right"><strong>เบอร์โทรศัพท์ :</strong></td>
            <td ><?php echo $row['cusphone']; ?></td>
          </tr>
		  <tr>
            <td align="right"><strong>วันที่จอง :</strong></td>
            <td><?php echo fn_thai_date($row['bookdate'],"3"); ?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
<?php	
	$sql2 = "SELECT a.*,b.*
			FROM  (bookinglist a 
			LEFT JOIN room b  ON b.roomnumber=a.roomnumber)
			WHERE a.bookid = '".$id."'";
	$result2 = $conn->query($sql2);
?>
    <table width="900" border="0">
        <tbody>
          	<tr>
				<td width="850" colspan="7" align="right">
					<table width="850" border="1">
						<thead style="font-weight: bold;">
						<tr>
						<td width="60" align="center" valign="top" bgcolor="#98CDFF">วันกำหนดเข้าพัก</td>
						<td width="15" align="center" bgcolor="#98CDFF">หมายเลขห้อง</td>
						<td width="200" align="center" bgcolor="#98CDFF">รายละเอียดห้องพัก</td>
						<td width="25" align="center" bgcolor="#98CDFF">ราคา (บาท)</td>
						<td width="25" align="center" bgcolor="#98CDFF">เงินมัดจำ</td>
						</tr>
						</thead>
						<tbody>
						<?php
						$no =-1;				
						while($row2 = mysqli_fetch_array($result2))
						{ 
							$no++;
						?>		
						<tr>				
						<td align="center" valign="top"><?php echo fn_thai_date($row2['booklistdate'],"3"); ?></td>
						<td align="center" valign="top"><?php echo $row2['roomnumber']; ?></td>
						<td align="left" valign="top"><?php echo $row2['roomdetail']; ?></td>
						<td align="right" valign="top"><?php echo number_format($row2['roomprice']);
																	$total1 +=$row2['roomprice'];?></td>
						<td align="right" valign="top"><?php echo number_format("1500");
                           											$total2 += 1500; ?></td>
						</tr>
						<?php }?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" style="font-weight: bold;" align="right">ราคารวม(บาท) </td>							
								<td style="font-weight: bold;" align="right"> <?php echo number_format($total1); ?></td>
								<td style="font-weight: bold;" align="right"> <?php echo number_format($total2); ?></td>
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