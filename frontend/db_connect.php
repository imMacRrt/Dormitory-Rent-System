<?php
$servername = "localhost";
$username = "root";
//$password = "abc123456";
$password = "";
$dbname = "dormitory_system";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
  // Change character set to utf8
  $conn->set_charset("utf8");
  
}else{
  //echo "Database Connected Successfully";
}
?>
