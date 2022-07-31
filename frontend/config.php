<?PHP
// Session start
session_start();

// Turn off error reporting
error_reporting(0);

$user_type = array( 1 =>'สมาชิก');
$roomstatus = array( 0 =>'<label class="text-c-green">ว่าง</label>', 1=>'<label class="text-c-yellow">จอง</label>', 2=>'<label class="text-c-red">เช่า</label>');
$roomcategory = array(  1=>'ชั้น A', 2=>'ชั้น B',3=>'ชั้น C');
$bookcategory = array( 1 =>'โอนชำระ', 2=>'ชำระเงินสด');
$bookstatus = array( 0=>'<label class="bookstatus-inform">รอแจ้ง</label>', 1=>'<label class="bookstatus-check">รอตรวจสอบ</label>',2=>'<label class="color-b">ชำระเงินแล้ว</label>',3=>'<label class="color-d">ยกเลิก</label>');

	
/*check_login customer*/
function check_loged_in(){
    if (isset($_SESSION['sess_session_id']) && $_SESSION['sess_session_id']!='') {
        if (isset($_SESSION['sess_log_username']) && $_SESSION['sess_log_username']!='') {
            
            return 1;
        }
        
    }
    
}
/*display customer*/ 
function display_loged_in(){
    global $user_type;
    return $_SESSION["sess_cusname"]."[".$user_type[$_SESSION["sess_user_type"]]."]";
}

?>
