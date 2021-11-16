<?php
require_once('../conn.php');

$jsonobj = '{"classID" : 123456789, "students": [{ "name" : "Joe" },{ "name" : "Joey" }]}';

$obj = json_decode($jsonobj);
$value = $obj["students"][0]["name"];

echo $value;
foreach($value as $newkey  => $newvalue) {
    echo $newkey  . " => " . $newvalue . "<br>";
}

if(isset($_POST["update"]))
{  
    $sql = "INSERT INTO attendance (`id`, `classID`, `studentID`, `date`, `time`, `status`) 
    VALUES (NULL, '', '', '2021-11-01', '18:51:02', '');" ;
    mysqli_query($conn, $sql);
}
?>