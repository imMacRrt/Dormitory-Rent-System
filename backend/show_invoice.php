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
      
        $(".delinv").click(function(){
          var ind = $('.delinv').index(this);
          var id_val = $('.delinv').eq(ind).attr('id');
          if(confirm("ยืนยันการยกเลิกใบแจ้งหนี้")){
            window.location.replace("cancel_invoice.php?id="+id_val);
          }
        })
    });
    </script>
  </head>
  <body>

<?php  
    include("hder.php");
    include("menu_navleft.php");
    
    $search = $_POST['search'];
    if($search!=''){
      $where_condition .= " AND (a.invid LIKE '%".$search."%' OR b.cusname LIKE '%".$search."%'  OR c.roomnumber LIKE '%".$search."%' )";
      }
?>

<?php    
    $sql = "SELECT a.*, b.*, c.*
            FROM invoice a 
            LEFT JOIN customer b ON a.cusid = b.cusid
            LEFT JOIN rent c ON a.rentid = c.rentid 
            WHERE 1=1 ".$where_condition." 
            ORDER BY a.invid DESC ";
            
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
                                    <h5>แสดง/ยกเลิกใบแจ้งหนี้</h5>
                                    <span>หอพักกุลชญา</span>
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
                        <form id = form_search method = "POST" action = "show_invoice.php">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="input-group input-group-button">
                                <input name="search" type="text"  class="col-sm-2" placeholder="ค้นหา">
                                  
                                    <button class="btn btn-primary" type="submit" value=" ">ค้นหา</button>
                                  
                              </div>
                            </div>
                          </div>
                        </form>
                        <table id="demo-foo-filtering" class="table table-striped">
                              <thead align="center">
                                <tr style="font-weight: bolder; color: black; font-size:large;">
                                  <td align="right">รหัสใบแจ้งหนี้</td>
                                  <td align="left">ชื่อลูกค้า</td>
                                  <td align="center">วันที่ออกใบแจ้งหนี้</td>
                                  <td align="center">วันกำหนดชำระ</td>
                                  <td align="right">ราคารวม(บาท)</td>
                                  <td align="right">ค่าปรับ(บาท)</td>
                                  <td align="right">ยอดชำระ(บาท)</td>
                                  <td align="center">หมายเลขห้อง</td>
                                  <td align="center">สถานะ</td>                      
                                  <td></td>
                                  <td></td>                                                            
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                        
                                        foreach($result as $row) { ?>
                                
                                <tr align="right">
                                  <td><?php echo sprintf("%05d",$row['invid']);?> </td>
                                  <td align="left"><?php echo $row['cusname'];?> </td>
                                  <td><?php echo date('d-m-',strtotime($row['invdate']. " + 0 day")).(date('Y',strtotime($row['invdate']. " + 0 day"))+543);?></td>
                                  <td><?php echo date('d-m-',strtotime($row['invdatepayment']. " + 0 day")).(date('Y',strtotime($row['invdatepayment']. " + 0 day"))+543);?></td>
                                  <td align="right"><?php echo number_format($row['invprice']);?></td>
                                  <td align="right"><?php echo number_format($row['invfines']);?></td>
                                  <td align="right"><?php echo number_format($row['invamount']);?></td>
                                  <td><?php echo $row['roomnumber'];?></td>
                                  <td><?php echo $invstatus[$row['invstatus']];?></td>                        
                                  <td>
                                  <a id="invoice" class="btn btn-primary waves-effect waves-light" target="_blank"  value="" href="invoice.php?id=<?php echo $row["invid"];?>">ใบแจ้งหนี้</a>
                                  </td>
                                  <td>
                                  <?php if($row['invstatus'] == 1 ){                  
                                  ?><a id="receipt" class="btn btn-success waves-effect waves-light" target="_blank"  value="" href="receipt.php?id=<?php echo $row["invid"];?>">ใบเสร็จรับเงิน</a>                                  
                                  <?php }?>
                                  </td>
                                  <td>
                                  <?php 
                                  if($row['invstatus'] == 0){ ?>
                                    <a id="move" class="btn btn-info waves-effect waves-light"   value="" href="save_inv_receipt.php?id=<?php echo $row["invid"];?>">รับชำระ</a>
                                    <a id="<?php echo $row['invid'];?>" class="delinv btn btn-danger waves-effect waves-light" type="button"  value="" href="#">ยกเลิกใบแจ้งหนี้</a>
                                  <?php 
                                  }else{
                                  
                                  } ?>    
                                  </td>            
                                </tr>
                                <?php  } ?>
                              </tbody>
                            </table>
                        </div>
                      <!-- Page-body end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- Main-body end -->
