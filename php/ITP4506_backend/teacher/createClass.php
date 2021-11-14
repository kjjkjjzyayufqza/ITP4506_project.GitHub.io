<?php
require_once('../conn.php');

extract($_POST);
$id = rand(100000000,219999999);
$sql = "INSERT INTO class (id, name, description, teacherID, academicYear)
    VALUES ($id, '" . $_POST["name"] . "',  '" . $_POST["description"] . "', $teacherID, '" . $_POST["academicYear"] . "')";
$rs = mysqli_query($conn, $sql);

?>