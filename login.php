<?php
require_once('conn.php');

    $userID = $_POST['userID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE id='$userID' AND password='$password'";
    $rs = mysqli_query($conn, $sql);
    while($rc = mysqli_fetch_assoc($rs))
    {
      $data["id"] = $rc["id"];
      $data["role"] = $rc["role"];
      $myArr[] = $data;
     }
	if(mysqli_num_rows($rs) == 1){
        //header('Location: ./pages/admin/user_list.html');
        echo json_encode($myArr); 
        return true;
    } else {
        header('X-PHP-Response-Code: 404', true, 404);
        echo "Invalid Student ID/Password";
		return false;
    }

?>