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
    $_SESSION['sees_em_id'];
    $id = $_GET['id'];
    $sql = "SELECT a.* , b.* 
            FROM (booking a 
            LEFT JOIN customer b 
            ON a.cusid = b.cusid) 
            WHERE bookid = '".$id."' ";
                
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . $conn->connect_error());
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
                                    <h5>บันทึกการเช่า</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <form id="form_saverent" method="post" action="db_query_saverent.php"> 
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="center" ><h6>รหัสการจอง</h6></label>
                        <!--div class="col-sm-6"-->
                        <input id="bookid" name="bookid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?php echo $id; ?>" readonly/>
                        <!--/!--div-->
                        <label class="col-sm-1" align="center" ><h6>รหัสพนักงาน</h6></label>                        
                        <input id="emid" name="emid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?=$_SESSION['sees_em_id'];?>" readonly/>   

                    </div>

                    

                    <div class="form-group row">
                                               
                        <input id="rentdate" name="rentdate" class="col-sm-2" type="hidden"
                            value="<?php 
                            $ThisYear = date('d-m-',strtotime($row['rentdate']. " + 0 day")).(date('Y',strtotime($row['rentdate']. " + 0 day"))+543);
                            echo $ThisYear;   
                            ?>"readonly/>
                        <label class="col-sm-1" align="center" ><h6>รหัสลูกค้า</h6></label>                        
                        <input id="cusid" name="cusid" type="text" class="col-sm-2 col-form-label" maxlength="5" value="<?=$row['cusid'];?>" readonly/>
                        
                        <label class="col-sm-1 col-form-label" align="right"><h6>ชื่อลูกค้า</h6></label>          
                        <input id="cusname" name="cusname"type="text" class="col-sm-2 col-form-label" maxlength="50" value="<?=$row['cusname'];?>" readonly/>  
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="right"><h6>เบอร์โทรศัพท์</h6></label>      
                        <input id="cusphone" name="cusphone"type="text" class="col-sm-2" maxlength="10" value="<?=$row['cusphone'];?>" readonly />

                    </div>
                    <div class="form-group row">
                           
                            <input id="rentdate" name="rentdate" class="col-sm-2" type="hidden"
                            value="<?php 
                            $ThisYear = date('d-m-',strtotime($row['rentdate']. " + 0 day")).(date('Y',strtotime($row['rentdate']. " + 0 day"))+543);
                            echo $ThisYear;   
                            ?>"readonly/>
                            
                            <input id="rentdatelease" 
                            name="rentdatelease" type="hidden" 
                            class="col-sm-2 col-form-label"  
                            value="<?php 
                            $oneYearOn = date('d-m-',strtotime($row['rentdatelease']. " + 365 day")).(date('Y',strtotime($row['rentdatelease']. " + 365 day"))+543);
                            echo $oneYearOn;        
                            ?>"readonly/>
                    </div>

                    <?php
                            $sql2 = "SELECT a.*,b.*
                                    FROM  (bookinglist a 
                                    LEFT JOIN room b ON b.roomnumber=a.roomnumber)
                                    WHERE a.bookid = '".$id."' ORDER BY a.bookliststatus ASC";
                            $result2 = $conn->query($sql2);
                    ?>

                    <div class="pcoded-inner-content">                   
                        <div class="main-body">
                            <div class="page-wrapper">
                        <!-- Page-body start -->
                                <div class="page-body add">                                    
                                    <table id="demo-foo-filtering" class="table table-striped" >
                                        <thead>
                                            <tr align="center">
                                            <th>รหัสรายการจอง</th>
                                            <th>รูป</th>
                                            <th>หมายเลขห้อง</th>
                                            <th>รายละเอียดห้องพัก</th>
                                            <th>ราคา(บาท)</th> 
                                            <th>เงินมัดจำ</th>
                                            <th>สถานะ</th>
                                            <th>วันที่เช่า</th>
                                            <th style="width:5px;">จำนวนผู้เข้าพัก</th>
                                            <th>เลขที่สัญญาเช่า</th>
                                            <th>เลือกเช่า</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  

                                            $i = 0;   
                                            $no = -1 ;                                    
                                            while($row2 = mysqli_fetch_array($result2))
                                            {
                                                $no++;
                                            ?>
                                            <tr>
                                            <td align="right"><?php echo $row2["booklistid"];?></td>           
                                            <td align="center"><img src="../backend/upload/<?php echo $row2['roomimage'];?>" width="150px"></td>
                                            <td align="center"><?php echo $row2["roomnumber"];?>
                                                <input id="roomnumber" name="roomnumber[<?php echo $i;?>]" type="hidden" value="<?php echo $row2["roomnumber"];?>"></td>
                                            <td align="left"><?php echo $row2["roomdetail"];?></td>
                                            <td align="right"><?php echo number_format($row2["roomprice"]);
                                                            $total1 +=$row2["roomprice"];?></td>
                                            <td align="right"><?php echo number_format("1500");
                                                            $total2 += 1500; ?></td>
                                            <td align="center"><?php echo $bookliststatus[$row2["bookliststatus"]];?></td>
                                            <td align="center"><span></span><?php 
                                                    $ThisYear = date('d-m-',strtotime($row['rentdate']. " + 0 day")).(date('Y',strtotime($row['rentdate']. " + 0 day"))+543);
                                                    echo $ThisYear;   
                                                    ?></span>
                                            </td>
                                            <td style="width: 5px;" align="center">
                                            <?php
                                                if($row2["bookliststatus"] >= 1){
                                                     
                                                }else{?>
                                                    <select style="width: 250px;" id="rentamount" name="rentamount[<?php echo $i; ?>]" type="text" class="col-sm-3 col-form-label">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>    
                                                    <option value="4">4</option>
                                                    </select>
                                            <?php }?>     
                                            </td>
                                            <td align="center"><?php
                                                if($row2["bookliststatus"] >= 1){
                                                     
                                                }else{?>
                                                <input id="rentnumlease"  
                                                name="rentnumlease[<?php echo $i; ?>]" meta:index="<?php echo $no;?>" class="col-sm-7 col-form-label c_rentnumlease" 
                                                maxlength="5" type="text">
                                                
                                                <?php }?>
                                                </td>               
                                            <td align="center">
                                            <?php
                                                if($row2["bookliststatus"] >= 1){
                                                     
                                                }else{?>
                                                <input id="check_select" meta:index="<?php echo $no;?>" name="check_select[<?php echo $i; ?>]"  class="c_check_select"  type="checkbox"  value="<?php echo $row2['booklistid'];?>"/>
                                            
                                                <?php }?>
                                            </td>    
                                            </tr>
                                            </tbody>
                                            <?php         
                                             $i++;
                                             $_SESSION["rent"] = $i ;
                                            }
                                            ?>
                                        <!--/tbody-->
                                        <tfoot>
                                            <tr>
                                                <td colspan="3"> </td>
                                                <td style="font-weight: bold;" align="right"> รวม(บาท) </td>
                                                <td style="font-weight: bold;" align="center"> <?php echo number_format($total1); ?> </td>
                                                <td style="font-weight: bold;" align="center"> <?php echo number_format($total2); ?> </td>    
                                            </tr>
                                        </tfoot>
                                    </table>                          
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <div class="btn col-sm-12" align="center">
                        <input type="hidden" name="bookmoney" value="<?php echo $total1?>" >
                        <input type="hidden" name="booklistid" value="<?php echo $total2?>" >

                        <a  id="confirmbt" class="confirmbt btn btn-success waves-effect waves-light" type="button" value="" href="#">บันทึก</a>
                        <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" href="#">ล้างค่า</a>   
                        <a  id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="" href="#">ยกเลิก</a>
                        </div>
                        
                    </form>
            </div>
                    <!-- Page-body end -->

            <script  type="text/javascript"> 
                $(document).ready(function(){
                    
                    $("#resetbt").click(function(){
                        $('#form_saverent')[0].reset();
                    });

                    $("#cancelbt").click(function(){
                        window.location.replace("show_booking.php")
                    });
                                        
                    $("input[id='rentnumlease']").bind('keyup', function(){


                        var element_id = $(this).attr("meta:index");
                        

                        var v = $(this);
                        var v_trim = $.trim(v.val());
                        if(v_trim>0){
                            
                            $("input[id='check_select']").eq(element_id).prop("checked", true);
                            
                        }else if(v_trim == 0 || v_trim == ''){
                            $("input[id='check_select']").eq(element_id).prop("checked", false);
                        }
                            
                    });
                    
                    $('#confirmbt').click(function(){
                        
                        var atLeastOneIsChecked = $('input[id="check_select"]:checked').length;

                        var rentnum = $("#rentnumlease");
                        var rentnum_trim = $.trim(rentnum.val());
                        
                        if (atLeastOneIsChecked == 0) {
                            
                            alert("กรุณาเลือกห้องพัก");
                        
                        }else if(rentnum_trim == ""){

                            alert('กรุณากรอกเลขที่สัญญาเช่า');
                            rentnum.focus();
                            return false;

                        }else{

                            if(confirm("ยืนยันการเช่าห้องพัก")){
                                $('form').submit();                     
                            }
                        }                       
                    });
                });
            </script>

