<?php
require_once('../conn.php');


$id = $_POST['id'];
$sql = "SELECT * FROM class WHERE id=$id";
$rs = mysqli_query($conn, $sql);
$myArr = array();
while($rc = mysqli_fetch_assoc($rs))
{
  $data["id"] = $rc["id"];
  $data["name"] = $rc["name"];
  $data["description"] = $rc["description"];
  $data["teacherID"] = $rc["teacherID"];
  $data["academicYear"] = $rc["academicYear"];
  $myArr[] = $data;
 }
 echo json_encode($myArr,true);
 mysqli_free_result($rs);
 mysqli_close($conn);
?>