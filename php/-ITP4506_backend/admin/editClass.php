<?php
    require_once('../conn.php');

    $sql = "UPDATE class SET name ='" . $_POST["name"] . "', description='" . $_POST["description"] . "' WHERE id = '" . $_POST["id"] . "'" ;
    mysqli_query($conn, $sql);
?>