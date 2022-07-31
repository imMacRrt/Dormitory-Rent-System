<?php
    include("doctype_html.php");
    include("hder.php");
?>

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



<h1>สมัครสมาชิก</h1>

<form id="form_register" method="post" action="db_register.php">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล *</label>
    <div class="col-sm-3">
      <input id="cusname" name="cusname" type="text" class="form-control txtOnly" maxlength="50">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์ *</label>
    <div class="col-sm-3">
      <input id="cusphone" name="cusphone"type="text" class="form-control number_only" minlength="10" maxlength="10" >
    </div>
    กรอกหมายเลข 10 หลัก
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">ที่อยู่ *</label>
    <div class="col-sm-3">
      <textarea id="cusaddress" name="cusaddress" rows="3" cols="5" class="form-control" maxlength="100"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน *</label>
    <div class="col-sm-3">
      <input id="cusidcard" name="cusidcard" type="text" class="form-control number_only" minlength="13" maxlength="13">
    </div>
    กรอกหมายเลข 13 หลัก
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">วันออกบัตร</label>
    <div class="col-sm-3">
      <input id="cuscateissue" name="cuscateissue" type="date" max="<?php echo date('Y-m-d');?>" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">วันหมดอายุบัตร</label>
    <div class="col-sm-3">
      <input id="cusdateexpiry" name="cusdateexpiry" type="date" class="form-control" value="">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">สถานที่ออกบัตร</label>
    <div class="col-sm-3">
      <input id="cusplace" name="cusplace" type="text" class="form-control" maxlength="100">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">วันเกิด</label>
    <div class="col-sm-3">
      <input id="cusbirthday" name="cusbirthday" type="date" class="form-control" value="">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">E-mail</label>
    <div class="col-sm-3">
      <input id="cusemail" name="cusemail" type="text" class="form-control" maxlength="50">
    </div>
    กรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">ชื่อผู้ใช้ *</label>
    <div class="col-sm-3">
      <input id="log_username" name="log_username" type="text" class="form-control only_char_num check_username" minlength="5" maxlength="25">
    </div>
    กรอกตัวอักษร a-z และตัวเลข 0-9 อย่างน้อย 5 ตัวอักษร
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">รหัสผ่าน *</label>
    <div class="col-sm-3">
      <input id="log_password" name="log_password" type="password" class="form-control only_char_num" minlength="8" maxlength="25">
    </div>
    กรอกตัวอักษร a-z และตัวเลข 0-9 อย่างน้อย8-16ตัวอักษร
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน *</label>
    <div class="col-sm-3">
      <input id="password_confirm" name="password_confirm"type="password" class="form-control" minlength="8" maxlength="25">
    </div>
    กรอกตัวอักษร a-z และตัวเลข 0-9 อย่างน้อย8-16ตัวอักษร
  </div>
  <div class="form-group row" >
    <label type="hidden" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-3">
        <input type="hidden" name="cusstatus" class="js-example-basic-single col-sm-2" value="0"/>
    </div>
  </div>
  <div class="col-sm-4" align="right">
    <input id="submitbt" class="btn btn-success waves-effect waves-light" type="button" value="บันทึก"/>
    <input id="resetbt"  class="btn btn-warning waves-effect waves-light" type="button" value="ล้างค่า"/>
    <input id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="ย้อนกลับ"/>
  </div>
</form>

<script  type="text/javascript"> 
    $(document).ready(function(){

      (function( $ ){
            $.fn.check_usn_fn = function(username) {
            var datalist = $.ajax({ 
                    type: "POST",   
                    url: "check_username.php",
                    data: { usn : username },
                    async: false
            }).responseText;
              if(datalist>0){
                
                return datalist;
              }
              

            }; 
            

      })( jQuery );

      $('.check_username').bind('keyup', function(){
            var log_username = $("#log_username");
            var log_username_trim = $.trim(log_username.val());
            $usn = $('#my_div').check_usn_fn(log_username_trim);
            if($usn>0){
              alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
            }
            
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
        
        $("#cancelbt").click(function(){
            window.location.replace("index.php")
        });
        
        $("#resetbt").click(function(){
            $('#form_register')[0].reset();
        });
        
        $("#submitbt").click(function(){
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

            var log_username = $("#log_username");
            var log_username_trim = $.trim(log_username.val());

            var log_password = $("#log_password");
            var log_password_trim = $.trim(log_password.val());

            var password_confirm = $("#password_confirm");
            var password_confirm_trim = $.trim(password_confirm.val());

            if(cusname_trim == ""){
            alert('กรุณากรอกชื่อ-นามสกุล');
            cusname.focus();
            return false;

            }else if(cusphone_trim == ""){

            alert('กรุณากรอกเบอร์โทรศัพท์');
            cusphone.focus();
            return false;

            }else if(cusphone_trim != "" && cusphone_trim.length < 10){
                  alert('กรุณากรอกหมายเลขโทรศัพท์ให้ครบ 10 หลัก ');
                  log_username.focus();
                  return false;
            
            }else if(cusaddress_trim == ""){

            alert('กรุณากรอกที่อยู่');
            cusaddress.focus();
            return false;

            }else if(cusidcard_trim == ""){

            alert('กรุณากรอกเลขประจำตัวประชาชน');
            cusidcard.focus();
            return false;
            
            }else if(cusidcard_trim != "" && cusidcard_trim.length < 13){
            
              alert('กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก ');
            cusidcard.focus();
            return false;
            

            }else if(cusemail_trim != "" && !validateEmail(cusemail_trim)){

            alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
            cusemail.focus();
            return false;

            }else if(log_username_trim == ""){

            alert('กรุณากรอกชื่อผู้ใช้');
            log_username.focus();
            return false;

            }else if(log_username_trim != "" && log_username_trim.length < 5){
                  alert('กรุณากรอกชื่อผู้ใช้ อย่างน้อย 5 ตัวอักษร ');
                  log_username.focus();
                  return false;

            }else if(log_password_trim == ""){

            alert('กรุณากรอกรหัสผ่าน');
            log_password.focus();
            return false;

            }else if(log_password_trim != "" && log_password_trim.length < 8){
                  alert('กรุณากรอกรหัสผ่าน อย่างน้อย 8 ตัวอักษร ');
                  log_password.focus();
                  return false;

            }else if(log_password_trim != "" && log_password_trim != password_confirm_trim){

            alert('กรุณากรอกรหัสผ่านให้ตรงกัน');
            password_confirm.focus();
            return false;

            }else{

              var log_username = $("#log_username");
              var log_username_trim = $.trim(log_username.val());
              var usn =  $('#my_div').check_usn_fn(log_username_trim);

              if($usn>0){
                        alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
              }else{
                        if(confirm("ยืนยันการสมัครสมาชิก")){

                        $('form').submit();
                        
                        }
              }
            
            }});
    });
</script>


<?php
    include("footer.php");
?>    

