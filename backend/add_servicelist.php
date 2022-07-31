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
        $sql = "SELECT * FROM servicelist WHERE serviceid = '".$id."'";
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
                                    echo 'แก้ไขรายการบริการ';
                                }else
                                    echo 'เพิ่มรายการบริการ';
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
                                    $sql = "SELECT * FROM servicelist WHERE serviceid = '".$id."'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                ?>
                                    <form id="form_addservicelist" method="post" action="db_query_service.php">
                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">รหัสรายการ<br>บิรการ</label>
                                            <div class="col-sm-2">
                                                <input id="serviceid" name="serviceid" type="text" class="form-control" maxlength="4" value="<?php echo $id;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">รายการบริการ *</label>
                                            <div class="col-sm-10">
                                            <input id="servicename" name="servicename" type="text" class="col-sm-2 form-control txtOnly" maxlength="50" value="<?php echo $row['servicename'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">ราคาต่อหน่วย *</label>
                                            <div class="col-sm-2">
                                            <input id="serviceprice" name="serviceprice" type="text" class="form-control number_only" maxlength="4" value="<?php echo $row['serviceprice'];?>">
                                            </div>
                                            บาท
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">หน่วยนับ *</label>
                                            <div class="col-sm-2">
                                                <input id="serviceunit" name="serviceunit" type="text" class="form-control txtOnly"  maxlength="20" value="<?php echo $row['serviceunit'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">ประเภท *</label>
                                            <div class="col-sm-10">
                                                <select id="servicecategory" name="servicecategory"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($servicecategory as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['servicecategory']){?>
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
                                            <label class="col-sm-1 col-form-label">สถานะ</label>
                                            <div class="col-sm-10">
                                                <select id="servicestatus" name="servicestatus"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($servicestatus as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['servicestatus']){?>
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
                                        <input name="hid_id"  type="hidden" value="<?php echo $id;?>" />
                                        <input id="submitbt" class="btn btn-success waves-effect waves-light" type="button" value="บันทึก"/>
                                        <input id="resetbt" class="btn btn-primary waves-effect waves-light" type="button" <?php if($id>0){
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
            window.location.replace("show_servicelist.php")
        });
        
        $("#resetbt").click(function(){
            $('#form_addservicelist')[0].reset();
        });
        
        $("#submitbt").click(function(){
            var servicename = $("#servicename");
            var servicename_trim = $.trim(servicename.val());

            var serviceprice = $("#serviceprice");
            var serviceprice_trim = $.trim(serviceprice.val());

            var serviceunit = $("#serviceunit");
            var serviceunit_trim = $.trim(serviceunit.val());

            var servicecategory = $("#servicecategory");
            var servicecategory_trim = $.trim(servicecategory.val());

            var servicestatus = $("#servicestatus");
            var servicestatus_trim = $.trim(servicestatus.val());
            

            if(servicename_trim == ""){
            alert('กรุณากรอกชื่อรายการบริการ');
            emname.focus();
            return false;

            }else if(serviceprice_trim == ""){

            alert('กรุณากรอกราคาต่อหน่วย');
            emaddress.focus();
            return false;
            
            }else if(serviceunit_trim == ""){

            alert('กรุณากรอกหน่วยนับ');
            emcard.focus();
            return false;

            }else if(servicecategory_trim == ""){

            alert('กรุณากรอกประเภท');
            emposition.focus();
            return false;

            }else if(servicestatus_trim == ""){

            alert('กรุณากรอกสถานะ');
            emstatus.focus();
            return false;
            
            }else{
            
                if(confirm("ยืนยันข้อมูลรายการบริการ")){
                $('form').submit();

                
            }
            }});
    });
</script>