<?php
    require_once('../conn.php');

    $sql = "UPDATE attendance SET status ='" . $_POST["status"] . "' WHERE studentID = '" . $_POST["stdID"] . "' AND classID = '" . $_POST["classID"] . "'" ;
    mysqli_query($conn, $sql);
?>