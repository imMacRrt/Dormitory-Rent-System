<?php

include("doctype_html.php");
include("member_hder.php");


?>
<script type="text/javascript">
    function MM_goToURL() { //v3.0
      var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
      for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
    }
</script>
<link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
  html,
  body {
    
    margin-top: 50px;
    margin-bottom: 80px;
    margin-left: 100px;
    margin-right: 100px;
    border-left: 70px;
    padding-top: 10px;
    padding-left: 50px;
    height: 10%;

  }

  h1 {
    font-weight: bold;
    font-size: xx-large;
    text-align: center;
    position: relative;
    right: 100px;

  }

  button {
    position: relative;
    left: 300px;
  }
</style>

<style type=text/javascript

></style>

<!--***รับค่าไอดีที่จะแก้ไข***-->
<?php
$sees_cus_id = $_SESSION['sees_cus_id'];

//query ข้อมูลจากตาราง
$sql = "SELECT * FROM customer WHERE cusid = '".$sees_cus_id."'";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . $conn->connect_error());
$row = mysqli_fetch_array($result);

?>

      <h1>แก้ไขข้อมูลสมาชิก</h1>
      <form id="form_edit" method="post" action="edit_db.php">
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">รหัสลูกค้า</label>
          <div class="col-sm-3">
            <input id="cusid" name="cusid"type="text" class="form-control" maxlength="5" value="<?php echo $sees_cus_id; ?>" readonly/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล *</label>
          <div class="col-sm-3">
            <input id="cusname" name="cusname" type="text" class="form-control txtOnly" maxlength="50" value="<?=$row['cusname'];?>"/>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์ *</label>
          <div class="col-sm-3">
            <input id="cusphone" name="cusphone"type="text" class="form-control number_only" minlength="10" maxlength="10" value="<?=$row['cusphone'];?>" />
          </div>
          กรอกหมายเลข 10 หลัก
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">ที่อยู่ *</label>
          <div class="col-sm-3">
            <textarea id="cusaddress" name="cusaddress" rows="3" cols="5" class="form-control" maxlength="100"><?=$row['cusaddress'];?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน *</label>
          <div class="col-sm-3">
            <input id="cusidcard" name="cusidcard" type="text" class="form-control  number_only" maxlength="13" value="<?=$row['cusidcard'];?>" readonly />
          </div>
          กรอกหมายเลข 13 หลัก
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">วันออกบัตร</label>
          <div class="col-sm-3">
            <input id="cuscateissue" name="cuscateissue" type="date" class="form-control datepicker-th" value="<?=$row['cuscateissue'];?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">วันหมดอายุบัตร</label>
          <div class="col-sm-3">
            <input id="cusdateexpiry" name="cusdateexpiry" type="date" class="form-control" value="<?=$row['cusdateexpiry'];?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">สถานที่ออกบัตร</label>
          <div class="col-sm-3">
            <input id="cusplace" name="cusplace" type="text" class="form-control" maxlength="50" value="<?=$row['cusplace'];?>"/>
          </div>
        </div>
        <div class="form-group row" >
          <label type="hidden" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-3">
              <input type="hidden" name="cusstatus" class="js-example-basic-single col-sm-2" value="0"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">วันเกิด</label>
          <div class="col-sm-3">
            <input id="cusbirthday" name="cusbirthday" type="date" class="form-control" value="<?=$row['cusbirthday'];?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">อีเมล</label>
          <div class="col-sm-3">
            <input id="cusemail" name="cusemail" type="text" class="form-control" maxlength="50" value="<?=$row['cusemail'];?>"/>
          </div>
          กรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">รหัสผ่าน *</label>
          <div class="col-sm-3">
            <input id="log_password" name="log_password" type="password" class="form-control only_char_num" maxlength="25" value="<?=$row['log_password'];?>"/>
          </div>
          กรอกตัวอักษร a-z และตัวเลข 0-9 อย่างน้อย8-16ตัวอักษร
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน *</label>
          <div class="col-sm-3">
            <input id="password_confirm" name="password_confirm"type="password" class="form-control" maxlength="25" value="<?=$row['password_confirm'];?>"/>
          </div>
          กรอกตัวอักษร a-z และตัวเลข 0-9 อย่างน้อย8-16ตัวอักษร
        </div>
        <div class="col-sm-4" align="right">
          <input id="submitbt" class="btn btn-success waves-effect waves-light" type="button" value="บันทึก"/>
          <input id="returnbt"  class="btn btn-warning waves-effect waves-light" type="button" value="คืนค่า"/>
          <input id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="ย้อนกลับ"/>
        </div>
        </div>
      </form>

    </div>
  </div>
  </div>
  </div>
</section>

<?php
include("8footer.php");
?>

<!---------------------------
-----------Script------------
---------------------------->

<script type="text/javascript">
  $(document).ready(function() {
    
    
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    $(".datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
			$(".datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});  

     		    $(".datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

		    $(".inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});

    function validateEmail($email) { //การกรอก email ให้ตรงตามรูปแบบ
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
        }

    $('.only_char_num').on('keypress', function (event) {
      var regex = new RegExp("^[a-zA-Z0-9]+$");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
        event.preventDefault();
        return false;
      }
    });

    $( ".txtOnly" ).keypress(function(e) {//username&password
                  var key = e.keyCode;
                  if (key >= 48 && key <= 57) {
                      e.preventDefault();
                  }
    });

    $('.number_only').bind('keyup paste', function(){ //phonenumber
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#cancelbt").click(function() {
      window.location.replace("member_index.php")
    });

    $("#returnbt").click(function() {
      window.location.replace("member_edit.php")
    });

    $("#submitbt").click(function() {
      var cusname = $("#cusname");
      var cusname_trim = $.trim(cusname.val());

      var cusphone = $("#cusphone");
      var cusphone_trim = $.trim(cusphone.val());

      var cusaddress = $("#cusaddress");
      var cusaddress_trim = $.trim(cusaddress.val());

      var cusidcard = $("#cusidcard");
      var cusidcard_trim = $.trim(cusidcard.val());

      var cusemail = $("#cusemail");
      var cusemail_trim = $.trim(cusemail.val());

      var log_password = $("#log_password");
      var log_password_trim = $.trim(log_password.val());

      var password_confirm = $("#password_confirm");
      var password_confirm_trim = $.trim(password_confirm.val());

      if (cusname_trim == "") {
        
        alert('กรุณากรอกชื่อ(Name)');
        cusname.focus();
        return false;

      } else if (cusphone_trim == "") {

        alert('กรุณากรอกเบอร์โทรศัพท์(Phone)');
        cusphone.focus();
        return false;

      }else if(cusphone_trim != "" && cusphone_trim.length < 10){
        
        alert('กรุณากรอกหมายเลขโทรศัพท์ให้ครบ 10 หลัก ');
        log_username.focus();
        return false;

      } else if (cusaddress_trim == "") {

        alert('กรุณากรอกที่อยู่(Address)');
        cusaddress.focus();
        return false;

      } else if (cusaddress_trim == "") {

        alert('กรุณากรอกที่อยู่(Address)');
        cusaddress.focus();
        return false;

      }else if(cusemail_trim != "" && !validateEmail(cusemail_trim)){

        alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
        cusemail.focus();
        return false;

      }else if(log_password_trim == ""){

        alert('กรุณากรอกรหัสผ่าน');
        log_password.focus();
        return false;

      }else if(log_password_trim != "" && log_password_trim.length < 8){
        alert('กรุณากรอกรหัสผ่าน อย่างน้อย 8 ตัวอักษร ');
        log_password.focus();
        return false;

      } else if (log_password_trim != "" && log_password_trim != password_confirm_trim) {

        alert('กรุณากรอก Password กับ Confirm Password ให้ตรงกัน');
        password_confirm.focus();
        return false;

      } else {

          if(confirm("ยืนยันการแก้ไขข้อมูล")){

          $('form').submit();
          
          }          
      }
    });
  });
</script>