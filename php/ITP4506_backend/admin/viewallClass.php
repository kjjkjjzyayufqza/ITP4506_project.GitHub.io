<?php
    require_once('../conn.php');
    
    $sql = "SELECT * FROM class WHERE archive = '1' AND academicYear = '2021'";
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
  $data["count"] = $temp;
  $myArr[] = $data;
 }


 echo json_encode($myArr,true);
 mysqli_free_result($rs);
 mysqli_close($conn);
