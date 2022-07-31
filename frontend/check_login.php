<?PHP
include("include.php");

header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   

$log_username  = $_POST['username'];
$log_password  = $_POST['password'];
$cusid = $_POST['cusid'];
// $password_md5  = md5($log_password);

$sql = "SELECT * FROM customer WHERE log_username = ? AND log_password = ?"; //employee tb

$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $log_username , $log_password);// s - string, b - blob, i - int, etc
$stmt->execute();

$result = $stmt->get_result(); // get the mysqli result
if($result->num_rows > 0){//
  while($row = $result->fetch_assoc()) {// fetch data
    
    $_SESSION["sess_session_id"] = session_id();    
    $_SESSION["sees_cus_id"] = $row['cusid']; 
    $_SESSION["sess_cusname"] = $row['cusname'];
    $_SESSION["sess_cusstatus"] = $row['cusstatus'];
    $_SESSION["sess_log_username"] = $row['log_username'];
    $_SESSION["sess_user_type"]= 1; //admin1
  
  }if($_SESSION["sess_cusstatus"]==0){  
    echo 0 ;
  }else{
    echo 1 ;
  }
}else{
  echo 2;
}
// Free result set
$result -> free_result();
$stmt->close();

?>

