<?php
require_once('../conn.php');

echo $_POST['firstName'];
$id = rand(200000000,219999999);
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$role = $_POST['role'];
$sql = "INSERT INTO user (id, firstname, lastname,role)
    VALUES ($id, '$fname' , '$lname' ,'$role' )";
mysqli_query($conn, $sql);


?>