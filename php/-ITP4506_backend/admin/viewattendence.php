<?php
require_once('../conn.php');



$sql = "SELECT * FROM attendance, user, class WHERE attendance.studentID = user.id AND attendance.classID = class.id";

$rs = mysqli_query($conn, $sql);
$myArr = array();
$row = mysqli_num_rows($rs);
//printf("Present : " . $row);
$present = 0;
$late = 0;
$earlyLeave = 0;
$sickLeave = 0;
$personalLeave = 0;
$absentWithoutReason = 0;
while ($rc = mysqli_fetch_assoc($rs)) {
  $data["name"] = $rc["firstName"] . " " . $rc["lastName"];
  $data["className"] = $rc["name"];
  $data["school"] = $rc["school"];
  $data["date"] = $rc["date"];
  $data["time"] = $rc["time"];
  $data["status"] = $rc["status"];

  $myArr[] = $data;
}




echo json_encode($myArr);
mysqli_free_result($rs);
mysqli_close($conn);
