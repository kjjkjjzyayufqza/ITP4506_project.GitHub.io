<?php
require_once('../conn.php');
// AND teacherID = '" . $_POST['id'] . "'
$sql = "SELECT DISTINCT studentID, firstName, lastName, name FROM attendance, user, class WHERE attendance.studentID = user.id AND attendance.classID = class.id";
$rs = mysqli_query($conn, $sql);
$myArr = array();

while ($rc = mysqli_fetch_assoc($rs)) {
  $data["id"] = $rc["studentID"];
  $data["name"] = $rc["firstName"] . " " . $rc["lastName"];
  $data["className"] = $rc["name"];

  $details = "SELECT * FROM attendance WHERE attendance.studentID = '" . $data["id"] . "' ORDER BY date;";
  $result  = mysqli_query($conn, $details);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tdate = array();
    while ($row = mysqli_fetch_assoc($result)) {

      array_push($tdate, $row["date"]);
      $data["date"] = $tdate;
      $data["time"] = $row["time"];
      $data["status"] = $row["status"];
    }




    //array_push($myArr ,["date: " . $row["date"] . "status: " . $row["status"]]);

  }
  $myArr[] = $data;
}
//  $details = "SELECT * FROM attendance WHERE attendance.studentID = '" . $data["id"] . "' ORDER BY date;";
//  $result  = mysqli_query($conn, $details);
//  if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     //array_push($myArr ,["date: " . $row["date"] . "status: " . $row["status"]]);
//    }
//  }
echo json_encode($myArr);
mysqli_free_result($rs);
mysqli_close($conn);
