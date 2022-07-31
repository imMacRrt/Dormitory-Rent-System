<?php
  include("doctype_html.php");
  include("hder.php");
?>>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">ติดต่อเรา</h1>
            <span class="color-text-a"></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">หน้าแรก</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                ติดต่อเรา
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.641581498394!2d100.63093207776545!3d14.098323050349691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d81108d7583b7%3A0x36db6187f7aaf1ab!2z4Lir4Lit4Lie4Lix4LiB4LiB4Li44Lil4LiK4LiN4Liy4oCL!5e0!3m2!1sth!2sth!4v1611903717957!5m2!1sth!2sth"
                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form class="form-a contactForm" action="" method="post" role="form">
                <div id="sendmessage">ข้อความของคุณได้ถูกส่งแล้ว</div>
                <div id="errormessage"></div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="ชื่อของคุณ" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="อีเมลของคุณ" data-rule="email" data-msg="Please enter a valid email">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="url" name="subject" class="form-control form-control-lg form-control-a" placeholder="หัวข้อ" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea name="message" class="form-control" name="message" cols="45" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="ข้อความ"></textarea>
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-a">ส่งข้อความ</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title" align="left">ช่องทางติดต่อ</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      
                      <a class="color-a" target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZcRZnswrvxRdrBLLXmZVvGfzlMSstfFglvBkGHVkpSgvgmgKKHgvRwSwVJHxQldQsRKtL">peepachara40@gmail.com</a>
                    </p>
                    <a class="mb-1" align="left" href="Tel:0942029180">โทร : 094-202-9180
                      
                    </a>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title" align="left">ค้นหาเรา</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1" align="left">
                    50/19 ม.11 ซ.เทพกุญชร22<br>ตำบลคลองหนึ่ง อำเภอคลองหลวง จังหวัดปทุมธานี 12120                    
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box">
                <div class="icon-box-icon">
                  <span class="ion-ios-redo"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Social networks</h4>
                  </div>
                  <div class="icon-box-content">
                    <div class="socials-footer" align="left">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="#" class="link-one" >
                            <i class="fa fa-facebook" aria-hidden="true" ></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-email" aria-hidden="true"></i>
                          </a>
                        </li>               
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->

<?php
  include("footer.php");
?>