<?php
require_once('../conn.php');

$sql = "SELECT * FROM user WHERE id = '200413958'";
$rs = mysqli_query($conn, $sql);
$myArr = array();
while($rc = mysqli_fetch_assoc($rs))
{
  $data["id"] = $rc["id"];
  $data["firstName"] = $rc["firstName"];
  $data["lastName"] = $rc["lastName"];
  $data["mobile"] = $rc["mobile"];
  $data["password"] = $rc["password"];
  $data["school"] = $rc["school"];
  $data["role"] = $rc["role"];
  $myArr[] = $data;
 }
 echo json_encode($myArr);
 mysqli_free_result($rs);
 mysqli_close($conn);
?>