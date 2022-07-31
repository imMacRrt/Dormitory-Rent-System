<?PHP
include("include.php");
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   

$roomnumber  = $_POST['roomnumber'];
$hid_id = $_POST['hid_id'];
if($hid_id > 0){
    echo 0 ;
}else{

    $sql = "SELECT * FROM room WHERE roomnumber = '".$roomnumber."' ";
      
    $result = $conn->query($sql); 

        if ($result->num_rows > 0) { //ซ้ำ
            
            $row = $result->fetch_assoc();
            
            echo $row['roomnumber'];
        }
        else{ //ไม่ซ้ำ

            echo 0;
        }
    }
?>