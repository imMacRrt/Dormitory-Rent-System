<?PHP
// Session start
session_start();

// Turn off error reporting
error_reporting(0);

$user_type = array( 1 =>'ผู้ดูแลระบบ', 2=>'ผู้ใช้งานทั่วไป');
$cusstatus = array( 0 =>'<label class="text-c-green">ปกติ</label>', 1=>'<label class="text-c-red">แบล็คลิสท์</label>');
$emstatus = array( 0 =>'<label class="text-c-green">ทำงาน</label>', 1=>'<label class="text-c-red">ลาออก</label>');
$emposition = array( 0 =>'<label class=" ">พนักงานบริการ</label>', 1 =>'<label class=" ">พนักงานบัญชี</label>',2 =>'<label class=" ">เจ้าของ</label>');
$emdegree = array( 0 =>'ผู้บริหาร', 1=>'พนักงาน');
$roomstatus = array( 0 =>'<label class="text-c-green">ว่าง</label>', 1=>'<label class="text-c-yellow">จอง</label>', 2=>'<label class="text-c-red">เช่า</label>');
$roomcategory = array(  1=>'ชั้น A', 2=>'ชั้น B',3=>'ชั้น C');
$servicename = array( 0 =>'<label class=" ">ค่าห้อง</label>', 1 =>'<label class=" ">ค่าน้ำ</label>',2 =>'<label class=" ">ค่าไฟ</label>');
$servicecategory = array( 0 =>'<label class="">ค่าบริการห้องพัก</label>', 1 =>'<label class="">ค่าบริการทั่วไป</label>');
$servicestatus = array( 0 =>'<label class="text-c-green">ใช้งาน</label>', 1=>'<label class="text-c-red">ไม่ใช้งาน</label>');
$bookstatus = array( 0 =>'<label class="text-c-blue">รอแจ้ง</label>', 1=>'<label class="text-c-yellow">รอตรวจสอบ</label>',2=>'<label class="text-c-green">ชำระเงินแล้ว</label>',3=>'<label class="text-c-red">ยกเลิก</label>');
$bookcategory = array( 1 =>'โอนชำระ', 2=>'ชำระเงินสด');
$rentstatus = array( 1 =>'<label class="text-c-green">เช่า</label>', 2=>'<label class="text-c-red">ยกเลิก</label>', 3=>'<label class="text-c-yellow">ย้ายห้อง</label>', 4=>'<label class="text-c-red">ย้ายออก</label>');
$bookliststatus = array( 0 =>'<label class="text-c-yellow">จอง</label>', 1=>'<label class="text-c-red">ยกเลิก</label>', 2=>'<label class="text-c-green">เช่า</label>');
$type_move = array( 1=>'<label class="text-c-red">ย้ายห้อง</label>', 2=>'<label class="text-c-green">ย้ายออก</label>');
$invcategory = array( 1 =>'โอนชำระ', 2=>'ชำระเงินสด');
$invstatus = array( 0 =>'<label class="text-c-yellow">รอการชำระ</label>', 1=>'<label class="text-c-green">ชำระแล้ว</label>', 2=>'<label class="text-c-red">ยกเลิก</label>');	


/*check_login employee */
function check_loged_in(){
    if (isset($_SESSION['sess_session_id']) && $_SESSION['sess_session_id']!='') {
        if (isset($_SESSION['sess_em_username']) && $_SESSION['sess_em_username']!='') {
            if (isset($_SESSION['sess_em_status']) && $_SESSION['sess_em_status']!='') {
                if (isset($_SESSION['sess_em_degree']) && $_SESSION['sess_em_degree']!='') {
                
                    return $_SESSION["sess_em_degree"];
                }
                return  $_SESSION['sess_em_status'];
            }
        }
        
    }
    
}
/*display employee*/
function display_loged_in(){
    global $user_type;
    return $_SESSION["sess_emname"];
}
?>


