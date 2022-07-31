
<?php
	include("include.php");
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
 body
 	{
		background-color: #ADD8E6;
 	}	

</style>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <h2 class="text-center text-green pt-5">หอพักกุลชญา</h2><br>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="form_login" class="form" action="" method="post">
                            <h3 class="text-center text-info">เข้าสู่ระบบ</h3>
							
                            <div class="form-group">
                                <label for="username" class="text-info">ชื่อผู้ใช้:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">รหัสผ่าน:</label><br>
                                <input type="password" name="password" id="password" class="form-control"><br>
								<p class="error_login" id="error_login" style="display:none; color:red;">ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง!!</p>
                            </div>
                            <div class="form-group">
                                <br>
                                <input id="save_login" name="login" class="btn btn-info btn-md" type="botton" value="ตกลง" readonly>
                                <input id="cancel_login" name="cancel_login" class="btn btn-info btn-md" type="botton" value="ยกเลิก" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</body>

<script  type="text/javascript"> 
    $(document).ready(function(){

      $("#cancel_login").click(function(){
            $('#form_login')[0].reset();
        });

      $('#password,#username').focus(function(){
        $("#error_login").hide("slow");
      });
      
        $("#save_login").click(function(){
        var datastring = $("#form_login").serialize(); //serialize(); = get all data in form
        $.ajax({ 
            type: "POST",
            url: "check_login.php",
            data: datastring,
            success: function(data) {
              
              if(data==0){ 
              window.location='index.php';
              }else if(data==1){
                $("#error_login").show("slow");
                $("#error_login").html("ไม่สามารถเข้าสู่ระบบได้ เนื่องจากคุณลาออกแล้ว");
            
              }else{
                $("#error_login").show("slow");
                
              }
            }
        });
      })
    });
</script>