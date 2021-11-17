<?php
    require_once('../conn.php');
    
    $sql = "SELECT * FROM class";
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
  }else{
    $data["archive"] = true;
  }
  
  $myArr[] = $data;
 }


 echo json_encode($myArr,true);
 mysqli_free_result($rs);
 mysqli_close($conn);
