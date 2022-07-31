<?php
	include("include.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>สัญญาเช่า</title>
</head>

<?php
    
    $id = $_GET['id'];
    $sql = "SELECT a.* , b.* , c.*
            FROM (rent a 
            LEFT JOIN customer b  ON a.cusid = b.cusid
			LEFT JOIN employee c  ON a.emid = c.emid) 
            WHERE rentid = '".$id."' ";
                
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    
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
		$thai_date_return.=	' พ.ศ. '.'<span class="underlineStlye">&nbsp;'.((date("Y",$time)+543)).'&nbsp;</span>';
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
$dnow = date('Y-m-d');
?>	

<table width="1000" border="0" align="center">
<tbody>
<tr>	
    <td height="1165" align="center" valign = "top">
		
		<table width="990" border="0">
  		<tbody>
    		<tr>
      			<td align="right">เลขที่สัญญา : <?php echo $row['rentnumlease']; ?></td>
    		</tr>
 	 	</tbody>
		</table>
		
		<table width="990" border="0">
  		<tbody>
    		<tr>
      			<td align="center"><h2><br>
      			  <strong>สัญญาเช่า<br>
   			      หอพักกุลชญา</strong></h2>
				</td>
    		</tr>
 	 	</tbody>
		</table>
		
		<table width="800" border="0">
  		<tbody>
    		<tr>
			<td align="center" > สถานะสัญญา :
				<?php 
						if($row['rentstatus']==1){ ?>
						<u><strong><font color = "green"> เช่า </font></u></strong>
				<?php
						}elseif($row['rentstatus']==2){ ?>
						<u><strong><font color = "red"> ยกเลิก </font> </u></strong>
				<?php
						}elseif($row['rentstatus']==3){ ?>
						<u><strong><font color = "orange"> ย้ายห้อง </font> </u></strong>
				<?php
						}elseif($row['rentstatus']==4){ ?>
						<u><strong><font color = "red"> ย้ายออก </font> </u></strong>
				<?php
						}
				?></td>
				<td align="right" valign="top">วันที่พิมพ์  <u><?php echo fn_thai_date($dnow,"2") ?></u></td>
    		</tr>
 	 	</tbody>
		</table>

		<table width="800" border="0">
  		<tbody>
    		<tr>
      			<td align="left">
					<br>
					<dd>สัญญาฉบับนี้ทำขึ้นระหว่างคุณ <u><?php echo $row['cusname']; ?></u> ถือเลขบัตรประชาชน <u><?php echo $row['cusidcard']; ?></u></dd> 
                    เกิดวันที่ <u><?php echo fn_thai_date($row['cusbirthday'],"2") ?></u>วันที่ออกบัตร <u><?php echo fn_thai_date($row['cuscateissue'],"2") ?></u> วันหมดอายุ <u><?php echo fn_thai_date($row['cusdateexpiry'],"2") ?></u> 
                    <br>สถานที่ออกบัตร <u><?php echo $row['cusplace']; ?></u> ในสัญญาจะเรียกว่า "ผู้เช่า" โดยทั้งสองฝ่ายตกลงทำสัญญากันมีข้อความสำคัญ ดังนี้</td>
    		</tr>
 	 	</tbody>
		</table>

		<table width="800" border="0">
  		<tbody>
    		<tr>
   			  <td align="left">
					<dd>ข้อที่ 1. ผู้เช่าตกให้เช่าและผู้เช่าตกลงเช่าห้องหมายเลข <u><?php echo $row['roomnumber']; ?></u> เลขที่ 50/19 หมู่ 11 ซอย เทพกุญชร 22 ตำบล คลองหนึ่ง </dd>อำเภอ คลองหลวง จังหวัดปทุมธานี เพื่อใช้เป็น สถานที่พักอาศัย 
                    มีกำหนดเช่าเป็นระยะเวลา 1 ปี นับตั้งแต่วันที่ <u><?php echo fn_thai_date($row['rentdate'],"2") ?></u> ครบกำหนดวันที่ <u><?php echo fn_thai_date($row['rentdatelease'],"2") ?></u> ในอัตราค่าเช่าเดือนละ <u><?php echo number_format($row['rentcost']); ?></u> บาท
                    <dd>ข้อที่ 2. ผู้เช่าสัญญาว่าจะชำระค่าเช่าแก่ผู้ให้เช่าล่วงหน้าเป็นรายเดือนทุกเดือน ภายในวันที่ 5 ของทุกเดือน
					<dd>ข้อที่ 3. ในวันที่ทำสัญญานี้ ผู้เช่าได้มอบเงินค่าประกัน จำนวน <u><?php echo number_format($row['rentinsurance']); ?></u> บาท ให้ผู้ให้เช่ายึดถือไว้เพื่อประกันความเสียหายใน</dd>สถานที่เช่า
					<dd>ข้อที่ 4. ผู้เช่าสัญญาว่า จะไม่ใช้สถานที่เช่าเพื่อการอื่นใดนอกจากที่ได้ระบุไว้ในสัญญานี้
					<dd>ข้อที่ 5. ในระหว่างอายุการเช่าผู้ให้เช่าตลอดจนผู้แทนของผู้ให้เช่ามีสิทธิเข้าตรวจตราสถานที่เช่าได้ในเวลาและระยะอัน</dd>สมควร
					<dd>ข้อที่ 6. ผู้เช่าสัญญาว่าจะไม่ก่อสร้างดัดแปลงต่อเติมสถานที่เช่านี้อย่างเด็ดขาด
					<dd>ข้อที่ 7. ผู้เช่าเป็นผู้ชำระค่าไฟฟ้า ค่าน้ำประปา ค่าภาษีโรงเรือนและที่ดินและค่าใช้จ่ายต่าง ๆ ในสถานที่เช่า
					<dd>ข้อที่ 8. หากผู้เช่าประพฤติผิดสัญญาข้อใดข้อหนึ่ง ยินยอมให้ผู้ให้เช่าบอกเลิกสัญญาได้ทันที
					สัญญานี้ทำขึ้นเป็นสองฉบับ มีข้อความตรงกัน คู่สัญญาต่างยึดถือไว้ฝ่ายละฉบับ
					คู่สัญญาทั้งสองฝ่ายต่างได้อ่านและเข้าใจข้อความในสัญญานี้โดยตลอดแล้ว เห็นเป็นการถูกต้องตรงตามเจตนา จึงได้ลงลายมือชื่อไว้เป็นหลักฐานต่อหน้าพยาน
				</td>
    		</tr>
 	 	</tbody>
		</table>

		<table width="800" border="0">
  		<tbody>
    		<tr>
   			  	<td align="left"><br>
					ลงชื่อ <?php echo "กุลชญา จตุรวรรณ"; ?> ผู้ให้เช่า <br>
					<br>
					(....................................)
				</td>
				
				<td align="right">
					ลงชื่อ <u><?php echo $row['cusname'] ?></u> ผู้เช่า <br>
					<br>
					(................................................)
				</td>	
    		</tr>
			<tr>
			<td align="left"><br>
					ลงชื่อ <u><?php echo $row['emname'] ?></u> ผู้บันทึกเช่า <br>
					<br>
					(....................................)
				</td>
			</tr>
 	 	</tbody>
		</table>
	
	</td>
</tr>
</tbody>
</table>
