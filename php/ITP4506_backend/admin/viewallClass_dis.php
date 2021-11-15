<?php
    require_once('../conn.php');
    
    $sql = "SELECT * FROM class WHERE archive = '0'";
    $rs = mysqli_query($conn, $sql);
$myArr = array();
$temp = 0;
while($rc = mysqli_fetch_assoc($rs))
{
  $temp++;
  $data["id"] = $rc["id"];
  $data["name"] = $rc["name"];
  $data["description"] = $rc["description"];
  $data["teacherID"] = $rc["teacherID"];
  $data["academicYear"] = $rc["academicYear"];
  $data["discount"] = $temp;
  if($rc["archive"] == "0"){
    $data["archive"] = false;
  }
  
  $myArr[] = $data;
 }


 echo json_encode($myArr,true);
 mysqli_free_result($rs);
 mysqli_close($conn);
