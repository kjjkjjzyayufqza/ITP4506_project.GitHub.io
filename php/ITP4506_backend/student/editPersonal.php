<?php
require_once('../conn.php');

$sql = "UPDATE user SET firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', mobile='" . $_POST['mobile'] . "' WHERE id ='" . $_POST['id'] . "'";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($rs);

?>