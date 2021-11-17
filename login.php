<?php
require_once('conn.php');

    $userID = $_POST['userID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE id='$userID' AND password='$password' AND suspended='1'";
    $rs = mysqli_query($conn, $sql);
    while($rc = mysqli_fetch_assoc($rs))
    {
      $data["id"] = $rc["id"];
      $data["role"] = $rc["role"];
      $myArr[] = $data;
     }
	if(mysqli_num_rows($rs) == 1){
    echo json_encode($myArr); 
  } else {
		echo false;
  }

?>