<?php
require_once('../conn.php');

extract($_POST);
$sql = "INSERT INTO `studentclass` (`studentID`, `classID`) VALUES ($studentID, $classID)";
$rs = mysqli_query($conn, $sql);
mysqli_close($conn);
?>