<?php  
    include("config.php");
    include("db_connect.php");
    $id = $_GET['id'];
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

<?php
include("hder.php");
include("menu_navleft.php");
?>


    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-clipboard bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>แก้ไขข้อมูลผู้ใช้</h5>

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
                                    $sql = "SELECT * FROM employee WHERE emid = '".$_SESSION['sees_em_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                ?>
                                    <form id="form_editinfo" method="post" action="db_query_emp.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">รหัสพนักงาน</label>
                                            <div class="col-sm-1">
                                                <input id="emid" name="emid" type="text" class="form-control" maxlength="5" value="<?php echo $_SESSION['sees_em_id'];?>" readonly/>
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
                                            <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน</label>
                                            <div class="col-sm-3">
                                                <span class="col-sm-2"><?php echo $row['emcard'];?></span>
                                            </div>
                                        </div>
                                        <?php if($_SESSION["sess_em_degree"] == 1){?>
                                        <?php }else{?>
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
                                        <?php }?>
                                        
                                        <?php if($_SESSION["sess_em_degree"] == 1){?>
                                        <?php }else{?>
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
                                        <?php }?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">E-mail *</label>
                                            <div class="col-sm-3">
                                                <input id="ememail" name="ememail" type="text" class="form-control" maxlength="50" value="<?php echo $row['ememail'];?>">
                                            </div>
                                            กรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com
                                        </div>
                                        
                                        <?php if($_SESSION["sess_em_degree"] == 1){?>
                                        <?php }else{?>
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
                                        <?php }?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">รหัสผ่าน *</label>
                                            <div class="col-sm-3">
                                                <input id="empassword" name="empassword" type="password" class="form-control only_char_num" maxlength="25" value="<?php echo $row['empassword'];?>">
                                            </div>
                                            กรอกตัวอักษร A-Z และ 0-9 อย่างน้อย 5 ตัวอักษร
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน *</label>
                                            <div class="col-sm-3">
                                                <input id="password_confirm" name="password_confirm" type="password" class="form-control" maxlength="25" value="<?=$row['password_confirm'];?>">
                                            </div>
                                            กรอกรหัสผ่านให้ตรงกัน
                                        </div>
                                    
                                        <div class="btn col-sm-12" align="center">
                                        <input name="hid_page"  type="hidden" value="1" />
                                        <input name="hid_id"  type="hidden" value="<?php echo $id;?>" />
                                        <input id="submitbt" class="btn btn-success waves-effect waves-light" type="button" value="บันทึก"/>
                                        <input id="resetbt" class="btn btn-primary waves-effect waves-light" type="button" value="คืนค่า"/>
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
            $('#form_editinfo')[0].reset();
        });
        
        $("#submitbt").click(function(){
            var emname = $("#emname");
            var emname_trim = $.trim(emname.val());

            var emaddress = $("#emaddress");
            var emaddress_trim = $.trim(emaddress.val());

            var emphone = $("#emphone");
            var emphone_trim = $.trim(emphone.val());

            var emstatus = $("#emstatus");
            var emstatus_trim = $.trim(emstatus.val());
            
            var ememail = $("#ememail");
            var ememail_trim = $.trim(ememail.val());

            
            var empassword = $("#empassword");
            var empassword_trim = $.trim(empassword.val());

            var password_confirm = $("#password_confirm");
            var password_confirm_trim = $.trim(password_confirm.val());
            

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
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ครบ 10 หลัก ');
                emphone.focus();
                return false;

            }else if(ememail_trim == ""){
                alert('กรุณากรอกอีเมล');
                ememail.focus();
                return false;

            }else if(ememail_trim != "" && !validateEmail(ememail_trim)){

                alert('กรุณากรอกอีเมลให้ถูกต้องตามรูปแบบ เช่น gg@gmail.com');
                ememail.focus();
                return false;

            }else if(empassword_trim == ""){
                alert('กรุณากรอกรหัสผ่าน');
                empassword.focus();
                return false;

            }else if(empassword_trim != "" && empassword_trim.length < 5){
                alert('กรุณากรอกรหัสผ่าน อย่างน้อย 5 ตัวอักษร ');
                empassword.focus();
                return false;

            }else if(password_confirm_trim == ""){
                alert('กรุณากรอกรหัสผ่านให้ตรงกัน');
                emdegree.focus();
                return false;
        
            }else{
                
                if(confirm("ยืนยันข้อมูล")){

                $('form').submit();
                
                }
              
            
            }});
    });
</script>