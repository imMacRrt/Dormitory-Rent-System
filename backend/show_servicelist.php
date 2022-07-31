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
    <!--FOO Table js
<script src="Template/files/assets/pages/foo-table/js/footable.min.js"></script>
<script src="Template/files/assets/pages/foo-table/js/foo-table-custom.js"></script> -->

<script  type="text/javascript"> 
    $(document).ready(function(){
      
        $(".delserv").click(function(){
          var ind = $('.delserv').index(this);
          var id_val = $('.delserv').eq(ind).attr('id');
          if(confirm("ยืนยันการลบรายการบริการ")){
            window.location.replace("del_serv.php?id="+id_val);
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
      $where_condition .= " AND (serviceid LIKE '%".$search."%' OR servicename LIKE '%".$search."%' OR serviceprice LIKE '%".$search."%')";
      }  
?>

<?php
    $sql = "SELECT * FROM servicelist WHERE 1=1" .$where_condition." ORDER BY serviceid DESC "  ;
    $result = mysqli_query($conn, $sql);
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
                                    <h5>แสดง/ลบรายการบริการ</h5>
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
                        <!-- Filtering Foo-table card start -->
                        <form id = form_search method = "POST" action = "show_servicelist.php">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="input-group input-group-button">
                                <input name="search" type="text"  class="col-sm-2" placeholder="ค้นหา">
                                  
                                    <button class="btn btn-primary" type="submit" value=" ">ค้นหา</button>
                                  
                              </div>
                            </div>
                          </div>
                        </form>
                          <div class ="col-sm-11" align="right">
                            <a id="addmem" class="btn btn-primary waves-effect waves-light" align="right" type="button" value="" href="add_servicelist.php">เพิ่ม</a>
                          </div>
                            <table id="demo-foo-filtering" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>รหัสรายการบริการ</th>
                                  <th align="left">รายการบริการ</th>
                                  <th align="right" width="50">ราคาต่อหน่วย(บาท)</th> 
                                  <th align="left">หน่วยนับ</th>
                                  <th align="left">ประเภท</th>
                                  <th align="left">สถานะ</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody align="center">
                                  <?php
                                        foreach($result as $row){ 
                                  ?>
                                        
                                
                                <tr>
                                  <td><?php echo $row['serviceid'];?> </td>
                                  <td align="left"><?php echo $row['servicename'];?></td>
                                  <td align="right"><?php echo number_format($row['serviceprice']);?></td>
                                  <td align="left"><?php echo $row['serviceunit'];?></td>
                                  <td align="left"><?php echo $servicecategory[$row['servicecategory']];?></td>
                                  <td align="left"><?php echo $servicestatus[$row['servicestatus']];?> </td>
                                  <td>                               
                                  <a id="editserv" class="btn btn-warning waves-effect waves-light" type="button" value="" href="add_servicelist.php?id=<?php echo $row['serviceid'];?>">แก้ไข</a>
                                  <a id="<?php echo $row['serviceid'];?>" class="delserv btn btn-danger waves-effect waves-light" type="button" value="" href="#">ลบ</a>                           
                                </tr>
                                <?php  } ?>
                              </tbody>
                            </table>
                        </div>
                        <!-- Filtering Foo-table card end -->
                      </div>
                      <!-- Page-body end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- Main-body end -->

        

