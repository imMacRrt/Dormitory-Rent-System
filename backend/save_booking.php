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
    <script  type="text/javascript"> 
    $(document).ready(function(){
      $("#cusid").change(function(){
        var datastring = $("#form_savebooking").serialize(); //serialize(); = get all data in form
        $.ajax({ 
            type: "POST",
            url: "check_cus.php",
            data: datastring,
            success: function(data) {
              var sp = data.split("|");
              $("#cusname").val(sp[0]);
              $("#cusphone").val(sp[1]);
              $("#cusemail").val(sp[2]);
            }
        });
      });
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
    $sql = "SELECT * FROM customer WHERE cusid = '".$id."' ";
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
                                    <h5>บันทึกการจอง</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!--[custom info] start-->
                <form id="form_savebooking" method="post" action="db_query_savebooking.php">
                    <div class="form-group row">
                      <label class="col-sm-1 col-form-label " align="right"><h6>รหัสลูกค้า</h6></label>
                      <span id="cusidA" name="cusidA"  class="col-sm-2 col-form-label"><?php echo $row['cusid'] ;?></span>
                      <input id="cusid" name="cusid"type="hidden" class="col-sm-2 col-form-label"  value="<?php echo $row['cusid'] ;?>" readonly>

                      <label class="col-sm-1 col-form-label" align="right"><h6>ชื่อลูกค้า</h6></label>
                      
                      <span id="cusname" name="cusname"type="text" class="col-sm-2 col-form-label" maxlength="50" ><?php echo $row['cusname'] ;?></span>
                      <a id="selectcus" class=" btn btn-primary waves-effect waves-light" align="center" type="button" value="" href="select_cus.php">เลือกลูกค้า</a>
                    </div>                      
                    <div class="form-group row">
                      <label class="col-sm-1" align="right" ><h6>อีเมล</h6></label>
                          <!--div class="col-sm-6"-->
                          <span id="cusemail" name="cusemail" type="text" class="col-sm-2 col-form-label" maxlength="50"><?php echo $row['cusemail'] ;?></span>
                          <!--/!--div-->
                          <label class="col-sm-1 col-form-label" align="right"><h6>เบอร์โทรศัพท์</h6></label>
                          
                          <span id="cusphone" name="cusphone"type="text" class="col-sm-2 col-form-label" maxlength="10"><?php echo $row['cusphone'] ;?></span>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-1" align="right" ><h6>วันที่จอง</h6></label>
                      <span id="cusemailA" name="cusemailA" type="text" class="col-sm-2 col-form-label" ><?php echo date('d-m-').(date('Y'. " + 0 day")+543);?></span>
                      <input id="bookdate" name="bookdate"  type ="hidden" class="col-sm-2 col-form-label" value="<?php echo date('Y-m-d');?>" readonly>
                      <!--/!--div-->
                      <label class="col-sm-1 col-form-label" align="right"><h6>วันกำหนดเข้าพัก</h6></label>
                      
                          <input id="booklistdate" name="booklistdate"type="date" class="col-sm-2 col-form-label" min="<?php echo date('Y-m-d')?>" >
                    </div>                  
                
                <!--[custom info] end-->
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                        <!-- Page-body start -->
                                <div class="page-body">
                                    <table id="demo-foo-filtering" class="table table-striped">
                                        <thead align="left">
                                            <tr>
                                            <th>รูป</th>
                                            <th>หมายเลขห้อง</th>
                                            <th align="left" width="300">รายละเอียดห้องพัก</th>
                                            <th width="150">ราคา</th>
                                            <th width="150">เงินมัดจำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $roomnumber = $_GET['roomnumber'];
                                                if(isset($roomnumber) && $roomnumber > 0){
                                                    $_SESSION['admin_cart'][$roomnumber]= $roomnumber;
                                                }

                                                foreach($_SESSION['admin_cart'] as $k=>$v)
                                                {
                                                
                                                    $sql = "SELECT * FROM room WHERE roomnumber = '".$v."' ";
                                                    $result = $conn->query($sql);
                                                    $row = mysqli_fetch_array($result);                                                  
                                            ?>
                                            <tr> 
                                            <td width="150"><img src="../backend/upload/<?php echo $row['roomimage'];?>" width="150px"></td>
                                            <td align="left" width="200"><?php echo  $row["roomnumber"];?></td>
                                            <td width="200"><?php echo  $row["roomdetail"];?></td>
                                            <td><?php echo  number_format($row["roomprice"]);
                                                            $total1 +=$row["roomprice"];?></td>
                                            <td><?php echo number_format("1500");
                                                            $total2 += 1500; ?></td>
                                            </tr>
                                            <?php    
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"> </td>
                                                <td style="font-weight: bold;" align="right"> รวม(บาท) </td>
                                                <td style="font-weight: bold;"> <?php echo number_format($total1); ?> </td>
                                                <td style="font-weight: bold;"> <?php echo number_format($total2); ?> </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        <br>
                        <br>
                        <div class="btn col-sm-12" align="center">
                        <input type="hidden" name="bookprice" value="<?php echo $total1?>" >
                        <input type="hidden" name="bookmoney" value="<?php echo $total2?>" >
                        <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" href="#">บันทึก</a>
                        <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" href="#">ล้างค่า</a>   
                        <a  id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="" href="clear_cart.php">ยกเลิก</a>
                        </div>
                        <script  type="text/javascript"> 
                        $(document).ready(function(){
                            
                            $("#resetbt").click(function(){
                                $('#form_savebooking')[0].reset();
                            });

                            $("#cancelbt").click(function(){
                                window.location.replace("select_room.php")
                            });
                            
                            $("#confirmbt").click(function(){  
                                var booklistdate = $("#booklistdate");
                                var booklistdate_trim = $.trim(booklistdate.val());

                                var cusid = $("#cusid");
                                var cusid_trim = $.trim(cusid.val());
                                
                                if(cusid_trim == ""){
                                alert('กรุณาเลือกลูกค้า');
                                cusid.focus();
                                return false;
                                }
                                
                                if(booklistdate_trim == ""){
                                alert('กรุณากำหนดวันเข้าพัก');
                                booklistdate.focus();
                                return false;
                                
                                }else{
                                    
                                    if(confirm("ยืนยันการจองห้องพัก")){
                                    $('form').submit();

                                    
                                }
                                }});
                        });
                        </script>
                </form>
            </div>
                    <!-- Page-body end -->
