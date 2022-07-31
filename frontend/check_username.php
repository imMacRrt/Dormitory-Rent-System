<?PHP
include("include.php");

header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   

$usn  = $_POST['usn'];

$sql = "SELECT * FROM customer WHERE log_username = '".$usn."' ";
$result = $conn->query($sql);
echo $result->num_rows;
$result -> free_result();
$stmt->close();

?>

