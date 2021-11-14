<?php
require_once('../conn.php');

$sql = "DELETE FROM studentclass WHERE studentID='" . $_POST["studentID"] . "' AND classID='" . $_POST["id"] . "'";
$rs = mysqli_query($conn, $sql);
mysqli_close($conn);
?>