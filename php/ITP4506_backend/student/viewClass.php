<?php
require_once('../conn.php');

if(isset($_POST['id'])) {
$sql = "SELECT * FROM class, studentclass, user WHERE user.id = '" . $_POST['id'] . "' AND studentclass.classID = class.id AND studentclass.studentID = user.id";
$rs = mysqli_query($conn, $sql);
$myArr = array();
while($rc = mysqli_fetch_assoc($rs))
{
  $data["name"] = $rc["name"];
  $data["description"] = $rc["description"];
  $data["firstName"] = $rc["firstName"];
  $data["lastName"] = $rc["lastName"];
  $data["academicYear"] = $rc["academicYear"];
  $myArr[] = $data;
 }
}
 echo json_encode($myArr);
 mysqli_free_result($rs);
 mysqli_close($conn);
?>