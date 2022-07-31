
<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="member_index.php">หอพัก<span class="color-b">กุญชญา</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="member_index.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="member_edit.php">แก้ไขข้อมูล</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="member_room-grid.php">แสดงห้องพัก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_booking.php">แสดงรายการจอง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="cus_manual.pdf">คู่มือการใช้งาน</a>
          </li>
          
          <?php if(check_loged_in()==1){?>
            <a class="nav-link"> <?php echo display_loged_in();?></a>
          <li class="nav-item">
          <a  id="<?php echo $_SESSION['sees_cus_id']; ?>" class="logoutbt nav-link" type="button" href="#">ออกจากระบบ</a>
          </li>


          <?php }else{?>

           <li class="nav-item">
            <a class="nav-link" href="register.php">สมัครสมาชิก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <script  type="text/javascript"> 
    $(document).ready(function(){
      
        $(".logoutbt").click(function(){
          var ind = $('.logoutbt').index(this);
          var id_val = $('.logoutbt').eq(ind).attr('id');
          if(confirm("ยืนยันการออกจากระบบ")){
            window.location.replace("logout.php?id="+id_val);
          }
        })
    });
  </script>