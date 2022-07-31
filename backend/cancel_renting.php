<?php
include("config.php");
include("db_connect.php");

$id = $_GET['id'];

if (isset($id) && $id > 0) { //delete

  $sql = "SELECT a.*, b.* 
          FROM rent a
          LEFT JOIN room b ON a.roomnumber = b. roomnumber
          WHERE rentid ='" . $id . "'";

  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);

  if ($result) {
    $sql2 = "UPDATE rent
            SET rentstatus ='2'
            WHERE rentid ='" . $id . "' ";

    $result2 = $conn->query($sql2);
  }
  if ($result2) {

    $sql3 = "UPDATE  room 
              SET     roomstatus = '0'
              WHERE   roomnumber =" . $row['roomnumber'] . " ";

    $result3 = $conn->query($sql3);
  }
  if ($result3) {
    echo '<script type="text/javascript">';
    echo 'alert("ยกเลิกการเช่าเรียบร้อยแล้ว");';
    echo 'window.location = "show_renting.php";';
    echo '</script>';
  }
}
