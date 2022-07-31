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
                                    <h5>บันทึกการแจ้งย้าย</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <form id="form_informmove" method="POST" action="db_query_informmove.php"> 
                    
                    <div class="form-group row">
                        
                        <label class="col-sm-1 col-form-label" align="center" ><h6>เลขที่เช่า</h6></label>
                        
                        <span id="rentid" name="rentid" type="text" class="col-sm-2 col-form-label"><?php echo $id; ?> </span>

                        <label class="col-sm-1 col-form-label" align="right"><h6>ประเภทย้าย *</h6></label>
                        
                        <select id="type_move" name="type_move"class="js-example-basic-single col-sm-2">                           
                            
                                <option>--เลือก--</option>
                                <?php
                                foreach($type_move as $k=>$v){?>
                                    
                                        <?php  
                                            if($k==$row['type_move']){?>
                                            selected
                                            <?php   }   
                                        ?>
                                        <option value="<?php echo $k;?>"><?php echo $v;?></option>
                                <?php }
                            ?>                         
                        </select>
                        
                    </div>

                    

                    <div class="form-group row">
                        
                        <label class="col-sm-1 col-form-label" align="center" ><h6>รหัสลูกค้า</h6></label>                      
                        
                        <span id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label"><?php echo $row['cusid']; ?></span>   

                        <label class="col-sm-1 col-form-label" align="right"><h6>วันที่แจ้งย้าย *</h6></label>
                        <span id="rentdateinformA" name="rentdateinformA" type="text" class="col-sm-2 col-form-label"><?php echo date('d-m-').(date('Y',strtotime($row['rentdate']. " + 0 day"))+543)?></span>
                        <input id="rentdateinform" name="rentdateinform"type="hidden" class="col-sm-2" value="<?php echo date('Y-m-d')?>" readonly>
                                                             
                    </div>

                    <div class="form-group row">
                    <label class="col-sm-1" align="center" ><h6>ชื่อ-นามสกุล</h6></label>                        
                        <span id="cusname" name="cusname" type="text" class="col-sm-2"><?php echo $row['cusname']; ?></span>   

                        <label class="col-sm-1 col-form-label" align="right"><h6>วันกำหนดย้าย *</h6></label>
                        
                        <input id="date_decide" name="date_decide" type="date" class="col-sm-2" min="<?php echo date('Y-m-d')?>"  >             
                    </div>

                    <?php
                            $sql2 = "SELECT a.*,b.*
                                    FROM  (rent a LEFT JOIN room b 
                                    ON a.roomnumber=b.roomnumber)
                                    WHERE rentid = '".$id."'";
                            $result2 = $conn->query($sql2);
                            
                    ?>

                    <div class="pcoded-inner-content">                   
                        <div class="main-body">
                            <div class="page-wrapper">
                        <!-- Page-body start -->
                                <div class="page-body">                                    
                                    <table id="demo-foo-filtering" class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                            <th>เลขที่สัญญาเช่า</th>                                  
                                            <th>หมายเลขห้อง</th>
                                            <th>สถานะ</th>
                                            <th>ราคาห้องพัก</th>
                                            <th>เงินมัดจำ</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   

                                            while($row2 = mysqli_fetch_array($result2))
                                            {
                                            ?>
                                            <tr align="center">           
                                            <td><?php echo $row2["rentnumlease"];?></td>           
                            
                                            <td><?php echo $row2["roomnumber"];?></td>
                                            <td><?php echo $rentstatus[$row2["rentstatus"]];?></td>
                                            <td><?php echo number_format($row2["roomprice"]);
                                                            $total1 +=$row2["roomprice"];?></td>
                                            <td><?php echo number_format("1500");
                                                            $total2 += 1500; ?></td>
                                                
                                            </tr>
                                            <?php         
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>                          
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <div class="btn col-sm-12" align="center">                     
                        <input type="hidden" name="hid_id" value="<?php echo $id?>"/>
                        <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" >บันทึก</a>
                        <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" >ล้างค่า</a>   
                        <a  id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="" >ยกเลิก</a>
                        </div>

                        <script  type="text/javascript"> 
                            $(document).ready(function(){
                            
                            $("#cancelbt").click(function(){
                                window.location.replace("show_renting.php")
                            });
                            
                            $("#resetbt").click(function(){
                                $('#form_informmove')[0].reset();
                            });
                            
                            $("#confirmbt").click(function(){
                                var rentdateinform = $("#rentdateinform");
                                var rentdateinform_trim = $.trim(rentdateinform.val());

                                var date_decide = $("#date_decide");
                                var date_decide_trim = $.trim(date_decide.val());

                                var type_move = $("#type_move");
                                var type_move_trim = $.trim(type_move.val());

                                if(type_move_trim == "--เลือก--"){
                                alert('กรุณากำหนดประเภทย้าย');
                                type_move.focus();
                                return false;

                                }if(rentdateinform_trim == ""){
                                alert('กรุณากำหนดวันที่แจ้งย้าย');
                                rentdateinform.focus();
                                return false;

                                }else if(date_decide_trim == ""){

                                alert('กรุณากำหนดวันกำหนดย้าย');
                                date_decide.focus();
                                return false;
                                
                                }else{
                                
                                    if(confirm("ยืนยันการแจ้งย้าย")){
                                    $('form').submit();
                                
                                }
                                }});
                            });
                        </script>
                        
                    </form>
            </div>
                    <!-- Page-body end -->

