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
     <!-- JQuery and JQuery UI -->
     
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        

  </head>
  <body>

<?php  
    include("hder.php");
    include("menu_navleft.php");
?>
<?php
    
    $id = $_GET['id'];
    $sql = "SELECT a.* , b.cusname , c.* 
                 FROM invoice a 
                 LEFT JOIN customer b ON a.cusid = b.cusid 
                 LEFT JOIN rent c ON a.rentid = c.rentid 
                 WHERE a.invid = '$id'";
                
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);  
?>
<?php
    $sql2 = "SELECT a.* , b.*
                FROM rent a 
                LEFT JOIN room b ON a.roomnumber = b.roomnumber  
                WHERE a.rentid = '".$row['rentid']."' ";
                
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_array($result2);  
?>


            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="fa fa-user bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>บันทึกรับชำระ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <form id="form_inv_receipt" method="POST" action="db_query_savereceipt.php"> 
                    
                    <div class="form-group row" >
                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;" >รหัสใบแจ้งหนี้</label>                   
                        <span id="invid" name="invid" type="text" class="col-sm-2 col-form-label"><?php echo sprintf("%05d", $id); ?></span>

                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;">เลขที่ใบเสร็จ</label>
                        <span id="invreceiptB" name="invreceiptB" class="col-sm-2 col-form-label"><?php echo "R-"; echo sprintf("%05d",$id);?></span>
                        <input id="invreceipt" name="invreceipt"type="hidden" class="col-sm-1 col-form-label" value="R-<?php echo sprintf("%05d",$id);?>" readonly />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;" >เลขที่เช่า</label>              
                        <span id="rentid" name="rentid" type="text" class="col-sm-2 col-form-label"><?php echo $row['rentid']; ?></span>
                                               
                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;">วันที่ชำระเงิน</label>
                        <span id="invpaymentA" name="invpaymentA" class="col-sm-2 col-form-label"><?php echo  date('d-m-').(date('Y')+543);
                                                    echo $ThisYear;?></span>
                        <input id="invpayment" name="invpayment"type="hidden" class="col-form-label" value="<?php echo date('Y-m-d')?>" readonly/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;">วันที่ออก<br>ใบแจ้งหนี้</label>
                        
                        <span id="invdate" name="invdate" type="date" class="col-sm-2 col-form-label"><?php echo date('d-m-',strtotime($row['invdate']. " + 0 day")).(date('Y',strtotime($row['invdate']. " + 0 day"))+543)?></span>
                        <!--/!--div-->
                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;" style="font-weight: bold;">วันที่กำหนดชำระ</label>
                        
                        <span id="invdatepaymentB" name="invdatepaymentB"type="date" class="col-sm-2 col-form-label"><?php echo date('d-',strtotime($row['invdatepayment'])).(date('m-',strtotime($row['invdatepayment']. " + 0 months"))).(date('Y',strtotime($row['invdatepayment']. " + 0 day"))+543)?></span>
                        <input id="invdatepayment" name="invdatepayment" type="hidden" class="col-sm-2 col-form-label"  value="<?php echo $row['invdatepayment']; ?>" />
                    </div>

                    

                    <div class="form-group row">
                        <label class="col-sm-1" align="right" style="font-weight: bold;">รหัสลูกค้า</label>                        
                        <span id="cusid" name="cusid" type="text" class="col-sm-2"><?php echo $row['cusid'];?></span>   

                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;">ชื่อลูกค้า</label>
                        
                        <span id="cusname" name="cusname"type="text" class="col-sm-2"><?php echo $row['cusname'];?></span>             
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1" align="right" style="font-weight: bold;" >หมายเลขห้อง</label>                        
                        <span id="roomnumber" name="roomnumber" type="text" class="col-sm-2"><?php echo $row['roomnumber'];?></span>   

                        <label class="col-sm-1 col-form-label" align="right" style="font-weight: bold;">ราคาห้องพัก(บาท)</label>
                        
                        <span id="roomprice" name="roomprice" type="text" class="col-sm-2"><?php echo number_format($row2['roomprice']);?></span>             
                    </div>

                    <?php echo date('d-m-').(date('Y',strtotime($row['invdate']. " + 0 day"))+543)?>
                    
                    
                    <?php
                            $sql3 = "SELECT a.*,b.*
                                    FROM  costlist a LEFT JOIN servicelist b
                                    ON a.serviceid = b.serviceid
                                    WHERE a.invid = '".$id."'";
                            $result3 = $conn->query($sql3);
                    ?>
                    <?php
                         $DateNow = strtotime('now'); 
                         '<br>';
                         $DateDeadLine = strtotime($row['invdatepayment']);
                         '<br>';
                         $diff = $DateNow - $DateDeadLine;
                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                         '<br>';

                        if($DateNow > $DateDeadLine){
                            $fines = $days * 50 ;
                        }else{
                            $fines = 0;
                        }
                    ?>
            

                    <div class="pcoded-inner-content">                   
                        <div class="main-body">
                            <div class="page-wrapper">
                        <!-- Page-body start -->
                                <div class="page-body">                                    
                                    <table id="demo-foo-filtering" class="table table-striped">
                                        <thead>
                                            <tr style="font-weight: bolder; color: black; font-size:large;">
                                            <td align="right">รหัสรายการบริการ</td>
                                            <td align="left">รายการบริการ</td>
                                            <td align="right">ยูนิตเริ่มต้น</td>
                                            <td align="right">ยูนิตสิ้นสุด</td>
                                            <td align="right">จำนวน</td>
                                            <td align="right">ราคาต่อหน่วย(บาท)</td>
                                            <td width="200" align="right">ราคา(บาท)</td>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   

                                            while($row3 = mysqli_fetch_array($result3))
                                            {
                                            ?>
                                            <tr>                     
                                            <td align="right"><?php echo $row3["serviceid"];?></td>
                                            <td align="left"><?php echo $row3["servicename"];?></td>
                                            <td align="right"><?php echo number_format($row3["coststartunit"]);?></td>
                                            <td align="right"><?php echo number_format($row3["costendunit"]);?></td>
                                            <td align="right"><?php echo number_format($row3["costamount"]);?></td>
                                            <td align="right" valign="top"><?php echo  number_format($row3['costprice'] / $row3['costamount']);?></td>                
                                            <td align="right"><?php echo number_format($row3["costprice"]);
                                                            $total1 +=$row3["costprice"];?></td>                              
                                            </tr>
                                            <?php         
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" align="right" style="font-weight: bolder;">ประเภทชำระ :</label>
                                                    
                                                    <select id="invcategory" name="invcategory"class="js-example-basic-single col-sm-2">                           
                                                        
                                                            <option value="0">--เลือก--</option>
                                                            <?php
                                                            foreach($invcategory as $k=>$v){?>
                                                                
                                                                    <?php  
                                                                        if($k==$row['invcategory']){?>
                                                                        selected
                                                                        <?php   }   
                                                                    ?>
                                                                    <option value="<?php echo $k;?>"><?php echo $v;?></option>
                                                            <?php }
                                                        ?>                         
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" align="right" style="font-weight: bolder;">หมายเหตุ : </label>
                                                    <textarea id="invnote" name="invnote" rows="3" cols="5" class="form-control col-sm-4" maxlength="30" value="" ></textarea>    
                                                </div>
                                            </td>
                                            
                                            <td style="font-weight: bold;" align="right">
                                            รวม<br>
                                            ค่าปรับ<br><br><br>
                                            ยอดชำระ</td>
                                            <td style="font-weight: bold;" align="center">  
                                                <span id="invprice" name="invprice" class="css_input1 col-sm-5 col-form-label" data-number="<?php echo $row['invprice'];?>"><?php echo number_format($row['invprice']);?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp บาท</span><br>
                                                <input id="invfines" name="invfines" type="text" class="css_input css_input2 col-sm-5 col-form-label" value="<?php echo $fines ?>" readonly/>บาท<br><br> 
                                                <input id="invamount" name="invamount" type="text" class="css_input3 col-sm-5 col-form-label" readonly /> บาท<br>
                                            </td>
                                        </tr>                                      
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="btn col-sm-12" align="center">
                        <input type="hidden" name="hid_id" value="<?php echo $id?>" >
                        <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" >บันทึก</a>
                        <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" >ล้างค่า</a>   
                        <a  id="cancelbt" class="btn btn-danger waves-effect waves-light" type="button" value="" href="#">ยกเลิก</a>
                        </div>
                        
                    </form>
            </div>
                    <!-- Page-body end -->

        <script type="text/javascript">
            
            
            $(function(){
            
                // ฟังก์ชั่นสำหรับค้นและแทนที่ทั้งหมด
                String.prototype.replaceAll = function(search, replacement) {
                    var target = this;
                    return target.replace(new RegExp(search, 'g'), replacement);
                };  
            
                var formatMoney = function(inum){  // ฟังก์ชันสำหรับแปลงค่าตัวเลขให้อยู่ในรูปแบบ เงิน  
                    var s_inum=new String(inum);  
                    var num2=s_inum.split(".");  
                    var n_inum="";  
                    if(num2[0]!=undefined){
                        var l_inum=num2[0].length;  
                        for(i=0;i<l_inum;i++){  
                            if(parseInt(l_inum-i)%3==0){  
                                if(i==0){  
                                    n_inum+=s_inum.charAt(i);         
                                }else{  
                                    n_inum+=""+s_inum.charAt(i);         
                                }     
                            }else{  
                                n_inum+=s_inum.charAt(i);  
                            }  
                        }  
                    }else{
                        n_inum=inum;
                    }
                    if(num2[1]!=undefined){  
                        n_inum+="."+num2[1];  
                    }
                    return n_inum;  
                }  
            
                // ถ้าคลิกเลือก textbox ที่ต้องการให้ select ข้อความนั้นทันที เพื่อที่จะแก้ไขหรือลบได้เลบ
                $(".css_input").on("click",function(){
                    $(this).select();
                });
                
                $(".css_input").on("keypress",function(e){
                    var eKey = e.which || e.keyCode;
                    if((eKey<48 || eKey>57) && eKey!=46 && eKey!=44){
                        return false;
                    }
                });
                
                // ถ้ามีการเปลี่ยนแปลง textbox ที่มี css class ชื่อ css_input1 ใดๆ 
                $(".css_input").on("change",function(){
                    var thisVal=$(this).val(); // เก็บค่าที่เปลี่ยนแปลงไว้ในตัวแปร
                    if(thisVal.replace(",","")){ // ถ้ามีคอมม่า (,)
                        thisVal=thisVal.replaceAll(",",""); // แทนค่าคอมม่าเป้นค่าว่างหรือก็คือลบคอมม่า
                        thisVal = parseFloat(thisVal);  // แปลงเป็นรูปแบบตัวเลข                     
                    }else{ // ถ้าไม่มีคอมม่า
                        thisVal = parseFloat(thisVal); // แปลงเป็นรูปแบบตัวเลข          
                    }       
                    //thisVal=thisVal.toFixed(2);// แปลงค่าที่กรอกเป้นทศนิยม 2 ตำแหน่ง
                    console.log(formatMoney(thisVal));
                    $(this).data("number",thisVal); // นำค่าที่จัดรูปแบบไม่มีคอมม่าเก็บใน data-number
                    $(this).val(formatMoney(thisVal));// จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox นั้น
            
                    var data_C = 1;
                    var total_sum_C=0; // ทุกครั้งที่มีการเปลี่ยนแปลงค่า textbox ให้ค่ารวมเป็น 0
                    $(".css_input3").each(function(i,k){ //  วนลูป textbox
                        // นำค่าใน data-number ซื่องไม่มีคอมม่า มาไว้ในตัวแปร สำหรับ บวกเพิ่ม
                        var data_A = $(".css_input1").eq(i).data("number"); 
                        var data_B = $(".css_input2").eq(i).data("number"); 
                        var data_C = parseFloat(data_B)+parseFloat(data_A);
                        //data_C=data_C.toFixed(2);// แปลงค่าที่กรอกเป้นทศนิยม 2 ตำแหน่ง
                        $(".css_input3").eq(i).data("number",data_C); 
                        //console.log(data_C);
                        $(".css_input3").eq(i).val(formatMoney(data_C)); 
                        
                        var data_item=$(".css_input3").eq(i).data("number"); 
                        // บวกค่า data_item เข้าไปในผลรวม total_sum_data
                        total_sum_C=parseFloat(total_sum_C)+parseFloat(data_item);
                    });     
                    total_sum_C=total_sum_C.toFixed(2); // จัดรูปแบบแปลงทศนิยมเป็น 2 ตำแหน่ง
                    // จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox ที่เป็นผลรวม 
                    $("#total_one").val(formatMoney(total_sum_C));
                    
                    var total_sum_E=0; // ทุกครั้งที่มีการเปลี่ยนแปลงค่า textbox ให้ค่ารวมเป็น 0
                    $(".css_input5").each(function(i,k){ //  วนลูป textbox
                        // นำค่าใน data-number ซื่องไม่มีคอมม่า มาไว้ในตัวแปร สำหรับ บวกเพิ่ม
                        var data_C = $(".css_input3").eq(i).data("number"); 
                        var data_D = $(".css_input4").eq(i).data("number"); 
                        var data_E = parseFloat(data_C)*parseFloat(data_D);
                        //data_E=data_E.toFixed(2);// แปลงค่าที่กรอกเป้นทศนิยม 2 ตำแหน่ง
                        $(".css_input5").eq(i).data("number",data_E); 
                        //console.log(data_C);
                        $(".css_input5").eq(i).val(formatMoney(data_E)); 
                        
                        var data_item=$(".css_input5").eq(i).data("number"); 
                        // บวกค่า data_item เข้าไปในผลรวม total_sum_data
                        total_sum_E = parseFloat(total_sum_E)+parseFloat(data_item);
                    });     
                    //total_sum_E=total_sum_E.toFixed(2); // จัดรูปแบบแปลงทศนิยมเป็น 2 ตำแหน่ง
                    // จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox ที่เป็นผลรวม 
                    $("#total_two").val(formatMoney(total_sum_E));
                            
                });
                $(".css_input:eq(0)").trigger("change");// กำหนดเมื่อโหลด ทำงานหาผลรวมทันที 
            
            });
        </script>
        <script  type="text/javascript"> 
            $(document).ready(function(){
            
            $("#cancelbt").click(function(){
                window.location.replace("show_invoice.php")
            });
            
            $("#resetbt").click(function(){
                $('#form_inv_receipt')[0].reset();
            });
            
            $("#confirmbt").click(function(){
                

                var invcategory = $("#invcategory");
                var invcategory_trim = $.trim(invcategory.val());

                

                if(invcategory_trim == "0"){
                alert('กรุณาเลือกประเภทชำระ');
                invcategory.focus();
                return false;
    
                }else{
                
                    if(confirm("ยืนยันการบันทึกรับชำระ")){
                    $('form').submit();
                
                }
                }});
            });
        </script>

