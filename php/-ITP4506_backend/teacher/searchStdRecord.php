<?php
require_once('../conn.php');

$sql = "SELECT * FROM attendance, user, class WHERE attendance.studentID = user.id AND attendance.classID = class.id";
$rs = mysqli_query($conn, $sql);
$myArr = array();
while($rc = mysqli_fetch_assoc($rs))
{
  $data["name"] = $rc["firstName"] . " " . $rc["lastName"];
  $data["className"] = $rc["name"];
  $data["date"] = $rc["date"];
  $data["time"] = $rc["time"];
  $data["status"] = $rc["status"];
  $myArr[] = $data;
 }
 echo json_encode($myArr); 
 mysqli_free_result($rs);
 mysqli_close($conn);
?>