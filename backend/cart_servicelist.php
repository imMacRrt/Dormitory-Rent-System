<?php
  include("include.php");
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
      
        $(".cancelbt").click(function(){
          var ind = $('.cancelbt').index(this);
          var id_val = $('.cancelbt').eq(ind).attr('id');
          if(confirm("ยืนยันการล้างตะกร้า")){
            window.location.replace("clear_cart_service.php?id="+id_val);
          }
        })
    });
    </script>
  </head>
  <?php  
    include("hder.php");
    include("menu_navleft.php");
  ?>

<?php 
  
  if(isset($id) && $id > 0){
    $_SESSION['rent_invoice'] = $id;
  }
?>
<div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="fa fa-user bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>เลือก/ยกเลิกรายการบริการ</h5>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                
                <div class="pcoded-inner-content">
                  <div class="main-body">
                    <div class="page-wrapper">
                      <!-- Page-body start -->
                      <div class="page-body">
                            <table id="demo-foo-filtering" class="table table-striped">
                              <thead>
                                <tr style="font-weight: bolder; color: black; font-size:large;">
                                  <td align="right" width="90">รหัสรายการบริการ</td>
                                  <td align="left" width="300">รายการบริการ</td>
                                  <td align="right" width="90">ราคาต่อหน่วย(บาท)</td>
                                  <td></td>
                                </tr>
                              </thead>
                              <tbody>
                              <?php     
                                   $serviceid = $_GET['serviceid'];
                                  if(isset($serviceid) && $serviceid > 0){
                                    $_SESSION['loop_cart_service'][$serviceid]= $serviceid; //<--$serviceid = value
                                  }
                                    if(count($_SESSION['loop_cart_service'])>0){
                                      foreach($_SESSION['loop_cart_service'] as $k=>$v)
                                      {
                                      
                                        $sql = "SELECT * FROM servicelist WHERE serviceid = '".$v."' ";
                                        $result = $conn->query($sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                        <tr>   
                                        <td align="right"><?php echo $row["serviceid"];?></td>
                                        <td align="left"><?php echo $row["servicename"];?></td>
                                        <td align="right"><?php echo number_format($row["serviceprice"]);?></td>
                                        <td align="center"><a  id="delete" class="btn btn-danger waves-effect waves-light"   value="" href="del_in_servicelist.php?serviceid=<?php echo $row["serviceid"];?>">ลบ</td>
                                        </tr>
                                        <?php    
                                      }
                                    }else{?>

                                      <td colspan="6" align="center" style="font-weight:bolder; color:red;">ไม่มีข้อมูลรายการบริการ</td>
                                      <?php
                                    }
                                ?>
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <div class="btset" align="center">
                                <a  id="addrmbt" class="btn btn-primary waves-effect waves-light" type="button" value="" href="select_servicelist.php">เลือกเพิ่ม</a>
                                <?php   if(count($_SESSION['loop_cart_service'])==0){ }else{?>    
                                <a  id="sbmtrmbt" class="btn btn-success waves-effect waves-light" type="button" value="" href="save_invoice.php">ยืนยัน</a>
                                <a  id="<?php echo $_SESSION['loop_cart_service']; ?>" class="cancelbt btn btn-warning waves-effect waves-light" type="button" value="" href="#">ล้างตะกร้า</a>
                                <?php
                                      }
                                ?>
                            </div>
                        </div>
                      <!-- Page-body end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- Main-body end -->