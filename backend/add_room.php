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
    include("db_connect.php");
    include("hder.php");
    include("menu_navleft.php");
    ?>

    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM room WHERE roomnumber = '".$id."'";
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
                                    echo 'แก้ไขข้อมูลห้องพัก';
                                }else
                                    echo 'เพิ่มข้อมูลห้องพัก';
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
                                    $sql = "SELECT * FROM room WHERE roomnumber= '".$id."'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                ?>
                                    <form id="form_addroom" method="POST" action="db_query_room.php" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">หมายเลขห้อง *</label>
                                            <div class="col-sm-3">
                                                <input id="roomnumber" 
                                                <?php
                                                        if($id > 0){
                                                        ?> readonly
                                                        <?php
                                                         
                                                        }
                                                    ?>name="roomnumber" type="text" class="numberonly form-control" maxlength="3" value="<?php echo $row['roomnumber'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ราคาห้องพัก (บาท) *</label>
                                            <div class="col-sm-3">
                                                <input id="roomprice" name="roomprice" type="text" class="form-control number_only" maxlength="4" value="<?php echo $row['roomprice'];?>">
                                            </div>
                                        </div>
                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">สถานะ *</label>
                                            <div class="col-sm-10">
                                                <select id="roomstatus" name="roomstatus"class="js-example-basic-single col-sm-2">
                                                    <?php
                                                        foreach($roomstatus as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['roomstatus']){?>
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
                                            <label class="col-sm-2 col-form-label">รายละเอียดห้องพัก *</label>
                                            <div class="col-sm-3">
                                                <textarea id="roomdetail" name="roomdetail" rows="3" cols="5" class="form-control" maxlength="100"><?php echo $row['roomdetail'];?></textarea>
                                            </div>
                                        </div>             

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ประเภท</label>
                                            <div class="col-sm-10">
                                                <select id="roomcategory" name="roomcategory"class="js-example-basic-single col-sm-1">
                                                
                                                <?php
                                                        foreach($roomcategory as $k=>$v){?>
                                                            <option
                                                                <?php  
                                                                    if($k==$row['roomcategory']){?>
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
                                            <label class="col-sm-2 col-form-label">หน่วยค่าไฟล่าสุด(หน่วย) *</label>
                                            <div class="col-sm-2">
                                                <input id="elec_unit" name="elec_unit" type="text" step="1" class="numberonly form-control number_only" maxlength="5" value="<?php echo $row['elec_unit'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">หน่วยค่าน้ำล่าสุด(หน่วย) *</label>
                                            <div class="col-sm-2">
                                                <input id="water_unit" name="water_unit" type="text" step="1" class="numberonly form-control number_only" maxlength="5" value="<?php echo $row['water_unit'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">รูปภาพ</label>
                                            <div class="col-sm-3">
                                                <?php if($id>0){?>
                                                    <img src="upload/<?php echo $row['roomimage'];?>" width="150px"><br>
                                                    <br>
                                                <?php }else{
                                                }
                                                ?>
                                                <input id="file" name="roomimage" type="file" class="form-control-sm-3" value="<?php echo $row['roomimage'];?>">
                                             </div>
                                                 
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
        
        $('.number_only').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        $("#cancelbt").click(function(){
            window.location.replace("show_room.php")
        });
        
        $("#resetbt").click(function(){
            $('#form_addroom')[0].reset();
        });
        $('.numberonly').keyup(function(e)
                                {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }

        });

        $("#submitbt").click(function(){
            var roomnumber = $("#roomnumber");
            var roomnumber_trim = $.trim(roomnumber.val());

            

            var roomprice = $("#roomprice");
            var roomprice_trim = $.trim(roomprice.val());

            var roomstatus = $("#roomstatus");
            var roomstatus_trim = $.trim(roomstatus.val());

            var roomdetail = $("#roomdetail");
            var roomdetail_trim = $.trim(roomdetail.val());
            
            var roomcategory = $("#roomcategory");
            var roomcategory_trim = $.trim(roomcategory.val());

            var elec_unit = $("#elec_unit");
            var elec_unit_trim = $.trim(elec_unit.val());

            var water_unit = $("#water_unit");
            var water_unit_trim = $.trim(water_unit.val());
            
            var upload = $("#roomimage");
            var upload_trim = $.trim(upload.val());

            if(roomnumber_trim == ""){
            alert('กรุณากรอกหมายเลขห้อง');
            roomnumber.focus();
            return false;

            }else if(roomprice_trim == ""){

            alert('กรุณากรอกราคาห้อง');
            roomprice.focus();
            return false;
            
            }else if(roomstatus_trim == ""){

            alert('กรุณากรอกสถานะ');
            roomstatus.focus();
            return false;

            }else if(roomdetail_trim == ""){

            alert('กรุณากรอกรายละเอียด');
            roomdetail.focus();
            return false;

            }else if(roomcategory_trim == ""){

            alert('กรุณากรอกประเภทห้องพัก');
            roomcategory.focus();
            return false;

            }else if(elec_unit_trim == ""){

            alert('กรุณากรอกค่าไฟล่าสุด');
            elec_unit.focus();
            return false;

            }else if(water_unit_trim == ""){

            alert('กรุณากรอกค่าน้ำล่าสุด');
            water_unit.focus();
            return false;

            }else{
            
            var datastring = $("#form_addroom").serialize(); //serialize(); = get all data in form
                $.ajax({ 
                    type: "POST",
                    url: "check_room.php",
                    data: datastring,
                    success: function(data) {
                        
                    if(data > 0){
                        alert('หมายเลขห้องซ้ำ');
                        roomnumber.focus();
                    }else{
                        if(confirm("ยืนยันข้อมูล")){
                        $('form').submit();
                        
                        }
                    }

                    }
                });
            }});
    });
</script>