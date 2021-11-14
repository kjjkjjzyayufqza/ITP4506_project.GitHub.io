<?php
require_once('../conn.php');


$id = $_POST['selectid'];
$sql = "SELECT * FROM attendance WHERE studentID='$id'";
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
while($rc = mysqli_fetch_assoc($rs))
{
  if($rc["status"] == "present"){
	$present++;
  }else if($rc["status"] == "late"){
	$late++;
  }else if($rc["status"] == "present"){
	$late++;
  }else if($rc["status"] == "earlyLeave"){
	$earlyLeave++;
  }else if($rc["status"] == "sickLeave"){
	$sickLeave++;
  }else if($rc["status"] == "personalLeave"){
	$personalLeave++;
  }else if($rc["status"] == "absentWithoutReason"){
	$absentWithoutReason++;
  }
 }
 
  $data["present"] = $present/$row*100;
  $data["late"] = $late/$row*100;
  $data["earlyLeave"] = $earlyLeave/$row*100;
  $data["sickLeave"] = $sickLeave/$row*100;
  $data["personalLeave"] = $personalLeave/$row*100;
  $data["absentWithoutReason"] = $absentWithoutReason/$row*100;
  $myArr[] = $data;
 
 echo json_encode($myArr); 
 mysqli_free_result($rs);
 mysqli_close($conn);

?>