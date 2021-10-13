<?php
require_once('../conn.php');


extract($_POST);
$id = rand(200000000,219999999);
echo $_POST['firstName'];
// $result = mysqli_query($conn,"SELECT * FROM user where id='$userID'");
// $rs = mysqli_query($conn, $sql);
$sql = "INSERT INTO user (id, firstname, lastname,role)
    VALUES ($id, " . $_POST['firstName'] . ", " . $_POST['lastName'] . ", " . $_POST['role'] . ")";
mysqli_query($conn, $sql);


?>