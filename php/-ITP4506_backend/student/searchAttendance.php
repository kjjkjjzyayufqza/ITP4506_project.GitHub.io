<?php

require_once('../conn.php');

if(isset($_POST['id'])) {
  $sql = "SELECT * FROM attendance WHERE studentID = '" . $_POST['id'] . "'";
  $rs = mysqli_query($conn, $sql);
  $myArr = array();

  while($rc = mysqli_fetch_assoc($rs))
  {
    $data["id"] = $rc["id"];
    $data["classID"] = $rc["classID"];
    $data["date"] = $rc["date"];
    $data["time"] = $rc["time"];
    $data["status"] = $rc["status"];
    $myArr[] = $data;
  }
}
 echo json_encode($myArr); 
 mysqli_free_result($rs);
 mysqli_close($conn);
?>