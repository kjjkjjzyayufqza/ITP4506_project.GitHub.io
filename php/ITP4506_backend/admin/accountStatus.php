<?php
require_once('../conn.php');


$suspended = $_POST['suspended'];
$id = $_POST['id'];
if ($suspended == "0"){
    $disable = "UPDATE user SET suspended = 0 WHERE id = $id";
    mysqli_query($conn, $disable);
} else {
    $enable = "UPDATE user SET suspended = 1 WHERE id = $id";
    mysqli_query($conn, $enable);
}


?>