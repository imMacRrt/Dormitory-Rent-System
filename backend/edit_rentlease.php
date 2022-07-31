<?php
  include("include.php");
  date_default_timezone_set('Asia/Bangkok');
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
      <!-- Google font-->     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
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
    <!--<script type="text/javascript" src="Template/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>-->
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


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!--link type="text/css" rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="jquery-ui-1.12.1.custom/jqueryui_datepicker_thai_min.js?1"></script>
    <script-- type="text/javascript">

     $(document).ready(function(){
        $(".dateInput").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
        buttonText: "เลือกวันที่",
        buttonImage: "", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        altField:"#h_dateinput",
        altFormat: "yy-mm-dd",
        langTh:true,
        yearTh:true,
        numberOfMonths: 3,
        }); 

        $(".dateInput2").datepicker_thai({
        dateFormat: 'dd/mm/yy',
        changeMonth: false,
        changeYear: true,       
        numberOfMonths: 2,
        langTh:true,
        yearTh:true,
        }); 

        $(".inline_date").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
        minDate: 0,
        buttonText: "เลือกวันที่",
        changeMonth: true,
        changeYear: true,   
        langTh:true,
        yearTh: true,  
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",     
        });

     });
     </script-->
     <script type="text/javascript">
    function MM_goToURL() { //v3.0
      var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
      for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
    }
    </script>
    
    <link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="../jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">

     <script type="text/javascript">
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
    </script>

  </head>
  <body>

<?php  
    include("hder.php");
    include("menu_navleft.php");
?>
<?php
    
    $id = $_GET['id'];
    $sql = "SELECT a.* , b.* 
            FROM (rent a 
            LEFT JOIN customer b 
            ON a.cusid = b.cusid) 
            WHERE rentid = '".$id."' ";
                
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    
?>

            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="fa fa-user bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>ปรับปรุงสัญญาเช่า</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <form id="form_editlease" method="POST" action="db_query_editrentlease.php"> 
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>เลขที่เช่า</h6></label>                       
                        <sapn id="rentid" name="rentid" type="text" class="col-sm-2 col-form-label"><?php echo $id; ?><span>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>ชื่อลูกค้า</h6></label>
                        <span id="cusname" name="cusname" type="text" class="col-sm-2 col-form-label"><?php echo $row['cusname']; ?><span>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>วันที่เช่า</h6></label>   
                        <span id="rentdate" name="rentdate" type="text" class="col-sm-2 col-form-label">
                        
                        <?php  
                        echo date("d-m-", strtotime($row['rentdate'])).(date("Y", strtotime($row['rentdate']))+543);      
                        ?></span>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>เลขที่สัญญาเช่า</h6></label>                       
                        <input id="rentnumlease" name="rentnumlease" type="text" class="col-sm-2 col-form-label number_only" value="<?php echo $row['rentnumlease'];?>">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label " align="left" ><h6>วันที่ครบสัญญา</h6></label>   
                        <span id="rentdatelease dateInput" 
                        name="rentdatelease" type="text" 
                        class="col-sm-2 col-form-label">  
                        <?php 
                        $oneYearOn = date('d-m-',strtotime($row['rentdate']. " + 365 day")).(date('Y',strtotime($row['rentdate']. " + 365 day"))+543);
                        echo $oneYearOn;    
                        ?></span>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>หมายเลขห้องพัก</h6></label>   
                        <span id="roomnumber" name="roomnumber" type="text" class="col-sm-2 col-form-label" ><?php echo $row['roomnumber']; ?></span>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>จำนวนผู้เข้าพัก(คน)</h6></label>   
                        <select id="rentamount" name="rentamount" type="text" class="col-sm-1 col-form-label">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>    
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>ราคาห้องพัก(บาท)</h6></label>   
                        <input id="rentcost" name="rentcost" type="text" class="col-sm-2 col-form-label number_only" maxlength="4" value="<?php echo $row['rentcost']; ?>" />
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" align="left" ><h6>ค่าประกัน(บาท)</h6></label>   
                        <input id="rentinsurance" name="rentinsurance" type="text" class="col-sm-2 col-form-label number_only" maxlength="4" value="<?php echo $row['rentinsurance']; ?>" />
                    </div>
                                      
                        <div class="btn col-sm-6" align="center">
                            <input type="hidden" name="hid_id" value="<?php echo $id?>"/>
                            <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" >บันทึก</a>
                            <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" >คืนค่า</a>   
                            <a  id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="" >ยกเลิก</a>
                        </div>

                        <script  type="text/javascript"> 
                            $(document).ready(function(){

                            $('.number_only').bind('keyup paste', function(){ 
                            this.value = this.value.replace(/[^0-9]/g, '');
                            });    
                            
                            $("#cancelbt").click(function(){
                                window.location.replace("show_renting.php")
                            });
                            
                            $("#resetbt").click(function(){
                                $('#form_editlease')[0].reset();
                            });
                            
                            $("#confirmbt").click(function(){
                                var rentnumlease = $("#rentnumlease");
                                var rentnumlease_trim = $.trim(rentnumlease.val());

                                var rentamount = $("#rentamount");
                                var rentamount_trim = $.trim(rentamount.val());

                                var rentcost = $("#rentcost");
                                var rentcost_trim = $.trim(rentcost.val());

                                var rentinsurance = $("#rentinsurance");
                                var rentinsurance_trim = $.trim(rentinsurance.val());

                                if(rentnumlease_trim == ""){
                                alert('กรุณากรอกเลขที่สัญญาเช่า');
                                rentnumlease.focus();
                                return false;

                                }if(rentamount_trim == ""){
                                alert('กรุณากรอกจำนวนผู้เข้าพัก');
                                rentamount.focus();
                                return false;

                                }if(rentcost_trim == ""){
                                alert('กรุณากรอกราคาห้องพัก');
                                rentcost.focus();
                                return false;

                                }else if(rentinsurance_trim == ""){

                                alert('กรุณากรอกค่าประกัน');
                                rentinsurance.focus();
                                return false;
                                
                                }else{
                                
                                    if(confirm("ยืนยันการปรับปรุงสัญญาเช่า")){
                                    $('form').submit();
                                
                                }
                                }});
                            });
                        </script>
                        
                    </form>
            </div>
                    <!-- Page-body end -->

