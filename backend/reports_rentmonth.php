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

  </head>
  <body>
    <?php  
      include("hder.php");
      include("menu_navleft.php");
    ?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<table width="450" border="1" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td align="center" valign="top"><table width="445" border="0" align="center">
        <tbody>
          <tr>
            <td align="center" valign="top" bgcolor="#333300"><h3><font color="#FFFFFF">เงื่อนไขรายงานการเช่าประจำเดือน</font></h3></td>
          </tr>
        </tbody>
      </table>
        <form id="form1" name="form1" method="post" action="report_rentmonth.php"  target="_blank">
          <br>
          <table width="226" border="0" align="center">
            <tbody>
              <tr>
                <td colspan="2" align="center" valign="middle"><strong>รายงานการเช่าประจำเดือน</strong></td>
              </tr>
              <tr>
                <td width="100" align="left" valign="middle">เดือน :</td>
                <td width="116" align="left"><select name="month" id="month">
                  <option value="01">มกราคม</option>
                  <option value="02">กุมภาพันธ์</option>
                  <option value="03">มีนาคม</option>
                  <option value="04">เมษายน</option>
                  <option value="05">พฤษภาคม</option>
                  <option value="06">มิถุนายน</option>
                  <option value="07">กรกฎาคม</option>
                  <option value="08">สิงหาคม</option>
                  <option value="09">กันยายน</option>
                  <option value="10">ตุลาคม</option>
                  <option value="11">พฤศจิกายน</option>
                  <option value="12">ธันวาคม</option>
                </select></td>
              </tr>
              <tr>
                <td align="left" valign="middle">ปี :</td>
                <td align="left"><select name="year" id="year">
                  <option value="2021">2564</option>
                  <option value="2022">2565</option>
                  <option value="2023">2566</option>
                  <option value="2024">2567</option>
                  <option value="2025">2568</option>
                  <option value="2026">2569</option>
                  <option value="2027">2570</option>
                  <option value="2028">2571</option>
                  <option value="2029">2572</option>
                  <option value="2030">2573</option>
                </select></td>
              </tr>
              <tr>
                <td colspan="2" align="center" valign="middle"><input type="submit" name="submit" id="submit" value="ค้นหา">
                <input name="resetbt" type="reset" id="button" value="ล้างค่า"></td>
              </tr>
            </tbody>
          </table>
        </form>
        <p><br>
        </p>
        <br></td>
    </tr>
  </tbody>
</table>
</body>
</html>