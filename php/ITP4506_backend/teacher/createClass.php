<?php
require_once('../conn.php');

extract($_POST);
$id = rand(100000000,219999999);
$sql = "INSERT INTO class (id, name, description, teacherID, academicYear,archive)
    VALUES ($id, '" . $name . "', '" . $description . "', '" . $teacherID . "', '" . $academicYear . "',1)";
$rs = mysqli_query($conn, $sql);
echo $sql;
?>