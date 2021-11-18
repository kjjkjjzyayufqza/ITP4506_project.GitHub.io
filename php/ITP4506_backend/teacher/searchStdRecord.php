<?php
require_once('../conn.php');
// AND teacherID = '" . $_POST['id'] . "'
$sql = "SELECT DISTINCT studentID, firstName, lastName, name FROM attendance, user, class WHERE attendance.studentID = user.id AND attendance.classID = class.id";
$rs = mysqli_query($conn, $sql);
$myArr = array();
while($rc = mysqli_fetch_assoc($rs))
{
  $data["id"] = $rc["studentID"];
  $data["name"] = $rc["firstName"] . " " . $rc["lastName"];
  $data["className"] = $rc["name"];
  $myArr[] = $data;
}
 $details = "SELECT * FROM attendance WHERE attendance.studentID = '" . $data["id"] . "'";
 $result  = mysqli_query($conn, $details);
 if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     echo "id: " . $data["id"] . "date: " . $row["date"];
   }
 }
 echo json_encode($myArr); 
 mysqli_free_result($rs);
 mysqli_close($conn);
?>