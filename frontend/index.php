<?php
    include("doctype_html.php");
    include("hder.php");
    include("homepg.php");
?>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
<style>
table.paleBlueRows {
  font-family: Tahoma, sans-serif;
  border: 1px solid #FFFFFF;
  background-color: #EEEEEE;
  width: 1200px;
  height: 200px;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #54AA94;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 16px;
  color: #515151;
  text-align: center;
}
table.paleBlueRows tr:nth-child(even) {
  background: #A5F5DE;
}
table.paleBlueRows thead {
  background: #3EC690;
  border-bottom: 3px solid #54AA94;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #000000;
  text-align: center;
}
table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  background: #3EC690;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
</style>

<?php
    $search = $_POST['search'];
    if($search!=''){
      $where_condition .= " AND (roomnumber LIKE '%".$search."%' OR roomprice LIKE '%".$search."%' )";
      }
?>

<?php    
//query ข้อมูลจากตาราง
$sql = "SELECT * FROM room WHERE  1=1 ".$where_condition." ORDER BY roomstatus ASC ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . $conn->connect_error());
    $row = mysqli_fetch_array($result);
?>

    
        <h2 align="center">แสดงห้องพัก</h2>
        <h5 align="center">หอพักกุลชญา</h5>
    <form id = "form_search" class=""  method = "POST" action = "room-grid.php">
        <div class="col-sm-6" align="center">
          <div class="">
            <input name="search" type="text"  class="col-sm-3 "  placeholder="ค้นหา">
              
                <button class="btn btn-primary" type="submit" value=" ">ค้นหา</button>
              
          </div>
        </div>
    </form>
    <br>
    <br>
        <table  class="paleBlueRows" align="center">
          <thead>
            <tr>
              
              <th>รูป</th>
              <th>หมายเลขห้อง</th>
              <th>ราคา</th>
              <th>ประเภท</th>
              <th>สถานะ</th>
              <th>จองห้องพัก</th>
            </tr>
          </thead>
          <tbody>
              <?php
                    foreach($result as $row) { ?>            
            <tr>              
              <td width="150"><img src="../backend/upload/<?php echo $row['roomimage'];?>" width="150px"></td>
              <td><?php echo $row['roomnumber'];?> </td>
              <td><?php echo $row['roomprice'];?> </td>
              <td><?php echo $roomcategory[$row['roomcategory']];?></td>
              <td><?php echo $roomstatus[$row['roomstatus']];?></td>
              <td> 
                <?php 
                if($row['roomstatus']>0){
                  
                }else{
                ?> 
                <a id="select" class="btn btn-success"   value="" href="login.php">เลือก</a>
                
                <?php }?>
              </td>
            </tr>
            <?php  } ?>
          </tbody>
        </table>
<?php
    include("footer.php");
?>    
