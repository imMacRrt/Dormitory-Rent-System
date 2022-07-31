<?php
  include("include.php");
?>             
              <div class="pcoded-main-container">
                  <div class="pcoded-wrapper">
                      <!-- [ navigation menu ] start -->
                      <nav class="pcoded-navbar">
                          <div class="nav-list">
                              <div class="pcoded-inner-navbar main-menu">                                
                                <div class="pcoded-navigation-label">เมนู</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                        <i class="feather icon-home"></i>
                                        </span>
                                            <span class="pcoded-mtext">หน้าแรก</span>
                                        </a>
                                    </li>
                                    <?php
                                        $sees_em_id = $_SESSION["sees_em_id"];
                                    ?>
                                    <li class=" ">
                                        <a class="waves-effect waves-dark" href="edit_info.php?id=<?php echo $sees_em_id;?>">
                                        <span class="pcoded-micon">
                                            <i class="fa fa-gears"></i>
                                        </span>
                                            <span class="pcoded-mtext">แก้ไขข้อมูลผู้ใช้</span>
                                        </a>
                                    </li>
                                    <?php if($_SESSION["sess_em_degree"] == 1){?>
                                        <?php }else{?>
                                    <li class=" ">
                                        <a href="show_emp.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ลบข้อมูลพนักงาน</span>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <li class=" ">
                                        <a href="show_member.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ลบข้อมูลสมาชิก</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="show_room.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ลบข้อมูลห้องพัก</span>
                                        </a>
                                    </li>

                                    <li class=" ">
                                        <a href="show_servicelist.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ลบรายการบริการ</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="select_room.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                        <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดงห้องพัก</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="show_booking.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                        <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ยกเลิกการจอง</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="show_renting.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ยกเลิกการเช่า</span>
                                        </a>
                                    </li>

                                    <li class=" ">
                                        <a href="show_invoice.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-clipboard"></i>
                                        </span>
                                            <span class="pcoded-mtext">แสดง/ยกเลิกใบแจ้งหนี้</span>
                                        </a>
                                    </li>
                                    <?php if($_SESSION["sess_em_degree"] == 1){?>
                                        <?php }else{?>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-inbox"></i>
        									</span>
                                            <span class="pcoded-mtext">รายงาน</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="reports_bookingdate.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการจองประจำวัน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_bookingmonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการจองประจำเดือน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_rentdate.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการเช่าประจำวัน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_rentmonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการเช่าประจำเดือน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_informmovemonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการแจ้งย้ายประจำเดือน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_movemonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการย้ายประจำเดือน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_paymentmonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานการรับชำระประจำเดือน</span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="reports_debtmonth.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">รายงานหนี้ค้างชำระประจำเดือน</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php }?>
                                </ul>
                          </div>
                      </nav>
                      <!-- [ navigation menu ] end -->
</body>
</html>