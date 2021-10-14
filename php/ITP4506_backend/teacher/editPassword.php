<?php
require_once('../conn.php');

$sql = "UPDATE user SET password='" . $_POST["password"] . "' WHERE id='" . $_POST["id"] . "'";
$rs = mysqli_query($conn,$sql);
?>