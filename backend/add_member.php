
<?php
    include("config.php");
    include("db_connect.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admindek | Admin Template</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="Template/files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="Template/files/assets/icon/feather/css/feather.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="Template/files/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="Template/files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="Template/files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="Template/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="Template/files/assets/css/pages.css">

    <script type="text/javascript" src="Template/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="Template/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="Template/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="Template/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="Template/files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="Template/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <!-- waves js -->
    <script src="Template/files/assets/pages/waves/js/waves.min.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="Template/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="Template/files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- Custom js -->
    <script src="Template/files/assets/js/pcoded.min.js"></script>
    <script src="Template/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="Template/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="Template/files/assets/js/script.js"></script>
    <!--FOO Table js-->
    <script src="Template/files/assets/pages/foo-table/js/footable.min.js"></script>
    <script src="Template/files/assets/pages/foo-table/js/foo-table-custom.js"></script>

</head>

<style>
button {
    position: relative;
    left: 300px;
  }
</style>

<body>

    <?php
    include("hder.php");
    include("menu_navleft.php");
    ?>

    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM customer WHERE cusid = '".$id."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>
    

    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-clipboard bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>
                            <?php if($id>0){
                                echo 'แก้ไขข้อมูลสมาชิก';
                            }else{
                                echo 'เพิ่มข้อมูลสมาชิก';
                            }
                            ?></h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                    
                                    <form id="form_addmem" method="post" action="db_query_member.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">รหัสลูกค้า</label>
                                            <div class="col-sm-3">
                                                <input id="cusid" name="cusid" type="text" class="form-control" maxlength="50" value="<?php echo $id;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล *</label>
                                            <div class="col-sm-3">
                                                <input id="cusname" name="cusname" type="text" class="form-control txtOnly" maxlength="50" value="<?php echo $row['cusname'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ *</label>
                                            <div class="col-sm-3">
                                                <input id="cusphone" name="cusphone" type="text" class="form-control number_only"  maxlength="10" value="<?php echo $row['cusphone'];?>">         
                                            </div>
                                            กรอกหมายเลข 10 หลัก
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ที่อยู่ *</label>
                                            <div class="col-sm-3">
                                                <textarea id="cusaddress" name="cusaddress" rows="3" cols="5" class="form-control" maxlength="100" ><?php echo $row['cusaddress'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <?php if($id > 0){?>
                                                
                                                <?php }else{?>
                                            <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน *</label>
                                            <div class="col-sm-3">
                                                <input id="cusidcard" name="cusidcard"type="text" class="form-control number_only check_cususer"  maxlength="13" value="<?php echo $row['cusidcard'];?>">
                                            </div>
                                            กรอกหมายเลข 13 หลัก
                                        <?php } ?>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">สถานที่ออกบัตร</label>
                                            <div class="col-sm-3">
                                                <textarea id="cusplace" name="cusplace" rows="3" cols="5" class="form-control" maxlength="100" ><?php echo $row['cusplace'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">วันออกบัตร</label>
                                            <div class="col-sm-10">
                                                <input id="cuscateissue" name="cuscateissue"type="date" max="<?php echo date('Y-m-d') ?>" value="<?php echo $row['cuscateissue'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">วันหมดอายุ</label>
                                            <div class="col-sm-10">
                                                <input id="cusdateexpiry" name="cusdateexpiry"type="date"  value="<?php echo $row['cusdateexpiry'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">สถานะ</label>
                                            <div class="col-sm-10">
                                                <select id="cusstatus" name="cusstatus"class="js-example-basic-single col-sm-1">
                                                    <?php
                                                        foreach($cusstatus as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['cusstatus']){?>
                                                                    selected
                                                                    <?php   }   
                                                                ?>
                                                                value="<?php echo $k;?>"><?php echo $v;?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">วันเกิด</label>
                                            <div class="col-sm-10">
                                                <input id="cusbirthday" name="cusbirthday"type="date" value="<?php echo $row['cusbirthday'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-3">
                                                <input id="cusemail" name="cusemail"type="text" class="form-control" maxlength="50" value="<?php echo $row['cusemail'];?>">
                                            </div>
                                            กรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com
                                        </div>
                                        
                
                                        <div class="btset">
                                        <input name="hid_id"  type="hidden" value="<?php echo $id;?>" />
                                        <input id="submitbt" class="btn btn-success waves-effect waves-light" type="button" value="บันทึก"/>
                                        <input id="resetbt" class="btn btn-primary waves-effect waves-light" type="button" 
                                            <?php if($id>0){
                                                    echo 'value ="คืนค่า"';
                                                }else{
                                                    echo 'value ="ล้างค่า"';
                                                }
                                            ?>>
                                        <input id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="ยกเลิก"/>
                                        </div>        
                                </div>
                                    </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->


            </div>
        </div>
    </div>
    <!-- Page body end -->
    </div>
    </div>
    <!-- Main-body end -->
    <div id="styleSelector">

    </div>
    </div>
    </div>
    </div>
    </div>

    <script  type="text/javascript"> 
    $(document).ready(function(){

        (function( $ ){
        $.fn.check_usn_fn = function(username) {
        var datalist = $.ajax({ 
                type: "POST",   
                url: "check_cususer.php",
                data: { usn : username },
                async: false
        }).responseText;
            if(datalist>0){
            
            return datalist;
            }
            

        }; 
            

        })( jQuery );

        $('.check_cususer').bind('keyup', function(){
            var log_username = $("#cusidcard");
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
            window.location.replace("show_member.php")
        });
        
        $("#resetbt").click(function(){
            $('#form_addmem')[0].reset();
        });
        
        $("#submitbt").click(function(){

            var cusid = $("#cusid");
            var cusid_trim = $.trim(cusid.val());
            
            var cusname = $("#cusname");
            var cusname_trim = $.trim(cusname.val());

            var cusphone = $("#cusphone");
            var cusphone_trim = $.trim(cusphone.val());

            var cusaddress = $("#cusaddress");
            var cusaddress_trim = $.trim(cusaddress.val());

            var cusidcard = $("#cusidcard");
            var cusidcard_trim = $.trim(cusidcard.val());
            
            var cusbirthday = $("#cusbirthday");
            var cusbirthday_trim = $.trim(cusbirthday.val());
            
            var cusemail = $("#cusemail");
            var cusemail_trim = $.trim(cusemail.val());

            

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

            }else if(cusid_trim ==""){
                
                if(cusidcard_trim == ""){
                    alert('กรุณากรอกหมายเลขบัตรประชาชน');
                    cusidcard.focus();
                    return false;
                
                }else if(cusidcard_trim.length < 13){
                    alert('กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก ');
                    cusidcard.focus();
                    return false;
                }else if(cusemail_trim != "" && !validateEmail(cusemail_trim)){

                    alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
                    cusemail.focus();
                    return false;
                }else{

                    var log_username = $("#cusidcard");
                    var log_username_trim = $.trim(log_username.val());
                    $usn = $('#my_div').check_usn_fn(log_username_trim);
                    if($usn>0){
                    alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
                    }else{

                        if(confirm("ยืนยันข้อมูลสมาชิก")){
                            $('form').submit();               
                        }
                    }
                }

            }else if(cusemail_trim != "" && !validateEmail(cusemail_trim)){

            alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
            cusemail.focus();
            return false;

        

            }else{

                var log_username = $("#cusidcard");
                var log_username_trim = $.trim(log_username.val());
                $usn = $('#my_div').check_usn_fn(log_username_trim);
                if($usn>0){
                alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
                }else{
            
                    if(confirm("ยืนยันข้อมูลสมาชิก")){
                        $('form').submit();               
                    }
                }
            }
        });
    });
</script>

    