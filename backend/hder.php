
      <!-- [ Pre-loader ] start -->
      <div class="loader-bg">
          <div class="loader-bar"></div>
      </div>
      <!-- [ Pre-loader ] end -->
      <div id="pcoded" class="pcoded">
          <div class="pcoded-overlay-box"></div>
          <div class="pcoded-container navbar-wrapper">
              <!-- [ Header ] start -->
              <nav class="navbar header-navbar pcoded-header">
                  <div class="navbar-wrapper">
                      <div class="navbar-logo">
                          <a href="index.php">
                              <h3>หอพักกุลชญา</h3>
                          </a>
                         <a class="mobile-menu" id="mobile-collapse" href="#!">
                             <i class="feather icon-menu icon-toggle-right"></i>
                         </a>
                          <a class="mobile-options waves-effect waves-light">
                              <i class="feather icon-more-horizontal"></i>
                          </a>
                      </div>
                      <div class="navbar-container container-fluid">
                          <ul class="nav-left">
                              <li>
                                  <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="full-screen feather icon-maximize"></i>
                              </a>
                              </li>
                          </ul>
                          <ul class="nav-right">
                         
                              
                              <li class="user-profile header-notification">

                                  <div class="dropdown-primary dropdown">
                                      <div class="dropdown-toggle" data-toggle="dropdown">
                                          <img src="Template/files/assets/images/avatar-blank.jpg" class="img-radius" alt="User-Profile-Image">
                                          <?php echo display_loged_in();?>
                                          <i class="feather icon-chevron-down"></i>
                                      </div>
                                      <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut"><li>
                                      <?php if($_SESSION["sess_em_degree"] == 1){?>
                                            <a href="usermanual-emp.pdf" target="_blank">
                                                <i class=""></i> คู่มือการใช้งาน
                                            </a>
                                        <?php }else{?><li class=" ">
                                            <a href="usermanual-own.pdf" target="_blank">
                                                <i class=""></i> คู่มือการใช้งาน
                                            </a> 
                                        </li>
                                        <?php }?>
                                        <li class=" ">
                                            <a  id="<?php echo $_SESSION["sees_em_id"]; ?>" class="logoutbt" href="#">
                                                <i class="feather icon-log-out"></i> ออกจากระบบ
                                            </a> 
                                        </li>                    
                                      </ul>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
    
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