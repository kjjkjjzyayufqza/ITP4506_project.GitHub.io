<?php
require_once('../conn.php');

$id = $_POST['id'];
$classname = $_POST['classname'];
$classDescription = $_POST['classDescription'];
$classTeacherID = $_POST['classTeacherID'];
$classAcademicYear = $_POST['classAcademicYear'];
// $sql = "UPDATE class SET name = '$classname',  teacherID = $classTeacherID, academicYear = '$classAcademicYear' WHERE id = $id";
// $rs = mysqli_query($conn, $sql);
$sql = "UPDATE class SET name='$classname', teacherID = 201116521, academicYear = '$classAcademicYear' WHERE id='$id'";

$rs = mysqli_query($conn,$sql);
echo $rs ;
?>