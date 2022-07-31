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
        $sql = "SELECT * FROM employee WHERE emid = '".$id."'";
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
                                        echo 'แก้ไขข้อมูลพนักงาน';
                                    }else{
                                        echo 'เพิ่มข้อมูลพนักงาน';
                                    }
                                ?>
                            </h5>
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
                                <?php 
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM employee WHERE emid= '".$id."'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                ?>
                                    <form id="form_addemp" method="post" action="db_query_emp.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">รหัสพนักงาน</label>
                                            <div class="col-sm-3">
                                                <input id="emid" name="emid" type="text" class="form-control" maxlength="50" value="<?php echo $id;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล *</label>
                                            <div class="col-sm-3">
                                                <input id="emname" name="emname" type="text" class="form-control txtOnly" maxlength="50" value="<?php echo $row['emname'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ที่อยู่ *</label>
                                            <div class="col-sm-3">
                                                <textarea id="emaddress" name="emaddress" rows="3" cols="5" class="form-control" maxlength="100"><?php echo $row['emaddress'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์ *</label>
                                            <div class="col-sm-3">
                                                <input id="emphone" name="emphone" type="text" class="form-control number_only check_username"  maxlength="10" value="<?php echo $row['emphone'];?>">
                                            </div>
                                            กรอกหมายเลข 10 หลัก
                                        </div>

                                        <div class="form-group row">
                                            <?php if($id > 0){?>
                                                
                                            <?php }else{?>
                                            <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน *</label>
                                            <div class="col-sm-3">
                                                <input id="emcard" name="emcard" type="text" class="form-control number_only check_emuser"  maxlength="13">
                                            </div>
                                            กรอกหมายเลข 13 หลัก
                                            <?php } ?>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ส่วนงาน</label>
                                            <div class="col-sm-10">
                                                <select id="emposition" name="emposition"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($emposition as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['emposition']){?>
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
                                            <label class="col-sm-2 col-form-label">สถานะ</label>
                                            <div class="col-sm-10">
                                                <select id="emstatus" name="emstatus"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($emstatus as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['emstatus']){?>
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
                                            <label class="col-sm-2 col-form-label">E-mail *</label>
                                            <div class="col-sm-3">
                                                <input id="ememail" name="ememail" type="text" class="form-control" maxlength="50" value="<?php echo $row['ememail'];?>">
                                            </div>
                                            กรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ระดับ</label>
                                            <div class="col-sm-10">
                                                <select id="emdegree" name="emdegree"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($emdegree as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['emdegree']){?>
                                                                    selected
                                                                    <?php   }   
                                                                ?>
                                                                value="<?php echo $k;?>"><?php echo $v;?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="btset">
                                        <input name="hid_page"  type="hidden" value="2" />
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
                url: "check_emuser.php",
                data: { usn : username },
                async: false
        }).responseText;
            if(datalist>0){
            
            return datalist;
            }
            

        }; 
            

        })( jQuery );

        $('.check_emuser').bind('keyup', function(){
            var log_username = $("#emcard");
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
            window.location.replace("show_emp.php")
        });
        
        $("#resetbt").click(function(){
            $('#form_addemp')[0].reset();
        });
        
        
        $("#submitbt").click(function(){
            var emid = $("#emid");
            var emid_trim = $.trim(emid.val());
            
            var emname = $("#emname");
            var emname_trim = $.trim(emname.val());

            var emaddress = $("#emaddress");
            var emaddress_trim = $.trim(emaddress.val());

            var emphone = $("#emphone");
            var emphone_trim = $.trim(emphone.val());
            
            var emcard = $("#emcard");
            var emcard_trim = $.trim(emcard.val());
            
            var ememail = $("#ememail");
            var ememail_trim = $.trim(ememail.val());
            
            var emdegree = $("#emdegree");
            var emdegree_trim = $.trim(emdegree.val());
            

            if(emname_trim == ""){
            alert('กรุณากรอกชื่อ-นามสกุล');
            emname.focus();
            return false;

            }else if(emaddress_trim == ""){

            alert('กรุณากรอกที่อยู่');
            emaddress.focus();
            return false;

            }else if(emphone_trim == ""){

            alert('กรุณากรอกเบอร์โทรศัพท์');
            emphone.focus();
            return false;

            }else if(emphone_trim != "" && emphone_trim.length < 10){
                
                alert('กรุณากรอกเบอร์โทรศัพท์ให้ครบ 10 หลัก ');
                emphone.focus();
            return false;
            
            }else if(emid_trim ==""){
                
                if(emcard_trim == ""){
                    alert('กรุณากรอกหมายเลขบัตรประชาชน');
                    emcard.focus();
                    return false;
                
                }else if(emcard_trim.length < 13){
                    alert('กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก ');
                    emcard.focus();
                    return false;
                }else if(ememail_trim == ""){
                    alert('กรุณากรอกอีเมล');
                    ememail.focus();
                    return false;

                }else if(ememail_trim != "" && !validateEmail(ememail_trim)){
                    alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
                    ememail.focus();
                    return false;

                }else if(emdegree_trim == ""){
                    alert('กรุณากรอกระดับ');
                    emdegree.focus();
                    return false;
                }else{
                    var log_username = $("#emcard");
                    var log_username_trim = $.trim(log_username.val());
                    $usn = $('#my_div').check_usn_fn(log_username_trim);
                    if($usn>0){
                    alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
                    }else{

                        if(confirm("ยืนยันข้อมูลพนักงาน")){
                            $('form').submit();
                        }             
                    }
                }            

            }else if(ememail_trim == ""){

                alert('กรุณากรอกอีเมล');
                ememail.focus();
                return false;

            }else if(ememail_trim != "" && !validateEmail(ememail_trim)){

                alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
                ememail.focus();
                return false;

            }else if(emdegree_trim == ""){

                alert('กรุณากรอกระดับ');
                emdegree.focus();
                return false;
            }else{

                var log_username = $("#emcard");
                var log_username_trim = $.trim(log_username.val());
                $usn = $('#my_div').check_usn_fn(log_username_trim);
                if($usn>0){
                alert("มีชื่อผู้ใช้นี้แล้ว กรุณากรอกใหม่อีกครั้ง");
                }else{
            
                    if(confirm("ยืนยันข้อมูลพนักงาน")){
                        $('form').submit();
                    }             
                }
            }
        });
    });
</script>