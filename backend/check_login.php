<?PHP
include("include.php");
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   

$em_username  = $_POST['username'];
$em_password  = $_POST['password'];

$sql = "SELECT * FROM employee WHERE emuser = ? AND empassword = ?"; //employee tb

$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $em_username , $em_password);// s - string, b - blob, i - int, etc
$stmt->execute();

$result = $stmt->get_result(); // get the mysqli result
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {// fetch data
      $_SESSION["sess_session_id"] = session_id();
      $_SESSION["sees_em_id"] = $row['emid'];  
      $_SESSION["sess_emname"] = $row['emname'];
      $_SESSION["sess_em_status"] = $row['emstatus'];
      $_SESSION["sess_em_username"] = $row['emuser'];
      $_SESSION["sess_em_degree"]= $row['emdegree'];

    }if($_SESSION["sess_em_status"]=='0'){   
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