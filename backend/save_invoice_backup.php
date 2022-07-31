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
      
        $(".cancelbt").click(function(){
          var ind = $('.cancelbt').index(this);
          var id_val = $('.cancelbt').eq(ind).attr('id');
          if(confirm("ยืนยันการยกเลิกบันทึกใบแจ้งหนี้")){
            window.location.replace("cancel_save_invoice.php?id="+id_val);
          }
        })
    });
</script>

  </head>
  <body>

<?php  
    include("hder.php");
    include("menu_navleft.php");
?>
<?php
    
    $sees_rent_inv = $_SESSION['rent_invoice'];
    $sql = "SELECT a.* , b.* 
            FROM (rent a 
            LEFT JOIN customer b 
            ON a.cusid = b.cusid) 
            WHERE rentid = '".$sees_rent_inv."' ";
                
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
                                    <h5>บันทึกใบแจ้งหนี้</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <form id="form_saveinvoice" method="POST" action="db_query_saveinvoice.php"> 
                    
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="center" ><h6>เลขที่เช่า</h6></label>                   
                        <span id="rentid" name="rentid" type="text" class="col-sm-2 col-form-label"><?php echo $sees_rent_inv; ?></span>

                        <label class="col-sm-1 col-form-label" align="center" ><h6>เลขที่สัญญาเช่า</h6></label>   
                        <span id="rentid" name="rentid" type="text" class="col-sm-2 col-form-label"><?php echo $row['rentnumlease']; ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1" align="center" ><h6>รหัสลูกค้า</h6></label>                        
                        <span id="cusid" name="cusid" type="text" class="col-sm-2"  ><?php echo $row['cusid']?></span>

                        <label class="col-sm-1 col-form-label" align="right"><h6>ชื่อลูกค้า</h6></label>
                        
                        <span id="cusname" name="cusname"type="text" class="col-sm-2"  ><?php echo $row['cusname'];?></span>         
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1" align="center" ><h6>หมายเลขห้อง</h6></label>                        
                        <span id="rentdateinform" name="rentdateinform" type="date" class="col-sm-2"><?php echo $row['roomnumber']?></span>    

                        <label class="col-sm-1 col-form-label" align="right"><h6>ราคาห้องพัก(บาท)</h6></label>
                        
                        <span id="datedecide" name="datedecide" type="text" class="col-sm-2"><?php echo number_format($row['rentcost'])?></span>             
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" align="center" ><h6>วันที่ออกใบแจ้งหนี้</h6></label>
                        <span class="col-sm-2 col-form-label" ><?php echo date('d-m-').(date('Y',strtotime($row['invdate']. " + 0 day"))+543)?></span>
                        <input id="invdate" name="invdate"  class="col-sm-2 col-form-label"  type ="hidden" max="<?php date('Y-m-d'); ?>" value="<?php echo date('d-m-').(date('Y',strtotime($row['invdate']. " + 0 day"))+543)?>"/>
                        <!--/!--div-->
                        <label class="col-sm-1 col-form-label" align="right"><h6>วันที่กำหนดชำระ</h6></label>
                        <!--span class="col-sm-2 col-form-label"><!?php echo date('05-').(date('m-',strtotime($row['invdatepayment']. " + 1 months"))).(date('Y',strtotime($row['invdatepayment']. " + 0 day"))+543)?></!--span-->
                        <input id="invdatepayment" name="invdatepayment" type="date" class="col-sm-2 col-form-label"  min="<?php echo date('Y-m-d') ?>"/>
                    </div>

                    <?php
                            $sql2 = "SELECT a.*,b.*
                                    FROM  (rent a LEFT JOIN room b
                                    ON a.roomnumber = b.roomnumber)
                                    WHERE a.rentid = '".$sees_rent_inv."'";
                            $result2 = $conn->query($sql2);
                            $row2 = mysqli_fetch_array($result2);
                    ?>

                    <div class="pcoded-inner-content">                   
                        <div class="main-body">
                            <div class="page-wrapper">
                        <!-- Page-body start -->
                                <div class="page-body">                                    
                                    <table id="demo-foo-filtering" class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                            <th>รหัสรายการบริการ</th>
                                            <th>รายการบริการ</th>
                                            <th>ยูนิตเริ่มต้น</th>
                                            <th>ยูนิตสิ้นสุด *</th>
                                            <th>จำนวน</th>
                                            <th>ราคาต่อหน่วย(บาท)</th>
                                            <th width="250">ราคา(บาท)</th>
                                            
                                            </tr>
                                        </thead>
                                        
                                        <tbody align="center">
                                        <?php     

                                        if(isset($sess_service) && $sess_service > 0){
                                            $sess_service = $_SESSION['loop_cart_service'][$sess_service];
                                        }
                                        $i = 0;
                                            foreach($_SESSION['loop_cart_service'] as $k=>$v)
                                            {
                                            
                                                $sql3 = "SELECT * FROM servicelist WHERE serviceid = '".$v."' ";
                                                $result3 = $conn->query($sql3);
                                                $row3 = mysqli_fetch_array($result3);
                                                ?>
                                                <tr> 
                                                <td align="right"><?php echo $row3["serviceid"];?>
                                                    <input id="serviceid" name="serviceid[<?php echo $i; ?>]" type="hidden"  value="<?php echo $row3["serviceid"];?>" readonly></td>
                                                <td  align="left"><?php echo $row3["servicename"];?>
                                                    <input id="servicename" name="servicename[<?php echo $i; ?>]" type="hidden"  value="<?php echo $row3["servicename"];?>" readonly></td>
                                                <td> 
                                                    <?php 
                                                    if($row3["servicename"] == "ค่าน้ำ"){//ค่าไฟเริ่มต้น
                                                    ?><p><?php  echo number_format($row2['water_unit']);?><p>
                                                        <input id="water_unitstart" name="unitstart[<?php echo $i; ?>]"  class="css_input1 col-sm-5 col-form-label" style="background-color: #b4cbcb;" data-number="<?php echo $row2['water_unit'];?>" value="<?php echo $row2['water_unit'];?>" readonly> 
                                                    <?php 
                                                    }elseif($row3["servicename"] == "ค่าไฟ"){//ค่าไฟเริ่มต้น
                                                    ?> <p><?php  echo number_format($row2['elec_unit']);?><p>
                                                        <input id="elec_unitstart" name="unitstart[<?php echo $i; ?>]" class="css_input1 col-sm-5 col-form-label" style="background-color: #b4cbcb;" data-number="<?php echo $row2['elec_unit'];?>" value="<?php echo $row2['elec_unit'];?>" readonly> 
                                                    <?php }else{                                                        
                                                    ?> <p><?php  echo number_format(0);?><p>
                                                        <input id="unitstart" name="unitstart[<?php echo $i; ?>]"  class="css_input1 col-sm-5 col-form-label" style="background-color: #b4cbcb;" type="text" data-number="0" value="0" readonly>
                                                    <?php }?>
                                                </td>                                      
                                                <td>
                                                <?php 
                                                    if($row3["servicename"] == "ค่าน้ำ"){//ค่าน้ำสิ้นสุด
                                                    ?>
                                                    <input id="water_unitend" name="unitend[<?php echo $i; ?>]" type="text" class="css_input css_input2 col-sm-5 col-form-label" required>
                                                    <?php                
                                                    }elseif($row3["servicename"] == "ค่าไฟ"){ //ค่าไฟสิ้นสุด                                                       
                                                    ?>
                                                    <input id="elec_unitend" name="unitend[<?php echo $i; ?>]" type="text" required class="css_input css_input2 col-sm-5 col-form-label" >
                                                    <?php 
                                                    }else{ 
                                                    ?>
                                                    <input id="unitend" name="unitend[<?php echo $i; ?>]" type="text"  class="css_input css_input2 col-sm-5 col-form-label" required >
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                <?php 
                                                    if($row3["servicename"] == "ค่าน้ำ"){ //จำนวนยูนิตน้ำ
                                                    ?>
                                                    <input id="amount" name="amount[<?php echo $i; ?>]" type="text" class="css_input3 col-sm-5 col-form-label"  style="background-color: #b4cbcb;" readonly>
                                                    <?php                
                                                    }elseif($row3["servicename"] == "ค่าไฟ"){ //จำนวนยูนิตไฟ                                                       
                                                    ?>
                                                    <input id="amount" name="amount[<?php echo $i; ?>]" type="text" class="css_input3 col-sm-5 col-form-label" style="background-color: #b4cbcb;"  readonly>
                                                    <?php 
                                                    }else{ //จำนวนยูนิตห้อง
                                                    ?>
                                                    <input id="amount" name="amount[<?php echo $i; ?>]" type="text" class="css_input3 col-sm-5 col-form-label" style="background-color: #b4cbcb;"  readonly>
                                                    <?php } ?>
                                                </td>
                                            
                                                <td align="right">
                                                    <span id="unitprice" name="unitprice" type="text" class="css_input css_input4 col-sm-5 col-form-label" data-number="<?php echo $row3["serviceprice"];?>"><?php echo number_format($row3["serviceprice"]);?></span>
                                                </td>
                                                <td>
                                                <?php 
                                                    if($row3["servicename"] == "ค่าน้ำ"){
                                                    ?>
                                                    <input id="price" name="price[<?php echo $i; ?>]" type="text" class="css_input5 col-sm-5 col-form-label" style="background-color: #b4cbcb;"  readonly>
                                                    <?php                
                                                    }elseif($row3["servicename"] == "ค่าไฟ"){                                                        
                                                    ?>
                                                    <input id="price" name="price[<?php echo $i; ?>]" type="text" class="css_input5 col-sm-5 col-form-label" style="background-color: #b4cbcb;" readonly>
                                                    <?php 
                                                    }else{
                                                    ?>
                                                    <input id="price" name="price[<?php echo $i; ?>]" type="text" class="css_input5 col-sm-5 col-form-label" style="background-color: #b4cbcb;"  readonly>
                                                    <?php } ?>
                                                </td>                                  
                                                </tr>
                                                <?php  
                                                $i++;
                                                $_SESSION["invoice"] = $i ;  
                                            }
                                        ?>
                                        </tbody>
                                        <tfoot >
                                        <tr>
                                            <td colspan="5"> </td>                                       
                                            <td style="font-weight: bold;" align="right"> รวม </td>
                                            <td style="font-weight: bold;" align="right"><input id="invprice" name="invprice" class="col-sm-5 col-form-label"type="text" value="" readonly> &nbsp &nbsp &nbsp บาท</td>   
                                        </tr>
                                        </tfoot>
                                    </table>                          
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn col-sm-12" align="center">
                    
                    <a  id="confirmbt" class="btn btn-success waves-effect waves-light" type="button" value="" href="#">บันทึก</a>
                    <a id="resetbt" class="btn btn-warning waves-effect waves-light" type="button" value="" href="#">ล้างค่า</a>   
                    <a  id="<?php echo $sees_rent_inv; ?>" class="cancelbt btn btn-danger waves-effect waves-light" type="button" value="" href="#">ยกเลิก</a>
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
                    //$(this).val(formatMoney(thisVal));// จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox นั้น
            
                    
                    var total_sum_C=0; // ทุกครั้งที่มีการเปลี่ยนแปลงค่า textbox ให้ค่ารวมเป็น 0
                    $(".css_input3").each(function(i,k){ //  วนลูป textbox
                        // นำค่าใน data-number ซื่องไม่มีคอมม่า มาไว้ในตัวแปร สำหรับ บวกเพิ่ม
                        var data_A = $(".css_input1").eq(i).data("number"); 
                        var data_B = $(".css_input2").eq(i).data("number"); 
                        var data_C = parseFloat(data_B)-parseFloat(data_A);
                        //data_C=data_C.toFixed(2);// แปลงค่าที่กรอกเป้นทศนิยม 2 ตำแหน่ง
                        $(".css_input3").eq(i).data("number",data_C); 
                        //console.log(data_C);
                        $(".css_input3").eq(i).val(formatMoney(data_C)); 

                        /*if(data_C <= 0){
                            alert("กรุณากรอกใหม่อีกครั้ง");
                        }*/
                        
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
                    $("#invprice").val(formatMoney(total_sum_E));
                            
                });
                $(".css_input:eq(0)").trigger("change");// กำหนดเมื่อโหลด ทำงานหาผลรวมทันที 
            
            });
        </script>

        <script  type="text/javascript">
       
            $(document).ready(function(){
         
            $("#resetbt").click(function(){
                $('#form_saveinvoice')[0].reset();
            })
            
            $(".cancelbt").click(function(){
            var ind = $('.cancelbt').index(this);
            var id_val = $('.cancelbt').eq(ind).attr('id');
            if(confirm("ยืนยันการยกเลิกบันทึกใบแจ้งหนี้")){
                window.location.replace("cancel_save_invoice.php?id="+id_val);
            }
            })
            
            $("#confirmbt").click(function(){  

                var amount = $(".css_input3");
                var amount_trim = $.trim(amount.val());
                
                var invdatepayment = $("#invdatepayment");
                var invdatepayment_trim = $.trim(invdatepayment.val());
                
                var water_unitstart = $("#water_unitstart");
                var water_unitstart_trim = $.trim(water_unitstart.val());
                
                var elec_unitstart = $("#elec_unitstart");
                var elec_unitstart_trim = $.trim(elec_unitstart.val());
                
                var unitstart = $("#unitstart");
                var unitstart_trim = $.trim(unitstart.val());
                
                var unitend = $("#unitend");
                var unitend_trim = $.trim(unitend.val());

                var water_unitend = $("#water_unitend");
                var water_unitend_trim = $.trim(water_unitend.val());

                var elec_unitend = $("#elec_unitend");
                var elec_unitend_trim = $.trim(elec_unitend.val());
                
                if(invdatepayment_trim ==""){
                alert('กรุณากรอกวันที่กำหนดชำระ');
                invdatepayment.focus();
                return false;

                }else if(amount_trim <= 0){
                alert('กรุณากรอกใหม่');
                unitend.focus();
                return false;
                
                }else if(unitend_trim ==""){
                alert('กรุณากรอกยูนิตสิ้นสุดให้ครบทุกรายการ');
                unitend.focus();
                return false;
                
                }else if(unitend_trim == 0 ){
                alert('กรุณากรอกยูนิตสิ้นสุดใหม่อีกครั้ง');
                room_unitend.focus();
                return false;

                }else if(water_unitend_trim == ""){
                alert('กรุณากรอกยูนิตสิ้นสุดค่าน้ำ');
                water_unitend.focus();
                return false;

                }else if(water_unitend_trim < water_unitstart_trim){
                alert('กรุณากรอกยูนิตสิ้นสุดค่าน้ำใหม่อีกครั้ง');
                water_unitend.focus();
                return false;

                }else if(elec_unitend_trim == ""){
                alert('กรุณากรอกยูนิตสิ้นสุดค่าไฟ');
                elec_unitend.focus();
                return false;

                }else if(elec_unitend_trim < elec_unitstart_trim){
                alert('กรุณากรอกยูนิตสิ้นสุดค่าไฟใหม่อีกครั้ง');
                elec_unitend.focus();
                return false;
                
                }else{
                    
                    if(confirm("ยืนยันการบันทึกใบแจ้งหนี้")){
                    $('form').submit();            
                }
                }
                });
            });
        </script>
