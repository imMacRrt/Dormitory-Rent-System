<?PHP
include("include.php");

header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   

$usn  = $_POST['usn'];


$sql2 = "SELECT * FROM customer WHERE log_username = '".$usn."' ";
$result2 = $conn->query($sql2);
echo $result2->num_rows;
$result2 -> free_result();
?>