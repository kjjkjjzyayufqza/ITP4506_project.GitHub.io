<?php
    require_once('../conn.php');

    $sql = "UPDATE class SET archive ='" . $_POST["archive"] . "'WHERE id = '" . $_POST["id"] . "'" ;
    mysqli_query($conn, $sql);
?>